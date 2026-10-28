class Kendaraan:
    # Class attribute (bersifat global untuk semua object)
    bahan_bakar = "Bensin"

    # Constructor
    def __init__(self, merk, warna, tahun):
        # Instance attributes (unik untuk setiap object)
        self.merk = merk
        self.warna = warna
        self.tahun = tahun

    # Method untuk menampilkan info kendaraan
    def info_kendaraan(self):
        return f"{self.merk} berwarna {self.warna} (Tahun {self.tahun})"


# Instansiasi 2 object kendaraan
kendaraan1 = Kendaraan("Toyota Avanza", "Hitam", 2020)
kendaraan2 = Kendaraan("Honda Beat", "Merah", 2022)

# Menampilkan info kendaraan
print(kendaraan1.info_kendaraan())
print(kendaraan2.info_kendaraan())

# Menampilkan class attribute (sama untuk semua object)
print(f"Bahan bakar: {Kendaraan.bahan_bakar}")
print(f"Kendaraan1 bahan bakar: {kendaraan1.bahan_bakar}")
print(f"Kendaraan2 bahan bakar: {kendaraan2.bahan_bakar}")

# Mengubah instance attribute kendaraan1 (contoh perbedaan)
kendaraan1.warna = "Silver"

print("\nSetelah perubahan warna pada kendaraan1:")
print(kendaraan1.info_kendaraan())
print(kendaraan2.info_kendaraan())
