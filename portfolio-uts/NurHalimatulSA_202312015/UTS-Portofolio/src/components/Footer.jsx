import React from 'react';
import { 
  ArrowUp, 
  ArrowRight, 
  Mail, 
  Phone,
  Sparkles,
  Heart
} from 'lucide-react';
import { ScribbleLoop, ScribbleCircle, SparkleDoodle } from './Doodles';
import { GithubIcon, LinkedinIcon, TwitterIcon, InstagramIcon } from './SocialIcons';

const currentYear = 2026;

export const Footer = ({ profile, socialLinks }) => {
  const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  const socialIconMap = {
    github: GithubIcon,
    linkedin: LinkedinIcon,
    twitter: TwitterIcon,
    instagram: InstagramIcon
  };

  return (
    <footer id="contact" className="py-16 md:py-24 relative overflow-hidden bg-[#FAF8F5]">
      
      {/* Decorative Scribbles */}
      <div className="absolute top-12 left-10 opacity-30 pointer-events-none hidden lg:block">
        <ScribbleCircle className="w-28 h-28 text-[#2563EB]" />
      </div>
      <div className="absolute bottom-16 right-12 opacity-30 pointer-events-none hidden md:block">
        <ScribbleLoop className="w-32 h-20 text-[#1E1E1E]" />
      </div>

      <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Main CTA Banner Container */}
        <div className="relative bg-[#FEF08A] rounded-[2.5rem] border-2 border-[#1E1E1E] shadow-sketch-xl p-8 sm:p-14 lg:p-16 overflow-hidden text-center">
          
          {/* Subtle background doodle inside banner */}
          <div className="absolute -top-6 -left-6 opacity-20 pointer-events-none">
            <SparkleDoodle className="w-24 h-24 text-[#1E1E1E]" />
          </div>
          <div className="absolute -bottom-8 -right-8 opacity-20 pointer-events-none">
            <ScribbleCircle className="w-32 h-32 text-[#1E1E1E]" />
          </div>

          <div className="relative z-10 max-w-3xl mx-auto space-y-6">
            
            <div className="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white border-2 border-[#1E1E1E] shadow-sketch text-xs font-bold uppercase tracking-wider">
              <Sparkles className="w-3.5 h-3.5 text-[#2563EB]" />
              <span>Let's Connect</span>
            </div>

            {/* Catchy Call-To-Action Heading */}
            <h2 className="text-3xl sm:text-5xl lg:text-6xl font-black font-display tracking-tight text-[#1E1E1E] leading-tight">
              Interested in collaborating or discussing ideas? Let's connect!
            </h2>

            <p className="text-base sm:text-xl text-gray-800 font-medium max-w-xl mx-auto">
              Open for lab assistant opportunities, event committees, technology projects, or simply exchanging insights in IT.
            </p>

            {/* Main CTA Button & Contact Details */}
            <div className="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4 flex-wrap">
              <a
                href={`mailto:${profile.email}`}
                className="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-8 py-4 rounded-full bg-[#2563EB] text-white font-extrabold text-base sm:text-lg border-2 border-[#1E1E1E] shadow-sketch-lg hover:shadow-sketch-xl hover:-translate-y-0.5 active:translate-y-1 transition-all duration-150"
              >
                <span>Get In Touch</span>
                <ArrowRight className="w-5 h-5" />
              </a>

              <a
                href={`mailto:${profile.email}`}
                className="inline-flex items-center gap-2 font-mono text-sm sm:text-base font-bold text-[#1E1E1E] hover:text-[#2563EB] transition-colors bg-white/60 px-4 py-2 rounded-full border border-[#1E1E1E]/20"
              >
                <Mail className="w-4 h-4 text-[#2563EB]" />
                <span>{profile.email}</span>
              </a>

              {profile.phone && (
                <a
                  href={`tel:${profile.phone.replace(/\s+/g, '')}`}
                  className="inline-flex items-center gap-2 font-mono text-sm sm:text-base font-bold text-[#1E1E1E] hover:text-[#2563EB] transition-colors bg-white/60 px-4 py-2 rounded-full border border-[#1E1E1E]/20"
                >
                  <Phone className="w-4 h-4 text-[#2563EB]" />
                  <span>{profile.phone}</span>
                </a>
              )}
            </div>

          </div>
        </div>

        {/* Footer Bottom Bar: Social Links & Copyright */}
        <div className="mt-14 pt-8 border-t-2 border-[#1E1E1E]/10 flex flex-col sm:flex-row items-center justify-between gap-6">
          
          {/* Logo & Copyright */}
          <div className="flex flex-col sm:flex-row items-center gap-2 sm:gap-4 text-center sm:text-left">
            <span className="font-display font-black text-lg text-[#1E1E1E]">
              {profile.brandName || profile.name}
            </span>
            <span className="hidden sm:inline text-gray-400">•</span>
            <p className="text-xs sm:text-sm font-medium text-gray-600 flex items-center gap-1">
              <span>© {currentYear} Handcrafted with</span>
              <Heart className="w-3.5 h-3.5 text-rose-500 fill-rose-500 inline" />
              <span>& playful vibes</span>
            </p>
          </div>

          {/* Social Media Icons */}
          <div className="flex items-center gap-3">
            {Object.entries(socialLinks || {}).map(([platform, url]) => {
              const IconComp = socialIconMap[platform.toLowerCase()] || Sparkles;
              return (
                <a
                  key={platform}
                  href={url}
                  target="_blank"
                  rel="noreferrer"
                  aria-label={platform}
                  className="w-10 h-10 rounded-xl bg-white border-2 border-[#1E1E1E] shadow-sketch flex items-center justify-center hover:bg-[#EDE9FE] hover:-translate-y-1 hover:shadow-sketch-lg transition-all"
                >
                  <IconComp className="w-4 h-4 text-[#1E1E1E]" />
                </a>
              );
            })}

            {/* Back To Top Button */}
            <button
              onClick={scrollToTop}
              aria-label="Back to top"
              className="ml-2 w-10 h-10 rounded-xl bg-[#DCFCE7] border-2 border-[#1E1E1E] shadow-sketch flex items-center justify-center hover:bg-emerald-300 hover:-translate-y-1 transition-all"
            >
              <ArrowUp className="w-4 h-4 text-[#1E1E1E]" />
            </button>
          </div>

        </div>

      </div>
    </footer>
  );
};
