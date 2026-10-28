import { 
  ArrowUpRight, 
  Download, 
  MapPin, 
  Mail, 
  Globe,
  Phone
} from 'lucide-react';
import { GithubIcon, LinkedinIcon } from './SocialIcons';

import { 
  ArrowDoodle, 
  SmileyBadge, 
  SparkleDoodle, 
  TapeDoodle, 
  WavyUnderline,
  ScribbleLoop
} from './Doodles';

export const Hero = ({ profile }) => {
  return (
    <section id="top" className="relative pt-12 pb-20 md:pt-16 md:pb-28 overflow-hidden">
      {/* Decorative Background Scribbles */}
      <div className="absolute top-8 left-10 opacity-40 pointer-events-none hidden lg:block animate-float">
        <ScribbleLoop className="w-28 h-20 text-[#2563EB]/40" />
      </div>
      <div className="absolute top-1/2 right-4 opacity-30 pointer-events-none hidden md:block animate-float-reverse">
        <SparkleDoodle className="w-10 h-10 text-[#FEF08A]" />
      </div>

      <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
          
          {/* Left Column */}
          <div className="lg:col-span-7 flex flex-col items-start space-y-6">
            
            {/* Edition Badge & Doodle Arrow */}
            <div className="relative inline-flex items-center gap-3">
              <div className="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#FEF08A] border-2 border-[#1E1E1E] shadow-sketch text-xs sm:text-sm font-bold tracking-wide uppercase">
                <span className="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                <span>{profile.editionBadge}</span>
              </div>

              {/* Arrow doodle with handwritten comment */}
              <div className="relative hidden sm:flex items-center">
                <ArrowDoodle className="w-10 h-8 text-[#1E1E1E] transform -rotate-12 animate-wiggle" />
                <span className="font-handwriting text-lg text-[#2563EB] font-bold rotate-2 -ml-1">
                  handcrafted with care!
                </span>
              </div>
            </div>

            {/* Role Badge */}
            <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#DCFCE7] border-2 border-[#1E1E1E] text-xs sm:text-sm font-bold shadow-sketch">
              <span className="w-2 h-2 rounded-full bg-[#1E1E1E]"></span>
              <span>{profile.roleBadge}</span>
            </div>

            {/* Main Headline */}
            <div className="relative">
              <h1 className="text-5xl sm:text-7xl lg:text-8xl font-black font-display tracking-tight text-[#1E1E1E] leading-[0.95]">
                {profile.headline.split('-').map((part, idx) => (
                  <span key={idx}>
                    {idx === 0 ? (
                      <span className="relative inline-block">
                        {part}
                        <span className="text-[#2563EB]">-</span>
                      </span>
                    ) : (
                      <span className="text-[#2563EB] relative inline-block">
                        {part}
                      </span>
                    )}
                  </span>
                ))}
              </h1>
              
              {/* Handwritten floating accent */}
              <div className="mt-2 flex items-center gap-2">
                <WavyUnderline className="w-48 sm:w-64 h-5 text-[#2563EB]" />
                <span className="font-handwriting text-2xl text-[#1E1E1E] -rotate-3 font-bold hidden sm:inline">
                  welcome to my world 🚀
                </span>
              </div>
            </div>

            {/* Tagline */}
            <p className="text-lg sm:text-xl text-gray-700 max-w-xl font-medium leading-relaxed">
              {profile.tagline}
            </p>

            {/* Call To Action Buttons */}
            <div className="pt-2 flex flex-wrap items-center gap-4 w-full sm:w-auto">
              <a
                href="#contact"
                className="group w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full bg-[#2563EB] text-white font-bold text-base border-2 border-[#1E1E1E] shadow-sketch-lg hover:shadow-sketch-xl hover:-translate-y-0.5 active:translate-y-1 transition-all duration-150"
              >
                <span>Let's Work Together</span>
                <ArrowUpRight className="w-5 h-5 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" />
              </a>

              <a
                href={profile.cvUrl}
                download
                className="group w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full bg-[#FAF8F5] text-[#1E1E1E] font-bold text-base border-2 border-[#1E1E1E] shadow-sketch hover:shadow-sketch-lg hover:bg-[#DCFCE7] active:translate-y-1 transition-all duration-150"
              >
                <Download className="w-5 h-5 group-hover:translate-y-0.5 transition-transform" />
                <span>Download CV</span>
              </a>
            </div>

            {/* Quick social links row */}
            <div className="pt-2 flex items-center gap-3 text-sm text-gray-600 font-semibold">
              <span className="font-handwriting text-xl text-gray-500">find me on:</span>
              <a 
                href={profile.github?.startsWith('http') ? profile.github : `https://${profile.github}`} 
                target="_blank" 
                rel="noreferrer"
                className="p-2 rounded-lg bg-white border-2 border-[#1E1E1E] shadow-sketch hover:bg-[#EDE9FE] transition-colors"
                aria-label="GitHub"
              >
                <GithubIcon className="w-4 h-4 text-[#1E1E1E]" />
              </a>
              <a 
                href={profile.linkedin?.startsWith('http') ? profile.linkedin : `https://${profile.linkedin}`} 
                target="_blank" 
                rel="noreferrer"
                className="p-2 rounded-lg bg-white border-2 border-[#1E1E1E] shadow-sketch hover:bg-[#EDE9FE] transition-colors"
                aria-label="LinkedIn"
              >
                <LinkedinIcon className="w-4 h-4 text-[#1E1E1E]" />
              </a>
            </div>

          </div>

          {/* Right Column: Photo Frame, Sticky Note & Info Card */}
          <div className="lg:col-span-5 relative flex flex-col items-center">
            
            {/* Background Blob/Sketch layer */}
            <div className="absolute -inset-4 bg-[#EDE9FE] rounded-[2.5rem] border-2 border-[#1E1E1E] shadow-sketch-lg -rotate-2 -z-10"></div>
            
            {/* Main Interactive Photo Card */}
            <div className="relative w-full max-w-md bg-[#FAF8F5] rounded-[2rem] border-2 border-[#1E1E1E] shadow-sketch-xl p-5 sm:p-6 rotate-1 hover:rotate-0 transition-transform duration-300">
              
              {/* Sticky Note Top-Right */}
              <div className="absolute -top-6 -right-3 z-20">
                <TapeDoodle className="mx-auto -mb-2 z-30" />
                <div className="bg-[#FEF08A] border-2 border-[#1E1E1E] shadow-sketch p-3 rounded-lg transform rotate-6 max-w-[150px] text-center">
                  <p className="font-handwriting text-base sm:text-lg font-bold text-[#1E1E1E] leading-tight">
                    📌 "{profile.stickyNoteText}"
                  </p>
                </div>
              </div>

              {/* Photo Frame Container */}
              <div className="relative rounded-2xl overflow-hidden border-2 border-[#1E1E1E] bg-[#FAF8F5] aspect-4/3 sm:aspect-square mb-5 group">
                <img
                  src={profile.avatarUrl}
                  alt={profile.name}
                  className="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-60"></div>

                {/* Floating Smiley Badge Overlay */}
                <div className="absolute bottom-3 left-3 animate-float">
                  <SmileyBadge className="w-12 h-12 sm:w-14 sm:h-14" />
                </div>

                <div className="absolute bottom-3 right-3 px-3 py-1 bg-white/90 backdrop-blur-xs rounded-full border border-[#1E1E1E] text-xs font-bold shadow-xs">
                  👋 Available for hire
                </div>
              </div>

              {/* Info Card - Neobrutalist Info Panel */}
              <div className="bg-white rounded-xl border-2 border-[#1E1E1E] p-4 shadow-sketch space-y-2.5 text-xs sm:text-sm">
                
                <div className="flex items-center justify-between border-b border-gray-200 pb-2">
                  <span className="font-bold text-[#1E1E1E] text-base">{profile.name}</span>
                  <span className="text-[11px] font-bold px-2 py-0.5 rounded-full bg-[#DCFCE7] text-emerald-800 border border-[#1E1E1E]">
                    {profile.statusBadge || "Verified Student"}
                  </span>
                </div>

                <div className="flex items-center gap-2.5 text-gray-700">
                  <MapPin className="w-4 h-4 text-[#2563EB] shrink-0" />
                  <span className="truncate font-medium">{profile.location}</span>
                </div>

                {profile.phone && (
                  <div className="flex items-center gap-2.5 text-gray-700">
                    <Phone className="w-4 h-4 text-[#2563EB] shrink-0" />
                    <a href={`tel:${profile.phone.replace(/\s+/g, '')}`} className="truncate font-medium hover:text-[#2563EB] hover:underline">
                      {profile.phone}
                    </a>
                  </div>
                )}

                <div className="flex items-center gap-2.5 text-gray-700">
                  <Mail className="w-4 h-4 text-[#2563EB] shrink-0" />
                  <a href={`mailto:${profile.email}`} className="truncate font-medium hover:text-[#2563EB] hover:underline">
                    {profile.email}
                  </a>
                </div>

                {profile.website && (
                  <div className="flex items-center gap-2.5 text-gray-700">
                    <Globe className="w-4 h-4 text-[#2563EB] shrink-0" />
                    <a href={`https://${profile.website}`} target="_blank" rel="noreferrer" className="truncate font-medium hover:text-[#2563EB] hover:underline">
                      {profile.website}
                    </a>
                  </div>
                )}

                {profile.github && (
                  <div className="flex items-center gap-2.5 text-gray-700">
                    <GithubIcon className="w-4 h-4 text-[#2563EB] shrink-0" />
                    <a href={profile.github?.startsWith('http') ? profile.github : `https://${profile.github}`} target="_blank" rel="noreferrer" className="truncate font-medium hover:text-[#2563EB] hover:underline">
                      {profile.github.replace(/^https?:\/\//, '')}
                    </a>
                  </div>
                )}

                {profile.linkedin && (
                  <div className="flex items-center gap-2.5 text-gray-700">
                    <LinkedinIcon className="w-4 h-4 text-[#2563EB] shrink-0" />
                    <a href={profile.linkedin?.startsWith('http') ? profile.linkedin : `https://${profile.linkedin}`} target="_blank" rel="noreferrer" className="truncate font-medium hover:text-[#2563EB] hover:underline">
                      {profile.linkedin.replace(/^https?:\/\//, '')}
                    </a>
                  </div>
                )}
              </div>

            </div>

          </div>

        </div>
      </div>
    </section>
  );
};
