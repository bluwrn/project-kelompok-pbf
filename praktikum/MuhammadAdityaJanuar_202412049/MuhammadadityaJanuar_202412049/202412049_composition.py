# =========================
# Class Mesin & Mobil (Composition)
# =========================

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


# Instansiasi
mesin = Mesin("Bensin")
mobil = Mobil("Honda", mesin)

print(mobil.info())


# =========================
# Class Penulis
# =========================

class Penulis:
    def __init__(self, nama):
        self.nama = nama


# =========================
# Class Buku (Composition dengan Penulis)
# =========================

class Buku:
    def __init__(self, judul, penulis):
        self.judul = judul
        self.penulis = penulis  # Composition

    def info(self):
        return f"Buku '{self.judul}' ditulis oleh {self.penulis.nama}"


# =========================
# Demonstrasi mengakses data Penulis dari objek Buku
# =========================

penulis1 = Penulis("Tere Liye")
buku1 = Buku("Hujan", penulis1)

# Akses langsung atribut penulis
print("Nama Penulis:", buku1.penulis.nama)

# Akses melalui method info()
print(buku1.info())
