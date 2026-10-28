import tkinter as tk
from tkinter import messagebox

# a. Aplikasi GUI dengan Label, Entry, dan Button
class AplikasiGUI:
    def __init__(self, root):
        self.root = root
        self.root.title("Aplikasi GUI Sederhana")
        self.root.geometry("300x220")

        # Label
        self.label = tk.Label(
            root,
            text="Selamat Datang di Aplikasi GUI",
            font=("Arial", 12)
        )
        self.label.pack(pady=10)

        # Entry
        self.entry = tk.Entry(root, width=30)
        self.entry.pack(pady=10)

        # Button untuk menampilkan isi Entry
        self.button_sapa = tk.Button(
            root,
            text="Tampilkan",
            command=self.tampilkan_isi
        )
        self.button_sapa.pack(pady=5)

        # c. Button untuk menghapus isi Entry
        self.button_hapus = tk.Button(
            root,
            text="Hapus",
            command=self.hapus_isi
        )
        self.button_hapus.pack(pady=5)

    # b. Fungsi menampilkan isi Entry ke messagebox
    def tampilkan_isi(self):
        isi = self.entry.get()
        if isi:
            messagebox.showinfo("Isi Entry", isi)
        else:
            messagebox.showwarning("Peringatan", "Entry masih kosong!")

    # c. Fungsi menghapus isi Entry
    def hapus_isi(self):
        self.entry.delete(0, tk.END)


if __name__ == "__main__":
    root = tk.Tk()
    app = AplikasiGUI(root)
    root.mainloop()