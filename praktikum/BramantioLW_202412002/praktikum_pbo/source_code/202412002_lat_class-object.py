class Dosen:
  def __init__(self, nama, nidn):
    self.nama = nama
    self.nidn = nidn

  def ajar_mata_kuliah(self, mata_kuliah):
    return f"Dosen {self.nama} (NIDN {self.nidn}) mengajar mata kuliah {mata_kuliah}" 

# Pembuatan object
dosen1 = Dosen("Ir. Abadi Nugroho, S.Kom., M.Kom.", "D001")
dosen2 = Dosen("Lapu Tombilayuk, S.Kom., MT.", "D002")

# Pemanggilan method
print(dosen1.ajar_mata_kuliah("Pemrogrmanan Berorientasi Objek"))
print(dosen2.ajar_mata_kuliah("Sistem Operasi"))
