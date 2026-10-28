import { skillsData, skillGroups } from '../data/skillsData';
import { getIcon } from '../components/icons';
import styles from '../styles/skills.module.css';

export default function Skills() {
  return (
    <section className={styles.skills} id="skills">
      <div className="container">
        <p className="eyebrow">Skills</p>
        <h2 className="section-title">
          What I <em>actually</em> use
        </h2>
        <p className="section-lede">
          Tanpa persen-persenan — cuma daftar jujur: yang sudah kupakai, alat kerjaku, dan yang sedang kupelajari.
        </p>

        <div className={styles.grid}>
          {skillGroups.map((group, gi) => (
            <article key={group.key} className={`glass ${styles.column}`} data-stage={gi}>
              <header className={styles.head}>
                {(() => { const GroupIcon = getIcon(group.icon); return <span className={styles.groupIcon}><GroupIcon /></span>; })()}
                <div>
                  <h3 className={styles.title}>{group.title}</h3>
                  <p className={styles.note}>{group.note}</p>
                </div>
              </header>

              <ul className={styles.badges}>
                {(skillsData[group.key] ?? []).map((item) => {
                  const Icon = getIcon(item.icon);
                  return (
                    <li key={item.name} className={styles.badge}>
                      <Icon className={styles.badgeIcon} />
                      <span>{item.name}</span>
                    </li>
                  );
                })}
              </ul>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
