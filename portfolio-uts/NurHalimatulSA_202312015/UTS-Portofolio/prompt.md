# Playful Handwritten / Neomorphic Portfolio Web Template

## Role & Goal

You are a World-Class Frontend Developer and UI/UX Designer.
Build a modern, highly interactive, and playful personal portfolio web application in **React.js** using **Tailwind CSS**, **Lucide React** icons, and **Framer Motion** (or CSS animations) based on the provided design spec.

**CRITICAL REQUIREMENT (Data-Driven Architecture):**
The application MUST be fully template-driven. All personal details, text content, services, project lists, experiences, education, and skills MUST be stored in a single, well-structured JavaScript data file (e.g., `src/data/portfolioData.js`). The UI components should map dynamically over this data so the user can easily customize or update their content by editing just one file without touching any layout components.

---

## 🎨 Visual Identity & Theme

* **Style:** Playful Neubrutalism / Hand-drawn Doodle Aesthetics. Clean off-white background with whimsical decorative elements, playful typography accents, floating badges, handwritten-style notes, scribbles, and doodle SVGs.

* **Color Palette:**
  * **Background:** Warm Off-White / Cream (`#FBF9F1` or `#FAF8F5`).
  * **Primary Text & Dark Accents:** Deep Charcoal / Soft Black (`#1E1E1E`).
  * **Accent Colors:**
    * Electric Royal Blue (`#2563EB`) – For big bold typography & main buttons.
    * Soft Pastel Green (`#DCFCE7`) – For highlight cards & badges.
    * Soft Lavender / Purple (`#EDE9FE`) – For tags & doodle card background.
    * Pastel Coral / Orange (`#FFEDD5`) – For badges & accents.
    * Muted Pastel Yellow (`#FEF08A`) – For section highlights.

* **Typography Setup:**
  * **Headlines:** Bold Display Font or Heavy Serif (e.g., *Playfair Display*, *Plus Jakarta Sans*, or *Outfit*).
  * **Handwritten Accents:** Cursive Script (e.g., *Caveat*, *Kalam*, or *Architects Daughter*).
  * **Body Text:** Clean Sans-serif (*Inter* or *Plus Jakarta Sans*).

---

## 📁 Data Structure Specification (`src/data/portfolioData.js`)

Create a dedicated `portfolioData.js` file with this exact structure (populated with default placeholder values matching the reference design):

```javascript
export const portfolioData = {
  profile: {
    name: "Shoaib Hamza",
    roleBadge: "Full-Stack Developer",
    editionBadge: "2025 Edition",
    headline: "Port-folio",
    tagline: "I build digital products that are fast, scalable and thoughtfully designed.",
    avatarUrl: "https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=800",
    stickyNoteText: "Code. Create. Elevate.",
    location: "Lahore, Pakistan",
    email: "shoaib.hamza.dev@gmail.com",
    website: "shoaibhamza.dev",
    linkedin: "linkedin.com/in/shoaib-hamza",
    github: "github.com/shoaib-hamza",
    cvUrl: "#"
  },

  about: {
    title: "About me!",
    description: "I'm a full-stack developer who loves turning ideas into real-world web and mobile applications. I enjoy solving problems, writing clean code and creating smooth user experiences."
  },

  services: [
    {
      id: 1,
      title: "Web Development",
      description: "Building responsive and performant websites using modern stacks.",
      icon: "Code", // Lucide icon identifier
      color: "green"
    },
    {
      id: 2,
      title: "Mobile Development",
      description: "Cross-platform mobile apps with clean UI and smooth performance.",
      icon: "Smartphone",
      color: "purple"
    },
    {
      id: 3,
      title: "Backend Development",
      description: "RESTful APIs, databases and scalable server-side applications.",
      icon: "Database",
      color: "yellow"
    },
    {
      id: 4,
      title: "UI/UX Design",
      description: "Designing intuitive and beautiful interfaces that users love.",
      icon: "Layout",
      color: "coral"
    }
  ],

  projects: [
    {
      id: 1,
      title: "Taskly",
      category: "Productivity",
      description: "Task management app to organize your work smartly.",
      image: "https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&q=80&w=600",
      link: "#",
      dotColor: "bg-green-500"
    },
    {
      id: 2,
      title: "ShopEase",
      category: "E-Commerce",
      description: "Modern e-commerce platform with secure checkout.",
      image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=600",
      link: "#",
      dotColor: "bg-orange-500"
    },
    {
      id: 3,
      title: "FinTrack",
      category: "Finance",
      description: "Personal finance tracker to manage income & expenses.",
      image: "https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=600",
      link: "#",
      dotColor: "bg-blue-500"
    },
    {
      id: 4,
      title: "Wonderly",
      category: "Travel",
      description: "Explore places, plan trips and discover amazing deals.",
      image: "https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&q=80&w=600",
      link: "#",
      dotColor: "bg-purple-500"
    }
  ],

  experiences: [
    {
      year: "2023 - Present",
      role: "Full-Stack Developer",
      company: "Freelance",
      statusColor: "bg-green-500"
    },
    {
      year: "2022 - 2023",
      role: "Junior Developer",
      company: "CodeWingz",
      statusColor: "bg-yellow-500"
    },
    {
      year: "2021 - Internship",
      role: "Web Development Intern",
      company: "DevHouse",
      statusColor: "bg-green-500"
    }
  ],

  education: [
    {
      year: "2022 - 2026",
      degree: "BS Software Engineering",
      institution: "UMT Lahore"
    },
    {
      year: "2020 - 2022",
      degree: "FSc Pre-Engineering",
      institution: "Punjab College"
    }
  ],

  skills: [
    "HTML", "CSS", "JavaScript", "React", "Next.js", "Node.js",
    "MongoDB", "Firebase", "Tailwind CSS", "Git", "Figma", "UI/UX"
  ],

  socialLinks: {
    github: "https://github.com",
    linkedin: "https://linkedin.com",
    twitter: "https://twitter.com",
    instagram: "https://instagram.com"
  }
};
```

