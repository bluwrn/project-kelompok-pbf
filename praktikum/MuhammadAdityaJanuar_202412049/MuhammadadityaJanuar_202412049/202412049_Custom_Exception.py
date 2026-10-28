class UmurTidakValidError(Exception):
    """Kesalahan untuk umur negatif."""
    pass

class UmurTerlaluMudaError(Exception):
    """Kesalahan untuk umur di bawah 5 tahun."""
    pass

class UmurTerlaluTuaError(Exception):
    """Kesalahan untuk umur di atas 100 tahun."""
    pass

class AkunTidakDiizinkanError(Exception):
    """Kesalahan jika umur belum cukup untuk membuat akun."""
    pass


def set_umur(umur):
    if umur < 0:
        raise UmurTidakValidError("Umur tidak boleh negatif!")
    if umur < 5:
        raise UmurTerlaluMudaError("Umur terlalu muda! Minimal 5 tahun.")
    if umur > 100:
        raise UmurTerlaluTuaError("Umur terlalu tua! Maksimal 100 tahun.")
    return umur


def daftar_akun(umur):
    """Hanya menerima umur 18 ke atas"""
    if umur < 18:
        raise AkunTidakDiizinkanError("Akun tidak diizinkan: minimal umur 18 tahun.")
    return "Akun berhasil dibuat."


if __name__ == "__main__":
    
    # Loop hingga input umur valid
    while True:
        try:
            u = int(input("Masukkan umur: "))
            umur_valid = set_umur(u)

            # Coba daftar akun
            hasil = daftar_akun(umur_valid)

        except ValueError:
            print("Input harus berupa bilangan bulat!\n")

        except (UmurTidakValidError, UmurTerlaluMudaError, UmurTerlaluTuaError) as e:
            print(e, "\n")

        except AkunTidakDiizinkanError as e:
            print(e, "\n")

        else:
            print("Umur valid:", umur_valid)
            print(hasil)
            break  # berhenti jika semua valid
