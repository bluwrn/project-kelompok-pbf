from datetime import date

# ============================
# CLASS BUKU (COMPOSITION TARGET)
# ============================
class Buku:
    def __init__(self, judul, penulis, kode_buku, stok, lokasi_rak):
        # Public
        self.judul = judul
        self.penulis = penulis
        self.kode_buku = kode_buku

        # Protected
        self._stok = stok

        # Private
        self.__lokasi_rak = lokasi_rak

    # Getter & Setter lokasi rak (private)
    def get_lokasi_rak(self):
        return self.__lokasi_rak

    def set_lokasi_rak(self, lokasi_baru):
        self.__lokasi_rak = lokasi_baru

    # Stok management
    def tambah_stok(self, jumlah):
        self._stok += jumlah

    def kurangi_stok(self, jumlah):
        if self._stok >= jumlah:
            self._stok -= jumlah
            return True
        return False

    # Info buku
    def info_buku(self):
        return f"[{self.kode_buku}] {self.judul} - {self.penulis} | Stok: {self._stok} | Rak: {self.get_lokasi_rak()}"


# ============================
# CLASS PEMINJAMAN (ASSOCIATION)
# ============================
class Peminjaman:
    def __init__(self, kode_buku, tanggal_pinjam, tanggal_kembali=None, status="Dipinjam"):
        self.kode_buku = kode_buku
        self.tanggal_pinjam = tanggal_pinjam
        self.tanggal_kembali = tanggal_kembali
        self.status = status

    def info_peminjaman(self):
        kembali = self.tanggal_kembali if self.tanggal_kembali else "-"
        return f"{self.kode_buku} | Pinjam: {self.tanggal_pinjam} | Kembali: {kembali} | Status: {self.status}"


# ============================
# CLASS ANGGOTA (AGGREGATION)
# ============================
class Anggota:
    def __init__(self, id_anggota, nama, maks_pinjam, status_aktif=True):
        # Public
        self.id_anggota = id_anggota
        self.nama = nama

        # Protected
        self._maks_pinjam = maks_pinjam

        # Private
        self.__status_aktif = status_aktif

        # Aggregation: menyimpan objek peminjaman
        self.daftar_peminjaman = []

    # Getter/setter status aktif
    def get_status(self):
        return self.__status_aktif

    def set_status(self, baru):
        self.__status_aktif = baru

    # Pinjam buku (association → uses Buku)
    def pinjam_buku(self, buku: Buku):
        if not self.get_status():
            print(f"Anggota {self.nama} tidak aktif. Tidak bisa meminjam.")
            return

        if len(self.daftar_peminjaman) >= self._maks_pinjam:
            print(f"Anggota {self.nama} sudah mencapai batas peminjaman.")
            return

        if not buku.kurangi_stok(1):
            print(f"Stok habis untuk buku: {buku.judul}")
            return

        peminjaman = Peminjaman(
            kode_buku=buku.kode_buku,
            tanggal_pinjam=date.today()
        )

        self.daftar_peminjaman.append(peminjaman)

    # Kembalikan buku
    def kembalikan_buku(self, kode_buku):
        for p in self.daftar_peminjaman:
            if p.kode_buku == kode_buku and p.status == "Dipinjam":
                p.status = "Dikembalikan"
                p.tanggal_kembali = date.today()
                return True
        return False

    # Info anggota
    def info_anggota(self):
        status = "Aktif" if self.get_status() else "Nonaktif"
        return f"{self.id_anggota} | {self.nama} | Status: {status} | Maks Pinjam: {self._maks_pinjam}"


# ============================
# CLASS PERPUSTAKAAN (COMPOSITION)
# ============================
class Perpustakaan:
    def __init__(self, nama):
        self.nama = nama
        self.daftar_buku = []

    def tambah_buku(self, judul, penulis, kode_buku, stok, rak):
        buku = Buku(judul, penulis, kode_buku, stok, rak)
        self.daftar_buku.append(buku)
        return buku


# ============================
# DEMONSTRASI PROGRAM
# ============================
if __name__ == "__main__":
    # Perpustakaan
    lib = Perpustakaan("Perpustakaan Kota")

    # d1. Buat 3 buku (composition)
    b1 = lib.tambah_buku("Laskar Pelangi", "Andrea Hirata", "BK001", 3, "Rak A1")
    b2 = lib.tambah_buku("Negeri 5 Menara", "A. Fuadi", "BK002", 2, "Rak B3")
    b3 = lib.tambah_buku("Clean Code", "Robert C. Martin", "BK003", 1, "Rak C2")

    # d2. Buat 2 anggota
    a1 = Anggota("AG001", "Budi", maks_pinjam=3)
    a2 = Anggota("AG002", "Siti", maks_pinjam=2)

    # d3. Anggota 1 pinjam 2 buku
    a1.pinjam_buku(b1)
    a1.pinjam_buku(b3)

    # d4. Anggota 2 pinjam 1 buku
    a2.pinjam_buku(b2)

    # d5. Pengembalian buku (contoh: Budi mengembalikan BK003)
    a1.kembalikan_buku("BK003")

    # OUTPUT ======================

    print("\n=== INFORMASI BUKU ===")
    for buku in lib.daftar_buku:
        print(buku.info_buku())

    print("\n=== INFORMASI ANGGOTA ===")
    print(a1.info_anggota())
    print(a2.info_anggota())

    print("\n=== DAFTAR PEMINJAMAN ANGGOTA ===")
    for anggota in [a1, a2]:
        print(f"\n{anggota.nama}:")
        if not anggota.daftar_peminjaman:
            print("  Tidak ada peminjaman.")
        else:
            for p in anggota.daftar_peminjaman:
                print(" ", p.info_peminjaman())
