class ManajerInventori:
    def __init__(self):
        self.inventori = {}

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

    def lihat_inventori(self):
        print("\n=== INVENTORI SAAT INI ===")
        if not self.inventori:
            print("Inventori kosong.")
        else:
            for barang, stok in self.inventori.items():
                print(f"{barang}: {stok}")
        print("==========================\n")


# ======== DEMONSTRASI PROGRAM ========
inv = ManajerInventori()

# Menambah barang
inv.tambah_barang("Buku", 10)
inv.tambah_barang("Pensil", 20)
inv.tambah_barang("Buku", 5)

# Melihat inventori
inv.lihat_inventori()

# Menghapus barang
inv.hapus_barang("Pensil", 5)
inv.hapus_barang("Buku", 12)
inv.hapus_barang("Spidol", 3)   # barang tidak ada

# Melihat inventori lagi
inv.lihat_inventori()
