import { FaGithub, FaLinkedin, FaInstagram, FaRegEnvelope } from 'react-icons/fa6';
import Lily from '../components/Lily';
import { profile, gmailLink } from '../data/profileData';
import styles from '../styles/hero.module.css';

export default function Hero() {
  const github = `https://github.com/${profile.githubUsername}`;

  return (
    <section className={styles.hero} id="home">
      <div className={`container ${styles.grid}`}>
        {/* Kolom teks */}
        <div className={styles.text}>
          <span className={styles.status}>
            <span className={styles.statusDot} /> {profile.status}
          </span>

          <h1 className={styles.name}>
            <span className={styles.hi}>Hi, I&apos;m</span>
            {profile.name}
          </h1>
          <p className={styles.role}>{profile.role}</p>
          <p className={styles.tagline}>{profile.tagline}</p>

          {/* Tombol sosial: GitHub, LinkedIn, Instagram */}
          <div className={styles.cta}>
            <a href={github} target="_blank" rel="noreferrer" className="btn btn-primary">
              <FaGithub size={16} /> GitHub
            </a>
            {profile.linkedin && (
              <a href={profile.linkedin} target="_blank" rel="noreferrer" className="btn btn-ghost">
                <FaLinkedin size={16} /> LinkedIn
              </a>
            )}
            {profile.instagram && (
              <a href={profile.instagram} target="_blank" rel="noreferrer" className="btn btn-ghost">
                <FaInstagram size={16} /> Instagram
              </a>
            )}
          </div>

          <ul className={styles.socials} aria-label="Kontak">
            {profile.email && (
              <li>
                <a href={gmailLink()} target="_blank" rel="noreferrer" className={styles.email} aria-label={`Kirim email ke ${profile.email} lewat Gmail`}>
                  <FaRegEnvelope size={15} />
                  <span>{profile.email}</span>
                </a>
              </li>
            )}
            <li className={styles.handle}>@{profile.githubUsername}</li>
          </ul>
        </div>

        {/* Kolom visual: bingkai lengkung + bunga lily */}
        <div className={styles.visual} aria-hidden="true">
          <div className={styles.arch} />
          {/* Bunga gaya titik-titik: satu versi per tema. Yang tersembunyi tidak diunduh (loading lazy). */}
          <Lily variant="dots" size="118%" sizes="(max-width: 900px) 320px, 520px" className={`${styles.flower} ${styles.lightOnly}`} />
          <Lily variant="dots-dark" size="118%" sizes="(max-width: 900px) 320px, 520px" className={`${styles.flower} ${styles.darkOnly}`} />

          {/* Lencana teks melingkar yang berputar pelan */}
          <svg className={styles.badge} viewBox="0 0 120 120">
            <defs>
              <path id="hero-circle" d="M60,60 m-44,0 a44,44 0 1,1 88,0 a44,44 0 1,1 -88,0" />
            </defs>
            <text>
              <textPath href="#hero-circle" textLength="270" lengthAdjust="spacing">{profile.badgeText}</textPath>
            </text>
          </svg>

          <div className={`${styles.chip} ${styles.chipA}`}>
            <span className={styles.chipDot} /> {profile.chips[0]}
          </div>
          <div className={`${styles.chip} ${styles.chipB}`}>
            <span className={styles.chipDot} /> {profile.chips[1]}
          </div>
        </div>
      </div>
    </section>
  );
}
