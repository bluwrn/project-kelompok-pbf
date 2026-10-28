# ================================
# CLASS BUKU
# ================================
class Buku:
    def __init__(self, judul, penulis, kode_buku, stok, lokasi_rak):
        self.judul = judul                   # Public
        self.penulis = penulis               # Public
        self.kode_buku = kode_buku           # Public
        self._stok = stok                    # Protected
        self.__lokasi_rak = lokasi_rak       # Private

    # Getter lokasi rak
    def get_lokasi_rak(self):
        return self.__lokasi_rak

    # Setter lokasi rak
    def set_lokasi_rak(self, lokasi_baru):
        self.__lokasi_rak = lokasi_baru

    # Method tambah stok
    def tambah_stok(self, jumlah):
        self._stok += jumlah

    # Method kurangi stok
    def kurangi_stok(self, jumlah):
        if self._stok >= jumlah:
            self._stok -= jumlah
        else:
            print("Stok tidak cukup!")

    # Tampilkan info buku
    def info_buku(self):
        return f"{self.judul} | Penulis: {self.penulis} | Stok: {self._stok} | Rak: {self.get_lokasi_rak()}"


# ================================
# CLASS PEMINJAMAN
# ================================
class Peminjaman:
    def __init__(self, buku, tanggal_pinjam, tanggal_kembali, status):
        self.buku = buku                        # Association ke Buku
        self.tanggal_pinjam = tanggal_pinjam
        self.tanggal_kembali = tanggal_kembali
        self.status = status

    def info_peminjaman(self):
        return f"Peminjaman ({self.buku.judul}) - Status: {self.status}"


# ================================
# CLASS ANGGOTA
# ================================
class Anggota:
    def __init__(self, id_anggota, nama, maks_pinjam):
        self.id_anggota = id_anggota            # Public
        self.nama = nama                        # Public
        self._maks_pinjam = maks_pinjam         # Protected
        self.__status_aktif = True              # Private
        self.daftar_peminjaman = []             # Aggregation

    # Getter status
    def get_status(self):
        return self.__status_aktif

    # Setter status
    def set_status(self, status_baru):
        self.__status_aktif = status_baru

    # Pinjam buku
    def pinjam_buku(self, buku, tanggal_pinjam, tanggal_kembali):
        if len(self.daftar_peminjaman) >= self._maks_pinjam:
            print(f"{self.nama} sudah mencapai batas maksimum peminjaman!")
            return
        
        if buku._stok <= 0:
            print(f"Stok buku '{buku.judul}' habis!")
            return
        
        buku.kurangi_stok(1)

        peminjaman = Peminjaman(buku, tanggal_pinjam, tanggal_kembali, "Dipinjam")
        self.daftar_peminjaman.append(peminjaman)

    # Kembalikan buku
    def kembalikan_buku(self, kode_buku):
        for peminjaman in self.daftar_peminjaman:
            if peminjaman.buku.kode_buku == kode_buku:
                peminjaman.status = "Dikembalikan"
                peminjaman.buku.tambah_stok(1)
                return

    # Info anggota
    def info_anggota(self):
        return f"ID: {self.id_anggota} | Nama: {self.nama} | Status: {'Aktif' if self.get_status() else 'Nonaktif'}"


# ================================
# CLASS PERPUSTAKAAN (COMPOSITION)
# ================================
class Perpustakaan:
    def __init__(self):
        self.daftar_buku = []    # Composition → perpustakaan "memiliki" buku

    def tambah_buku(self, buku):
        self.daftar_buku.append(buku)


# ================================
# DEMONSTRASI PROGRAM
# ================================
if __name__ == "__main__":
    # Membuat perpustakaan
    perpustakaan = Perpustakaan()

    # 1. Buat 3 Buku
    buku1 = Buku("Laskar Pelangi", "Andrea Hirata", "B001", 5, "Rak A1")
    buku2 = Buku("Bumi Manusia", "Pramoedya", "B002", 3, "Rak B2")
    buku3 = Buku("Atomic Habits", "James Clear", "B003", 4, "Rak C3")

    perpustakaan.tambah_buku(buku1)
    perpustakaan.tambah_buku(buku2)
    perpustakaan.tambah_buku(buku3)

    # 2. Buat 2 anggota
    anggota1 = Anggota("A001", "Tika", maks_pinjam=3)
    anggota2 = Anggota("A002", "Rama", maks_pinjam=2)

    # 3. Anggota 1 pinjam 2 buku
    anggota1.pinjam_buku(buku1, "2024-12-01", "2024-12-08")
    anggota1.pinjam_buku(buku2, "2024-12-01", "2024-12-08")

    # 4. Anggota 2 pinjam 1 buku
    anggota2.pinjam_buku(buku3, "2024-12-02", "2024-12-09")

    # 5. Pengembalian buku oleh anggota1
    anggota1.kembalikan_buku("B002")

    # ================================================
    # OUTPUT (PRINT)
    # ================================================
    print("\n=== INFORMASI BUKU ===")
    for b in perpustakaan.daftar_buku:
        print(b.info_buku())

    print("\n=== INFORMASI ANGGOTA ===")
    print(anggota1.info_anggota())
    print(anggota2.info_anggota())

    print("\n=== DAFTAR PEMINJAMAN ANGGOTA 1 ===")
    for p in anggota1.daftar_peminjaman:
        print(p.info_peminjaman())

    print("\n=== DAFTAR PEMINJAMAN ANGGOTA 2 ===")
    for p in anggota2.daftar_peminjaman:
        print(p.info_peminjaman())
