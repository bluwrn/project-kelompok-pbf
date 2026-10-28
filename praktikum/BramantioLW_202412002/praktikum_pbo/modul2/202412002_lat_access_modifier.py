class Mahasiswa:
    def __init__(self, nim, nama, semester, ipk):
        self.nim = nim            # public
        self.nama = nama          # public
        self._semester = semester # protected
        self.__ipk = ipk          # private

    # Getter protected
    def get_semester(self):
        return self._semester

    # Setter protected
    def set_semester(self, smt):
        if smt <= 0:
            raise ValueError("Semester harus positif.")
        self._semester = smt

    # Getter private
    def get_ipk(self):
        return self.__ipk

    # Setter private
    def set_ipk(self, value):
        if not (0.0 <= value <= 4.0):
            raise ValueError("IPK harus antara 0.0 dan 4.0")
        self.__ipk = round(value, 2)


# Buat 2 objek Mahasiswa
m1 = Mahasiswa("23001", "Budi", 2, 3.4)
m2 = Mahasiswa("23002", "Siti", 4, 3.85)

# Tampilkan data masing-masing mahasiswa
print("Mahasiswa 1:")
print("NIM:", m1.nim)
print("Nama:", m1.nama)
print("Semester:", m1.get_semester())
print("IPK:", m1.get_ipk())

print("\nMahasiswa 2:")
print("NIM:", m2.nim)
print("Nama:", m2.nama)
print("Semester:", m2.get_semester())
print("IPK:", m2.get_ipk())

# Ganti semester dan IPK
m1.set_semester(3)
m1.set_ipk(3.75)

m2.set_semester(5)
m2.set_ipk(3.9)

# Tampilkan lagi untuk bukti perubahan
print("Setelah diubah:")

print("Mahasiswa 1:")
print("NIM:", m1.nim)
print("Nama:", m1.nama)
print("Semester:", m1.get_semester())
print("IPK:", m1.get_ipk())

print("\nMahasiswa 2:")
print("NIM:", m2.nim)
print("Nama:", m2.nama)
print("Semester:", m2.get_semester())
print("IPK:", m2.get_ipk())