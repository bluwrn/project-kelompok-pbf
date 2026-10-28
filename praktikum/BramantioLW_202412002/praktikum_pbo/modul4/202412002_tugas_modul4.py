from abc import ABC, abstractmethod


# --------------------------
# 1. ABSTRACT CLASS
# --------------------------

class Pengguna(ABC):
    def __init__(self, nama):
        self.nama = nama

    @abstractmethod
    def akses(self):
        pass


# --------------------------
# 4. CUSTOM EXCEPTION
# --------------------------

class PoinTidakValidError(Exception):
    pass


# --------------------------
# SUBCLASS: MEMBER
# --------------------------

class Member(Pengguna):
    def __init__(self, nama, poin):
        super().__init__(nama)

        if poin < 0:
            raise PoinTidakValidError("Poin tidak boleh negatif!")

        self.poin = poin

    # Implementasi abstract method
    def akses(self):
        print(f"Member {self.nama} memiliki akses dasar ke layanan.")

    # Special methods:
    def __str__(self):
        return f"Member: {self.nama} – Poin: {self.poin}"

    def __add__(self, other):
        return self.poin + other.poin

    def __len__(self):
        return len(self.nama)


# --------------------------
# PROGRAM UTAMA
# --------------------------

def input_poin(prompt):
    """Meminta input poin dari user dengan validasi lengkap."""
    while True:
        try:
            val = input(prompt).strip()

            if val == "":
                raise ValueError("Input tidak boleh kosong!")

            angka = float(val)

            if angka < 0:
                raise PoinTidakValidError("Poin tidak boleh negatif!")

            return angka

        except ValueError as e:
            print("Kesalahan input:", e)

        except PoinTidakValidError as e:
            print("Custom Error:", e)


if __name__ == "__main__":
    print("=== Buat Member ===")

    p1 = input_poin("Masukkan poin Member 1: ")
    p2 = input_poin("Masukkan poin Member 2: ")

    # Buat objek
    m1 = Member("Alex", p1)
    m2 = Member("Brian", p2)

    # Tampilkan info
    print("\n--- Info Member ---")
    print(m1)
    print(m2)

    # Akses
    print("\nHak akses:")
    m1.akses()
    m2.akses()

    # Operasi OOP sesuai ketentuan
    print("\n--- Operasi OOP ---")
    print("Jumlah poin:", m1 + m2)
    print("Panjang nama m1:", len(m1))

    print("\nUji selesai.")