---

## 🧩 Page Structure & Components

### 1. Navigation Bar (Header)
* Render logo dynamically using `profile.name`.
* Navigation items: `About`, `Work`, `Skills`, `Experience`, `Contact`.
* Smooth scroll navigation on click.

### 2. Hero Section
* **Left Column:**
  * Dynamic `profile.editionBadge` inside oval border with arrow doodle.
  * Main title `profile.headline` with handwritten styling accents.
  * Pill badge with `profile.roleBadge`.
  * Dynamic `profile.tagline`.
  * CTA Buttons: `"Let's Work Together ↗"` and `"Download CV ⬇"` linked to `profile.cvUrl`.
* **Right Column:**
  * Photo frame rendering `profile.avatarUrl` with soft rounded corners and hand-drawn doodles behind it.
  * Floating smiley badge overlay.
  * Info Card dynamically rendering `profile.name`, `profile.location`, `profile.email`, `profile.website`, `profile.linkedin`.
  * Sticky note sticker top-right displaying `profile.stickyNoteText` with a slight rotation angle.

### 3. About Me Section
* Heading from `about.title` with handwritten wavy underline SVG.
* Text content rendered from `about.description`.

### 4. Services ("What I Do")
* Section title: **"What I Do"**.
* Map through `services` array to build 4 responsive cards with matching color schemes (Green, Purple, Yellow, Coral).

### 5. Selected Work (Projects Showcase)
* Subtitle: *"Here are a few things I've built with passion and lots of coffee ☕"*.
* Map through `projects` array to render project cards (Image, Category Badge, Title, Description, Link button).
* Bottom centered pill button `"See All Projects →"`.

### 6. Experience, Education & Skills (3-Column Layout)
* **Column 1 (Experience):** Dynamic map through `experiences` array.
* **Column 2 (Education):** Dynamic map through `education` array with graduation cap doodle SVG at the bottom.
* **Column 3 (Skills):** Dynamic map through `skills` array rendering pill tags + starburst doodle SVG.

### 7. Footer / Contact Banner
* Warm light background container with curved border & hand-drawn scribble background elements.
* Catchy Call-To-Action Heading: `"Have a project in mind? Let's build something amazing together!"`.
* Main CTA button: `"Get In Touch →"`.
* Social media icons linking dynamically to `socialLinks`.

---

## ⚡ Interactions & Animations

* **Hover Effects:** Smooth scaling (`scale-105`) and shadow elevation on interactive elements.
* **Entry Animations:** Framer Motion scroll triggers (`fadeIn`, `slideUp`).
* **Micro-Animations:** Gentle floating keyframe animations on sparkle, star, and arrow doodle SVGs.
* **Responsiveness:** Full mobile-first responsiveness (stacked single column on mobile, structured grid on desktop).

## 🚀 Technical Architecture

* Single Data Source (`src/data/portfolioData.js`).
* Modular React Components (`Navbar.jsx`, `Hero.jsx`, `About.jsx`, `Services.jsx`, `Projects.jsx`, `ExperienceSkills.jsx`, `Footer.jsx`).
* Clean Tailwind CSS styling and Lucide React icons.