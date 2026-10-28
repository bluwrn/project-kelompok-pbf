# =========================
# Class Hewan dan Turunannya
# =========================

class Hewan:
    def bersuara(self):
        return "Hewan bersuara"


class Kucing(Hewan):
    def bersuara(self):
        return "Meow!"


class Anjing(Hewan):
    def bersuara(self):
        return "Woof!"


# Polymorphism bersuara
hewan_list = [Hewan(), Kucing(), Anjing()]

for h in hewan_list:
    print(h.bersuara())


# =========================
# Class Bentuk dan Turunannya
# =========================

class Bentuk:
    def luas(self):
        return 0


class Persegi(Bentuk):
    def __init__(self, sisi):
        self.sisi = sisi

    def luas(self):
        return self.sisi * self.sisi


class Lingkaran(Bentuk):
    def __init__(self, radius):
        self.radius = radius

    def luas(self):
        return 3.14 * self.radius * self.radius


# Demonstrasi pemanggilan method luas()
b = Bentuk()
p = Persegi(5)
l = Lingkaran(7)

print("Luas Bentuk:", b.luas())
print("Luas Persegi:", p.luas())
print("Luas Lingkaran:", l.luas())
