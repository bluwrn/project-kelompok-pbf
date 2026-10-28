import { profile } from '../data/profileData';
import styles from '../styles/about.module.css';

export default function About() {
  return (
    <section className={styles.about} id="about">
      <div className={`container ${styles.grid}`}>
        <div>
          <p className="eyebrow">About</p>
          <h2 className="section-title">
            A little about <em>me</em>
          </h2>
          <div className={styles.intro}>
            {profile.photo && (
              <figure className={styles.polaroid}>
                <img
                  src={profile.photo}
                  alt={`Foto masa kecil ${profile.name} dalam gaya pixel art`}
                  width="64"
                  height="80"
                  loading="lazy"
                  decoding="async"
                  className={styles.photo}
                />
                {profile.photoCaption && <figcaption>{profile.photoCaption}</figcaption>}
              </figure>
            )}

            <div className={styles.text}>
              {profile.about.map((para, i) => (
                <p key={i}>{para}</p>
              ))}
            </div>
          </div>
        </div>

        <aside className={`glass ${styles.card}`}>
          <img src="/lily-320.webp" alt="" aria-hidden="true" loading="lazy" decoding="async" width="320" height="317" className={styles.cardLily} />
          <h3 className={styles.cardTitle}>Quick facts</h3>
          <dl className={styles.facts}>
            {profile.facts.map((f) => (
              <div key={f.key} className={styles.fact}>
                <dt>{f.key}</dt>
                <dd>{f.value}</dd>
              </div>
            ))}
          </dl>
        </aside>
      </div>
    </section>
  );
}
