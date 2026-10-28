from abc import ABC, abstractmethod

# ============================
# 1. ABSTRACTION
# ============================
class Pengguna(ABC):
    def __init__(self, nama):
        self.nama = nama

    @abstractmethod
    def akses(self):
        pass


class Member(Pengguna):
    def __init__(self, nama, poin):
        super().__init__(nama)
        self.poin = poin

    # Implementasi method abstract
    def akses(self):
        return f"{self.nama} memiliki akses sebagai MEMBER."

    # ============================
    # 2. SPECIAL METHODS
    # ============================
    def __str__(self):
        return f"Member: {self.nama} – Poin: {self.poin}"

    def __add__(self, other):
        return self.poin + other.poin

    def __len__(self):
        return len(self.nama)


# ============================
# 4. CUSTOM EXCEPTION
# ============================
class PoinTidakValidError(Exception):
    pass


# ============================
# 3. EXCEPTION HANDLING (Input User)
# ============================
def input_poin():
    while True:
        try:
            nilai = input("Masukkan poin member: ")

            if nilai.strip() == "":
                print("Error: input tidak boleh kosong!")
                continue

            if not nilai.isdigit() and not (nilai.startswith('-') and nilai[1:].isdigit()):
                raise ValueError("Input harus angka!")

            nilai = int(nilai)

            if nilai < 0:
                raise PoinTidakValidError("Poin tidak boleh negatif!")

            return nilai

        except ValueError as e:
            print(f"ValueError: {e}")
        except PoinTidakValidError as e:
            print(f"CustomError: {e}")


# ============================
# 5. PROGRAM UTAMA
# ============================
print("=== INPUT DATA MEMBER ===")
poin1 = input_poin()
poin2 = input_poin()

m1 = Member("Tika", poin1)
m2 = Member("Budi", poin2)

print("\n=== OUTPUT PROGRAM ===")
print(m1)                       # Info Member
print(m2)
print("Akses:", m1.akses())     # Akses Member
print("Jumlah Poin:", m1 + m2)  # __add__
print("Panjang Nama:", len(m1)) # __len__
