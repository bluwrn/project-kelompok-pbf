class Hewan:
    def bersuara(self):
        return "Hewan bersuara"


class Kucing(Hewan):
    def bersuara(self):
        return "Meow!"


class Anjing(Hewan):
    def bersuara(self):
        return "Woof!"


# Class Bentuk
class Bentuk:
    def luas(self):
        return 0


# Class Persegi
class Persegi(Bentuk):
    def __init__(self, sisi):
        self.sisi = sisi

    def luas(self):
        return self.sisi * self.sisi


# Class Lingkaran
class Lingkaran(Bentuk):
    def __init__(self, r):
        self.r = r

    def luas(self):
        return 3.14 * self.r * self.r


# Polymorphism Hewan (kode asli)
hewan_list = [Hewan(), Kucing(), Anjing()]

for h in hewan_list:
    print(h.bersuara())


# ==============================
# Demonstrasi pemanggilan luas()
# ==============================

p = Persegi(4)        # Persegi dengan sisi 4
l = Lingkaran(7)      # Lingkaran dengan radius 7

print("Luas Persegi :", p.luas())
print("Luas Lingkaran :", l.luas())
