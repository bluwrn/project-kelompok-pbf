import { FaGithub, FaLinkedinIn, FaEnvelope } from 'react-icons/fa6';
import Lily from '../components/Lily';
import { profile, gmailLink } from '../data/profileData';
import styles from '../styles/connect.module.css';

export default function Connect() {
  return (
    <section className={styles.connect} id="connect">
      <div className="container">
        <div className={`glass ${styles.panel}`}>
          <div className={styles.lily} aria-hidden="true">
            <Lily size={260} />
          </div>
          <p className="eyebrow">Let&apos;s connect</p>
          <h2 className="section-title">
            Interested in my <em>work</em>?
          </h2>
          <p className={styles.lede}>
            🌷 Seperti bunga lily yang terus mekar, aku tumbuh melalui karya dan ide baru. Yuk, jelajahi GitHub-ku dan mari berkolaborasi! 🤍
          </p>

          <div className={styles.actions}>
            <a href={`https://github.com/${profile.githubUsername}`} target="_blank" rel="noreferrer" className="btn btn-primary">
              <FaGithub size={17} /> View GitHub
            </a>
            {profile.linkedin && (
              <a href={profile.linkedin} target="_blank" rel="noreferrer" className="btn btn-ghost">
                <FaLinkedinIn size={16} /> LinkedIn
              </a>
            )}
            {profile.email && (
              <a href={gmailLink()} target="_blank" rel="noreferrer" className="btn btn-ghost">
                <FaEnvelope size={15} /> Email
              </a>
            )}
          </div>
        </div>
      </div>
    </section>
  );
}
