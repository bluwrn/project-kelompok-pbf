class Burung:
    def terbang(self):
        return "Burung terbang tinggi"


class Pesawat:
    def terbang(self):
        return "Pesawat lepas landas"


def uji_terbang(obj):
    print(obj.terbang())


# Duck typing dalam aksi
b = Burung()
p = Pesawat()

uji_terbang(b)
uji_terbang(p)


# ===========================
# Tambahan: Laptop & Smartphone
# ===========================

class Laptop:
    def nyalakan(self):
        return "Laptop menyala"


class Smartphone:
    def nyalakan(self):
        return "Smartphone menyala"


# Fungsi untuk duck typing
def tes_nyala(obj):
    print(obj.nyalakan())


# ===========================
# Demonstrasi duck typing
# ===========================

l = Laptop()
s = Smartphone()

tes_nyala(l)   # Laptop menjalankan method nyalakan()
tes_nyala(s)   # Smartphone menjalankan method nyalakan()
