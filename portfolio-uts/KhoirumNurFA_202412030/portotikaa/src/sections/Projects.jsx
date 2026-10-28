import { useState } from 'react';
import { FaGithub, FaArrowUpRightFromSquare, FaExpand, FaStar } from 'react-icons/fa6';
import Lily from '../components/Lily';
import ProjectModal from './ProjectModal';
import useGithubRepos from '../hooks/useGithubRepos';
import { projectsData, hiddenRepos, GITHUB_USERNAME } from '../data/projectsData';
import styles from '../styles/projects.module.css';

// "https://github.com/user/Nama-Repo" → "nama-repo"
const repoKey = (url = '') => url.replace(/\/+$/, '').split('/').pop().toLowerCase();

// "spiderLily-flower" → "Spider Lily Flower"
const prettyName = (name) =>
  name
    .replace(/[-_]+/g, ' ')
    .replace(/([a-z])([A-Z])/g, '$1 $2')
    .replace(/\s+/g, ' ')
    .trim()
    .replace(/\b\w/g, (c) => c.toUpperCase());

const formatDate = (iso) =>
  new Date(iso).toLocaleDateString('id-ID', { month: 'short', year: 'numeric' });

function Cover({ project, large }) {
  if (project.image) {
    return <img src={project.image} alt={`Tampilan ${project.title}`} className={styles.coverImg} loading="lazy" decoding="async" />;
  }
  return (
    <div className={styles.coverArt} aria-hidden="true">
      <Lily size={large ? 150 : 110} sizes="160px" className={styles.coverLily} />
    </div>
  );
}

function Meta({ repo }) {
  if (!repo) return null;
  return (
    <span className={styles.meta}>
      {repo.stars > 0 && <span><FaStar size={10} /> {repo.stars}</span>}
      {repo.pushedAt && <span>{formatDate(repo.pushedAt)}</span>}
    </span>
  );
}

function Links({ project }) {
  const stop = (e) => e.stopPropagation();
  return (
    <div className={styles.links}>
      {project.github && (
        <a href={project.github} target="_blank" rel="noreferrer" onClick={stop}>
          <FaGithub size={14} /> Source
        </a>
      )}
      {project.demo && (
        <a href={project.demo} target="_blank" rel="noreferrer" onClick={stop}>
          <FaArrowUpRightFromSquare size={12} /> Demo
        </a>
      )}
      <Meta repo={project.repo} />
    </div>
  );
}

export default function Projects() {
  const [selected, setSelected] = useState(null);
  const { repos, loading } = useGithubRepos(GITHUB_USERNAME);

  // Gabungkan data manual dengan info live GitHub (tanggal update, star, demo)
  const repoMap = new Map(repos.map((r) => [r.name.toLowerCase(), r]));
  const manual = projectsData.map((p) => {
    const repo = repoMap.get(repoKey(p.github));
    return { ...p, repo, demo: p.demo || repo?.homepage || undefined };
  });

  // Repo GitHub yang belum ada di projectsData → tampil otomatis
  const listed = new Set(projectsData.map((p) => repoKey(p.github)));
  const autoRepos = repos
    .filter((r) => !r.fork && !r.archived)
    .filter((r) => !listed.has(r.name.toLowerCase()))
    .filter((r) => !hiddenRepos.includes(r.name.toLowerCase()))
    .map((r) => ({
      title: prettyName(r.name),
      description: r.description || 'Belum ada deskripsi.',
      tech: r.topics.length ? r.topics : r.language ? [r.language] : [],
      github: r.url,
      demo: r.homepage || undefined,
      repo: r,
    }));

  const featured = manual.filter((p) => p.featured);
  const others = [...manual.filter((p) => !p.featured), ...autoRepos];

  const cardProps = (project) => ({
    role: 'button',
    tabIndex: 0,
    onClick: () => setSelected(project),
    onKeyDown: (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        setSelected(project);
      }
    },
    'aria-label': `Lihat detail ${project.title}`,
  });

  return (
    <section className={styles.projects} id="projects">
      <div className="container">
        <div className={styles.head}>
          <div>
            <p className="eyebrow">Projects</p>
            <h2 className="section-title">
              Things I&apos;ve <em>grown</em>
            </h2>
            <p className="section-lede">Proyek dari GitHub-ku — ketuk kartu untuk melihat detailnya.</p>
          </div>
          <a
            href={`https://github.com/${GITHUB_USERNAME}?tab=repositories`}
            target="_blank"
            rel="noreferrer"
            className={`btn btn-ghost ${styles.allRepos}`}
          >
            <FaGithub size={15} /> Semua repo
          </a>
        </div>

        {featured.length > 1 && (
          <p className={styles.swipeHint} aria-hidden="true">Geser untuk melihat lainnya →</p>
        )}

        {featured.length > 0 && (
          <div className={styles.featuredGrid}>
            {featured.map((p, i) => (
              <article key={p.github ?? p.title} className={styles.card} {...cardProps(p)}>
                <div className={styles.cover}>
                  <Cover project={p} large />
                  <span className={styles.index}>{String(i + 1).padStart(2, '0')}</span>
                  <span className={styles.hint}><FaExpand size={11} /> Detail</span>
                </div>
                <div className={styles.body}>
                  <h3 className={styles.title}>{p.title}</h3>
                  <p className={styles.desc}>{p.description}</p>
                  <ul className={styles.tags}>
                    {p.tech.map((t) => <li key={t}>{t}</li>)}
                  </ul>
                  <Links project={p} />
                </div>
              </article>
            ))}
          </div>
        )}

        {(others.length > 0 || loading) && (
          <>
            <h3 className={styles.subhead}>
              <span aria-hidden="true">✿</span> Other projects &amp; coursework
            </h3>
            <div className={styles.otherGrid}>
              {others.map((p) => (
                <article key={p.github ?? p.title} className={`${styles.card} ${styles.other}`} {...cardProps(p)}>
                  <div className={styles.body}>
                    <h3 className={styles.title}>{p.title}</h3>
                    <p className={styles.desc}>{p.description}</p>
                    <ul className={styles.tags}>
                      {p.tech.map((t) => <li key={t}>{t}</li>)}
                    </ul>
                    <Links project={p} />
                  </div>
                </article>
              ))}
              {loading && <div className={styles.skeleton} aria-hidden="true" />}
            </div>
          </>
        )}
      </div>

      <ProjectModal project={selected} onClose={() => setSelected(null)} />
    </section>
  );
}
