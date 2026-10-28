import tkinter as tk
from tkinter import ttk, messagebox, simpledialog

# ========================
# 1. Class Mahasiswa
# ========================
class Mahasiswa:
    def __init__(self, nim, nama, jurusan, ipk):
        self.nim = nim
        self.nama = nama
        self.jurusan = jurusan
        self.ipk = ipk

    def update_ipk(self, ipk_baru):
        self.ipk = ipk_baru

    def info(self):
        return f"{self.nim} - {self.nama} ({self.jurusan}) IPK: {self.ipk}"


# ========================
# 2. Aplikasi GUI
# ========================
class AplikasiManajemenMahasiswa:
    def __init__(self, root):
        self.root = root
        self.root.title("Manajemen Mahasiswa")
        self.root.geometry("800x500")

        # Dictionary mahasiswa
        self.data_mahasiswa = {}

        # ========================
        # Frame Input
        # ========================
        frame_input = tk.LabelFrame(root, text="Input Data Mahasiswa", padx=10, pady=10)
        frame_input.pack(fill=tk.X, padx=10, pady=5)

        self.entry_nim = self._buat_input(frame_input, "NIM", 0)
        self.entry_nama = self._buat_input(frame_input, "Nama", 1)
        self.entry_jurusan = self._buat_input(frame_input, "Jurusan", 2)
        self.entry_ipk = self._buat_input(frame_input, "IPK", 3)

        # ========================
        # Frame Tombol
        # ========================
        frame_tombol = tk.Frame(root)
        frame_tombol.pack(pady=5)

        tk.Button(frame_tombol, text="Tambah", command=self.tambah).pack(side=tk.LEFT, padx=5)
        tk.Button(frame_tombol, text="Update IPK", command=self.update_ipk).pack(side=tk.LEFT, padx=5)
        tk.Button(frame_tombol, text="Hapus", command=self.hapus).pack(side=tk.LEFT, padx=5)
        tk.Button(frame_tombol, text="Cari", command=self.cari).pack(side=tk.LEFT, padx=5)
        tk.Button(frame_tombol, text="Export", command=self.export_data).pack(side=tk.LEFT, padx=5)

        # ========================
        # Filter Jurusan
        # ========================
        frame_filter = tk.Frame(root)
        frame_filter.pack(pady=5)

        tk.Label(frame_filter, text="Filter Jurusan:").pack(side=tk.LEFT)
        self.entry_filter = tk.Entry(frame_filter, width=20)
        self.entry_filter.pack(side=tk.LEFT, padx=5)
        tk.Button(frame_filter, text="Terapkan", command=self.filter_jurusan).pack(side=tk.LEFT)

        # ========================
        # Treeview
        # ========================
        self.tree = ttk.Treeview(
            root,
            columns=("NIM", "Nama", "Jurusan", "IPK"),
            show="headings"
        )
        for col in ("NIM", "Nama", "Jurusan", "IPK"):
            self.tree.heading(col, text=col)
            self.tree.column(col, anchor=tk.CENTER)

        self.tree.pack(fill=tk.BOTH, expand=True, padx=10, pady=10)

        # ========================
        # Frame Statistik
        # ========================
        frame_stat = tk.Frame(root)
        frame_stat.pack(pady=5)

        tk.Button(frame_stat, text="Rata-rata IPK", command=self.rata_ipk).pack(side=tk.LEFT, padx=5)
        tk.Button(frame_stat, text="IPK Tertinggi", command=self.ipk_tertinggi).pack(side=tk.LEFT, padx=5)

    # ========================
    # Helper Input
    # ========================
    def _buat_input(self, parent, label, row):
        tk.Label(parent, text=label).grid(row=row, column=0, sticky=tk.W)
        entry = tk.Entry(parent, width=30)
        entry.grid(row=row, column=1, padx=5, pady=2)
        return entry

    # ========================
    # CRUD Operations
    # ========================
    def tambah(self):
        try:
            nim = self.entry_nim.get()
            nama = self.entry_nama.get()
            jurusan = self.entry_jurusan.get()
            ipk = float(self.entry_ipk.get())

            if not nim or not nama or not jurusan:
                raise ValueError

            if nim in self.data_mahasiswa:
                messagebox.showwarning("Error", "NIM sudah terdaftar!")
                return

            mhs = Mahasiswa(nim, nama, jurusan, ipk)
            self.data_mahasiswa[nim] = mhs
            self.refresh_tree()

        except ValueError:
            messagebox.showerror("Error", "Input tidak valid!")

    def update_ipk(self):
        selected = self.tree.selection()
        if not selected:
            return

        nim = self.tree.item(selected[0])["values"][0]
        ipk_baru = simpledialog.askfloat("Update IPK", "Masukkan IPK baru:")

        if ipk_baru is not None:
            self.data_mahasiswa[nim].update_ipk(ipk_baru)
            self.refresh_tree()

    def hapus(self):
        selected = self.tree.selection()
        if not selected:
            return

        nim = self.tree.item(selected[0])["values"][0]
        del self.data_mahasiswa[nim]
        self.refresh_tree()

    def cari(self):
        keyword = simpledialog.askstring("Cari", "Masukkan NIM atau Nama:")
        if not keyword:
            return

        hasil = [
            m for m in self.data_mahasiswa.values()
            if keyword.lower() in m.nim.lower()
            or keyword.lower() in m.nama.lower()
        ]

        self.tampilkan_hasil(hasil)

    # ========================
    # Filter & Statistik
    # ========================
    def filter_jurusan(self):
        jurusan = self.entry_filter.get().lower()
        hasil = [m for m in self.data_mahasiswa.values() if jurusan in m.jurusan.lower()]
        self.tampilkan_hasil(hasil)

    def rata_ipk(self):
        if not self.data_mahasiswa:
            return
        rata = sum(m.ipk for m in self.data_mahasiswa.values()) / len(self.data_mahasiswa)
        messagebox.showinfo("Rata-rata IPK", f"{rata:.2f}")

    def ipk_tertinggi(self):
        if not self.data_mahasiswa:
            return
        mhs = max(self.data_mahasiswa.values(), key=lambda m: m.ipk)
        messagebox.showinfo("IPK Tertinggi", mhs.info())

    # ========================
    # Export
    # ========================
    def export_data(self):
        with open("data_mahasiswa.txt", "w") as f:
            for m in self.data_mahasiswa.values():
                f.write(m.info() + "\n")
        messagebox.showinfo("Export", "Data berhasil diekspor")

    # ========================
    # Tree Helpers
    # ========================
    def refresh_tree(self):
        self.tree.delete(*self.tree.get_children())
        for m in self.data_mahasiswa.values():
            self.tree.insert("", tk.END, values=(m.nim, m.nama, m.jurusan, m.ipk))

    def tampilkan_hasil(self, data):
        self.tree.delete(*self.tree.get_children())
        for m in data:
            self.tree.insert("", tk.END, values=(m.nim, m.nama, m.jurusan, m.ipk))


if __name__ == "__main__":
    root = tk.Tk()
    app = AplikasiManajemenMahasiswa(root)
    root.mainloop()