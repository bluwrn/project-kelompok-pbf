class Dosen:
    def __init__(self, nama, nidn):
        self.nama = nama
        self.nidn = nidn

    def ajar_mata_kuliah(self, mata_kuliah):
        print(f"Dosen {self.nama} (NIDN: {self.nidn}) sedang mengajar mata kuliah {mata_kuliah}.")