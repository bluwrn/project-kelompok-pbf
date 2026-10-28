import { useEffect, useState } from 'react';
import { FaBars, FaXmark, FaMoon, FaSun } from 'react-icons/fa6';
import { useTheme } from '../context/ThemeProvider';
import { profile } from '../data/profileData';
import styles from '../styles/navbar.module.css';

const menuItems = [
  { label: 'Home', href: '#home' },
  { label: 'About', href: '#about' },
  { label: 'Skills', href: '#skills' },
  { label: 'Projects', href: '#projects' },
  { label: 'Connect', href: '#connect' },
];

export default function Navbar() {
  const [active, setActive] = useState('Home');
  const [open, setOpen] = useState(false);
  const [scrolled, setScrolled] = useState(false);
  const { theme, toggleTheme } = useTheme();

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 12);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  useEffect(() => {
    if (!open) return;
    const onKey = (e) => e.key === 'Escape' && setOpen(false);
    window.addEventListener('keydown', onKey);
    return () => window.removeEventListener('keydown', onKey);
  }, [open]);

  const go = (label) => {
    setActive(label);
    setOpen(false);
  };

  return (
    <header className={`${styles.header} ${scrolled ? styles.scrolled : ''}`}>
      <div className={`container ${styles.inner}`}>
        <a href="#home" className={styles.brand} onClick={() => go('Home')}>
          <img src="/favicon.png" alt="" className={styles.brandMark} width="30" height="30" />
          <span className={styles.brandName}>{profile.brand ?? profile.name}</span>
        </a>

        <div className={styles.right}>
          <nav id="main-nav" className={`${styles.nav} ${open ? styles.navOpen : ''}`} aria-label="Navigasi utama">
            <ul className={styles.list}>
              {menuItems.map((item) => (
                <li key={item.label}>
                  <a
                    href={item.href}
                    onClick={() => go(item.label)}
                    className={`${styles.link} ${active === item.label ? styles.active : ''}`}
                    aria-current={active === item.label ? 'page' : undefined}
                  >
                    {item.label}
                  </a>
                </li>
              ))}
            </ul>
          </nav>

          <button
            type="button"
            className={styles.iconBtn}
            onClick={toggleTheme}
            aria-label={theme === 'dark' ? 'Ganti ke tema terang' : 'Ganti ke tema gelap'}
          >
            {theme === 'dark' ? <FaSun size={15} /> : <FaMoon size={15} />}
          </button>

          <button
            type="button"
            className={`${styles.iconBtn} ${styles.menuBtn}`}
            onClick={() => setOpen((o) => !o)}
            aria-expanded={open}
            aria-controls="main-nav"
            aria-label={open ? 'Tutup menu' : 'Buka menu'}
          >
            {open ? <FaXmark size={17} /> : <FaBars size={15} />}
          </button>
        </div>
      </div>
    </header>
  );
}
