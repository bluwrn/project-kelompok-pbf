class Penulis:
    def __init__(self, nama):
        self.nama = nama


class Buku:
    def __init__(self, judul, penulis):
        self.judul = judul
        self.penulis = penulis   # Composition: Buku “memiliki” Penulis

    def info(self):
        return f"Buku '{self.judul}' ditulis oleh {self.penulis.nama}"
        

# Instansiasi
p = Penulis("Tere Liye")
b = Buku("Negeri Para Bedebah", p)

# Akses data penulis dari objek buku
print(b.info())
print(b.penulis.nama)   # akses langsung