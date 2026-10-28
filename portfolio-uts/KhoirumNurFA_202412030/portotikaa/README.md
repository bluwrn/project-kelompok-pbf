# 🌸 Lily Portfolio

Portfolio React + Vite bertema bunga lily pink. Struktur section terinspirasi ThePorto,
tapi desainnya dibuat ulang (tanpa gaya terminal).

## Jalankan

```bash
npm install
npm run dev      # buka http://localhost:5173
npm run build    # hasil di folder dist/
```

## File yang perlu kamu edit

| File | Isinya |
| --- | --- |
| `src/data/profileData.js` | Nama, role, tagline, username GitHub, email, LinkedIn, teks About, quick facts |
| `src/data/skillsData.js` | 3 grup skill (tanpa persen): **using**, **tools**, **learning** |
| `src/data/projectsData.js` | Daftar proyek dari GitHub-mu |
| `src/components/icons.js` | Daftar kunci ikon untuk skill (tambah ikon baru di sini) |

### Menambah proyek

Tambahkan objek baru di `projectsData.js`:

```js
{
  title: 'Nama Proyek',
  description: 'Deskripsi singkat.',
  tech: ['React', 'CSS'],
  github: 'https://github.com/tikaorenjuse/nama-repo',
  demo: '',                       // opsional
  image: '/projects/nama.webp',   // opsional, taruh file di public/projects/
  points: ['Poin detail 1'],      // opsional, tampil di modal
  featured: true,                 // opsional, true = kartu besar
}
```

Tanpa `image`, kartu otomatis memakai gambar lily.

## Tema

Warna diatur lewat CSS variables di `src/index.css` — mode **terang** (blush & krem)
dan **gelap** (malam plum). Tombol matahari/bulan di navbar untuk berganti tema.

## Gambar bunga

Bunga lily ada dalam 3 ukuran: `public/lily-160.webp`, `lily-320.webp`, `lily-480.webp`
(browser memilih otomatis lewat `srcset`). Mau ganti bunga? Timpa ketiganya dengan PNG/WebP
transparan versi baru. Favicon: `favicon.png`, `favicon-32.png`, `apple-touch-icon.png`.

## Catatan performa

- Jangan pakai `backdrop-filter: blur` di kartu — latar di belakangnya bergerak, jadi blur dihitung ulang tiap frame.
- Animasi cukup pakai `transform`/`opacity`; hindari animasi pada elemen yang punya `filter`.
- Kelopak jatuh otomatis berhenti saat tab tidak aktif, dan mati total kalau pengguna memilih *reduce motion* di OS.
