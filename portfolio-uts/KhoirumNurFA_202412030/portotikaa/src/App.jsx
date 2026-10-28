import { useEffect } from 'react';
import Backdrop from './components/Backdrop';
import Navbar from './sections/Navbar';
import Hero from './sections/Hero';
import About from './sections/About';
import Skills from './sections/Skills';
import Projects from './sections/Projects';
import Connect from './sections/Connect';
import Footer from './sections/Footer';

export default function App() {
  // Animasi muncul saat scroll (Hero dikecualikan)
  useEffect(() => {
    if (!('IntersectionObserver' in window)) return;
    const sections = document.querySelectorAll('main section:not(:first-of-type)');
    const observer = new IntersectionObserver(
      (entries) =>
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        }),
      { threshold: 0.1 }
    );
    sections.forEach((el) => {
      el.classList.add('reveal');
      observer.observe(el);
    });
    return () => observer.disconnect();
  }, []);

  return (
    <>
      <Backdrop />
      <Navbar />
      <main style={{ position: 'relative', zIndex: 1 }}>
        <Hero />
        <About />
        <Skills />
        <Projects />
        <Connect />
      </main>
      <Footer />
    </>
  );
}
