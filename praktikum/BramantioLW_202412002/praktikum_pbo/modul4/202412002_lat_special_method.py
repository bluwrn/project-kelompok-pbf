class Mahasiswa:
    def __init__(self, nama, nilai):
        self.nama = nama
        self.nilai = nilai

    def __str__(self):
        return f"Mahasiswa(nama='{self.nama}', nilai={self.nilai})"

    def __len__(self):
        return len(self.nama)

    def __eq__(self, other):
        if not isinstance(other, Mahasiswa):
            return False
        return self.nilai == other.nilai

    def __add__(self, other):
        if isinstance(other, Mahasiswa):
            return self.nilai + other.nilai
        raise TypeError("Penjumlahan hanya bisa dengan Mahasiswa lain")

    def __mul__(self, scalar):
        if isinstance(scalar, (int, float)):
            return self.nilai * scalar
        raise TypeError("Perkalian hanya bisa dengan angka")

# Contoh penggunaan
m1 = Mahasiswa("Andi", 85)
m2 = Mahasiswa("Budi", 90)

print(m1)                     # Representasi string
print(m2)

print(len(m1))                # Panjang nama mahasiswa
print(m1 == m2)               # Perbandingan nilai

print(m1 + m2)                # Penjumlahan nilai mahasiswa
print(m1 * 2)                 # Perkalian nilai dengan angka

daftar = [m1, m2]
sorted_list = sorted(daftar, key=lambda x: x.nilai)
print([str(m) for m in sorted_list])