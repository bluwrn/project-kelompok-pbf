# =========================
# 1. Class Parent: Karyawan
# =========================

class Karyawan:
    def __init__(self, nama, gaji_pokok):
        self.nama = nama
        self.gaji_pokok = gaji_pokok

    def info_gaji(self):
        return f"{self.nama} - Gaji Pokok: {self.gaji_pokok}"


# =========================
# 2. Child Class: Manager
# =========================

class Manager(Karyawan):
    def __init__(self, nama, gaji_pokok, tunjangan):
        super().__init__(nama, gaji_pokok)
        self.tunjangan = tunjangan

    # Override method
    def info_gaji(self):
        total = self.gaji_pokok + self.tunjangan
        return f"{self.nama} - Gaji Total (Manager): {total}"


# =========================
# 3. Child Class: Programmer
# =========================

class Programmer(Karyawan):
    def __init__(self, nama, gaji_pokok, bonus):
        super().__init__(nama, gaji_pokok)
        self.bonus = bonus

    # Override method
    def info_gaji(self):
        total = self.gaji_pokok + self.bonus
        return f"{self.nama} - Gaji Total (Programmer): {total}"


# =========================
# 4. Composition: Departemen
# =========================

class Departemen:
    def __init__(self, nama_departemen):
        self.nama_departemen = nama_departemen
        self.daftar_karyawan = []  # list of objects

    def tambah_karyawan(self, karyawan):
        self.daftar_karyawan.append(karyawan)

    def tampilkan_karyawan(self):
        print(f"Daftar Karyawan Departemen {self.nama_departemen}:")
        for k in self.daftar_karyawan:
            print("-", k.info_gaji())
        print()  # biar rapi


# =========================
# 5. Instansiasi
# =========================

# 2 Manager
m1 = Manager("Budi", 5000000, 2000000)
m2 = Manager("Sinta", 5500000, 2500000)

# 2 Programmer
p1 = Programmer("Andi", 4000000, 1500000)
p2 = Programmer("Riko", 4200000, 1800000)

# Buat departemen
dept = Departemen("IT")

# Tambahkan semua karyawan
dept.tambah_karyawan(m1)
dept.tambah_karyawan(m2)
dept.tambah_karyawan(p1)
dept.tambah_karyawan(p2)

# Tampilkan semua info gaji
dept.tampilkan_karyawan()
