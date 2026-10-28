// ============================================================
//  DATA DIRI — ganti sesuai punyamu
// ============================================================
export const profile = {
  name: 'Khoirum',
  brand: 'portoTIKA', // teks logo di navbar (kiri atas)
  fullName: 'Khoirum N.A',
  role: 'Informatics Student & Web Developer ',
  tagline:
    'Aku membangun aplikasi web yang rapi dan berguna — dari desain di Figma sampai kode yang benar-benar jalan.',
  githubUsername: 'tikaorenjuse',

  // Teks kecil di hero
  status: 'Open for collaboration',
  chips: ['Web Developer', 'UI / UX'],
  badgeText: 'build · break · debug · bloom · ',
  // Email — tampil di hero, Connect & footer. GANTI dengan emailmu, atau '' untuk menyembunyikan.
  // Diklik → langsung membuka jendela tulis email di Gmail (bukan mailto).
  email: 'tikaorenjuse@gmail.com',
  emailSubject: 'Halo! Aku lihat portofoliomu', // subjek awal email (boleh '')

  // Tombol di hero — GANTI 'username' dengan akunmu.
  // Kosongkan ('') kalau tombolnya tidak mau ditampilkan.
  linkedin: 'https://www.linkedin.com/in/tika-orenjuse-54725331a/',
  instagram: 'https://www.instagram.com/calpicorasamelon/',

  // Foto di bagian About (pixel art 64×80 px, diperbesar tajam lewat CSS)
  photo: '/about-me.png',
  photoCaption: 'little me',

  about: [
    'Halo! Aku Khoirum Nurfatikha A di panggil TIKA dengan Nim 202412030, mahasiswa informatika yang suka memahami bagaimana sebuah sistem bekerja di balik layar.',
    'Fokusku ada di pengembangan web — merancang tampilan, membangun fitur, lalu terus memperbaikinya sampai terasa enak dipakai.',
      ],

  // Kartu ringkas di bagian About
  facts: [
    { key: 'Pendidikan', value: 'Mahasiswa Informatika' },
    { key: 'Fokus', value: 'Web Development, UI/UX' },
    { key: 'Minat', value: 'UI/UX' },
    { key: 'Status', value: 'Terbuka untuk kolaborasi' },
  ],
};

// Link "tulis email" Gmail: buka tab baru langsung ke form compose
export const gmailLink = (to = profile.email, subject = profile.emailSubject) => {
  const params = new URLSearchParams({ view: 'cm', fs: '1', to });
  if (subject) params.set('su', subject);
  return `https://mail.google.com/mail/?${params.toString()}`;
};
