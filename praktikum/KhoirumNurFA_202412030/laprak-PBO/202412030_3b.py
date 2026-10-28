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
        if semester_baru <= 0:
            raise ValueError("Semester harus lebih dari 0.")
        self._semester = semester_baru

    # Getter private
    def get_ipk(self):
        return self.__ipk

    # Setter private
    def set_ipk(self, ipk_baru):
        if ipk_baru < 0 or ipk_baru > 4:
            raise ValueError("IPK harus berada di antara 0 dan 4.")
        self.__ipk = ipk_baru


# ----------- Contoh Penggunaan -----------
if __name__ == "__main__":
    
    # Objek Mahasiswa 1
    m1 = Mahasiswa("23050123", "Ayu", 3, 3.75)

    # Objek Mahasiswa 2
    m2 = Mahasiswa("23050145", "Rizky", 5, 3.40)

    print("=== Data Mahasiswa 1 ===")
    print("NIM:", m1.nim)
    print("Nama:", m1.nama)
    print("Semester:", m1.get_semester())
    print("IPK:", m1.get_ipk())

    print("\n=== Data Mahasiswa 2 ===")
    print("NIM:", m2.nim)
    print("Nama:", m2.nama)
    print("Semester:", m2.get_semester())
    print("IPK:", m2.get_ipk())