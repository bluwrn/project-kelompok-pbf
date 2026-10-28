
import { useEffect, useState } from "react";
import "./App.css";

const projects = [
  {
    title: "Web Development",
    icon: "fa-laptop-code",
    text: "Pengembangan website dengan HTML, CSS, JavaScript, PHP, dan Laravel."
  },
  {
    title: "Database Management",
    icon: "fa-database",
    text: "Perancangan database, normalisasi, query MySQL, dan pengelolaan data aplikasi."
  },
  {
    title: "Machine Learning",
    icon: "fa-brain",
    text: "Eksplorasi data dan pengembangan model machine learning untuk kebutuhan prediksi dan klasifikasi."
  },
  {
    title: "UI/UX Design",
    icon: "fa-pen-ruler",
    text: "Perancangan antarmuka yang sederhana, modern, dan mudah digunakan."
  }
];

const skills = [
  ["HTML5", 90, "html", "fa-html5"],
  ["CSS3", 85, "css", "fa-css3-alt"],
  ["PHP", 80, "php", "fa-php"],
  ["JavaScript", 75, "js", "fa-js"],
  ["Python", 70, "python", "fa-python"],
  ["C++", 65, "cpp", null],
  ["Laravel", 60, "laravel", "fa-laravel"],
  ["MySQL", 70, "mysql", null]
];

const competencies = [
  "Mechanical Static And Rotating",
  "Pipe fitter",
  "Web development",
  "Machine Learning",
  "Quality Control Fitter Structure"
];

