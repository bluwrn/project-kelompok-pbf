import { FaRegEnvelope } from 'react-icons/fa6';
import { profile, gmailLink } from '../data/profileData';
import styles from '../styles/footer.module.css';

export default function Footer() {
  return (
    <footer className={styles.footer}>
      <div className={`container ${styles.inner}`}>
        <span>© {new Date().getFullYear()} {profile.fullName}</span>

        {profile.email && (
          <a href={gmailLink()} target="_blank" rel="noreferrer" className={styles.email} aria-label={`Kirim email ke ${profile.email} lewat Gmail`}>
            <FaRegEnvelope size={13} /> {profile.email}
          </a>
        )}

        <span className={styles.tagline}>grown with care, like a lily</span>
      </div>
    </footer>
  );
}
