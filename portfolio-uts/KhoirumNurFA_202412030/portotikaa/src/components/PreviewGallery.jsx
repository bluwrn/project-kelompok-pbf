import { useEffect, useState } from 'react';
import { FaChevronLeft, FaChevronRight } from 'react-icons/fa6';
import styles from '../styles/gallery.module.css';

/**
 * Galeri gambar preview proyek di modal.
 *
 * Urutan sumber gambar:
 *  1. project.images  → array screenshot milikmu (bisa lebih dari satu)
 *  2. project.image   → satu screenshot
 *  3. kartu preview otomatis dari GitHub (opengraph) — kalau tidak ada screenshot sama sekali
 */

// "https://github.com/owner/repo" → kartu preview GitHub
export const githubPreview = (url, version = 1) => {
  const [owner, repo] = url.replace(/\/+$/, '').split('/').slice(-2);
  return `https://opengraph.githubassets.com/${version}/${owner}/${repo}`;
};

export function getPreviewImages(project) {
  if (project.images?.length) return project.images;
  if (project.image) return [project.image];
  if (project.github) {
    // versi = waktu push terakhir → gambar ikut ter-update saat repo berubah
    const v = project.repo?.pushedAt ? Date.parse(project.repo.pushedAt) : 1;
    return [githubPreview(project.github, v)];
  }
  return [];
}

export default function PreviewGallery({ project }) {
  const images = getPreviewImages(project);
  const [index, setIndex] = useState(0);
  const [failed, setFailed] = useState(false);

  // Reset ke gambar pertama setiap ganti proyek
  useEffect(() => {
    setIndex(0);
    setFailed(false);
  }, [project]);

  if (!images.length || failed) return null;

  const count = images.length;
  const go = (step) => setIndex((i) => (i + step + count) % count);
  const isGithubCard = !project.images?.length && !project.image;

  return (
    <div
      className={`${styles.gallery} ${isGithubCard ? styles.githubCard : ''}`}
      onKeyDown={(e) => {
        if (e.key === 'ArrowLeft') go(-1);
        if (e.key === 'ArrowRight') go(1);
      }}
    >
      <div className={styles.track} style={{ transform: `translateX(-${index * 100}%)` }}>
        {images.map((src, i) => (
          <img
            key={src}
            src={src}
            alt={`Preview ${project.title} ${count > 1 ? `(${i + 1} dari ${count})` : ''}`}
            className={styles.slide}
            loading={i === 0 ? 'eager' : 'lazy'}
            decoding="async"
            onError={() => i === 0 && setFailed(true)}
          />
        ))}
      </div>

      {count > 1 && (
        <>
          <button type="button" className={`${styles.nav} ${styles.prev}`} onClick={() => go(-1)} aria-label="Gambar sebelumnya">
            <FaChevronLeft size={13} />
          </button>
          <button type="button" className={`${styles.nav} ${styles.next}`} onClick={() => go(1)} aria-label="Gambar berikutnya">
            <FaChevronRight size={13} />
          </button>
          <div className={styles.dots}>
            {images.map((src, i) => (
              <button
                key={src}
                type="button"
                className={`${styles.dot} ${i === index ? styles.dotActive : ''}`}
                onClick={() => setIndex(i)}
                aria-label={`Lihat gambar ${i + 1}`}
                aria-current={i === index}
              />
            ))}
          </div>
          <span className={styles.counter}>{index + 1} / {count}</span>
        </>
      )}
    </div>
  );
}
