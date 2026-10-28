import { useEffect, useRef } from 'react';
import { FaGithub, FaXmark, FaArrowUpRightFromSquare } from 'react-icons/fa6';
import PreviewGallery from '../components/PreviewGallery';
import styles from '../styles/modal.module.css';

export default function ProjectModal({ project, onClose }) {
  const ref = useRef(null);

  useEffect(() => {
    const dialog = ref.current;
    if (!dialog) return;
    if (project && !dialog.open) {
      dialog.showModal();
      document.body.style.overflow = 'hidden';
    } else if (!project && dialog.open) {
      dialog.close();
    }
    return () => { document.body.style.overflow = ''; };
  }, [project]);

  return (
    <dialog
      ref={ref}
      className={styles.modal}
      onClose={onClose}
      onClick={(e) => e.target === ref.current && onClose()}
      aria-labelledby="modal-title"
    >
      {project && (
        <div className={styles.inner}>
          <button type="button" className={styles.close} onClick={onClose} aria-label="Tutup">
            <FaXmark size={16} />
          </button>

          {/* Gambar preview proyek: screenshot milikmu, atau kartu preview GitHub */}
          <PreviewGallery project={project} />

          <div className={styles.body}>
            <h3 id="modal-title" className={styles.title}>{project.title}</h3>
            <p className={styles.desc}>{project.longDescription ?? project.description}</p>

            {project.points?.length > 0 && (
              <>
                <p className={styles.label}>Highlights</p>
                <ul className={styles.points}>
                  {project.points.map((pt) => <li key={pt}>{pt}</li>)}
                </ul>
              </>
            )}

            <p className={styles.label}>Tech stack</p>
            <ul className={styles.tags}>
              {project.tech.map((t) => <li key={t}>{t}</li>)}
            </ul>
          </div>

          {(project.github || project.demo) && (
            <div className={styles.footer}>
              {project.github && (
                <a href={project.github} target="_blank" rel="noreferrer" className="btn btn-ghost">
                  <FaGithub size={14} /> View Source
                </a>
              )}
              {project.demo && (
                <a href={project.demo} target="_blank" rel="noreferrer" className="btn btn-primary">
                  <FaArrowUpRightFromSquare size={12} /> Live Demo
                </a>
              )}
            </div>
          )}
        </div>
      )}
    </dialog>
  );
}
