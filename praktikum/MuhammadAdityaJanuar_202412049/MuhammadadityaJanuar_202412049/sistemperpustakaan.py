# ==========================
# Program: Sistem Perpustakaan Sederhana
# ==========================

class Buku:
    def __init__(self, judul, penulis):
        self.judul = judul
        self.penulis = penulis
        self.status = "Tersedia"  # status buku bisa 'Tersedia' atau 'Dipinjam'

    def __str__(self):
        return f"{self.judul} oleh {self.penulis} ({self.status})"


class Anggota:
    def __init__(self, nama):
        self.nama = nama
        self.buku_dipinjam = []  # daftar buku yang sedang dipinjam

    def __str__(self):
        return f"Anggota: {self.nama}, Buku dipinjam: {[b.judul for b in self.buku_dipinjam]}"


class Peminjaman:
    def __init__(self, anggota, buku, tanggal_pinjam):
        self.anggota = anggota
        self.buku = buku
        self.tanggal_pinjam = tanggal_pinjam

    def __str__(self):
        return f"{self.anggota.nama} meminjam '{self.buku.judul}' pada {self.tanggal_pinjam}"


class Perpustakaan:
    def __init__(self, nama):
        self.nama = nama
        self.koleksi_buku = []   # daftar semua buku
        self.daftar_anggota = [] # daftar semua anggota
        self.daftar_peminjaman = [] # daftar transaksi peminjaman

    def tambah_buku(self, buku):
        self.koleksi_buku.append(buku)
        print(f"Buku '{buku.judul}' ditambahkan ke perpustakaan.")

    def daftar_anggota(self, anggota):
        self.daftar_anggota.append(anggota)
        print(f"Anggota '{anggota.nama}' berhasil didaftarkan.")

    def pinjam_buku(self, anggota, buku, tanggal_pinjam):
        if buku.status == "Tersedia":
            buku.status = "Dipinjam"
            anggota.buku_dipinjam.append(buku)
            transaksi = Peminjaman(anggota, buku, tanggal_pinjam)
            self.daftar_peminjaman.append(transaksi)
            print(f"{anggota.nama} berhasil meminjam '{buku.judul}'.")
        else:
            print(f"Maaf, buku '{buku.judul}' sedang dipinjam orang lain.")

    def tampilkan_status_peminjaman(self):
        print("\n=== STATUS PEMINJAMAN ===")
        if not self.daftar_peminjaman:
            print("Belum ada transaksi peminjaman.")
        else:
            for transaksi in self.daftar_peminjaman:
                print(transaksi)


# ==========================
# Bagian Testing / Main Program
# ==========================
if __name__ == "__main__":
    # 1. Membuat objek perpustakaan, buku, dan anggota
    perpus = Perpustakaan("Perpustakaan Kampus")
    buku1 = Buku("Pemrograman Python", "Guido van Rossum")
    buku2 = Buku("Struktur Data", "Niklaus Wirth")
    anggota1 = Anggota("Adit")

    # 2. Menambah buku ke perpustakaan
    perpus.tambah_buku(buku1)
    perpus.tambah_buku(buku2)

    # 3. Mendaftarkan anggota
    perpus.daftar_anggota(anggota1)

    # 4. Meminjam buku oleh anggota
    perpus.pinjam_buku(anggota1, buku1, "9 Oktober 2025")

    # 5. Menampilkan status peminjaman
    perpus.tampilkan_status_peminjaman()
