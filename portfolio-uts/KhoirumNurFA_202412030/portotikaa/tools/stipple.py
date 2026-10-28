# Membuat versi titik-titik (stipple) dari gambar bunga PNG transparan.
# Pakai:  python3 tools/stipple.py bunga.png hasil.png          (tema terang)
#         python3 tools/stipple.py bunga.png hasil-dark.png dark (tema gelap)
# Butuh:  pip install pillow
import sys, random, colorsys
from PIL import Image, ImageDraw, ImageFilter
src, out = sys.argv[1], sys.argv[2]
DARK = len(sys.argv) > 3 and sys.argv[3] == 'dark'
random.seed(7)
im = Image.open(src).convert('RGBA')
im = im.crop(im.getchannel('A').point(lambda v: 255 if v > 8 else 0).getbbox())
OUT = 900                                  # ukuran akhir (px)
SS = 3                                     # supersampling untuk tepi halus
scale = OUT / max(im.size)
W, H = round(im.width * scale), round(im.height * scale)
ref = im.resize((W, H), Image.LANCZOS)
blur = ref.filter(ImageFilter.GaussianBlur(1.2))
canvas = Image.new('RGBA', (W * SS, H * SS), (0, 0, 0, 0))
d = ImageDraw.Draw(canvas)
step = 5.4                                 # jarak antar titik
row = 0
y = step / 2
while y < H:
    x = step / 2 + (step / 2 if row % 2 else 0)   # grid heksagonal
    while x < W:
        jx, jy = x + random.uniform(-1.3, 1.3), y + random.uniform(-1.3, 1.3)
        px = blur.getpixel((min(W - 1, int(jx)), min(H - 1, int(jy))))
        r, g, b, a = px
        if a > 40:
            h, l, s = colorsys.rgb_to_hls(r / 255, g / 255, b / 255)
            if DARK:   # tema gelap: kelopak putih-krem, tengah merah marun (ala lily putih)
                warm = 0.06 < h < 0.45 and s > 0.35           # benang sari / putik (oranye, kuning, hijau)
                if warm:
                    s = min(1, s * 1.1); l = min(0.7, max(0.45, l))
                else:
                    # seberapa "merah" titik ini: makin gelap & jenuh → makin marun
                    red = max(0.0, min(1.0, (s * 1.4) * (1 - l) * 2.4 - 0.35))
                    cream = (0.97, 0.94, 0.89)
                    crimson = (0.66, 0.10, 0.24)
                    rr2 = cream[0] * (1 - red) + crimson[0] * red
                    gg2 = cream[1] * (1 - red) + crimson[1] * red
                    bb2 = cream[2] * (1 - red) + crimson[2] * red
                    h, l, s = colorsys.rgb_to_hls(rr2, gg2, bb2)
            else:
                s = min(1, s * 1.15 + 0.08)       # sedikit lebih jenuh, ala tinta
                l = min(0.93, l * 0.9 + 0.12)     # lebih terang, ala cat air
            rr, gg, bb = colorsys.hls_to_rgb(h, l, s)
            # titik lebih besar di area gelap/berwarna, lebih kecil di area terang
            dark = (1 - (r * .3 + g * .59 + b * .11) / 255)
            rad = step * ((0.36 if DARK else 0.13) + 0.34 * dark ** 1.1 + 0.06 * s) * (a / 255) ** 0.5
            rad *= random.uniform(0.75, 1.15)
            if random.random() < (0.02 if DARK else 0.07) * (1 - dark):   # sebagian titik di area terang dikosongkan
                x += step; continue
            cx, cy, R = jx * SS, jy * SS, rad * SS
            d.ellipse((cx - R, cy - R, cx + R, cy + R),
                      fill=(int(rr * 255), int(gg * 255), int(bb * 255), min(255, int(a * 1.0))))
        x += step
    y += step * 0.866
    row += 1
dots = canvas.resize((W, H), Image.LANCZOS)
# Lapisan "cat air" tipis di bawah titik: bentuk kelopak tetap terbaca di tema gelap
wash = ref.filter(ImageFilter.GaussianBlur(2.5))
wr, wg, wb, wa = wash.split()
if DARK:
    # lapisan dasar krem tipis supaya kelopak putih terasa padat
    cr = Image.new('L', wa.size, 240); cg = Image.new('L', wa.size, 232); cb = Image.new('L', wa.size, 220)
    wash = Image.merge('RGBA', (cr, cg, cb, wa.point(lambda v: int(v * 0.55))))
else:
    lift = lambda c: c.point(lambda v: int(v * 0.55 + 255 * 0.45))   # warna dipucatkan
    wash = Image.merge('RGBA', (lift(wr), lift(wg), lift(wb), wa.point(lambda v: int(v * 0.30))))
res = Image.alpha_composite(wash, dots)
res.save(out)
print(res.size)
