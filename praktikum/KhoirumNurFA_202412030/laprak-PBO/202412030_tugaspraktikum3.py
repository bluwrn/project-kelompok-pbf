# Parent Class
class Karyawan:
    def __init__(self, nama, gaji_pokok):
        self.nama = nama
        self.gaji_pokok = gaji_pokok

    def info_gaji(self):
        return self.gaji_pokok


# Child Class: Manager
class Manager(Karyawan):
    def __init__(self, nama, gaji_pokok, tunjangan):
        super().__init__(nama, gaji_pokok)
        self.tunjangan = tunjangan

    # Override method
    def info_gaji(self):
        return self.gaji_pokok + self.tunjangan


# Child Class: Programmer
class Programmer(Karyawan):
    def __init__(self, nama, gaji_pokok, bonus):
        super().__init__(nama, gaji_pokok)
        self.bonus = bonus

    # Override method
    def info_gaji(self):
        return self.gaji_pokok + self.bonus


# Composition: Departemen
class Departemen:
    def __init__(self, nama_dept):
        self.nama_dept = nama_dept
        self.karyawan_list = []  # list of objects

    def tambah_karyawan(self, karyawan):
        self.karyawan_list.append(karyawan)

    def tampilkan_karyawan(self):
        print(f"\nDaftar Karyawan di Departemen {self.nama_dept}:")
        for k in self.karyawan_list:
            print(f"- {k.nama} | Total Gaji: {k.info_gaji()}")
        print()


# --------------------------------------------------------
# Instansiasi
# --------------------------------------------------------

# 2 Manager
m1 = Manager("Budi", 7000000, 2000000)
m2 = Manager("Andi", 6500000, 1500000)

# 2 Programmer
p1 = Programmer("Citra", 5500000, 1000000)
p2 = Programmer("Dewi", 6000000, 1200000)

# Buat Departemen
dept_it = Departemen("IT")

# Tambahkan karyawan ke departemen
dept_it.tambah_karyawan(m1)
dept_it.tambah_karyawan(m2)
dept_it.tambah_karyawan(p1)
dept_it.tambah_karyawan(p2)

# Tampilkan info gaji semua karyawan
dept_it.tampilkan_karyawan()
