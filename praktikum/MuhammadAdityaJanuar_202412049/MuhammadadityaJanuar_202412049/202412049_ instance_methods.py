class ManajerInventori:
    def __init__(self):
        # Inventori berupa dictionary: {nama_barang: jumlah}
        self.inventori = {}

    def tambah_barang(self, nama_barang, jumlah):
        if jumlah > 0:
            if nama_barang in self.inventori:
                self.inventori[nama_barang] += jumlah
            else:
                self.inventori[nama_barang] = jumlah
            return f"Berhasil menambah {jumlah} {nama_barang}. Total: {self.inventori[nama_barang]}"
        return "Jumlah harus lebih dari 0"

    def hapus_barang(self, nama_barang, jumlah):
        if nama_barang not in self.inventori:
            return "Barang tidak ditemukan"

        if jumlah <= 0:
            return "Jumlah harus positif"

        if jumlah > self.inventori[nama_barang]:
            return "Stok tidak mencukupi"

        self.inventori[nama_barang] -= jumlah

        if self.inventori[nama_barang] == 0:
            del self.inventori[nama_barang]

        return f"Berhasil mengurangi {jumlah} {nama_barang}"

    def lihat_inventori(self):
        if not self.inventori:
            return "Inventori kosong"

        daftar = "\n".join([f"- {barang}: {jumlah}" for barang, jumlah in self.inventori.items()])
        return f"Daftar Inventori:\n{daftar}"


# ============================
# Demonstrasi Program
# ============================

inv = ManajerInventori()

print(inv.tambah_barang("Laptop", 10))
print(inv.tambah_barang("Mouse", 25))
print(inv.tambah_barang("Laptop", 5))

print(inv.hapus_barang("Laptop", 8))
print(inv.hapus_barang("Mouse", 5))

print(inv.lihat_inventori())
