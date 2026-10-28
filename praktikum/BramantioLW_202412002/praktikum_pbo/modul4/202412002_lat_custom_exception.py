class UmurTidakValidError(Exception):
    """Umum: umur tidak masuk akal."""
    pass

class UmurTerlaluMudaError(UmurTidakValidError):
    """Umur kurang dari 5 tahun."""
    pass

class UmurTerlaluTuaError(UmurTidakValidError):
    """Umur lebih dari 100 tahun."""
    pass

class AkunTidakDiizinkanError(Exception):
    """Umur tidak memenuhi syarat untuk membuat akun."""
    pass


def set_umur(umur):
    # Validasi urut: yang paling spesifik ditaruh dulu
    if umur < 0:
        raise UmurTidakValidError("Umur tidak boleh negatif.")

    if umur < 5:
        raise UmurTerlaluMudaError("Umur terlalu muda (<5).")

    if umur > 100:
        raise UmurTerlaluTuaError("Umur terlalu tua (>100).")

    return umur


def daftar_akun(umur):
    if umur < 18:
        raise AkunTidakDiizinkanError("Pengguna di bawah 18 tahun tidak boleh membuat akun.")
    return "Akun berhasil dibuat."


if __name__ == "__main__":
    while True:
        try:
            u = int(input("Masukkan umur: "))
            umur = set_umur(u)
            print("Umur valid:", umur)

            # cek pembuatan akun
            print(daftar_akun(umur))

        except ValueError:
            print("Input harus berupa bilangan bulat!")

        except UmurTerlaluMudaError as e:
            print(e)

        except UmurTerlaluTuaError as e:
            print(e)

        except UmurTidakValidError as e:
            print(e)

        except AkunTidakDiizinkanError as e:
            print("Tidak bisa daftar akun:", e)

        else:
            # kalau semua valid, break dari loop
            break
