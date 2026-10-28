import {
  SiHtml5, SiCss, SiJavascript, SiReact, SiPhp, SiLaravel, SiPython, SiMysql,
  SiGithub, SiGit, SiFigma, SiVite, SiVercel, SiPostman, SiLinux, SiTypescript,
  SiNextdotjs, SiTailwindcss, SiQt, SiNodedotjs, SiFlutter, SiDocker, SiSupabase,
  SiFirebase, SiBootstrap, SiScikitlearn, SiMikrotik,
} from 'react-icons/si';
import { VscVscode } from 'react-icons/vsc';
import { FaBrain, FaCode, FaDatabase, FaMicrochip, FaNetworkWired, FaSpa, FaScrewdriverWrench, FaSeedling } from 'react-icons/fa6';

// Kunci ikon yang bisa dipakai di skillsData.js
// Mau tambah? import ikonnya dari react-icons lalu daftarkan di sini.
export const iconMap = {
  html: SiHtml5,
  css: SiCss,
  js: SiJavascript,
  ts: SiTypescript,
  react: SiReact,
  next: SiNextdotjs,
  node: SiNodedotjs,
  php: SiPhp,
  laravel: SiLaravel,
  python: SiPython,
  mysql: SiMysql,
  db: FaDatabase,
  github: SiGithub,
  git: SiGit,
  vscode: VscVscode,
  figma: SiFigma,
  vite: SiVite,
  vercel: SiVercel,
  postman: SiPostman,
  linux: SiLinux,
  tailwind: SiTailwindcss,
  bootstrap: SiBootstrap,
  qt: SiQt,
  flutter: SiFlutter,
  docker: SiDocker,
  supabase: SiSupabase,
  firebase: SiFirebase,
  sklearn: SiScikitlearn,
  ml: FaBrain,
  iot: FaMicrochip,
  cisco: FaNetworkWired, // Cisco Packet Tracer (logo Cisco terlalu kecil di badge)
  mikrotik: SiMikrotik, // Winbox (MikroTik)
  // ikon judul grup skill
  bloom: FaSpa,
  tools: FaScrewdriverWrench,
  sprout: FaSeedling,
};

export const getIcon = (key) => iconMap[key] ?? FaCode;
