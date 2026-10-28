class Mahasiswa:
  universitas = "STITEK Bontang"

  def __init__(self, nama, nim, jurusan, ipk=0.0):
    self.nama = nama
    self.nim = nim
    self.jurusan = jurusan
    self.ipk = ipk

  def perkenalan_diri(self):
    return f"Hallo, nama saya {self.nama}, NIM {self.nim}, jurusan {self.jurusan} - {self.universitas}."
  
  def update_ipk(self, ipk_baru):
    if 0.0 <= ipk_baru <= 4.0:
      self.ipk = ipk_baru
      return f"IPK {self.nama} berhasil diperbarui menjadi {self.ipk}."
    else:
      return "Nilai IPK harus antara 0.0 hingga 4.0."
    
  def predikat_kelulusan(self):
    if self.ipk >= 3.5:
      return "Cum Laude"
    elif self.ipk >= 3.0:
      return "Sangat Memuaskan"
    elif self.ipk >= 2.5:
      return "Memuaskan"
    elif self.ipk >= 2.0:
      return "Lulus"
    else:
      return "Belum Lulus"
    
# Demonstrasi penggunaan
mhs1 = Mahasiswa("Bramantio", "202412002", "Teknik Informatika", 3.5)
mhs2 = Mahasiswa("Achmad Gibran", "20241200", "Teknik Informatika", 3.8)
mhs3 = Mahasiswa("Ahmad Taroqi", "202412023", "Teknik Informatika", 3.6)

print(mhs1.perkenalan_diri())
print(mhs1.predikat_kelulusan())
print(mhs1.update_ipk(3.8))
print(mhs1.predikat_kelulusan())
print()

print(mhs2.perkenalan_diri())
print(mhs2.predikat_kelulusan())
print(mhs2.update_ipk(3.2))
print(mhs2.predikat_kelulusan())
print()

print(mhs3.perkenalan_diri())
print(mhs3.predikat_kelulusan())
print(mhs3.update_ipk(2.2))
print(mhs3.predikat_kelulusan())   