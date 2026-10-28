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


# Contoh penggunaan
if __name__ == "__main__":
    m = Mahasiswa("23050123", "Ayu", 3, 3.75)

    print("NIM:", m.nim)
    print("Nama:", m.nama)
    print("Semester:", m.get_semester())
    print("IPK:", m.get_ipk())

    m.set_semester(4)
    m.set_ipk(3.90)

    print("Semester (baru):", m.get_semester())
    print("IPK (baru):", m.get_ipk())
