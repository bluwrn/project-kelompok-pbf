import { useEffect, useState } from 'react';
import styles from '../styles/backdrop.module.css';

/**
 * Latar halaman: bunga lily samar di pojok, cahaya pink, kelopak jatuh.
 * Gambar ada di /public/lily-*.webp — ganti file itu kalau mau bunga lain.
 */
const PETALS = Array.from({ length: 8 }, (_, i) => ({
  left: (i * 41 + 7) % 100,
  delay: (i * 2.3) % 18,
  duration: 18 + ((i * 7) % 12),
  scale: 0.7 + ((i * 3) % 5) / 10,
}));

export default function Backdrop() {
  // Jeda animasi saat tab disembunyikan → hemat CPU & baterai
  const [paused, setPaused] = useState(false);
  useEffect(() => {
    const onVis = () => setPaused(document.hidden);
    document.addEventListener('visibilitychange', onVis);
    return () => document.removeEventListener('visibilitychange', onVis);
  }, []);

  return (
    <div className={`${styles.layer} ${paused ? styles.paused : ''}`} aria-hidden="true">
      <img
        src="/lily-480.webp"
        srcSet="/lily-320.webp 320w, /lily-480.webp 480w"
        sizes="(max-width: 640px) 380px, 600px"
        width="480"
        height="476"
        alt=""
        decoding="async"
        className={`${styles.bloom} ${styles.bloomTop}`}
      />
      <img
        src="/lily-480.webp"
        srcSet="/lily-320.webp 320w, /lily-480.webp 480w"
        sizes="(max-width: 640px) 340px, 520px"
        width="480"
        height="476"
        alt=""
        decoding="async"
        loading="lazy"
        className={`${styles.bloom} ${styles.bloomBottom}`}
      />
      {PETALS.map((p, i) => (
        <span
          key={i}
          className={styles.petal}
          style={{
            left: `${p.left}%`,
            animationDelay: `-${p.delay}s`,
            animationDuration: `${p.duration}s`,
            '--s': p.scale,
          }}
        />
      ))}
    </div>
  );
}
