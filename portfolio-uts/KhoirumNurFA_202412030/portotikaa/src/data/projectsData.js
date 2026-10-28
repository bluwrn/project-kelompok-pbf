// ============================================================
//  PROJECTS — diambil dari github.com/tikaorenjuse
//
//  Field tiap proyek:
//    title        (wajib)  nama yang tampil
//    description  (wajib)  1–2 kalimat untuk kartu
//    tech         (wajib)  array teknologi → jadi tag
//    github       (wajib)  link repo — dipakai juga untuk mencocokkan data live GitHub
//    demo         (opsional) link live demo
//    images       (opsional) array screenshot untuk galeri di modal, mis.
//                            ['/projects/app-1.webp', '/projects/app-2.webp']
//                            (taruh file di public/projects/, rasio 16:10 paling pas)
//                            kosong → modal otomatis pakai kartu preview dari GitHub
//    image        (opsional) gambar sampul KARTU — kosong → gambar lily
//    points       (opsional) poin detail di modal
//    featured     (opsional) true = kartu besar di atas
//
//  Repo GitHub yang TIDAK ada di sini akan otomatis muncul di
//  "Other projects" (diambil live dari GitHub API). Atur di bawah:
// ============================================================
export const GITHUB_USERNAME = 'tikaorenjuse';

// Repo yang tidak perlu ditampilkan (huruf kecil)
export const hiddenRepos = ['tikaorenjuse', 'kosong'];

export const projectsData = [
  {
    title: 'Interactive Lily Flower',
    description:
      'Bunga 3D interaktif yang tumbuh dan mekar mengikuti gerakan tangan di depan webcam — tersedia versi spider lily dan lily pink.',
    tech: ['Three.js', 'MediaPipe', 'JavaScript', 'HTML'],
    github: 'https://github.com/tikaorenjuse/spiderLily-flower',
    points: [
      'Hand tracking dengan MediaPipe: jarak jempol–telunjuk tangan kiri menumbuhkan tanaman, tangan kanan membuat bunga mekar.',
      'Render 3D dengan Three.js, kamera bisa diputar dengan mouse, dan ada mode otomatis.',
      'Parameter visual bisa diatur lewat objek PARAMS atau langsung dari console browser.',
    ],
    featured: true,
  },
  {
    title: 'Sistem Data Mahasiswa',
    description:
      'Web CRUD data mahasiswa bertema pastel yang tersinkron ke database cloud — tugas kelompok Pemrograman Web.',
    tech: ['JavaScript', 'Supabase', 'HTML', 'CSS', 'jsPDF'],
    github: 'https://github.com/bluwrn/web_form_mhs',
    images: ['/projects/web-form-mhs-1.webp', '/projects/web-form-mhs-2.webp'],
    points: [
      'CRUD tersimpan di Supabase (PostgreSQL), dengan pencarian nama/NIM, filter, sort, dan pagination.',
      'Tampilan tabel dan kartu yang responsif, export PDF di sisi klien, serta notifikasi toast.',
      'Proyek kelompok — repo milik bluwrn.',
    ],
    featured: true,
  },
  {
    title: 'Sistem Perpustakaan',
    description:
      'Aplikasi desktop manajemen perpustakaan dengan GUI Tkinter dan database MySQL — tugas Pemrograman Berorientasi Objek.',
    tech: ['Python', 'Tkinter', 'MySQL'],
    github: 'https://github.com/tikaorenjuse/tugas-PBO-perpustakaan',
    points: [
      'Login, dashboard statistik buku & anggota.',
      'CRUD buku dan anggota dengan validasi input (angka, email, nomor HP) dan pencegahan kode ganda.',
    ],
    featured: true,
  },
  {
    title: 'Website Cuci Sepatu',
    description: 'Website layanan cuci sepatu beserta dokumen konfigurasinya — tugas kelompok Rekayasa Perangkat Lunak.',
    tech: ['HTML', 'Tailwind CSS', 'JavaScript'],
    github: 'https://github.com/tikaorenjuse/toko-sepatu',
    images: ['/projects/cuci-sepatu-1.webp', '/projects/cuci-sepatu-2.webp'],
  },
  {
    title: 'Laprak Pemrograman Web',
    description:
      'Kumpulan praktikum web: HTML dasar, CSS, Flexbox, Grid, responsive design, sampai komponen Bootstrap 5.',
    tech: ['HTML', 'CSS', 'Bootstrap 5'],
    github: 'https://github.com/tikaorenjuse/Laprak-PemWeb',
  },
  {
    title: 'Tugas Kecerdasan Komputasional',
    description: 'Kumpulan tugas mata kuliah Kecerdasan Komputasional, termasuk program presensi.',
    tech: ['Python'],
    github: 'https://github.com/tikaorenjuse/perkumpulan-Tugas-tugas-Kc-kecerdasan-computasional-',
  },
  {
    title: 'Laprak PBO',
    description: 'Laporan praktikum Pemrograman Berorientasi Objek dengan Python.',
    tech: ['Python', 'OOP'],
    github: 'https://github.com/tikaorenjuse/laprak-PBO',
  },
  {
    title: 'PBO',
    description: 'Latihan-latihan Pemrograman Berorientasi Objek.',
    tech: ['Python', 'OOP'],
    github: 'https://github.com/tikaorenjuse/PBO',
  },
];
