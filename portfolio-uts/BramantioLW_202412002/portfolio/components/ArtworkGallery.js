"use client";

import Image from "next/image";
import { useCallback, useEffect, useRef, useState } from "react";
import { categories, featuredProjects, projects, totalArtworks } from "../data/artworks";

const INITIAL_VISIBLE = 9;

function Label({ children, index }) {
  return <span className="micro-label"><span className="micro-square" />{children}{index && <span className="micro-index">{index}</span>}</span>;
}

function WorkTile({ project, index, featured = false, onOpen }) {
  const visual = project.images[0];
  return (
    <button
      className={`${featured ? "featured-tile" : "archive-tile"} work-tile`}
      type="button"
      onClick={(event) => onOpen(project, event.currentTarget)}
      aria-label={`View ${project.title}${project.images.length > 1 ? `, ${project.images.length} images` : ""}`}
    >
      <span className="tile-media">
        <span className="tile-stamp">{String(index + 1).padStart(2, "0")} / {featured ? "FEATURED" : "COLLECTION"}</span>
        <Image
          src={visual.src}
          alt={visual.alt}
          fill
          sizes={featured ? "(max-width: 700px) 100vw, (max-width: 1100px) 48vw, 55vw" : "(max-width: 620px) 90vw, (max-width: 990px) 48vw, 28vw"}
          className="artwork-image"
          priority={featured && index === 0}
        />
        <span className="tile-open" aria-hidden="true">↗</span>
        {project.images.length > 1 && <span className="tile-count">{project.images.length} IMAGES</span>}
      </span>
      <span className="tile-caption">
        <span className="tile-title">{project.title}</span>
        <span className="tile-caption-bottom"><span>{project.format}</span><span aria-hidden="true">↗</span></span>
      </span>
    </button>
  );
}

function WorkLightbox({ project, index, onIndex, onClose, onProjectChange }) {
  const closeRef = useRef(null);
  const image = project.images[index];
  const multiple = project.images.length > 1;

  useEffect(() => {
    const oldOverflow = document.body.style.overflow;
    document.body.style.overflow = "hidden";
    closeRef.current?.focus();
    return () => { document.body.style.overflow = oldOverflow; };
  }, []);

  useEffect(() => {
    function onKeyDown(event) {
      if (event.key === "Escape") onClose();
      if (event.key === "ArrowRight" && multiple) onIndex((index + 1) % project.images.length);
      if (event.key === "ArrowLeft" && multiple) onIndex((index - 1 + project.images.length) % project.images.length);
      if (event.key === "Tab") {
        const modal = document.querySelector(".lightbox");
        if (!modal) return;
        const focusable = Array.from(modal.querySelectorAll('button:not([disabled])'));
        if (!focusable.length) return;
        const first = focusable[0], last = focusable[focusable.length - 1];
        if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
        else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
      }
    }
    window.addEventListener("keydown", onKeyDown);
    return () => window.removeEventListener("keydown", onKeyDown);
  }, [project, index, multiple, onClose, onIndex]);

  return (
    <div className="lightbox-overlay" onMouseDown={(e) => { if (e.target === e.currentTarget) onClose(); }}>
      <div className="lightbox" role="dialog" aria-modal="true" aria-label={`${project.title} image viewer`}>
        <div className="lightbox-top">
          <span className="mono small">BLUWRN / WORK VIEWER</span>
          <span className="mono small lightbox-sequence">{String(index + 1).padStart(2,"0")} / {String(project.images.length).padStart(2,"0")}</span>
          <button ref={closeRef} type="button" className="lightbox-close" onClick={onClose} aria-label="Close image viewer">CLOSE <span aria-hidden="true">×</span></button>
        </div>
        <div className="lightbox-body">
          <div className="lightbox-stage">
            <Image key={image.src} src={image.src} alt={image.alt} fill sizes="(max-width: 800px) 100vw, 70vw" className="lightbox-image" priority />
            {multiple && <>
              <button className="viewer-nav viewer-prev" type="button" onClick={() => onIndex((index - 1 + project.images.length) % project.images.length)} aria-label="Previous image">←</button>
              <button className="viewer-nav viewer-next" type="button" onClick={() => onIndex((index + 1) % project.images.length)} aria-label="Next image">→</button>
            </>}
          </div>
          <aside className="lightbox-aside">
            <Label>{project.category}</Label>
            <h3>{project.title}</h3>
            <p>{project.format}</p>
            <div className="viewer-rule" />
            <p className="mono small">CURRENT IMAGE</p>
            <p className="viewer-image-name">{image.name}</p>
            {multiple && <div className="viewer-thumbnails" aria-label="Images in this project">
              {project.images.map((item, i) => <button type="button" key={item.src} className={`viewer-thumb ${i===index?"is-current":""}`} onClick={() => onIndex(i)} aria-label={`View ${item.name}`} aria-pressed={i===index}>
                <Image src={item.src} alt="" fill sizes="90px" className="thumb-image" />
              </button>)}
            </div>}
            <div className="viewer-spacer" />
            <div className="viewer-project-nav"><button type="button" onClick={() => onProjectChange(-1)}>← PREV WORK</button><button type="button" onClick={() => onProjectChange(1)}>NEXT WORK →</button></div>
          </aside>
        </div>
        <div className="lightbox-bottom mono small"><span>ACTUAL PROJECT ARTWORK</span><span>{multiple ? "USE ← → TO SWITCH IMAGES" : "BROWSE OTHER WORK BELOW"}</span></div>
      </div>
    </div>
  );
}

