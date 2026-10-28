class Mahasiswa:
    def __init__(self, nama, nilai):
        self.nama = nama
        self.nilai = nilai

    def __str__(self):
        return f"Nama: {self.nama}, Nilai: {self.nilai}"

    def __gt__(self, other):
        return self.nilai > other.nilai

    def __add__(self, other):
        return self.nilai + other.nilai

    def __mul__(self, faktor):
        return self.nilai * faktor

    def __len__(self):
        return len(self.nama)

    def __eq__(self, other):
        return self.nilai == other.nilai


# ============================
# Contoh penggunaan
# ============================

m1 = Mahasiswa("Ahmad", 90)
m2 = Mahasiswa("Budi", 90)
m3 = Mahasiswa("Citra", 75)

# Representasi string
print(m1)
print(m2)
print(m3)

# Perbandingan kesetaraan nilai
print("Apakah m1 == m2 ?", m1 == m2)
print("Apakah m1 == m3 ?", m1 == m3)

# Operasi matematika
print("m1 + m3 =", m1 + m3)
print("m1 * 2 =", m1 * 2)

# Mengurutkan tanpa __lt__, menggunakan key
daftar = [m1, m2, m3]
urutan = sorted(daftar, key=lambda x: x.nilai)

print("\nHasil pengurutan berdasarkan nilai:")
for m in urutan:
    print(m)
