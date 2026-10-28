# =========================
# Duck Typing: Burung & Pesawat
# =========================

class Burung:
    def terbang(self):
        return "Burung terbang tinggi"


class Pesawat:
    def terbang(self):
        return "Pesawat lepas landas"


def uji_terbang(obj):
    print(obj.terbang())


# Duck typing dalam aksi
b = Burung()
p = Pesawat()

uji_terbang(b)
uji_terbang(p)


# =========================
# Class Laptop & Smartphone
# =========================

class Laptop:
    def nyalakan(self):
        return "Laptop menyala..."


class Smartphone:
    def nyalakan(self):
        return "Smartphone menyala..."


# =========================
# Duck Typing: tes_nyala()
# =========================

def tes_nyala(obj):
    print(obj.nyalakan())


# Demonstrasi duck typing untuk kedua objek
l = Laptop()
s = Smartphone()

tes_nyala(l)   # Memanggil nyalakan() dari Laptop
tes_nyala(s)   # Memanggil nyalakan() dari Smartphone
