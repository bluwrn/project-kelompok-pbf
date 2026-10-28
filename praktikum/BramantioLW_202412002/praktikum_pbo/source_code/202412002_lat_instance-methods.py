class ManajerInventori:
  def __init__(self):
    # Inventori disimpan dalam dictionary: {nama_barang: stok}
    self.inventori = {}

  def tambah_barang(self, nama, jumlah):
    if jumlah <= 0:
      return "Jumlah harus lebih dari 0"

    if nama in self.inventori:
      self.inventori[nama] += jumlah
    else:
      self.inventori[nama] = jumlah

    return f"Barang '{nama}' ditambah {jumlah}. Total stok: {self.inventori[nama]}"

  def hapus_barang(self, nama, jumlah):
    if nama not in self.inventori:
      return f"Barang '{nama}' tidak ditemukan"

    if jumlah <= 0:
      return "Jumlah harus lebih dari 0"

    if jumlah > self.inventori[nama]:
      return f"Stok '{nama}' tidak mencukupi"

    self.inventori[nama] -= jumlah

    # Kalau stok habis, hapus dari inventori biar bersih
    if self.inventori[nama] == 0:
      del self.inventori[nama]
      return f"Barang '{nama}' habis dan dihapus dari inventori"

    return f"Barang '{nama}' dikurangi {jumlah}. Sisa stok: {self.inventori[nama]}"

  def lihat_inventori(self):
    if not self.inventori:
      return "Inventori kosong"

    data = "=== INVENTORI SAAT INI ===\n"
    for barang, stok in self.inventori.items():
      data += f"- {barang}: {stok}\n"
    return data.strip()

# Demonstrasi penggunaan
manager = ManajerInventori()

print(manager.tambah_barang("Laptop", 10))
print(manager.tambah_barang("Mouse", 25))
print(manager.tambah_barang("Laptop", 5))

print(manager.hapus_barang("Mouse", 10))
print(manager.hapus_barang("Laptop", 15))
print(manager.hapus_barang("Mouse", 15))  # habis stok

print(manager.lihat_inventori())