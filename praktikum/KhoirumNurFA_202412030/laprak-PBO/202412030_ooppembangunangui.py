import tkinter as tk
from tkinter import messagebox


# b. Menggunakan class untuk mengorganisir komponen GUI
class KonversiSuhu:
    def __init__(self, root):
        self.root = root
        self.root.title("Konversi Suhu")
        self.root.geometry("300x200")

        # Label judul
        self.label = tk.Label(
            root,
            text="Konversi Celsius ke Fahrenheit",
            font=("Arial", 12)
        )
        self.label.pack(pady=10)

        # Entry input Celsius
        self.entry_celsius = tk.Entry(root, width=20)
        self.entry_celsius.pack(pady=5)

        # Button konversi
        self.button_konversi = tk.Button(
            root,
            text="Konversi",
            command=self.konversi_suhu
        )
        self.button_konversi.pack(pady=10)

        # Label hasil
        self.label_hasil = tk.Label(root, text="", font=("Arial", 11))
        self.label_hasil.pack(pady=5)

    # a & c. Fungsi konversi suhu + validasi input
    def konversi_suhu(self):
        nilai = self.entry_celsius.get()

        # c. Validasi input
        if nilai.strip() == "":
            messagebox.showwarning(
                "Peringatan",
                "Input tidak boleh kosong!"
            )
            return

        try:
            celsius = float(nilai)
            fahrenheit = (celsius * 9 / 5) + 32
            self.label_hasil.config(
                text=f"Hasil: {fahrenheit:.2f} °F"
            )
        except ValueError:
            messagebox.showerror(
                "Error",
                "Input harus berupa angka!"
            )


if __name__ == "__main__":
    root = tk.Tk()
    app = KonversiSuhu(root)
    root.mainloop()
