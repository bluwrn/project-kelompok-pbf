# a. Membuat class Pelanggan dengan atribut id_pelanggan, nama, email
class Pelanggan:
    def __init__(self, id_pelanggan, nama, email):
        self.id_pelanggan = id_pelanggan
        self.nama = nama
        self.email = email

    def info(self):
        return f"{self.nama} ({self.email})"


# b. Dictionary untuk menyimpan objek Pelanggan (id sebagai key)
data_pelanggan = {
    "PL001": Pelanggan("PL001", "Andi", "andi@email.com"),
    "PL002": Pelanggan("PL002", "Bela", "bela@email.com"),
    "PL003": Pelanggan("PL003", "Cindy", "cindy@email.com")
}


# c. Fungsi menambah pelanggan
def tambah_pelanggan(data, pelanggan):
    data[pelanggan.id_pelanggan] = pelanggan


# c. Fungsi menghapus pelanggan
def hapus_pelanggan(data, id_pelanggan):
    if id_pelanggan in data:
        del data[id_pelanggan]
        return True
    return False


# c. Fungsi mencari pelanggan
def cari_pelanggan(data, id_pelanggan):
    return data.get(id_pelanggan, None)


# d. Menampilkan seluruh daftar pelanggan
print("=== Daftar Pelanggan ===")
for id_pel, pelanggan in data_pelanggan.items():
    print(f"{id_pel}: {pelanggan.info()}")


# Contoh penggunaan fungsi
print("\n=== Tambah Pelanggan ===")
tambah_pelanggan(data_pelanggan, Pelanggan("PL004", "Doni", "doni@email.com"))

print("\n=== Cari Pelanggan ===")
hasil = cari_pelanggan(data_pelanggan, "PL002")
if hasil:
    print(f"Pelanggan ditemukan: {hasil.info()}")
else:
    print("Pelanggan tidak ditemukan")

print("\n=== Hapus Pelanggan ===")
hapus_pelanggan(data_pelanggan, "PL001")

print("\n=== Daftar Pelanggan Setelah Update ===")
for id_pel, pelanggan in data_pelanggan.items():
    print(f"{id_pel}: {pelanggan.info()}")