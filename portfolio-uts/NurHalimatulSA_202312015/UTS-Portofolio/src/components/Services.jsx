import React from 'react';
import * as LucideIcons from 'lucide-react';
import { SparkleDoodle, ScribbleCircle } from './Doodles';

export const Services = ({ services }) => {
  // Color configuration mapping
  const colorMap = {
    green: {
      cardBg: 'bg-[#DCFCE7]',
      iconBg: 'bg-emerald-200',
      badgeBg: 'bg-emerald-100',
      textAccent: 'text-emerald-900',
    },
    purple: {
      cardBg: 'bg-[#EDE9FE]',
      iconBg: 'bg-purple-200',
      badgeBg: 'bg-purple-100',
      textAccent: 'text-purple-900',
    },
    yellow: {
      cardBg: 'bg-[#FEF08A]',
      iconBg: 'bg-yellow-200',
      badgeBg: 'bg-yellow-100',
      textAccent: 'text-yellow-900',
    },
    coral: {
      cardBg: 'bg-[#FFEDD5]',
      iconBg: 'bg-orange-200',
      badgeBg: 'bg-orange-100',
      textAccent: 'text-orange-900',
    }
  };

  // Dynamic Lucide icon helper
  const getIcon = (iconName) => {
    let IconComponent = LucideIcons[iconName];
    if (!IconComponent) {
      if (iconName === 'Gamepad') IconComponent = LucideIcons.Gamepad2;
      else if (iconName === 'Bot') IconComponent = LucideIcons.Bot;
      else if (iconName === 'Laptop') IconComponent = LucideIcons.Laptop;
      else IconComponent = LucideIcons.Sparkles;
    }
    return <IconComponent className="w-7 h-7 text-[#1E1E1E]" strokeWidth={2.2} />;
  };

  return (
    <section id="services" className="py-16 md:py-24 relative overflow-hidden">
      {/* Decorative background doodles */}
      <div className="absolute -left-6 top-1/3 opacity-30 pointer-events-none hidden lg:block">
        <ScribbleCircle className="w-32 h-32 text-[#1E1E1E]" />
      </div>

      <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Section Header */}
        <div className="text-center mb-14 space-y-3">
          <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white border-2 border-[#1E1E1E] shadow-sketch text-xs font-bold uppercase tracking-wider">
            <SparkleDoodle className="w-3.5 h-3.5 text-[#2563EB]" />
            <span>Specialties</span>
          </div>

          <h2 className="text-4xl sm:text-6xl font-black font-display tracking-tight text-[#1E1E1E]">
            What I Do
          </h2>

          <p className="text-base sm:text-lg text-gray-600 font-medium max-w-lg mx-auto">
            Combining clean engineering with thoughtful user interfaces to build remarkable digital experiences.
          </p>
        </div>

        {/* 4 Responsive Service Cards Grid */}
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
          {services.map((service, index) => {
            const colors = colorMap[service.color] || colorMap.green;
            return (
              <div
                key={service.id || index}
                className={`relative rounded-3xl border-2 border-[#1E1E1E] ${colors.cardBg} p-7 flex flex-col justify-between shadow-sketch hover:shadow-sketch-xl hover:-translate-y-2.5 hover:-translate-x-1 hover:scale-[1.02] transition-all duration-300 ease-out cursor-pointer group`}
              >
                {/* Card Number / Badge */}
                <div className="flex items-center justify-between mb-8">
                  <div className="w-13 h-13 rounded-2xl bg-white border-2 border-[#1E1E1E] shadow-sketch flex items-center justify-center group-hover:rotate-6 group-hover:scale-110 transition-transform duration-300">
                    {getIcon(service.icon)}
                  </div>
                  <span className="font-handwriting text-2xl font-bold text-[#1E1E1E] opacity-75">
                    {service.number || `#${String(index + 1).padStart(2, '0')}`}
                  </span>
                </div>

                {/* Content */}
                <div className="space-y-3">
                  <h3 className="text-xl sm:text-2xl font-black font-display tracking-tight text-[#1E1E1E]">
                    {service.title}
                  </h3>
                  <p className="text-sm sm:text-base text-gray-800 leading-relaxed font-medium">
                    {service.description}
                  </p>
                </div>

                {/* Bottom Card Footer Accent */}
                <div className="mt-6 pt-4 border-t-2 border-black/10 flex items-center justify-between text-xs font-bold text-gray-700">
                  <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/85 border border-[#1E1E1E] font-mono text-[11px] font-bold text-gray-800 shadow-xs">
                    <span className="w-2 h-2 rounded-full bg-[#2563EB] animate-pulse"></span>
                    {service.status || 'Active Stack'}
                  </span>
                  <LucideIcons.ArrowRight className="w-4 h-4 group-hover:translate-x-1.5 transition-transform" />
                </div>
              </div>
            );
          })}
        </div>

      </div>
    </section>
  );
};
