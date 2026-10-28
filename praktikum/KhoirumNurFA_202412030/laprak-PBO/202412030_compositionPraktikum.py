class Mesin:
    def __init__(self, jenis):
        self.jenis = jenis

    def hidupkan(self):
        return f"Mesin {self.jenis} hidup"


class Mobil:
    def __init__(self, merk, mesin):
        self.merk = merk
        self.mesin = mesin  # Composition

    def info(self):
        return f"Mobil {self.merk} dengan {self.mesin.hidupkan()}"


# Class Penulis
class Penulis:
    def __init__(self, nama):
        self.nama = nama


# Class Buku (composition)
class Buku:
    def __init__(self, judul, penulis):
        self.judul = judul
        self.penulis = penulis   # Buku memiliki Penulis (composition)

    def info(self):
        return f"Buku '{self.judul}' ditulis oleh {self.penulis.nama}"


# Instansiasi
mesin = Mesin("Bensin")
mobil = Mobil("Honda", mesin)

print(mobil.info())

# Instansiasi Buku + Penulis
penulis1 = Penulis("Tere Liye")
buku1 = Buku("Bumi", penulis1)

print(buku1.info())


# ======================================
# LANJUTAN: Mengakses data penulis
# ======================================
print("Judul Buku :", buku1.judul)
print("Nama Penulis :", buku1.penulis.nama)
