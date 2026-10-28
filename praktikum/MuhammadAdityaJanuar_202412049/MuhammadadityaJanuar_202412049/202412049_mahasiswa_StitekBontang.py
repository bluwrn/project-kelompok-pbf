class Mahasiswa:
    # Class Attribute
    universitas = "STITEK Bontang"

    # Instance Attribute
    def __init__(self, nama, nim, jurusan, ipk=0.0):
        self.nama = nama
        self.nim = nim
        self.jurusan = jurusan
        self.ipk = ipk

    # Method Perkenalan
    def perkenalan_diri(self):
        return f"Hallo, nama saya {self.nama} dengan NIM {self.nim} dari jurusan {self.jurusan}."

    # Method update IPK
    def update_ipk(self, ipk_baru):
        self.ipk = ipk_baru
        return f"IPK berhasil diupdate menjadi {self.ipk}"

    # Method Predikat Kelulusan
    def predikat_kelulusan(self):
        if self.ipk >= 3.5:
            return "Cum Laude"
        elif self.ipk >= 3.0:
            return "Sangat Memuaskan"
        elif self.ipk >= 2.5:
            return "Memuaskan"
        else:
            return "Lulus"


# ===========================
#      DEMONSTRASI PROGRAM
# ===========================

# Buat 3 object mahasiswa
m1 = Mahasiswa("Andi", "23001", "Informatika", 3.6)
m2 = Mahasiswa("Budi", "23002", "Sistem Informasi", 2.8)
m3 = Mahasiswa("Cici", "23003", "Teknik Industri", 3.2)

# Tampilkan output
print(m1.perkenalan_diri())
print(m1.predikat_kelulusan())
print()

print(m2.perkenalan_diri())
print(m2.predikat_kelulusan())
print()

print(m3.perkenalan_diri())
print("Update:", m3.update_ipk(3.7))
print(m3.predikat_kelulusan())
