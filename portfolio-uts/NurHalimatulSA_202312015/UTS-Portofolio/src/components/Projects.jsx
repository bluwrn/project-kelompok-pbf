import React from 'react';
import { ExternalLink, ArrowRight, Sparkles } from 'lucide-react';
import { SparkleDoodle } from './Doodles';
import { GithubIcon } from './SocialIcons';

export const Projects = ({ projects }) => {
  return (
    <section id="projects" className="py-16 md:py-24 relative overflow-hidden bg-[#FAF8F5]">
      {/* Background Scribble Accents */}
      <div className="absolute top-10 right-10 opacity-30 pointer-events-none hidden md:block">
        <SparkleDoodle className="w-8 h-8 text-[#2563EB]" />
      </div>

      <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        {/* Section Header */}
        <div className="text-center mb-14 space-y-3">
          <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#FEF08A] border-2 border-[#1E1E1E] shadow-sketch text-xs font-bold uppercase tracking-wider">
            <Sparkles className="w-3.5 h-3.5 text-[#2563EB]" />
            <span>Portfolio</span>
          </div>

          <h2 className="text-4xl sm:text-6xl font-black font-display tracking-tight text-[#1E1E1E]">
            Selected Project
          </h2>

          <p className="font-handwriting text-xl sm:text-2xl text-gray-700 font-bold max-w-xl mx-auto">
            "Here are a few things I've built with passion and lots of coffee ☕"
          </p>
        </div>

        {/* Project Cards Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10">
          {projects.map((project) => (
            <div
              key={project.id}
              className="group relative bg-white rounded-3xl border-2 border-[#1E1E1E] shadow-sketch-lg hover:shadow-sketch-xl hover:-translate-y-2 hover:-translate-x-1 transition-all duration-300 p-5 sm:p-6 flex flex-col justify-between"
            >
              <div>
                {/* Project Image Frame */}
                <div className="relative w-full aspect-16/10 rounded-2xl overflow-hidden border-2 border-[#1E1E1E] bg-[#FAF8F5] mb-5">
                  <img
                    src={project.image}
                    alt={project.title}
                    className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                  />

                  {/* Floating Badge Tags */}
                  <div className="absolute top-3 left-3 flex flex-wrap gap-1.5 max-w-[90%]">
                    {(project.badges || [project.category]).map((badge, bIdx) => (
                      <span
                        key={bIdx}
                        className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/95 backdrop-blur-xs border-2 border-[#1E1E1E] shadow-sketch text-xs font-bold text-[#1E1E1E]"
                      >
                        <span className={`w-2 h-2 rounded-full ${project.dotColor || 'bg-blue-500'}`}></span>
                        {badge}
                      </span>
                    ))}
                  </div>
                </div>

                {/* Title & Description */}
                <div className="space-y-2.5 mb-4">
                  <h3 className="text-2xl sm:text-3xl font-black font-display tracking-tight text-[#1E1E1E] group-hover:text-[#2563EB] transition-colors">
                    {project.title}
                  </h3>
                  <p className="text-sm sm:text-base text-gray-700 font-medium leading-relaxed">
                    {project.description}
                  </p>
                </div>

                {/* Tech Stack Pills */}
                {project.techStack && (
                  <div className="flex flex-wrap gap-1.5 mb-6">
                    {project.techStack.map((tech, tIdx) => (
                      <span
                        key={tIdx}
                        className="px-2.5 py-1 rounded-lg bg-[#FAF8F5] border border-[#1E1E1E] font-mono text-xs font-semibold text-gray-800"
                      >
                        {tech}
                      </span>
                    ))}
                  </div>
                )}
              </div>

              {/* Link CTA to GitHub */}
              <div className="pt-4 flex items-center justify-between border-t-2 border-gray-100">
                <span className="font-handwriting text-base font-bold text-gray-500">
                  Open Source ⚡
                </span>
                <a
                  href={project.link}
                  target="_blank"
                  rel="noreferrer"
                  className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#FAF8F5] text-[#1E1E1E] font-bold text-sm border-2 border-[#1E1E1E] shadow-sketch hover:bg-[#2563EB] hover:text-white hover:shadow-sketch-lg active:translate-y-0.5 transition-all duration-150"
                >
                  <GithubIcon className="w-4 h-4" />
                  <span>GitHub</span>
                  <ExternalLink className="w-3.5 h-3.5" />
                </a>
              </div>
            </div>
          ))}
        </div>

        {/* Bottom Centered Pill Button */}
        <div className="mt-14 text-center">
          <a
            href="https://github.com/the1onlyJillian"
            target="_blank"
            rel="noreferrer"
            className="inline-flex items-center gap-2.5 px-8 py-4 rounded-full bg-[#FEF08A] text-[#1E1E1E] font-extrabold text-base border-2 border-[#1E1E1E] shadow-sketch-lg hover:shadow-sketch-xl hover:-translate-y-1 hover:bg-[#FDE047] active:translate-y-0.5 transition-all duration-150"
          >
            <GithubIcon className="w-5 h-5 text-[#1E1E1E]" />
            <span>See All Project</span>
            <ArrowRight className="w-5 h-5" />
          </a>
        </div>

      </div>
    </section>
  );
};