function App() {
  const [active, setActive] = useState("home");

  // Mengambil tema yang terakhir dipilih
  const [darkMode, setDarkMode] = useState(() => {
    return localStorage.getItem("portfolio-theme") === "dark";
  });

  // Menerapkan tema dan menyimpannya di browser
  useEffect(() => {
    document.body.classList.toggle("dark-mode", darkMode);

    localStorage.setItem(
      "portfolio-theme",
      darkMode ? "dark" : "light"
    );
  }, [darkMode]);

  // Navigasi aktif berdasarkan section yang terlihat
  useEffect(() => {
    const sections = [
      "home",
      "about",
      "projects",
      "skills",
      "education",
      "contact"
    ]
      .map((id) => document.getElementById(id))
      .filter(Boolean);

    const observer = new IntersectionObserver(
      (entries) => {
        const visible = entries
          .filter((entry) => entry.isIntersecting)
          .sort(
            (a, b) =>
              b.intersectionRatio - a.intersectionRatio
          )[0];

        if (visible) {
          setActive(visible.target.id);
        }
      },
      {
        rootMargin: "-25% 0px -55% 0px",
        threshold: [0.05, 0.2, 0.5]
      }
    );

    sections.forEach((section) => observer.observe(section));

    return () => observer.disconnect();
  }, []);

  // Animasi saat section terlihat
  useEffect(() => {
    const reveal = document.querySelectorAll(".reveal");

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("show");
          }
        });
      },
      { threshold: 0.12 }
    );

    reveal.forEach((element) => observer.observe(element));

    return () => observer.disconnect();
  }, []);

  return (
    <>
      <nav className="navbar">
        <div className="logo">
          Muhammad Aditya Januar
        </div>

        <div className="navbar-actions">
          <button
            type="button"
            className="theme-toggle"
            onClick={() => setDarkMode((prev) => !prev)}
            aria-label={
              darkMode
                ? "Aktifkan Light Mode"
                : "Aktifkan Dark Mode"
            }
            title={
              darkMode ? "Light Mode" : "Dark Mode"
            }
          >
            <i
              className={`fas ${
                darkMode ? "fa-sun" : "fa-moon"
              }`}
            />
            <span>
              {darkMode ? "Light Mode" : "Dark Mode"}
            </span>
          </button>
        </div>

        <ul className="nav-menu">
          {[
            ["home", "Home"],
            ["about", "About Me"],
            ["projects", "Projects"],
            ["skills", "Skills"],
            ["education", "Education"],
            ["contact", "Contact"]
          ].map(([id, label]) => (
            <li key={id}>
              <a
                className={active === id ? "active" : ""}
                href={`#${id}`}
              >
                {label}
              </a>
            </li>
          ))}
        </ul>
      </nav>

      <main>
        {/* HOME */}
        <section className="hero" id="home">
          <div className="portofolio-text">
            PORTOFOLIO
          </div>

          <div className="portofolio-outline">
            PORTOFOLIO
          </div>

          <div className="dots-left">
            <div className="dot" />
            <div className="dot" />
            <div className="dot" />
          </div>

          <div className="dots-right">
            <div className="dot" />
            <div className="dot" />
            <div className="dot" />
          </div>

          <img
            src="/aditya.jpg.png"
            className="hero-photo"
            alt="Muhammad Aditya Januar"
          />

          <div className="presented">
            <div className="presented-small">
              Presented by
            </div>

            <div className="presented-name">
              Muhammad Aditya Januar
            </div>

            <div className="presented-line" />
          </div>

          <a
            href="#about"
            className="scroll-button"
            title="Scroll Down"
          >
            <i className="fas fa-arrow-down" />
          </a>
        </section>

        {/* ABOUT ME */}
        <section
          className="about-section reveal"
          id="about"
        >
          <div className="about-inner">
            <div className="about-photo-wrap">
              <img
                src="/Aditya.png.jpeg"
                className="about-photo"
                alt="Muhammad Aditya Januar"
              />

              <div className="about-floating-icon code">
                <i className="fas fa-code" />
              </div>

              <div className="about-floating-icon laptop">
                <i className="fas fa-laptop-code" />
              </div>
            </div>

            <div className="about-content">
              <div className="about-label">
                About Me
              </div>

              <h2 className="section-title">
                About <span>Me</span>
              </h2>

              <p className="about-description">
                Halo, perkenalkan nama saya Muhammad Aditya
                Januar. Saya adalah mahasiswa Teknik Informatika
                yang memiliki ketertarikan pada bidang
                pemrograman, pengembangan website, database,
                dan teknologi informasi. Saya terus
                mengembangkan kemampuan dalam membangun
                aplikasi serta mempelajari teknologi baru
                untuk menyelesaikan berbagai permasalahan
                melalui solusi digital.

                {"\n\n"}

                Selain di bidang teknologi informasi, saya
                juga memiliki ketertarikan terhadap dunia
                konstruksi dan pekerjaan industri, khususnya
                Mechanical Rotating, Pipe Fitter, dan Fitter
                Structure. Saya mempelajari pentingnya
                ketelitian, pemahaman teknis, kerja sama tim,
                serta penerapan prosedur keselamatan dalam
                pekerjaan konstruksi.

                {"\n\n"}

                Dengan memadukan pengetahuan teknologi
                informasi dan pemahaman bidang konstruksi,
                saya ingin terus mengembangkan keterampilan,
                menambah pengalaman, serta berkontribusi
                dalam pengembangan aplikasi dan pekerjaan
                industri yang lebih efektif, terstruktur,
                dan efisien.
              </p>

              <div className="about-highlight">
                <div className="about-badge">
                  <i className="fas fa-code" />
                  <span>Pemrograman</span>
                </div>

                <div className="about-badge">
                  <i className="fas fa-globe" />
                  <span>Web Development</span>
                </div>

                <div className="about-badge">
                  <i className="fas fa-database" />
                  <span>Database</span>
                </div>

                <div className="about-badge">
                  <i className="fas fa-pen-ruler" />
                  <span>UI/UX Design</span>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* PROJECTS */}
        <section className="section reveal" id="projects">
          <h2 className="section-title">
            My <span>Projects</span>
          </h2>

          <div className="projects-grid">
            {projects.map((project, index) => (
              <article
                className={`project-card reveal reveal-delay-${
                  (index % 4) + 1
                }`}
                key={project.title}
              >
                <div className="project-icon">
                  <i className={`fas ${project.icon}`} />
                </div>

                <h3>{project.title}</h3>
                <p>{project.text}</p>
              </article>
            ))}
          </div>
        </section>

        {/* SKILLS */}
        <section className="skills-section" id="skills">
          <div className="skills-inner">
            <div className="skills-heading">
              <div className="skills-heading-left">
                <div className="skills-mini-line" />

                <h2 className="skills-title">
                  My <span>Skills</span>
                </h2>

                <p className="skills-description">
                  Berikut adalah beberapa keterampilan yang
                  saya pelajari dan gunakan dalam pengembangan
                  website, pemrograman, database, serta
                  pengembangan aplikasi.
                </p>
              </div>

              <div className="skills-note">
                Keep Learning
                <br />
                Keep Growing
              </div>
            </div>

            <div className="skills-grid">
              {skills.map(
                ([name, percent, cls, icon]) => (
                  <div
                    className="skill-card reveal"
                    key={name}
                  >
                    <div className={`skill-icon ${cls}`}>
                      {icon ? (
                        <i className={`fab ${icon}`} />
                      ) : (
                        name
                      )}
                    </div>

                    <div className="skill-info">
                      <div className="skill-top">
                        <div className="skill-name">
                          {name}
                        </div>
                      </div>
                    </div>
                  </div>
                )
              )}
            </div>
          </div>
        </section>

        {/* EDUCATION */}
        <section
          className="education-section reveal"
          id="education"
        >
          <div className="education-container">
            <div className="education-top">
              <div className="education-left">
                <img
                  src="/aditya.jpg.png"
                  className="education-photo"
                  alt="Muhammad Aditya Januar"
                />

                <div className="education-tag">
                  <i className="fas fa-graduation-cap" />
                  {" "}PENDIDIKAN
                </div>

                <h3 className="education-degree">
                  Sarjana Komputer
                </h3>

                <p className="education-campus">
                  Sekolah Tinggi Teknologi Bontang
                </p>

                <p className="education-year">
                  2024 - 2028
                </p>

                <p className="education-gpa">
                  IPK 3,70 / 4,00
                </p>

                <h4 className="education-competency-title">
                  Bidang Kompetensi
                </h4>

                <ul className="education-competency">
                  {competencies.map((item) => (
                    <li key={item}>{item}</li>
                  ))}
                </ul>
              </div>

              <div className="education-right">
                <span className="education-dot one" />
                <span className="education-dot two" />
                <span className="education-dot three" />

                <h2 className="education-heading">
                  EDUCATION
                </h2>

                <img
                  src="/aditya.jpg.png"
                  className="education-main-photo"
                  alt="Muhammad Aditya Januar"
                />
              </div>
            </div>
          </div>
        </section>

        {/* CONTACT */}
        <section
          className="contact-section reveal"
          id="contact"
        >
          <h2>Let's Connect</h2>

          <p>
            Terima kasih sudah mengunjungi portofolio saya.
          </p>

          <div className="social">
            <a
              href="https://www.instagram.com/muhmmdadiitya?exln=MWYxMW50bGRubDFnaA%3D%3D&utm_source=qr"
              target="_blank"
              rel="noreferrer"
              title="Instagram"
              aria-label="Instagram"
            >
              <i className="fab fa-instagram" />
            </a>

            <a
              href="https://github.com/MuhammadAdityaJanuar"
              target="_blank"
              rel="noreferrer"
              title="GitHub"
              aria-label="GitHub"
            >
              <i className="fab fa-github" />
            </a>

            <a
              href="https://www.linkedin.com/in/muhammad-aditya-26a027348/"
              target="_blank"
              rel="noreferrer"
              title="LinkedIn"
              aria-label="LinkedIn"
            >
              <i className="fab fa-linkedin-in" />
            </a>

            <a
              href="mailto:januaraditya830@gmail.com"
              title="Email"
              aria-label="Email"
            >
              <i className="fas fa-envelope" />
            </a>
          </div>
        </section>
      </main>

      <footer className="footer">
        © {new Date().getFullYear()} Muhammad Aditya Januar
        {" "}· PORTOFOLIO
      </footer>
    </>
  );
}

export default App;
