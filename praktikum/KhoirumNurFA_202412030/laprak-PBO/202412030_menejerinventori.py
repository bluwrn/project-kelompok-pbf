class ManajerInventori:
    def __init__(self):
        self.inventori = {}   # menyimpan barang dan stok

    def tambah_barang(self, nama_barang, jumlah):
        if nama_barang in self.inventori:
            self.inventori[nama_barang] += jumlah
        else:
            self.inventori[nama_barang] = jumlah

    def hapus_barang(self, nama_barang, jumlah):
        if nama_barang in self.inventori:
            self.inventori[nama_barang] -= jumlah
            if self.inventori[nama_barang] <= 0:
                del self.inventori[nama_barang]

    def lihat_inventori(self):
        for barang, stok in self.inventori.items():
            print(f"{barang}: {stok}")
