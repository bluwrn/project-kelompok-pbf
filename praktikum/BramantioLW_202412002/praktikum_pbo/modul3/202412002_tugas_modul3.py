class Karyawan:
    def __init__(self, nama, gaji_pokok):
        self.nama = nama
        self.gaji_pokok = gaji_pokok

    def info_gaji(self):
        return f"{self.nama} - Gaji Pokok: {self.gaji_pokok}"


class Manager(Karyawan):
    def __init__(self, nama, gaji_pokok, tunjangan):
        super().__init__(nama, gaji_pokok)
        self.tunjangan = tunjangan

    def info_gaji(self):
        total = self.gaji_pokok + self.tunjangan
        return f"{self.nama} - Manager | Total Gaji: {total}"


class Programmer(Karyawan):
    def __init__(self, nama, gaji_pokok, bonus):
        super().__init__(nama, gaji_pokok)
        self.bonus = bonus

    def info_gaji(self):
        total = self.gaji_pokok + self.bonus
        return f"{self.nama} - Programmer | Total Gaji: {total}"


class Departemen:
    def __init__(self, nama):
        self.nama = nama
        self.daftar_karyawan = []

    def tambah_karyawan(self, k):
        self.daftar_karyawan.append(k)

    def tampilkan_karyawan(self):
        print(f"Departemen: {self.nama}")
        for k in self.daftar_karyawan:
            print(k.info_gaji())


# Instansiasi
m1 = Manager("Ani", 7000000, 3000000)
m2 = Manager("Budi", 6500000, 2500000)

p1 = Programmer("Cahyo", 5000000, 1500000)
p2 = Programmer("Dina", 5500000, 2000000)

# Departemen
dep = Departemen("IT & Management")
dep.tambah_karyawan(m1)
dep.tambah_karyawan(m2)
dep.tambah_karyawan(p1)
dep.tambah_karyawan(p2)

dep.tampilkan_karyawan()