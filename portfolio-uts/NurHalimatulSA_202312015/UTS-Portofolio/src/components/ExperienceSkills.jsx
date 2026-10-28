import React from 'react';
import { Briefcase, GraduationCap, Wrench, Sparkles } from 'lucide-react';
import { GraduationCapDoodle, StarburstDoodle } from './Doodles';

export const ExperienceSkills = ({ experiences, education, skills }) => {
  // Pastel color rotating pool for skill pills
  const pillColors = [
    'bg-[#DCFCE7] hover:bg-emerald-200',
    'bg-[#EDE9FE] hover:bg-purple-200',
    'bg-[#FEF08A] hover:bg-yellow-200',
    'bg-[#FFEDD5] hover:bg-orange-200',
    'bg-white hover:bg-blue-100',
  ];

  return (
    <section id="experience" className="py-16 md:py-24 relative overflow-hidden bg-[#FAF8F5]">
      <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Section Header */}
        <div className="text-center mb-14 space-y-3">
          <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white border-2 border-[#1E1E1E] shadow-sketch text-xs font-bold uppercase tracking-wider">
            <Sparkles className="w-3.5 h-3.5 text-[#2563EB]" />
            <span>Background & Stack</span>
          </div>

          <h2 className="text-4xl sm:text-6xl font-black font-display tracking-tight text-[#1E1E1E]">
            Journey & Skills
          </h2>

          <p className="text-base sm:text-lg text-gray-600 font-medium max-w-lg mx-auto">
            A track record of continuous learning, leadership, and technical capability.
          </p>
        </div>

        {/* 3-Column Layout */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          
          {/* Column 1: Experience */}
          <div className="bg-white rounded-3xl border-2 border-[#1E1E1E] shadow-sketch-lg p-6 sm:p-7 flex flex-col justify-between hover:shadow-sketch-xl transition-all duration-300">
            <div>
              {/* Header */}
              <div className="flex items-center gap-3 mb-6 pb-4 border-b-2 border-gray-100">
                <div className="p-2.5 rounded-2xl bg-[#DCFCE7] border-2 border-[#1E1E1E] shadow-sketch">
                  <Briefcase className="w-5 h-5 text-emerald-900" />
                </div>
                <div>
                  <h3 className="text-2xl font-black font-display text-[#1E1E1E]">
                    Experience
                  </h3>
                  <p className="font-handwriting text-base font-bold text-gray-500">
                    Where I've built impact
                  </p>
                </div>
              </div>

              {/* Experience Items */}
              <div className="space-y-4">
                {experiences.map((exp, index) => (
                  <div
                    key={index}
                    className="p-4 rounded-2xl bg-[#FAF8F5] border-2 border-[#1E1E1E] shadow-sketch hover:-translate-y-0.5 transition-transform"
                  >
                    <div className="flex items-center justify-between gap-2 mb-1.5">
                      <span className="text-xs font-black uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-white border border-[#1E1E1E]">
                        {exp.year}
                      </span>
                      <span className="flex items-center gap-1.5 text-xs font-semibold text-gray-600">
                        <span className={`w-2.5 h-2.5 rounded-full ${exp.statusColor || 'bg-green-500'}`}></span>
                        {exp.status || 'Active'}
                      </span>
                    </div>

                    <h4 className="text-lg font-bold font-display text-[#1E1E1E]">
                      {exp.role}
                    </h4>
                    <p className="text-sm font-semibold text-[#2563EB]">
                      @{exp.company}
                    </p>
                    {exp.description && (
                      <p className="text-xs text-gray-600 mt-2 leading-relaxed font-normal">
                        {exp.description}
                      </p>
                    )}
                  </div>
                ))}
              </div>
            </div>

            <div className="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between text-xs font-bold text-gray-500">
              <span className="font-handwriting text-lg text-emerald-700">Ready for next challenge ✨</span>
            </div>
          </div>

          {/* Column 2: Education */}
          <div className="bg-white rounded-3xl border-2 border-[#1E1E1E] shadow-sketch-lg p-6 sm:p-7 flex flex-col justify-between hover:shadow-sketch-xl transition-all duration-300">
            <div>
              {/* Header */}
              <div className="flex items-center gap-3 mb-6 pb-4 border-b-2 border-gray-100">
                <div className="p-2.5 rounded-2xl bg-[#EDE9FE] border-2 border-[#1E1E1E] shadow-sketch">
                  <GraduationCap className="w-5 h-5 text-purple-900" />
                </div>
                <div>
                  <h3 className="text-2xl font-black font-display text-[#1E1E1E]">
                    Education
                  </h3>
                  <p className="font-handwriting text-base font-bold text-gray-500">
                    Academic foundation
                  </p>
                </div>
              </div>

              {/* Education Items */}
              <div className="space-y-4">
                {education.map((edu, index) => (
                  <div
                    key={index}
                    className="p-4 rounded-2xl bg-[#FAF8F5] border-2 border-[#1E1E1E] shadow-sketch hover:-translate-y-0.5 transition-transform"
                  >
                    <span className="inline-block text-xs font-black uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-white border border-[#1E1E1E] mb-2">
                      {edu.year}
                    </span>
                    <h4 className="text-lg font-bold font-display text-[#1E1E1E]">
                      {edu.degree}
                    </h4>
                    <p className="text-sm font-semibold text-purple-700">
                      {edu.institution}
                    </p>
                    {edu.description && (
                      <p className="text-xs text-gray-600 mt-2 leading-relaxed font-normal">
                        {edu.description}
                      </p>
                    )}
                  </div>
                ))}
              </div>
            </div>

            {/* Graduation Cap Doodle SVG at the bottom */}
            <div className="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
              <span className="font-handwriting text-lg font-bold text-[#1E1E1E]">
                Lifelong learner 🎓
              </span>
              <div className="animate-float">
                <GraduationCapDoodle className="w-12 h-12 text-[#1E1E1E]" />
              </div>
            </div>
          </div>

          {/* Column 3: Explore */}
          <div className="bg-white rounded-3xl border-2 border-[#1E1E1E] shadow-sketch-lg p-6 sm:p-7 flex flex-col justify-between hover:shadow-sketch-xl transition-all duration-300 relative">
            <div>
              {/* Header */}
              <div className="flex items-center gap-3 mb-6 pb-4 border-b-2 border-gray-100">
                <div className="p-2.5 rounded-2xl bg-[#FEF08A] border-2 border-[#1E1E1E] shadow-sketch">
                  <Wrench className="w-5 h-5 text-yellow-900" />
                </div>
                <div>
                  <h3 className="text-2xl font-black font-display text-[#1E1E1E]">
                    Explore
                  </h3>
                  <p className="font-handwriting text-base font-bold text-gray-500">
                    Tools of the trade
                  </p>
                </div>
              </div>

              {/* Skills Pill Tags */}
              <div className="flex flex-wrap gap-2.5">
                {skills.map((skill, index) => {
                  const colorClass = pillColors[index % pillColors.length];
                  return (
                    <span
                      key={index}
                      className={`px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-bold border-2 border-[#1E1E1E] shadow-sketch cursor-default hover:scale-105 active:scale-95 transition-all duration-150 ${colorClass}`}
                    >
                      {skill}
                    </span>
                  );
                })}
              </div>
            </div>

            {/* Starburst Doodle SVG at the bottom */}
            <div className="mt-8 pt-4 border-t border-gray-100 flex items-center justify-between">
              <span className="font-handwriting text-lg font-bold text-[#2563EB]">
                Constantly evolving ⭐
              </span>
              <div className="animate-wiggle">
                <StarburstDoodle className="w-10 h-10 text-[#FEF08A]" />
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
  );
};
