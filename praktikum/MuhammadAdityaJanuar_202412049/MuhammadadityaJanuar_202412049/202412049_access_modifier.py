# relasi aggregation
class Nilai:
    def __init__(self, kode_mk: str, skor: float):
        self.kode_mk = kode_mk
        self.skor = skor

class Mahasiswa:
    def __init__(self, nim, nama):
        self.nim = nim
        self.nama = nama
        self.daftar_nilai = []

    def tambah_nilai(self, nilai):
        self.daftar_nilai.append(nilai)

class MataKuliah:
    def __init__(self, kode: str, nama: str):
        self.kode = kode
        self.nama = nama

class ProgramStudi:
    def __init__(self, nama):
        self.nama = nama
        self.daftar_matakuliah = []

    def tambah_matakuliah(self, mk: MataKuliah):
        self.daftar_matakuliah.append(mk)

# composition
class Universitas:
    def __init__(self, nama):
        self.nama = nama
        self.programs = []

    def buat_program(self, nama_prodi):
        prodi = ProgramStudi(nama_prodi)
        self.programs.append(prodi)
        return prodi

def report_program(prodi: ProgramStudi, semua_mahasiswa: list[Mahasiswa]):
    print(f"\nProgram Studi: {prodi.nama}")
    print("Matakuliah:", ", ".join([mk.kode for mk in prodi.daftar_matakuliah]))
    print("Mahasiswa dan rata-rata nilai:")
    for m in semua_mahasiswa:
        relevan = [n for n in m.daftar_nilai if any(n.kode_mk == mk.kode for mk in prodi.daftar_matakuliah)]
        if relevan:
            avg = sum(n.skor for n in relevan) / len(relevan)
            print(f"  {m.nim} - {m.nama}: {round(avg,2)}")
    print("-" * 40)

# ===========================================
# MAIN PROGRAM
# ===========================================
if __name__ == "__main__":
    uni = Universitas("Universitas A")

    # Program Studi
    prodi_ti = uni.buat_program("Teknik Informatika")
    prodi_si = uni.buat_program("Sistem Informasi")
    prodi_te = uni.buat_program("Teknik Elektro")

    # Mata kuliah untuk TI
    prodi_ti.tambah_matakuliah(MataKuliah("TI101", "Pemrograman Dasar"))
    prodi_ti.tambah_matakuliah(MataKuliah("TI102", "Struktur Data"))

    # Mata kuliah SI
    prodi_si.tambah_matakuliah(MataKuliah("SI201", "Basis Data"))
    prodi_si.tambah_matakuliah(MataKuliah("SI202", "Analisis Sistem"))

    # Mata kuliah TE
    prodi_te.tambah_matakuliah(MataKuliah("TE301", "Rangkaian Listrik"))
    prodi_te.tambah_matakuliah(MataKuliah("TE302", "Elektronika Dasar"))

    # Mahasiswa
    m1 = Mahasiswa("202412049", "Muhammad Aditya Januar")
    m2 = Mahasiswa("202412039", "Ahdam Ashari")
    m3 = Mahasiswa("202412051", "Muhammad Nabil Abdillah")

    # Nilai mahasiswa
    m1.tambah_nilai(Nilai("TI101", 88))
    m1.tambah_nilai(Nilai("TI102", 90))

    m2.tambah_nilai(Nilai("TI101", 92))
    m2.tambah_nilai(Nilai("TI102", 85))

    m3.tambah_nilai(Nilai("TI101", 80))
    m3.tambah_nilai(Nilai("TI102", 83))

    # ===========================================
    # PEMANGGILAN REPORT UNTUK SETIAP PRODI
    # ===========================================
    report_program(prodi_ti, [m1, m2, m3])
    report_program(prodi_si, [m1, m2, m3])
    report_program(prodi_te, [m1, m2, m3])
