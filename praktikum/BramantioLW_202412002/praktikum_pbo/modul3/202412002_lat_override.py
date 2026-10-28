class Bentuk:
    def luas(self):
        # Parent berfungis untuk mnyediakan struktur, bukan hasil 
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

# Demonstrasi polymorphism
bentuk_list = [
    Bentuk(),
    Persegi(4),
    Lingkaran(7)
]

for b in bentuk_list:
    print(b.luas())
