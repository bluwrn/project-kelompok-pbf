# Template awal untuk Tugas 3
# --------------------------------

# Class Perusahaan sebagai induk, memiliki daftar proyek dan tim
class Perusahaan:
    def __init__(self, nama):
        self.nama = nama
        self.proyek_list = []   # daftar proyek di perusahaan
        self.tim_list = []      # daftar tim di perusahaan

    def buat_proyek(self, nama_proyek, deskripsi):
        # Membuat objek proyek baru lalu menambahkannya ke daftar proyek
        proyek = Proyek(nama_proyek, deskripsi)
        self.proyek_list.append(proyek)
        print(f"Proyek '{nama_proyek}' berhasil dibuat.")
        return proyek

    def buat_tim(self, nama_tim):
        # Membuat objek tim baru lalu menambahkannya ke daftar tim
        tim = Tim(nama_tim)
        self.tim_list.append(tim)
        print(f"Tim '{nama_tim}' berhasil dibuat.")
        return tim


# Class Proyek
class Proyek:
    def __init__(self, nama, deskripsi):
        self.nama = nama
        self.deskripsi = deskripsi
        self.tugas_list = []  # setiap proyek punya daftar tugas

    def tambah_tugas(self, deskripsi_tugas):
        # Membuat tugas baru dan menambahkannya ke proyek
        tugas = Tugas(deskripsi_tugas)
        self.tugas_list.append(tugas)
        print(f"Tugas '{deskripsi_tugas}' ditambahkan ke proyek '{self.nama}'.")
        return tugas

    def __str__(self):
        return f"Proyek: {self.nama}, Deskripsi: {self.deskripsi}, Jumlah Tugas: {len(self.tugas_list)}"


# Class Tim
class Tim:
    def __init__(self, nama):
        self.nama = nama
        self.developer_list = []  # daftar developer dalam tim

    def tambah_developer(self, developer):
        # Menambahkan developer ke tim
        self.developer_list.append(developer)
        print(f"Developer '{developer.nama}' ditambahkan ke tim '{self.nama}'.")

    def __str__(self):
        return f"Tim: {self.nama}, Developer: {[d.nama for d in self.developer_list]}"


# Class Developer
class Developer:
    def __init__(self, nama, keahlian):
        self.nama = nama
        self.keahlian = keahlian

    def __str__(self):
        return f"Developer: {self.nama}, Keahlian: {self.keahlian}"


# Class Tugas
class Tugas:
    def __init__(self, deskripsi):
        self.deskripsi = deskripsi
        self.developer = None  # default: belum ditugaskan ke developer

    def tugaskan_ke(self, developer):
        # Menugaskan tugas ke developer tertentu
        self.developer = developer
        print(f"Tugas '{self.deskripsi}' ditugaskan ke {developer.nama}.")

    def __str__(self):
        if self.developer:
            return f"Tugas: {self.deskripsi}, Developer: {self.developer.nama}"
        else:
            return f"Tugas: {self.deskripsi}, Belum ditugaskan"


# ------------------------
# Program Utama (Testing)
# ------------------------
if __name__ == "__main__":
    # 1. Membuat perusahaan
    perusahaan = Perusahaan("Tech Nusantara")

    # 2. Membuat tim dan menambah developer
    tim1 = perusahaan.buat_tim("Tim Backend")
    dev1 = Developer("Adit", "Python & Database")
    dev2 = Developer("Budi", "Java & API")
    tim1.tambah_developer(dev1)
    tim1.tambah_developer(dev2)

    # 3. Membuat proyek dan menambah tugas
    proyek1 = perusahaan.buat_proyek("Sistem Perpustakaan", "Aplikasi manajemen buku")
    tugas1 = proyek1.tambah_tugas("Membuat struktur database")
    tugas2 = proyek1.tambah_tugas("Implementasi API backend")

    # 4. Menugaskan tugas ke developer
    tugas1.tugaskan_ke(dev1)
    tugas2.tugaskan_ke(dev2)

    # 5. Menampilkan status proyek dan tugas
    print("\n=== STATUS PROYEK ===")
    print(proyek1)
    for tugas in proyek1.tugas_list:
        print(tugas)

    print("\n=== STATUS TIM ===")
    print(tim1)
