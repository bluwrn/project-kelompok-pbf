// ============================================================
//  SKILLS — tanpa persen. Cukup daftar apa yang kamu pakai.
//
//  `icon` = kunci ikon (lihat daftar lengkap di src/components/icons.js).
//  Kalau kuncinya tidak ada, otomatis pakai ikon </> bawaan.
// ============================================================
export const skillsData = {
  // Teknologi yang sudah dipakai di proyek nyata
  using: [
    { name: 'HTML5', icon: 'html' },
    { name: 'CSS3', icon: 'css' },
    { name: 'JavaScript', icon: 'js' },
    { name: 'React', icon: 'react' },
    { name: 'PHP', icon: 'php' },
    { name: 'Laravel', icon: 'laravel' },
    { name: 'Python', icon: 'python' },
    { name: 'MySQL', icon: 'mysql' },
  ],

  // Alat yang dipakai sehari-hari untuk membangun & deploy
  tools: [
    { name: 'Git & GitHub', icon: 'github' },
    { name: 'VS Code', icon: 'vscode' },
    { name: 'Figma', icon: 'figma' },
  ],

  // Yang sedang dipelajari (belum dipakai di proyek jadi)
  learning: [
    { name: 'Cisco Packet Tracer', icon: 'cisco' },
    { name: 'Winbox', icon: 'mikrotik' },
  ],
};

// Judul & keterangan tiap kolom (boleh diganti)
export const skillGroups = [
  { key: 'using', title: 'What I use', icon: 'bloom', note: 'Dipakai di proyek yang sudah jadi' },
  { key: 'tools', title: 'Dev tools', icon: 'tools', note: 'Alat kerja sehari-hari' },
  { key: 'learning', title: 'Currently learning', icon: 'sprout', note: 'Sedang tumbuh, belum mekar' },
];
