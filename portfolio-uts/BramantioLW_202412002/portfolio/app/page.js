import Image from "next/image";
import ArtworkGallery from "../components/ArtworkGallery";
import SoftwareShowcase from "../components/SoftwareShowcase";
import ThemeToggle from "../components/ThemeToggle";

const designTools = ["AFFINITY", "CORELDRAW", "FIGMA", "CANVA"];
const devTools = ["HTML", "CSS", "JAVASCRIPT", "PYTHON", "PHP", "REACT", "NEXT.JS", "GIT"];

function Ident({ children }) {
  return <span className="micro-label"><span className="micro-square" />{children}</span>;
}

export default function Home() {
  return (
    <>
      <a className="skip-link" href="#main">Skip to content</a>
      <header className="site-header" id="top">
        <a className="brand" href="#top" aria-label="Bluwrn, back to top">BLUWRN<span className="brand-pink">.</span><span className="brand-description">DESIGN / DEVELOPMENT</span></a>
        <nav className="site-nav" aria-label="Primary navigation">
          <a href="#work">[01] WORK</a><a href="#archive">[02] ARCHIVE</a><a href="#development">[03] WEB</a><a href="#about">[04] ABOUT</a><a href="#contact">[05] CONTACT</a>
        </nav>
        <div className="header-controls"><ThemeToggle /></div>
      </header>

      <main id="main">
        <section className="hero section-shell" aria-labelledby="hero-title">
          <div className="hero-meta mono small"><Ident>PORTFOLIO / OVERVIEW</Ident><span>EST. IN BONTANG, ID</span></div>
          <div className="hero-frame">
            <span className="frame-top-left" aria-hidden="true"/><span className="frame-bottom-left" aria-hidden="true"/><span className="frame-bottom-right" aria-hidden="true"/>
            <Image className="crystal-background" src="/crystalline-shards.svg" alt="" fill unoptimized priority sizes="100vw" />
            <span className="hero-ghost" aria-hidden="true">BLUWRN</span>
            <div className="hero-status"><span><span className="status-flag"/> GRAPHIC DESIGNER</span><span className="hero-status-divider">/</span><span>COMPUTER SCIENCE STUDENT</span><span className="hero-status-fade">BONTANG, INDONESIA</span></div>
            <div className="hero-copy">
              <h1 id="hero-title">I DESIGN<span className="cyan-mark" aria-hidden="true"/>.<br/>I BUILD<span className="pink-mark" aria-hidden="true"/>.</h1>
              <p>Graphic design for print and digital. Web projects built along the way.</p>
              <div className="hero-actions"><a href="#work" className="button-dark">VIEW WORK <span aria-hidden="true">↗</span></a><a href="#about" className="button-plain">ABOUT ME <span aria-hidden="true">↗</span></a></div>
            </div>
            <div className="hero-frame-footer mono small"><span><span className="cyan-dot"/> VISUALS / LAYOUTS / WEB</span><span>SCROLL TO EXPLORE <span className="pink-text" aria-hidden="true">↓</span></span></div>
            <div className="frame-diagonal" aria-hidden="true"><i/><i/><i/></div>
          </div>
          <div className="hero-strip mono small"><span><span className="pink-dot"/> GRAPHIC DESIGN FIRST</span><span>PRINT / DIGITAL / WEB</span><span>SELECTED WORK / 2026</span></div>
        </section>

        <ArtworkGallery />
        <SoftwareShowcase />

        <section id="about" className="section-shell about-section" aria-labelledby="about-title">
          <div className="section-identity"><Ident>04 / ABOUT ME</Ident><span className="mono small muted">A BIT OF CONTEXT</span></div>
          <div className="section-heading"><h2 id="about-title">ABOUT <em>ME</em><span className="cyan-stop">.</span></h2></div>
          <div className="about-grid">
            <div className="about-intro"><p>I'm Bluw, a graphic designer based in Bontang, Indonesia, and a third-year computer science student.</p><p>I work with client graphics, event materials, and print production. On the software side, I'm learning to build interfaces and web applications.</p></div>
            <div className="about-panels"><div className="about-panel cyan-edge"><Ident>DESIGN & PRINT</Ident><p>Campaign graphics, posters, banners, commercial layouts, and print-ready artwork.</p></div><div className="about-panel pink-edge"><Ident>COMPUTER SCIENCE</Ident><p>Web projects, front-end interfaces, and an ongoing interest in how things work.</p></div></div>
          </div>
        </section>

        <section id="skills" className="section-shell skills-section" aria-labelledby="skills-title">
          <div className="section-identity"><Ident>05 / TOOLKIT</Ident><span className="mono small muted">TOOLS & TECH</span></div>
          <div className="section-heading"><h2 id="skills-title">TOOLS <em>& SKILLS</em><span className="pink-stop">.</span></h2></div>
          <div className="skills-group"><p className="mono small"><span className="pink-dot"/> DESIGN TOOLS</p><div className="skill-grid">{designTools.map(tool=><span key={tool}>{tool}</span>)}</div></div>
          <div className="skills-group"><p className="mono small"><span className="cyan-dot"/> WEB & PROGRAMMING</p><div className="skill-grid">{devTools.map(tool=><span key={tool}>{tool}</span>)}</div></div>
        </section>

        <section id="contact" className="section-shell contact-section" aria-labelledby="contact-title">
          <div className="section-identity"><Ident>06 / CONTACT</Ident><span className="mono small muted">END OF PAGE / START OF CONVERSATION</span></div>
          <div className="contact-content"><div><h2 id="contact-title">GET IN <em>TOUCH</em><span className="pink-stop">.</span></h2><p>Interested in the work? Contact details will be available here soon.</p></div><div className="contact-panel"><span className="mono small muted">CONTACT CHANNELS</span><div className="contact-channel"><span>EMAIL</span><span>TO BE ADDED</span></div><div className="contact-channel"><span>GITHUB</span><span>TO BE ADDED</span></div><div className="contact-channel"><span>INSTAGRAM</span><span>TO BE ADDED</span></div></div></div>
        </section>
      </main>
      <footer className="site-footer section-shell"><span>BLUW / BLUWRN <span className="pink-text">✳</span></span><span>© 2026 BLUWRN — PORTFOLIO</span><a href="#top">BACK TO TOP ↑</a></footer>
    </>
  );
}
