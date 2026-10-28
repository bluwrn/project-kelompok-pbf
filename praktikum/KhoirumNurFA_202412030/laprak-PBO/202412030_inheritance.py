class Kendaraan:
    def __init__(self, merk, tahun):
        self.merk = merk
        self.tahun = tahun

    def info(self):
        return f"Kendaraan: {self.merk} ({self.tahun})"


class Mobil(Kendaraan):
    def __init__(self, merk, tahun, jumlah_pintu):
        super().__init__(merk, tahun)
        self.jumlah_pintu = jumlah_pintu

    def info(self):
        return f"Mobil: {self.merk}, {self.jumlah_pintu} pintu ({self.tahun})"


class Person:
    def __init__(self, nama, umur):
        self.nama = nama
        self.umur = umur

    def info(self):
        return f"Nama: {self.nama}, Umur: {self.umur} tahun"


class Mahasiswa(Person):
    def __init__(self, nama, umur, nim):
        super().__init__(nama, umur)
        self.nim = nim

    def info(self):
        return f"Mahasiswa: {self.nama}, Umur: {self.umur} tahun, NIM: {self.nim}"


# ======================
# INSTANSIASI OBJEK
# ======================

k = Kendaraan("Yamaha", 2020)
m = Mobil("Toyota", 2022, 4)
p = Person("Andi", 25)
ma = Mahasiswa("Budi", 20, "2305110001")

# ======================
# PEMANGGILAN METHOD info()
# ======================

print(k.info())
print(m.info())
print(p.info())
print(ma.info())