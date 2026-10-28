class Produk:
    def __init__(self, kode, nama, harga):
        self.kode = kode
        self.nama = nama
        self.harga = harga
    
    def info(self):
        return f"{self.nama} - Rp {self.harga:,}"


# a. Class Pelanggan
class Pelanggan:
    def __init__(self, id_pelanggan, nama, email):
        self.id_pelanggan = id_pelanggan
        self.nama = nama
        self.email = email

    def info(self):
        return f"{self.nama} (ID: {self.id_pelanggan}, Email: {self.email})"


# Membuat dictionary of objects Produk
katalog_produk = {
    "P001": Produk("P001", "Laptop", 8000000),
    "P002": Produk("P002", "Mouse", 150000),
    "P003": Produk("P003", "Keyboard", 300000)
}

# b. Membuat dictionary of objects Pelanggan
data_pelanggan = {
    "C001": Pelanggan("C001", "Andi", "andi@email.com"),
    "C002": Pelanggan("C002", "Budi", "budi@email.com"),
    "C003": Pelanggan("C003", "Citra", "citra@email.com")
}

# c. Fungsi untuk menambah pelanggan
def tambah_pelanggan(data_pelanggan, pelanggan):
    data_pelanggan[pelanggan.id_pelanggan] = pelanggan

# c. Fungsi untuk menghapus pelanggan
def hapus_pelanggan(data_pelanggan, id_pelanggan):
    if id_pelanggan in data_pelanggan:
        del data_pelanggan[id_pelanggan]

# c. Fungsi untuk mencari pelanggan
def cari_pelanggan(data_pelanggan, id_pelanggan):
    return data_pelanggan.get(id_pelanggan, None)


# Mengakses dictionary of objects Produk
print("=== Katalog Produk ===")
for kode, produk in katalog_produk.items():
    print(f"{kode}: {produk.info()}")

# Mencari produk
cari_kode = "P002"
if cari_kode in katalog_produk:
    print(f"\nProduk ditemukan: {katalog_produk[cari_kode].info()}")

# d. Menampilkan seluruh daftar pelanggan
print("\n=== Daftar Pelanggan ===")
for id_pelanggan, pelanggan in data_pelanggan.items():
    print(f"{id_pelanggan}: {pelanggan.info()}")
