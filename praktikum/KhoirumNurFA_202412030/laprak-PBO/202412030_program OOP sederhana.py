class Mahasiswa:
    # 2b. Class attribute
    universitas = "STITTEK Bontang"

    # 3a. Constructor / initializer
    def __init__(self, nama, nim, jurusan, ipk=0.0):
        self.nama = nama
        self.nim = nim
        self.jurusan = jurusan
        self.ipk = float(ipk)

    # 3b. Method perkenalan diri
    def perkenalan_diri(self):
        print(f"Nama        : {self.nama}")
        print(f"NIM         : {self.nim}")
        print(f"Jurusan     : {self.jurusan}")
        print(f"Universitas : {self.universitas}")
        print(f"IPK         : {self.ipk}")
        print("-" * 40)

    # 3c. Method update IPK
    def update_ipk(self, ipk_baru):
        self.ipk = float(ipk_baru)
        print(f"IPK {self.nama} berhasil diperbarui menjadi {self.ipk}")

    # 3d. Method predikat kelulusan
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


# ---------------------------------------------
# 4. INSTANSIASI 3 OBJEK MAHASISWA
# ---------------------------------------------

m1 = Mahasiswa("Khoirum Nurfatikha", "202412030", "Informatika", 3.4)
m2 = Mahasiswa("Mosyarofah", "202412032", "Sistem Informasi", 3.7)
m3 = Mahasiswa("Yovita Gracia", "202412044", "Teknik Bisnis Digital", 2.3)

# 4b. DEMONSTRASI SEMUA METHOD
print("\n=== PERKENALAN DIRI ===")
m1.perkenalan_diri()
m2.perkenalan_diri()
m3.perkenalan_diri()

print("=== UPDATE IPK ===")
m1.update_ipk(3.6)
m3.update_ipk(2.8)

print("\n=== PREDIKAT KELULUSAN ===")
print(f"{m1.nama} : {m1.predikat_kelulusan()}")
print(f"{m2.nama} : {m2.predikat_kelulusan()}")
print(f"{m3.nama} : {m3.predikat_kelulusan()}")
