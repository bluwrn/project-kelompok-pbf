class UmurTidakValidError(Exception):
    """Kesalahan untuk umur yang tidak masuk akal."""
    pass

class UmurTerlaluMudaError(Exception):
    """Kesalahan jika umur terlalu muda."""
    pass

class UmurTerlaluTuaError(Exception):
    """Kesalahan jika umur terlalu tua."""
    pass

class AkunTidakDiizinkanError(Exception):
    """Kesalahan jika umur tidak memenuhi syarat untuk membuat akun."""
    pass


def set_umur(umur):
    if umur < 0:
        raise UmurTidakValidError("Umur tidak boleh negatif!")
    if umur < 5:
        raise UmurTerlaluMudaError("Umur terlalu muda, minimal 5 tahun.")
    if umur > 100:
        raise UmurTerlaluTuaError("Umur terlalu tua, maksimal 100 tahun.")
    return umur


def daftar_akun(umur):
    """Hanya menerima umur 18 ke atas."""
    if umur < 18:
        raise AkunTidakDiizinkanError("Akun tidak diizinkan. Minimal umur 18 tahun.")
    return "Akun berhasil dibuat."


# Contoh pemanggilan
if __name__ == "__main__":
    try:
        u = int(input("Masukkan umur: "))
        umur = set_umur(u)
        print(daftar_akun(umur))

    except (UmurTidakValidError, UmurTerlaluMudaError, UmurTerlaluTuaError, ValueError) as e:
        print(e)

    except AkunTidakDiizinkanError as e:
        print(e)
