# ==========================
# Program: Sistem Pemesanan Produk Sederhana
# ==========================

class Produk:
    def __init__(self, nama, harga, stok):
        self.nama = nama
        self.harga = harga
        self.stok = stok

    def __str__(self):
        return f"{self.nama} - Rp{self.harga} (Stok: {self.stok})"


class ItemPesanan:
    def __init__(self, produk, jumlah):
        self.produk = produk
        self.jumlah = jumlah

    def total_harga(self):
        return self.produk.harga * self.jumlah

    def __str__(self):
        return f"{self.produk.nama} x {self.jumlah} = Rp{self.total_harga()}"


class Keranjang:
    def __init__(self):
        self.items = []

    def tambah_produk(self, produk, jumlah):
        if produk.stok >= jumlah:
            self.items.append(ItemPesanan(produk, jumlah))
            produk.stok -= jumlah
            print(f"Produk '{produk.nama}' sebanyak {jumlah} berhasil ditambahkan ke keranjang.")
        else:
            print(f"Stok '{produk.nama}' tidak mencukupi!")

    def tampilkan_keranjang(self):
        if not self.items:
            print("Keranjang kosong.")
        else:
            print("\nIsi Keranjang:")
            for item in self.items:
                print(f" - {item}")

    def total_harga(self):
        return sum(item.total_harga() for item in self.items)


class Pesanan:
    def __init__(self, pelanggan):
        self.pelanggan = pelanggan
        self.items = pelanggan.keranjang.items.copy()
        self.total = pelanggan.keranjang.total_harga()

    def tampilkan_pesanan(self):
        print(f"\n=== Detail Pesanan {self.pelanggan.nama} ===")
        for item in self.items:
            print(f"- {item}")
        print(f"Total harga: Rp{self.total}")


class Pelanggan:
    def __init__(self, nama, email):
        self.nama = nama
        self.email = email
        self.keranjang = Keranjang()
        self.riwayat_pesanan = []

    def buat_pesanan(self):
        if not self.keranjang.items:
            print("Keranjang kosong, tidak bisa membuat pesanan.")
            return None
        pesanan = Pesanan(self)
        self.riwayat_pesanan.append(pesanan)
        self.keranjang = Keranjang()  # kosongkan keranjang setelah buat pesanan
        print(f"Pesanan untuk {self.nama} berhasil dibuat.")
        return pesanan


# ==========================
# Bagian Testing / Main Program
# ==========================
if __name__ == "__main__":
    # 1. Membuat beberapa produk
    produk1 = Produk("Laptop", 8000000, 5)
    produk2 = Produk("Mouse", 150000, 10)
    produk3 = Produk("Keyboard", 300000, 7)

    # 2. Membuat pelanggan
    pelanggan1 = Pelanggan("Adit", "adit@example.com")

    # 3. Menambah produk ke keranjang pelanggan
    pelanggan1.keranjang.tambah_produk(produk1, 1)
    pelanggan1.keranjang.tambah_produk(produk2, 2)
    pelanggan1.keranjang.tambah_produk(produk3, 1)

    pelanggan1.keranjang.tampilkan_keranjang()

    # 4. Membuat pesanan dari keranjang
    pesanan1 = pelanggan1.buat_pesanan()

    # 5. Menampilkan detail pesanan dan total harga
    if pesanan1:
        pesanan1.tampilkan_pesanan()
