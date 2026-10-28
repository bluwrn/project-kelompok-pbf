import tkinter as tk
from tkinter import messagebox

# a & b. Aplikasi GUI konversi suhu (Celsius ke Fahrenheit) menggunakan class
class KonversiSuhu:
    def __init__(self, root):
        self.root = root
        self.root.title("Konversi Suhu")
        self.root.geometry("300x220")

        # Label
        self.label = tk.Label(
            root,
            text="Celsius ke Fahrenheit",
            font=("Arial", 14)
        )
        self.label.pack(pady=10)

        # Entry input Celsius
        self.entry_celsius = tk.Entry(root, width=25, justify="center")
        self.entry_celsius.pack(pady=10)
        self.entry_celsius.insert(0, "Masukkan suhu (°C)")

        # Button konversi
        self.button_konversi = tk.Button(
            root,
            text="Konversi",
            command=self.konversi_suhu
        )
        self.button_konversi.pack(pady=5)

        # Label hasil
        self.label_hasil = tk.Label(
            root,
            text="Hasil: -",
            font=("Arial", 12)
        )
        self.label_hasil.pack(pady=10)

    # c. Validasi input dan konversi suhu
    def konversi_suhu(self):
        nilai = self.entry_celsius.get()

        try:
            celsius = float(nilai)
            fahrenheit = (celsius * 9 / 5) + 32
            self.label_hasil.config(
                text=f"Hasil: {fahrenheit:.2f} °F"
            )
        except ValueError:
            messagebox.showerror(
                "Input tidak valid",
                "Masukkan angka yang benar!"
            )


if __name__ == "__main__":
    root = tk.Tk()
    app = KonversiSuhu(root)
    root.mainloop()