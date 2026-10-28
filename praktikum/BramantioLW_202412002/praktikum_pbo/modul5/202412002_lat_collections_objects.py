# a. Membuat class Buku dengan atribut judul, penulis, dan tahun
class Buku:
    def __init__(self, judul, penulis, tahun):
        self.judul = judul
        self.penulis = penulis
        self.tahun = tahun

    def info(self):
        return f"{self.judul} | {self.penulis} | {self.tahun}"


# b. Membuat list yang berisi 5 objek Buku
daftar_buku = [
    Buku("Laskar Pelangi", "Andrea Hirata", 2005),
    Buku("Bumi Manusia", "Pramoedya Ananta Toer", 1980),
    Buku("Negeri 5 Menara", "Ahmad Fuadi", 2009),
    Buku("Perahu Kertas", "Dee Lestari", 2009),
    Buku("Cantik Itu Luka", "Eka Kurniawan", 2002)
]


# c. Fungsi untuk mencari buku berdasarkan penulis
def cari_buku_penulis(daftar_buku, penulis):
    hasil = []
    for buku in daftar_buku:
        if buku.penulis.lower() == penulis.lower():
            hasil.append(buku)
    return hasil


# d. Menampilkan hasil pencarian
penulis_dicari = "Andrea Hirata"
hasil_pencarian = cari_buku_penulis(daftar_buku, penulis_dicari)

print(f"=== Buku karya {penulis_dicari} ===")
if hasil_pencarian:
    for buku in hasil_pencarian:
        print(buku.info())
else:
    print("Buku tidak ditemukan")