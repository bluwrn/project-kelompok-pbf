class Mahasiswa:
    def __init__(self, nim, nama, semester, ipk):
        self.nim = nim                  # public
        self.nama = nama                # public
        self._semester = semester       # protected
        self.__ipk = ipk                # private

    # Getter protected
    def get_semester(self):
        return self._semester

    # Setter protected
    def set_semester(self, semester_baru):
        self._semester = semester_baru

    # Getter private
    def get_ipk(self):
        return self.__ipk

    # Setter private
    def set_ipk(self, ipk_baru):
        self.__ipk = ipk_baru


# ----------------- MAIN PROGRAM -----------------
if __name__ == "__main__":

    # Objek Mahasiswa 1
    m1 = Mahasiswa("23050123", "Ayu", 3, 3.75)

    # Objek Mahasiswa 2
    m2 = Mahasiswa("23050145", "Rizky", 5, 3.40)

    print("=== DATA AWAL MAHASISWA 1 ===")
    print("NIM:", m1.nim)
    print("Nama:", m1.nama)
    print("Semester:", m1.get_semester())
    print("IPK:", m1.get_ipk())

    print("\n=== DATA AWAL MAHASISWA 2 ===")
    print("NIM:", m2.nim)
    print("Nama:", m2.nama)
    print("Semester:", m2.get_semester())
    print("IPK:", m2.get_ipk())

    # ----- Mengubah semester & IPK -----
    m1.set_semester(4)
    m1.set_ipk(3.90)

    m2.set_semester(6)
    m2.set_ipk(3.60)

    print("\n=== DATA MAHASISWA 1 (SETELAH DIUPDATE) ===")
    print("NIM:", m1.nim)
    print("Nama:", m1.nama)
    print("Semester:", m1.get_semester())
    print("IPK:", m1.get_ipk())

    print("\n=== DATA MAHASISWA 2 (SETELAH DIUPDATE) ===")
    print("NIM:", m2.nim)
    print("Nama:", m2.nama)
    print("Semester:", m2.get_semester())
    print("IPK:", m2.get_ipk())
