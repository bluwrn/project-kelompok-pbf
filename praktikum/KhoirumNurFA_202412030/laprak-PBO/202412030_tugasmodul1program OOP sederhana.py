class Mahasiswa:
    # Class attribute
    universitas = "STITEK Bontang"

    # Constructor / initializer
    def __init__(self, nama, nim, jurusan, ipk=0.0):
        self.nama = nama
        self.nim = nim
        self.jurusan = jurusan
        self.ipk = ipk

    # Method untuk perkenalan
    def perkenalan_diri(self):
        print(f"Halo, nama saya {self.nama}.")
        print(f"NIM: {self.nim}")
        print(f"Jurusan: {self.jurusan}")
        print(f"Universitas: {Mahasiswa.universitas}")
        print("--------------------------")

    # Method untuk update IPK
    def update_ipk(self, ipk_baru):
        self.ipk = ipk_baru
        print(f"IPK {self.nama} berhasil diperbarui menjadi {self.ipk}")

    # Method predikat kelulusan
    def predikat_kelulusan(self):
        if self.ipk >= 3.5:
            return "Cum Laude"
        elif self.ipk >= 3.0:
            return "Sangat Memuaskan"
        elif self.ipk >= 2.5:
            return "Memuaskan"
        elif self.ipk >= 2.0:
            return "Lulus"
        else:
            return "Tidak Lulus"


# -----------------------------------------
# INSTANSIASI 3 OBJEK MAHASISWA
# -----------------------------------------

m1 = Mahasiswa("Andi", "20241001", "Teknik Informatika", 3.6)
m2 = Mahasiswa("Budi", "20241002", "Sistem Informasi", 3.1)
m3 = Mahasiswa("Cici", "20241003", "Manajemen Informatika")

# -----------------------------------------
# DEMONSTRASI METHOD
# -----------------------------------------

m1.perkenalan_diri()
m2.perkenalan_diri()
m3.perkenalan_diri()

# Update IPK mahasiswa ketiga (Cici)
m3.update_ipk(2.8)

# Tampilkan predikat kelulusan
print(f"{m1.nama} : {m1.predikat_kelulusan()}")
print(f"{m2.nama} : {m2.predikat_kelulusan()}")
print(f"{m3.nama} : {m3.predikat_kelulusan()}")
