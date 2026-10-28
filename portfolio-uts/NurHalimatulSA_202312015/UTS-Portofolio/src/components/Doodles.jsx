import React from 'react';

// Hand-drawn curved arrow pointing to edition badge or hero elements
export const ArrowDoodle = ({ className = "w-12 h-12 text-[#1E1E1E]" }) => (
  <svg
    viewBox="0 0 100 80"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    className={className}
    stroke="currentColor"
    strokeWidth="2.5"
    strokeLinecap="round"
    strokeLinejoin="round"
  >
    <path d="M 15,20 C 40,5 75,15 75,55 C 75,65 68,72 58,72 C 45,72 40,55 52,45 C 65,35 85,50 88,65" />
    <path d="M 75,60 L 88,67 L 92,50" />
  </svg>
);

// Curved down arrow with hand-drawn character
export const DownArrowDoodle = ({ className = "w-8 h-12 text-[#1E1E1E]" }) => (
  <svg
    viewBox="0 0 40 60"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    className={className}
    stroke="currentColor"
    strokeWidth="2.5"
    strokeLinecap="round"
    strokeLinejoin="round"
  >
    <path d="M 20,5 C 22,25 15,40 22,52" />
    <path d="M 10,42 L 22,54 L 32,44" />
  </svg>
);

// Handwritten wavy underline SVG
export const WavyUnderline = ({ className = "w-36 h-4 text-[#2563EB]" }) => (
  <svg
    viewBox="0 0 200 20"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    className={className}
  >
    <path
      d="M3 14C35 4 65 18 95 10C125 2 155 16 197 8"
      stroke="currentColor"
      strokeWidth="4"
      strokeLinecap="round"
      strokeLinejoin="round"
    />
  </svg>
);

// Hand-drawn double underline highlight
export const DoubleUnderline = ({ className = "w-44 h-5 text-[#FEF08A]" }) => (
  <svg
    viewBox="0 0 200 24"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    className={className}
  >
    <path
      d="M 5,10 C 60,6 130,12 195,8"
      stroke="currentColor"
      strokeWidth="5"
      strokeLinecap="round"
    />
    <path
      d="M 15,19 C 70,15 140,21 185,17"
      stroke="currentColor"
      strokeWidth="4"
      strokeLinecap="round"
    />
  </svg>
);

// Floating playful smiley badge
export const SmileyBadge = ({ className = "w-14 h-14" }) => (
  <div className={`relative rounded-full bg-[#FEF08A] border-2 border-[#1E1E1E] shadow-sketch flex items-center justify-center p-1.5 select-none ${className}`}>
    <svg
      viewBox="0 0 50 50"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
      className="w-full h-full"
    >
      {/* Eyes */}
      <circle cx="17" cy="19" r="3.5" fill="#1E1E1E" />
      <circle cx="33" cy="19" r="3.5" fill="#1E1E1E" />
      {/* Smile */}
      <path
        d="M 15,28 C 19,37 31,37 35,28"
        stroke="#1E1E1E"
        strokeWidth="3.5"
        strokeLinecap="round"
      />
      {/* Dimple cheeks */}
      <path d="M 12,28 C 11,26 12,24 13,23" stroke="#1E1E1E" strokeWidth="2" strokeLinecap="round" />
      <path d="M 38,28 C 39,26 38,24 37,23" stroke="#1E1E1E" strokeWidth="2" strokeLinecap="round" />
    </svg>
  </div>
);

// Starburst Doodle (8-point hand-drawn spark)
export const StarburstDoodle = ({ className = "w-12 h-12 text-[#FEF08A]" }) => (
  <svg
    viewBox="0 0 60 60"
    fill="currentColor"
    xmlns="http://www.w3.org/2000/svg"
    className={className}
    stroke="#1E1E1E"
    strokeWidth="2"
  >
    <path d="M30 2 L36 21 L55 16 L43 30 L55 44 L36 39 L30 58 L24 39 L5 44 L17 30 L5 16 L24 21 Z" />
  </svg>
);

// Hand-drawn Sparkle Star
export const SparkleDoodle = ({ className = "w-6 h-6 text-[#1E1E1E]" }) => (
  <svg
    viewBox="0 0 24 24"
    fill="currentColor"
    xmlns="http://www.w3.org/2000/svg"
    className={className}
  >
    <path d="M12 0C12 7 13.5 10.5 17 12C13.5 13.5 12 17 12 24C12 17 10.5 13.5 7 12C10.5 10.5 12 7 12 0Z" />
  </svg>
);

// Graduation Cap Doodle for Education column
export const GraduationCapDoodle = ({ className = "w-14 h-14 text-[#1E1E1E]" }) => (
  <svg
    viewBox="0 0 80 80"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    className={className}
    stroke="currentColor"
    strokeWidth="2.5"
    strokeLinecap="round"
    strokeLinejoin="round"
  >
    {/* Cap top */}
    <path d="M 40,15 L 75,32 L 40,48 L 5,32 Z" fill="#DCFCE7" />
    {/* Cap skull base */}
    <path d="M 20,40 V 55 C 20,62 60,62 60,55 V 40" fill="#FAF8F5" />
    {/* Tassel */}
    <path d="M 65,36 V 56" />
    <circle cx="65" cy="58" r="2.5" fill="currentColor" />
  </svg>
);

// Washi Tape effect for sticky note
export const TapeDoodle = ({ className = "w-24 h-6" }) => (
  <div
    className={`bg-white/70 backdrop-blur-xs border-y border-dashed border-gray-400 shadow-xs transform rotate-2 ${className}`}
    style={{
      clipPath: 'polygon(5% 0%, 95% 0%, 100% 100%, 0% 100%)'
    }}
  />
);

// Scribble Loop Doodle for backgrounds
export const ScribbleLoop = ({ className = "w-24 h-16 text-gray-300" }) => (
  <svg
    viewBox="0 0 120 70"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    className={className}
    stroke="currentColor"
    strokeWidth="2.5"
    strokeLinecap="round"
  >
    <path d="M 10,40 C 25,10 50,15 35,45 C 25,65 65,65 75,40 C 85,15 110,20 100,50 C 95,65 115,60 115,55" />
  </svg>
);

// Scribble Circle Doodle
export const ScribbleCircle = ({ className = "w-20 h-20 text-[#2563EB]/20" }) => (
  <svg
    viewBox="0 0 100 100"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    className={className}
    stroke="currentColor"
    strokeWidth="2.5"
    strokeLinecap="round"
  >
    <path d="M 50,10 C 80,10 95,25 90,55 C 85,85 65,95 40,90 C 15,85 5,65 12,40 C 18,18 42,6 68,14 C 90,20 95,45 88,70" />
  </svg>
);
