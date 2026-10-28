def operasi():
    print("=== Operasi Matematika Aman ===")
    print("Pilih operasi:")
    print("1. Pembagian")
    print("2. Perkalian")

    pilihan = input("Masukkan pilihan (1/2): ").strip()
    x = input("Masukkan angka pertama: ").strip()
    y = input("Masukkan angka kedua: ").strip()

    try:
        # Validasi input kosong
        if x == "" or y == "":
            raise ValueError("Input tidak boleh kosong! Anda menekan Enter tanpa mengisi angka.")

        a = float(x)
        b = float(y)

        # Validasi angka positif
        if a < 0 or b < 0:
            raise ValueError("Angka negatif tidak diperbolehkan! Masukkan hanya angka positif.")

        # Menjalankan operasi
        if pilihan == "1":
            hasil = a / b
        elif pilihan == "2":
            hasil = a * b
        else:
            raise ValueError("Pilihan tidak valid. Harus 1 atau 2.")

    except ValueError as ve:
        print("Input salah:", ve)

    except ZeroDivisionError:
        print("Penyebut tidak boleh nol pada operasi pembagian!")

    except Exception as e:
        print("Terjadi kesalahan:", e)

    else:
        # Hanya tampil jika tidak ada error
        print(f"Hasil operasi: {hasil}")

    finally:
        print("Selesai memproses input.")


if __name__ == "__main__":
    operasi()
