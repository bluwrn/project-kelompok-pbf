# relasi aggregation
class Nilai:
    def __init__(self, kode_mk: str, skor: float):
        self.kode_mk = kode_mk
        self.skor = skor


class Mahasiswa:
    def __init__(self, nim, nama):
        self.nim = nim
        self.nama = nama
        self.daftar_nilai = []  # agregasi: Nilai dapat berdiri sendiri

    def tambah_nilai(self, nilai):
        self.daftar_nilai.append(nilai)

    def rata_rata(self):
        if not self.daftar_nilai:
            return 0
        return sum(n.skor for n in self.daftar_nilai) / len(self.daftar_nilai)


class MataKuliah:
    def __init__(self, kode: str, nama: str):
        self.kode = kode
        self.nama = nama


class ProgramStudi:
    def __init__(self, nama):
        self.nama = nama
        self.daftar_matakuliah = []  # agregasi

    def tambah_matakuliah(self, mk: MataKuliah):
        self.daftar_matakuliah.append(mk)


# relasi composition
class Universitas:
    def __init__(self, nama):
        self.nama = nama
        self.programs = []

    def buat_program(self, nama_prodi):
        prodi = ProgramStudi(nama_prodi)
        self.programs.append(prodi)
        return prodi


def report_program(prodi: ProgramStudi, semua_mahasiswa: list[Mahasiswa]):
    print(f"Program Studi: {prodi.nama}")
    print("Mata kuliah:")
    for mk in prodi.daftar_matakuliah:
        print(f" - {mk.kode} {mk.nama}")

    print("\nMahasiswa dan rata-rata nilai (khusus MK prodi ini):")
    for m in semua_mahasiswa:
        relevan = [
            n for n in m.daftar_nilai
            if any(n.kode_mk == mk.kode for mk in prodi.daftar_matakuliah)
        ]
        if relevan:
            avg = sum(n.skor for n in relevan) / len(relevan)
            print(f" {m.nim} - {m.nama}: {round(avg,2)}")

    print("-" * 40)


# MAIN PROGRAM
if __name__ == "__main__":
    uni = Universitas("Universitas A")

    # Program Studi awal
    prodi_ti = uni.buat_program("Teknik Informatika")

    mk1 = MataKuliah("TI101", "Pemrograman Dasar")
    mk2 = MataKuliah("TI102", "Struktur Data")
    prodi_ti.tambah_matakuliah(mk1)
    prodi_ti.tambah_matakuliah(mk2)

    # a. Tambahkan 2 Program Studi baru
    prodi_si = uni.buat_program("Sistem Informasi")
    prodi_te = uni.buat_program("Teknik Elektro")

    # b. Tambahkan minimal 2 Mata Kuliah pada masing-masing prodi
    prodi_si.tambah_matakuliah(MataKuliah("SI201", "Analisis Sistem"))
    prodi_si.tambah_matakuliah(MataKuliah("SI202", "Basis Data"))

    prodi_te.tambah_matakuliah(MataKuliah("TE301", "Rangkaian Listrik"))
    prodi_te.tambah_matakuliah(MataKuliah("TE302", "Elektronika Dasar"))

    # c. Buat 3 Mahasiswa + nilai masing-masing
    m1 = Mahasiswa("23001", "Budi")
    m2 = Mahasiswa("23002", "Siti")
    m3 = Mahasiswa("23003", "Andi")

    # Nilai mahasiswa
    m1.tambah_nilai(Nilai("TI101", 85))
    m1.tambah_nilai(Nilai("SI201", 88))
    m1.tambah_nilai(Nilai("TE301", 75))

    m2.tambah_nilai(Nilai("TI102", 90))
    m2.tambah_nilai(Nilai("SI202", 80))

    m3.tambah_nilai(Nilai("TE301", 92))
    m3.tambah_nilai(Nilai("TE302", 87))

    semua_mahasiswa = [m1, m2, m3]

    # d. Tampilkan daftar mata kuliah setiap Program Studi
    print("\n=== DAFTAR MATA KULIAH PER PROGRAM STUDI ===")
    for prodi in uni.programs:
        print(f"\nProgram Studi: {prodi.nama}")
        for mk in prodi.daftar_matakuliah:
            print(f" - {mk.kode} {mk.nama}")

    # e. Tampilkan daftar nilai untuk setiap mahasiswa
    print("\n=== DAFTAR NILAI PER MAHASISWA ===")
    for m in semua_mahasiswa:
        print(f"\nMahasiswa: {m.nim} - {m.nama}")
        for n in m.daftar_nilai:
            print(f" - {n.kode_mk}: {n.skor}")

    # f. Tampilkan rata-rata nilai tiap mahasiswa
    print("\n=== RATA-RATA NILAI MAHASISWA ===")
    for m in semua_mahasiswa:
        print(f"{m.nim} - {m.nama}: {round(m.rata_rata(),2)}")

    # g. Panggil report_program untuk setiap prodi
    print("\n=== REPORT PER PROGRAM STUDI ===")
    for prodi in uni.programs:
        report_program(prodi, semua_mahasiswa)