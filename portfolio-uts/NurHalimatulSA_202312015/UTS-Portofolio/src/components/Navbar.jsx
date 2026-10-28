import React, { useState } from 'react';
import { Menu, X, Sparkles } from 'lucide-react';

export const Navbar = ({ profile }) => {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  const navItems = [
    { name: 'About', href: '#about' },
    { name: 'Services', href: '#services' },
    { name: 'Work', href: '#projects' },
    { name: 'Experience', href: '#experience' },
    { name: 'Contact', href: '#contact' }
  ];

  const handleScroll = (e, href) => {
    e.preventDefault();
    const element = document.querySelector(href);
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
    }
    setMobileMenuOpen(false);
  };

  return (
    <header className="sticky top-0 z-50 bg-[#FAF8F5]/90 backdrop-blur-md border-b-2 border-[#1E1E1E] transition-all">
      <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        {/* Dynamic Logo */}
        <a 
          href="#top" 
          onClick={(e) => handleScroll(e, '#top')}
          className="group flex items-center gap-2 text-xl sm:text-2xl font-bold font-display tracking-tight text-[#1E1E1E]"
        >
          <span className="w-9 h-9 rounded-xl bg-[#2563EB] text-white flex items-center justify-center font-display text-lg font-black shadow-sketch group-hover:-rotate-6 transition-transform">
            {profile.brandInitial || 'J'}
          </span>
          <span className="group-hover:text-[#2563EB] transition-colors flex items-center gap-1.5">
            {profile.brandName || "Jillian's Page"}
            <span className="inline-block w-2 h-2 rounded-full bg-[#2563EB] animate-pulse"></span>
          </span>
        </a>

        {/* Desktop Nav Items */}
        <nav className="hidden md:flex items-center gap-1 lg:gap-2">
          {navItems.map((item) => (
            <a
              key={item.name}
              href={item.href}
              onClick={(e) => handleScroll(e, item.href)}
              className="px-4 py-2 text-sm font-semibold text-[#1E1E1E] hover:text-[#2563EB] hover:bg-[#EDE9FE] rounded-full transition-all duration-150"
            >
              {item.name}
            </a>
          ))}
          <a
            href="#contact"
            onClick={(e) => handleScroll(e, '#contact')}
            className="ml-3 px-5 py-2.5 rounded-full bg-[#FEF08A] text-[#1E1E1E] font-bold text-sm border-2 border-[#1E1E1E] shadow-sketch hover:shadow-sketch-hover hover:bg-[#FDE047] active:translate-x-0.5 active:translate-y-0.5 transition-all flex items-center gap-1.5"
          >
            <Sparkles className="w-4 h-4 text-[#2563EB]" />
            Let's Talk
          </a>
        </nav>

        {/* Mobile Menu Button */}
        <div className="flex md:hidden items-center">
          <button
            onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
            aria-label="Toggle menu"
            className="p-2 rounded-xl bg-white border-2 border-[#1E1E1E] shadow-sketch text-[#1E1E1E] hover:bg-gray-50 focus:outline-hidden"
          >
            {mobileMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
          </button>
        </div>
      </div>

      {/* Mobile Nav Dropdown */}
      {mobileMenuOpen && (
        <div className="md:hidden border-b-2 border-[#1E1E1E] bg-[#FAF8F5] px-4 pt-3 pb-6 space-y-2 animate-in slide-in-from-top-4 duration-200">
          {navItems.map((item) => (
            <a
              key={item.name}
              href={item.href}
              onClick={(e) => handleScroll(e, item.href)}
              className="block px-4 py-2.5 text-base font-semibold text-[#1E1E1E] hover:bg-[#EDE9FE] rounded-xl border border-transparent hover:border-[#1E1E1E] transition-all"
            >
              {item.name}
            </a>
          ))}
          <div className="pt-2">
            <a
              href="#contact"
              onClick={(e) => handleScroll(e, '#contact')}
              className="block text-center w-full px-5 py-3 rounded-xl bg-[#FEF08A] text-[#1E1E1E] font-bold border-2 border-[#1E1E1E] shadow-sketch"
            >
              Let's Talk ✨
            </a>
          </div>
        </div>
      )}
    </header>
  );
};
