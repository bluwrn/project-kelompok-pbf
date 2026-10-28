class Kendaraan:
  # Class attribute
  bahan_bakar = "Bensin"

  # Constructor
  def __init__(self, merk, warna, tahun):
    # Instance attributes
    self.merk = merk
    self.warna = warna
    self.tahun = tahun

  def info_kendaraan(self):
    return f"{self.merk} warna {self.warna} ({self.tahun})"

# Instansiasi object
mobil1 = Kendaraan("Toyota", "Hitam", 2020)
motor1 = Kendaraan("Honda", "Merah", 2021)

# Akses instance attributes
print(mobil1.info_kendaraan())
print(motor1.info_kendaraan())

# Akses class attribute
print(f"Bahan bakar default: {Kendaraan.bahan_bakar}")

# Akses class attribute lewat object
print(f"Mobil 1 pakai: {mobil1.bahan_bakar}")
print(f"Motor 1 pakai: {motor1.bahan_bakar}")