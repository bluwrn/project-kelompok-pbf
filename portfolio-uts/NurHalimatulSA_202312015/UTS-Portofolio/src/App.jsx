import React from 'react';
import { portfolioData } from './data/portfolioData';
import { Navbar } from './components/Navbar';
import { Hero } from './components/Hero';
import { About } from './components/About';
import { Services } from './components/Services';
import { Projects } from './components/Projects';
import { ExperienceSkills } from './components/ExperienceSkills';
import { Footer } from './components/Footer';

function App() {
  const { profile, about, services, projects, experiences, education, skills, socialLinks } = portfolioData;

  return (
    <div className="min-h-screen bg-[#FAF8F5] text-[#1E1E1E] selection:bg-[#2563EB] selection:text-white antialiased">
      {/* 1. Header Navigation */}
      <Navbar profile={profile} />

      {/* Main Content Area */}
      <main>
        {/* 2. Hero Section */}
        <Hero profile={profile} />

        {/* 3. About Me Section */}
        <About about={about} />

        {/* 4. Services ("What I Do") Section */}
        <Services services={services} />

        {/* 5. Selected Work (Projects Showcase) */}
        <Projects projects={projects} />

        {/* 6. Experience, Education & Skills (3-Column Layout) */}
        <ExperienceSkills 
          experiences={experiences} 
          education={education} 
          skills={skills} 
        />
      </main>

      {/* 7. Footer / Contact Banner */}
      <Footer profile={profile} socialLinks={socialLinks} />
    </div>
  );
}

export default App;
