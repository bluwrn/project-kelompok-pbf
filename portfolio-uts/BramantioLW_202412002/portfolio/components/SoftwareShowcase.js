const softwareProjects = [
  { number: "01", name: "Student Management System", type: "WEB APPLICATION", description: "A student record management project built to organize student data.", tags: ["STUDENT DATA", "WEB APP"], theme: "cyan" },
  { number: "02", name: "Tofolite", type: "PRODUCTIVITY / UI", description: "A lightweight to-do list concept focused on simple task management.", tags: ["TASK MANAGEMENT", "UI PROJECT"], theme: "pink" },
];

function PreviewPlaceholder({project}) {
  return (
    <div className={`software-preview preview-${project.theme}`} aria-label={`${project.name} screenshot will be added later`}>
      <div className="fake-browser-top"><span className="browser-dots"><i/><i/><i/></span><span>PROJECT PREVIEW</span><span>— □ ×</span></div>
      <div className="preview-canvas">
        <span className="preview-corner">{project.number}</span>
        <div className="preview-crosshair" aria-hidden="true" />
        <span className="preview-message">SCREENSHOT<br/>COMING SOON<span className="pink-stop">.</span></span>
        <span className="preview-foot">REPLACE WITH ACTUAL PROJECT SCREENSHOT</span>
      </div>
    </div>
  );
}

export default function SoftwareShowcase() {
  return (
    <section id="development" className="section-shell software-section" aria-labelledby="software-title">
      <div className="section-identity"><span className="micro-label"><span className="micro-square" />03 / WEB PROJECTS</span><span className="mono small muted">DESIGN × DEVELOPMENT</span></div>
      <div className="section-heading"><h2 id="software-title">WEB <em>PROJECTS</em><span className="pink-stop">.</span></h2><p>Small applications and interface work from the development side of my practice.</p></div>
      <div className="software-list">
        {softwareProjects.map((project,index) => <article key={project.number} className={`software-entry ${index%2===1?"is-reversed":""}`}>
          <div className="software-description">
            <p className="mono small"><span className="cyan-dot" /> {project.type} <span className="muted">/ {project.number}</span></p>
            <h3>{project.name}</h3>
            <p>{project.description}</p>
            <div className="software-tags">{project.tags.map(tag=><span key={tag}>{tag}</span>)}</div>
            <p className="placeholder-note">Project images and repository links will be added here.</p>
          </div>
          <PreviewPlaceholder project={project}/>
        </article>)}
      </div>
    </section>
  );
}
