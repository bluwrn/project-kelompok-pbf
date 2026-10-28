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


# Membuat objek mahasiswa
m1 = Mahasiswa("Rizal", 85)
m2 = Mahasiswa("Lutfi", 90)

# Representasi string
print(m1)
print(m2)

# Perbandingan kesetaraan nilai
print("Apakah nilai Rizal sama dengan Lutfi?", m1 == m2)

# Operasi matematika
print("Total nilai m1 + m2 =", m1 + m2)
print("Nilai m1 * 2 =", m1 * 2)

# Mengurutkan tanpa __lt__
list_mahasiswa = [m1, m2]
sorted_list = sorted(list_mahasiswa, key=lambda x: x.nilai)

print("\nHasil pengurutan berdasarkan nilai:")
for m in sorted_list:
    print(m)
