class Dosen:
    def __init__(self, nama, nidn):
        self.nama = nama
        self.nidn = nidn

    def ajar_mata_kuliah(self, mata_kuliah):
        return f"Dosen {self.nama} (NIDN: {self.nidn}) mengajar mata kuliah {mata_kuliah}"


# Instansiasi 2 object dosen
dosen1 = Dosen("Ir.abadi Nugroho, S.Kom.,M.Kom:", "1104129002")
dosen2 = Dosen("Lapu`Tombilayuk,S.Kom.,M.t:","1120107301")

# Memanggil method pada masing-masing object
print(dosen1.ajar_mata_kuliah("Pemrograman berorientasi objek"))
print(dosen2.ajar_mata_kuliah("Basis Data"))