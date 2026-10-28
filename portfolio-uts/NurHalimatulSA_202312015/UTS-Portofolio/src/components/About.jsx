import React from 'react';
import { WavyUnderline, ScribbleLoop } from './Doodles';
import { Heart, Users, Code2, Sparkles } from 'lucide-react';

export const About = ({ about }) => {
  return (
    <section id="about" className="py-16 md:py-24 relative overflow-hidden">
      {/* Decorative scribbles */}
      <div className="absolute right-8 top-12 opacity-30 pointer-events-none hidden md:block">
        <ScribbleLoop className="w-24 h-20 text-[#2563EB]" />
      </div>

      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Playful Neubrutalist Card Container */}
        <div className="relative bg-white rounded-3xl border-2 border-[#1E1E1E] shadow-sketch-xl p-8 sm:p-12 transition-transform duration-300">
          
          {/* Section Pin Accent */}
          <div className="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-[#FEF08A] border-2 border-[#1E1E1E] shadow-sketch text-xs font-bold uppercase tracking-wider flex items-center gap-1.5">
            <Sparkles className="w-3.5 h-3.5 text-[#2563EB]" />
            Story Time
          </div>

          <div className="text-center max-w-2xl mx-auto space-y-6">
            
            {/* Heading with Handwritten Wavy Underline */}
            <div className="inline-flex flex-col items-center">
              <h2 className="text-3xl sm:text-5xl font-black font-display tracking-tight text-[#1E1E1E]">
                {about.title}
              </h2>
              <WavyUnderline className="w-36 sm:w-48 h-4 text-[#2563EB] mt-1" />
            </div>

            {/* Description Text */}
            <p className="text-lg sm:text-xl text-gray-700 font-normal leading-relaxed">
              {about.description}
            </p>

            {/* Playful Values / Fun badges */}
            <div className="pt-6 flex flex-wrap items-center justify-center gap-3">
              <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#DCFCE7] border-2 border-[#1E1E1E] shadow-sketch text-xs sm:text-sm font-bold text-[#1E1E1E] hover:rotate-1 transition-transform">
                <Code2 className="w-4 h-4 text-emerald-700" />
                <span>Problem Solving</span>
              </div>
              <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#EDE9FE] border-2 border-[#1E1E1E] shadow-sketch text-xs sm:text-sm font-bold text-[#1E1E1E] hover:-rotate-1 transition-transform">
                <Users className="w-4 h-4 text-purple-700" />
                <span>Team Collaboration</span>
              </div>
              <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#FFEDD5] border-2 border-[#1E1E1E] shadow-sketch text-xs sm:text-sm font-bold text-[#1E1E1E] hover:rotate-2 transition-transform">
                <Heart className="w-4 h-4 text-rose-600 fill-rose-600" />
                <span>Supportive</span>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section>
  );
};
