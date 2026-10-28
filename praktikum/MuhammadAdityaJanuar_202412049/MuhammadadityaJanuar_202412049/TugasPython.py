# kasir_cli.py

menu = {
    "1": {"nama": "Nasi Goreng", "harga": 15000},
    "2": {"nama": "Mie Ayam", "harga": 12000},
    "3": {"nama": "Es Teh", "harga": 5000},
    "4": {"nama": "Kopi", "harga": 8000},
}

print("=== APLIKASI KASIR SEDERHANA ===")
print("Menu:")
for key, item in menu.items():
    print(f"{key}. {item['nama']} - Rp{item['harga']}")

pesanan = []
while True:
    pilih = input("Pilih menu (ketik nomor, atau 'q' untuk selesai): ")
    if pilih.lower() == "q":
        break
    if pilih in menu:
        qty = int(input("Jumlah: "))
        pesanan.append({"nama": menu[pilih]["nama"], "harga": menu[pilih]["harga"], "qty": qty})
    else:
        print("Menu tidak tersedia!")

# Hitung total
print("\n=== STRUK BELANJA ===")
total = 0
for item in pesanan:
    subtotal = item["harga"] * item["qty"]
    total += subtotal
    print(f"{item['nama']} x{item['qty']} = Rp{subtotal}")

print("-----------------------")
print("Total Bayar = Rp", total)
bayar = int(input("Bayar: Rp "))
kembali = bayar - total
print("Kembalian = Rp", kembali)
print("=== Terima Kasih ===")
