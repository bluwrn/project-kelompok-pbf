# ==================================
# CLASS BUKU
# ==================================
class Buku:
    def __init__(self, judul, penulis, kode_buku, stok, lokasi_rak):
        self.judul = judul
        self.penulis = penulis
        self.kode_buku = kode_buku
        self._stok = stok
        self.__lokasi_rak = lokasi_rak

    def get_lokasi_rak(self):
        return self.__lokasi_rak

    def set_lokasi_rak(self, lokasi):
        self.__lokasi_rak = lokasi

    def tambah_stok(self, jumlah):
        self._stok += jumlah

    def kurangi_stok(self, jumlah):
        if self._stok >= jumlah:
            self._stok -= jumlah
        else:
            print("Stok tidak cukup!")

    def info(self):
        return f"{self.kode_buku} - {self.judul} oleh {self.penulis} (Stok: {self._stok})"


# ==================================
# CLASS PEMINJAMAN (Association)
# ==================================
class Peminjaman:
    def __init__(self, buku: Buku, tanggal_pinjam, tanggal_kembali, status):
        self.buku = buku
        self.tanggal_pinjam = tanggal_pinjam
        self.tanggal_kembali = tanggal_kembali
        self.status = status


# ==================================
# CLASS ANGGOTA (Aggregation)
# ==================================
class Anggota:
    def __init__(self, id_anggota, nama):
        self.id_anggota = id_anggota
        self.nama = nama
        self._maks_pinjam = 3
        self.__status_aktif = True
        self.daftar_peminjaman = []

    def pinjam_buku(self, peminjaman: Peminjaman):
        if len(self.daftar_peminjaman) < self._maks_pinjam:
            self.daftar_peminjaman.append(peminjaman)
            peminjaman.buku.kurangi_stok(1)
        else:
            print("Maksimal peminjaman tercapai!")

    def kembalikan_buku(self, kode_buku):
        for p in self.daftar_peminjaman:
            if p.buku.kode_buku == kode_buku:
                p.buku.tambah_stok(1)
                self.daftar_peminjaman.remove(p)
                print(f"{self.nama} mengembalikan buku '{p.buku.judul}'")
                return
        print("Buku tidak ditemukan dalam daftar peminjaman.")

    def info_anggota(self):
        return f"{self.id_anggota} - {self.nama}"

    def info_peminjaman(self):
        print(f"\nDaftar Peminjaman {self.nama}:")
        if not self.daftar_peminjaman:
            print("  Tidak ada buku yang dipinjam.")
        else:
            for p in self.daftar_peminjaman:
                print(f"  - {p.buku.judul} (Status: {p.status})")


# ==================================
# CLASS PERPUSTAKAAN (Composition)
# ==================================
class Perpustakaan:
    def __init__(self, nama):
        self.nama = nama
        self.buku_list = []

    def tambah_buku(self, judul, penulis, kode_buku, stok, lokasi_rak):
        buku = Buku(judul, penulis, kode_buku, stok, lokasi_rak)
        self.buku_list.append(buku)
        return buku

    def tampilkan_buku(self):
        print(f"\n=== DAFTAR BUKU DI {self.nama} ===")
        for b in self.buku_list:
            print(" -", b.info())


# ==================================
# INSTANSIASI SESUAI PERINTAH
# ==================================

# Membuat perpustakaan
perpus = Perpustakaan("Perpustakaan STITEK")

# 1) Buat 3 Buku
b1 = perpus.tambah_buku("Algoritma", "Rinaldi", "BK001", 5, "Rak A1")
b2 = perpus.tambah_buku("Basis Data", "Sutoyo", "BK002", 3, "Rak B2")
b3 = perpus.tambah_buku("Pemrograman Python", "Siregar", "BK003", 4, "Rak C3")

# 2) Buat 2 Anggota
a1 = Anggota("AG01", "Muhammad Aditya")
a2 = Anggota("AG02", "Ahdam Ashari")

# 3) Anggota 1 pinjam 2 buku
pinjam1 = Peminjaman(b1, "2024-02-01", "2024-02-05", "Dipinjam")
pinjam2 = Peminjaman(b2, "2024-02-01", "2024-02-05", "Dipinjam")
a1.pinjam_buku(pinjam1)
a1.pinjam_buku(pinjam2)

# 4) Anggota 2 pinjam 1 buku
pinjam3 = Peminjaman(b3, "2024-02-02", "2024-02-06", "Dipinjam")
a2.pinjam_buku(pinjam3)

# 5) Contoh Pengembalian Buku
a1.kembalikan_buku("BK002")

# ==================================
# DEMONSTRASI PRINT()
# ==================================

print("\n==============================")
print(" DEMONSTRASI PROGRAM PERPUSTAKAAN ")
print("==============================")

# Informasi buku
perpus.tampilkan_buku()

# Informasi anggota dan peminjaman
print("\n=== INFORMASI ANGGOTA ===")
print(a1.info_anggota())
print(a2.info_anggota())

# Daftar peminjaman masing-masing anggota
a1.info_peminjaman()
a2.info_peminjaman()
