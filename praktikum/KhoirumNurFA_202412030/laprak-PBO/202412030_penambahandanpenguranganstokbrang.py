class ManajerInventori:
    def __init__(self):
        self.inventori = {}   # menyimpan barang dan stok

    def tambah_barang(self, nama_barang, jumlah):
        if nama_barang in self.inventori:
            self.inventori[nama_barang] += jumlah
            print(f"[+] Stok {nama_barang} bertambah {jumlah}. Total: {self.inventori[nama_barang]}")
        else:
            self.inventori[nama_barang] = jumlah
            print(f"[+] Barang baru '{nama_barang}' ditambahkan dengan stok {jumlah}.")

    def hapus_barang(self, nama_barang, jumlah):
        if nama_barang not in self.inventori:
            print(f"[!] Barang '{nama_barang}' tidak ditemukan.")
            return
        
        if self.inventori[nama_barang] < jumlah:
            print(f"[!] Stok {nama_barang} tidak cukup. Stok tersedia: {self.inventori[nama_barang]}")
            return

        self.inventori[nama_barang] -= jumlah
        print(f"[-] Stok {nama_barang} dikurangi {jumlah}. Sisa: {self.inventori[nama_barang]}")

        if self.inventori[nama_barang] == 0:
            del self.inventori[nama_barang]
            print(f"[x] Stok {nama_barang} habis, barang dihapus dari inventori.")
