class Dosen:
    def __init__(self, nama, nidn):  # ← sudah benar
        self.nama = nama
        self.nidn = nidn

    def ajar_mata_kuliah(self, mata_kuliah):
        return f"Saya {self.nama} (NIDN: {self.nidn}) mengajar mata kuliah {mata_kuliah}"


# Membuat object dosen
dsn1 = Dosen("Rianindya Chandra Hardika, S.T., M.Eng", "6861772673130322")
dsn2 = Dosen("Ir. Abadi Nugroho, S.Kom., M.Kom", "1104129002")

# Memanggil method
print(dsn1.ajar_mata_kuliah("Pemikiran Desain"))
print(dsn2.ajar_mata_kuliah("Basis Data"))
