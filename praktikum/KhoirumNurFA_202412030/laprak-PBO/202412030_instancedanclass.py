class Kendaraan:
    # Class attribute
    bahan_bakar = "Bensin"

    # Constructor
    def __init__(self, merk, warna, tahun):
        # Instance attributes
        self.merk = merk
        self.warna = warna
        self.tahun = tahun


# Membuat dua objek kendaraan
k1 = Kendaraan("Toyota Avanza", "Hitam", 2020)
k2 = Kendaraan("Honda Jazz", "Merah", 2022)

# Akses instance attribute
print("Instance Attribute:")
print(k1.merk, k1.warna, k1.tahun)
print(k2.merk, k2.warna, k2.tahun)

# Akses class attribute
print("\nClass Attribute:")
print(k1.bahan_bakar)
print(k2.bahan_bakar)

# Mengubah class attribute
Kendaraan.bahan_bakar = "Solar"

print("\nSetelah class attribute diubah:")
print(k1.bahan_bakar)  # ikut berubah
print(k2.bahan_bakar)  # ikut berubah
