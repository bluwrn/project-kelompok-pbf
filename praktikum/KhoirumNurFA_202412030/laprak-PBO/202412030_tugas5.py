import tkinter as tk
from tkinter import ttk, messagebox, filedialog

# =========================
# Class Mahasiswa
# =========================
class Mahasiswa:
    def __init__(self, nim, nama, jurusan, ipk):
        self.nim = nim
        self.nama = nama
        self.jurusan = jurusan
        self.ipk = ipk

    def info(self):
        return f"{self.nim} | {self.nama} | {self.jurusan} | IPK: {self.ipk}" 

    def update_ipk(self, ipk_baru):
        self.ipk = ipk_baru


# =========================
# Aplikasi GUI
# =========================
class AppMahasiswa:
    def __init__(self, root):
        self.root = root
        self.root.title("Sistem Manajemen Mahasiswa")
        self.root.geometry("900x500")

        # dictionary mahasiswa (key = NIM)
        self.data_mahasiswa = {}

        self.create_widgets()

    # =========================
    # GUI Components
    # =========================
    def create_widgets(self):
        # Frame Input
        frame_input = tk.LabelFrame(self.root, text="Input Data Mahasiswa", padx=10, pady=10)
        frame_input.pack(fill="x", padx=10, pady=5)

        tk.Label(frame_input, text="NIM").grid(row=0, column=0)
        tk.Label(frame_input, text="Nama").grid(row=0, column=2)
        tk.Label(frame_input, text="Jurusan").grid(row=1, column=0)
        tk.Label(frame_input, text="IPK").grid(row=1, column=2)

        self.entry_nim = tk.Entry(frame_input)
        self.entry_nama = tk.Entry(frame_input)
        self.entry_jurusan = tk.Entry(frame_input)
        self.entry_ipk = tk.Entry(frame_input)

        self.entry_nim.grid(row=0, column=1, padx=5)
        self.entry_nama.grid(row=0, column=3, padx=5)
        self.entry_jurusan.grid(row=1, column=1, padx=5)
        self.entry_ipk.grid(row=1, column=3, padx=5)

        # Frame Button CRUD
        frame_btn = tk.Frame(self.root)
        frame_btn.pack(fill="x", padx=10, pady=5)

        tk.Button(frame_btn, text="Tambah", command=self.tambah).pack(side="left", padx=5)
        tk.Button(frame_btn, text="Update IPK", command=self.update).pack(side="left", padx=5)
        tk.Button(frame_btn, text="Hapus", command=self.hapus).pack(side="left", padx=5)
        tk.Button(frame_btn, text="Tampilkan Semua", command=self.tampilkan_semua).pack(side="left", padx=5)

        # Frame Search & Filter
        frame_search = tk.LabelFrame(self.root, text="Cari & Filter", padx=10, pady=10)
        frame_search.pack(fill="x", padx=10, pady=5)

        tk.Label(frame_search, text="Cari (NIM / Nama)").grid(row=0, column=0)
        self.entry_cari = tk.Entry(frame_search)
        self.entry_cari.grid(row=0, column=1, padx=5)
        tk.Button(frame_search, text="Cari", command=self.cari).grid(row=0, column=2, padx=5)

        tk.Label(frame_search, text="Filter Jurusan").grid(row=0, column=3)
        self.entry_filter = tk.Entry(frame_search)
        self.entry_filter.grid(row=0, column=4, padx=5)
        tk.Button(frame_search, text="Filter", command=self.filter_jurusan).grid(row=0, column=5, padx=5)

        # Treeview
        columns = ("NIM", "Nama", "Jurusan", "IPK")
        self.tree = ttk.Treeview(self.root, columns=columns, show="headings")
        for col in columns:
            self.tree.heading(col, text=col)
            self.tree.column(col, width=150)
        self.tree.pack(fill="both", expand=True, padx=10, pady=5)

        # Frame Fitur Tambahan
        frame_extra = tk.Frame(self.root)
        frame_extra.pack(fill="x", padx=10, pady=5)

        tk.Button(frame_extra, text="Rata-rata IPK", command=self.rata_ipk).pack(side="left", padx=5)
        tk.Button(frame_extra, text="IPK Tertinggi", command=self.ipk_tertinggi).pack(side="left", padx=5)
        tk.Button(frame_extra, text="Export ke File", command=self.export_file).pack(side="left", padx=5)

    # =========================
    # Helper
    # =========================
    def clear_tree(self):
        for item in self.tree.get_children():
            self.tree.delete(item)

    def validasi_input(self):
        if not self.entry_nim.get() or not self.entry_nama.get() or not self.entry_jurusan.get() or not self.entry_ipk.get():
            messagebox.showwarning("Validasi", "Semua field harus diisi")
            return False
        try:
            ipk = float(self.entry_ipk.get())
            if ipk < 0 or ipk > 4:
                raise ValueError
        except ValueError:
            messagebox.showerror("Error", "IPK harus angka antara 0 - 4")
            return False
        return True

    # =========================
    # CRUD Functions
    # =========================
    def tambah(self):
        if not self.validasi_input():
            return
        nim = self.entry_nim.get()
        if nim in self.data_mahasiswa:
            messagebox.showerror("Error", "NIM sudah ada")
            return
        mhs = Mahasiswa(nim, self.entry_nama.get(), self.entry_jurusan.get(), float(self.entry_ipk.get()))
        self.data_mahasiswa[nim] = mhs
        self.tampilkan_semua()

    def update(self):
        nim = self.entry_nim.get()
        if nim not in self.data_mahasiswa:
            messagebox.showerror("Error", "Data tidak ditemukan")
            return
        try:
            ipk = float(self.entry_ipk.get())
        except ValueError:
            messagebox.showerror("Error", "IPK tidak valid")
            return
        self.data_mahasiswa[nim].update_ipk(ipk)
        self.tampilkan_semua()

    def hapus(self):
        nim = self.entry_nim.get()
        if nim in self.data_mahasiswa:
            del self.data_mahasiswa[nim]
            self.tampilkan_semua()
        else:
            messagebox.showerror("Error", "Data tidak ditemukan")

    def tampilkan_semua(self):
        self.clear_tree()
        for mhs in self.data_mahasiswa.values():
            self.tree.insert("", "end", values=(mhs.nim, mhs.nama, mhs.jurusan, mhs.ipk))

    def cari(self):
        keyword = self.entry_cari.get().lower()
        self.clear_tree()
        for mhs in self.data_mahasiswa.values():
            if keyword in mhs.nim.lower() or keyword in mhs.nama.lower():
                self.tree.insert("", "end", values=(mhs.nim, mhs.nama, mhs.jurusan, mhs.ipk))

    def filter_jurusan(self):
        jur = self.entry_filter.get().lower()
        self.clear_tree()
        for mhs in self.data_mahasiswa.values():
            if jur in mhs.jurusan.lower():
                self.tree.insert("", "end", values=(mhs.nim, mhs.nama, mhs.jurusan, mhs.ipk))

    # =========================
    # Fitur Tambahan
    # =========================
    def rata_ipk(self):
        if not self.data_mahasiswa:
            return
        rata = sum(m.ipk for m in self.data_mahasiswa.values()) / len(self.data_mahasiswa)
        messagebox.showinfo("Rata-rata IPK", f"Rata-rata IPK: {rata:.2f}")

    def ipk_tertinggi(self):
        if not self.data_mahasiswa:
            return
        mhs = max(self.data_mahasiswa.values(), key=lambda x: x.ipk)
        messagebox.showinfo("IPK Tertinggi", mhs.info())

    def export_file(self):
        file = filedialog.asksaveasfilename(defaultextension=".txt")
        if not file:
            return
        with open(file, "w") as f:
            for mhs in self.data_mahasiswa.values():
                f.write(mhs.info() + "\n")
        messagebox.showinfo("Export", "Data berhasil diexport")


# =========================
# Main Program
# =========================
if __name__ == "__main__":
    root = tk.Tk()
    app = AppMahasiswa(root)
    root.mainloop()