export default function ArtworkGallery() {
  const [category, setCategory] = useState("All work");
  const [showAll, setShowAll] = useState(false);
  const [opened, setOpened] = useState(null);
  const [imageIndex, setImageIndex] = useState(0);
  const triggerRef = useRef(null);
  const open = useCallback((project, trigger) => { triggerRef.current = trigger; setImageIndex(0); setOpened(project); }, []);
  const close = useCallback(() => { setOpened(null); requestAnimationFrame(() => triggerRef.current?.focus()); }, []);
  const filtered = category === "All work" ? projects : projects.filter((project) => project.category === category);
  const visible = showAll || category !== "All work" ? filtered : filtered.slice(0, INITIAL_VISIBLE);

  function moveProject(direction) {
    const current = projects.findIndex((project) => project.id === opened.id);
    setOpened(projects[(current + direction + projects.length) % projects.length]);
    setImageIndex(0);
  }

  return (
    <>
      <section id="work" className="section-shell featured-section" aria-labelledby="featured-title">
        <div className="section-identity"><Label>01 / FEATURED WORK</Label><span className="mono small muted">GRAPHIC DESIGN / SELECTED</span></div>
        <div className="section-heading">
          <h2 id="featured-title">SELECTED <em>DESIGN</em> WORK<span className="pink-stop">.</span></h2>
          <p>A selection from print, promotional campaigns, and personal graphic work.</p>
        </div>
        <div className="featured-grid">
          {featuredProjects.map((project,index) => <WorkTile key={project.id} project={project} index={index} featured onOpen={open} />)}
        </div>
        <div className="section-end"><span className="mono small muted">06 FEATURED PROJECTS</span><a className="text-arrow-link" href="#archive">EXPLORE ALL WORK <span aria-hidden="true">↘</span></a></div>
      </section>

      <section id="archive" className="section-shell archive-section" aria-labelledby="archive-title">
        <div className="section-identity"><Label>02 / DESIGN ARCHIVE</Label><span className="mono small muted">{totalArtworks} ORIGINAL ARTWORKS</span></div>
        <div className="section-heading">
          <h2 id="archive-title">THE <em>FULL</em> COLLECTION<span className="cyan-stop">.</span></h2>
          <p>Browse by category. Select any work to view it at a larger size.</p>
        </div>
        <div className="archive-toolbar">
          <div className="filter-strip" role="group" aria-label="Filter graphic design work">
            {categories.map((item) => <button key={item} type="button" className={`filter ${category===item?"active":""}`} aria-pressed={category===item} onClick={() => { setCategory(item); setShowAll(false); }}>
              {item}
            </button>)}
          </div>
          <span className="mono small muted results" aria-live="polite">{String(filtered.length).padStart(2,"0")} PROJECT GROUPS</span>
        </div>
        <div className="archive-grid">
          {visible.map((project,index) => <WorkTile key={project.id} project={project} index={index} onOpen={open} />)}
        </div>
        {category === "All work" && !showAll && filtered.length > INITIAL_VISIBLE && <div className="show-more-wrap">
          <button className="button-outlined show-more" type="button" onClick={() => setShowAll(true)}>SHOW ALL {String(projects.length).padStart(2,"0")} PROJECT GROUPS <span aria-hidden="true">＋</span></button>
          <span className="mono small muted">SHOWING {visible.length} OF {projects.length}</span>
        </div>}
      </section>

      {opened && <WorkLightbox project={opened} index={imageIndex} onIndex={setImageIndex} onClose={close} onProjectChange={moveProject} />}
    </>
  );
}
