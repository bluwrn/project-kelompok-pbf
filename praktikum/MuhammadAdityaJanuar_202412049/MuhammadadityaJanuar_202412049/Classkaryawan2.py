# Parent class: Karyawan
class Karyawan:
    def __init__(self, nama, id_karyawan, gaji_pokok):   # Konstruktor untuk inisialisasi atribut
        self.nama = nama                                 # Nama karyawan
        self.id_karyawan = id_karyawan                   # ID unik karyawan
        self.gaji_pokok = gaji_pokok                     # Gaji pokok karyawan

    def hitung_gaji(self):                               # Method untuk menghitung total gaji (default)
        return self.gaji_pokok                           # Mengembalikan nilai gaji pokok

    def info(self):                                      # Method untuk menampilkan info karyawan
        return f"{self.nama}, ID: {self.id_karyawan}, Gaji: {self.hitung_gaji()}"


# Subclass: Manager (turunan dari Karyawan)
class Manager(Karyawan):
    def __init__(self, nama, id_karyawan, gaji_pokok, tunjangan):  # Konstruktor Manager
        super().__init__(nama, id_karyawan, gaji_pokok)            # Memanggil konstruktor dari class Karyawan
        self.tunjangan = tunjangan                                 # Tambahan atribut khusus Manager

    def hitung_gaji(self):                                         # Override method dari parent
        return self.gaji_pokok + self.tunjangan                    # Gaji total = gaji pokok + tunjangan

    def info(self):                                                # Override method info()
        return f"Manager : {self.nama}, ID: {self.id_karyawan}, Gaji: {self.hitung_gaji()}"


# Subclass: Programmer (turunan dari Karyawan)
class Programmer(Karyawan):
    def __init__(self, nama, id_karyawan, gaji_pokok, bonus):      # Konstruktor Programmer
        super().__init__(nama, id_karyawan, gaji_pokok)            # Memanggil konstruktor dari class Karyawan
        self.bonus = bonus                                         # Tambahan atribut khusus Programmer

    def hitung_gaji(self):                                         # Override method dari parent
        return self.gaji_pokok + self.bonus                        # Gaji total = gaji pokok + bonus

    def info(self):                                                # Override method info()
        return f"Programmer : {self.nama}, ID: {self.id_karyawan}, Gaji: {self.hitung_gaji()}"


# Program utama
if __name__ == "__main__":                                         # Menandakan program utama
    manager1 = Manager("Abadi", "M001", 10000000, 5000000)         # Membuat objek Manager dengan data contoh
    programmer1 = Programmer("Muhammad Aditya Januar", "P001", 9000000, 3000000)  # Membuat objek Programmer

    print(manager1.info())                                         # Menampilkan informasi manager
    print(programmer1.info())                                      # Menampilkan informasi programmer
