// Content inventory — 27 original artworks across 22 project entries.
// Edit titles, categories and groupings here; the gallery is generated automatically.
// Image files live in /public/artwork/.
export const categories = [
  "All work",
  "Events & Campaigns",
  "Public Information",
  "Commercial & Advertising",
  "Creative & Experimental",
];

export const projects = [
  {
    id: "festival-budaya",
    title: "Festival Pekan Wisata Budaya",
    category: "Events & Campaigns",
    format: "Event graphics · Entrance gate",
    featured: true,
    images: [
      { src: "/artwork/gate-masuk.webp", alt: "Red decorative cultural festival entrance gate banner design", name: "Entrance gate" },
      { src: "/artwork/festival-budaya.webp", alt: "Red and gold festival emblem for Pekan Wisata Budaya", name: "Festival emblem" },
    ],
  },
  {
    id: "bijak-sosialmedia",
    title: "Bijak Bersosial Media",
    category: "Public Information",
    format: "Public awareness · Poster",
    featured: true,
    images: [{ src: "/artwork/bijak-sosialmedia.webp", alt: "Purple and blue illustrated social media awareness poster", name: "Awareness poster" }],
  },
  {
    id: "moca-2026",
    title: "MOCA 2026",
    category: "Events & Campaigns",
    format: "School event · Promotional graphics",
    featured: true,
    images: [
      { src: "/artwork/moca-banner.webp", alt: "Turquoise MOCA 2026 school event banner with ocean theme", name: "Event banner" },
      { src: "/artwork/moca-nama.webp", alt: "MOCA 2026 ocean-themed participant name design", name: "Name graphic" },
    ],
  },
  {
    id: "color-your-night",
    title: "Color Your Night",
    category: "Creative & Experimental",
    format: "Experimental · Typography",
    featured: true,
    images: [{ src: "/artwork/color-your-night.webp", alt: "High-contrast pink and blue experimental typography poster with illustrated figure", name: "Typography poster" }],
  },
  {
    id: "kdm-30",
    title: "KDM 30th Anniversary",
    category: "Events & Campaigns",
    format: "Anniversary · Campaign graphics",
    featured: true,
    images: [
      { src: "/artwork/kdm30th.webp", alt: "Green and yellow 30th anniversary social graphic", name: "Anniversary graphic 01" },
      { src: "/artwork/kdm30th-v2.webp", alt: "Green 30th anniversary graphic with photographic framing", name: "Anniversary graphic 02" },
    ],
  },
  {
    id: "roti-goreng",
    title: "Roti Goreng Bontang",
    category: "Commercial & Advertising",
    format: "Food business · Signage",
    featured: true,
    images: [
      { src: "/artwork/roti-goreng-kdm.webp", alt: "Orange Roti Goreng Bontang horizontal food and menu banner", name: "Promotional banner" },
      { src: "/artwork/roti-goreng-kdm-title.webp", alt: "Orange Roti Goreng Bontang brand signage strip", name: "Signage title" },
    ],
  },
  {
    id: "labor-day",
    title: "International Labour Day",
    category: "Events & Campaigns",
    format: "Public event · Print graphics",
    images: [
      { src: "/artwork/hadiri-jalansehat.webp", alt: "Turquoise Labour Day fun walk event banner", name: "Event announcement" },
      { src: "/artwork/hari-buruh.webp", alt: "Turquoise International Labour Day celebration banner", name: "Celebration banner" },
    ],
  },
  {
    id: "jht-balance",
    title: "Cek Saldo JHT",
    category: "Public Information",
    format: "Information graphic",
    images: [{ src: "/artwork/ceksaldojht.webp", alt: "Green BPJS JHT balance checking infographic", name: "JHT guide" }],
  },
  {
    id: "sampah",
    title: "Buang Sampah pada Tempatnya",
    category: "Public Information",
    format: "Public awareness · Poster",
    images: [{ src: "/artwork/buang-sampah.webp", alt: "Bold orange and green anti-littering typography poster", name: "Awareness poster" }],
  },
  {
    id: "hakordia",
    title: "HAKORDIA 2025",
    category: "Public Information",
    format: "Anti-corruption · Infographic",
    images: [{ src: "/artwork/hakordia-2025.webp", alt: "Purple and blue anti-corruption awareness infographic", name: "Information poster" }],
  },
  {
    id: "bpjs-jmo",
    title: "JMO Information Graphic",
    category: "Public Information",
    format: "Service information · Print",
    images: [{ src: "/artwork/jamsostek.webp", alt: "Tall green and blue mobile app information graphic", name: "Service guide" }],
  },
  {
    id: "bpjs-pamphlet",
    title: "BPJS Promotional Pamphlet",
    category: "Public Information",
    format: "Public service · Pamphlet",
    images: [{ src: "/artwork/pamphlet-bpjstk.webp", alt: "Light blue housing and benefits promotional pamphlet", name: "Pamphlet" }],
  },
  {
    id: "kemerdekaan",
    title: "Independence Day Celebration",
    category: "Events & Campaigns",
    format: "Event banner",
    images: [{ src: "/artwork/perlombaan-peringatan-hari-kemerdekaan-indonesia-17-agustus-1945.webp", alt: "Red and white Indonesian independence celebration event banner", name: "Event banner" }],
  },
  {
    id: "workshop",
    title: "Editing & Graphic Design Workshop",
    category: "Events & Campaigns",
    format: "Workshop · Event banner",
    images: [{ src: "/artwork/workshop-editting.webp", alt: "Blue creative workshop banner with graphics software logos", name: "Workshop banner" }],
  },
  {
    id: "paket-hemat",
    title: "Paket Hemat",
    category: "Commercial & Advertising",
    format: "Food promotion",
    images: [{ src: "/artwork/paket-hemat.webp", alt: "Black and gold food menu special offer promotion", name: "Food promotion" }],
  },
  {
    id: "pawon-umi",
    title: "Pawon Umi Sulis",
    category: "Commercial & Advertising",
    format: "Restaurant · Print banner",
    images: [{ src: "/artwork/pawon-umi-sulis.webp", alt: "Tall red restaurant food advertising banner", name: "Restaurant banner" }],
  },
  {
    id: "singkong",
    title: "Singkong Goreng",
    category: "Commercial & Advertising",
    format: "Food advertising",
    images: [{ src: "/artwork/singkong.webp", alt: "Red and orange singkong and sambal food advertisement", name: "Food advertisement" }],
  },
  {
    id: "special-promo",
    title: "Special Promo",
    category: "Commercial & Advertising",
    format: "Retail promotion",
    images: [{ src: "/artwork/special-promo.webp", alt: "Blue yellow and orange special promotion retail poster", name: "Retail promotion" }],
  },
  {
    id: "iminlove",
    title: "I'm in Love",
    category: "Creative & Experimental",
    format: "Type experiment · Poster",
    images: [{ src: "/artwork/iminlove.webp", alt: "Blue and yellow expressive love-themed typography poster", name: "Type poster" }],
  },
  {
    id: "risuw",
    title: "Ayunda Risu",
    category: "Creative & Experimental",
    format: "Character graphic · Poster",
    images: [{ src: "/artwork/risuw.webp", alt: "Pastel illustrated character poster titled Ayunda Risu", name: "Character poster" }],
  },
  {
    id: "tenkinoko",
    title: "Tenki no Ko",
    category: "Creative & Experimental",
    format: "Film-inspired · Poster",
    images: [{ src: "/artwork/tenkinoko.webp", alt: "Atmospheric blue anime film-inspired poster", name: "Film-inspired poster" }],
  },
  {
    id: "yukiee",
    title: "Yukiee",
    category: "Creative & Experimental",
    format: "Character graphic · Poster",
    images: [{ src: "/artwork/yukiee.webp", alt: "Blue illustrated anime-inspired character graphic poster", name: "Character poster" }],
  },
];

export const featuredProjects = projects.filter((project) => project.featured);
export const totalArtworks = projects.reduce((count, project) => count + project.images.length, 0);
