import "./globals.css";

export const metadata = {
  title: "Bluwrn — Graphic Design & Web Projects",
  description: "Graphic design, print work, promotional graphics, and web projects by Bluw / Bluwrn, based in Bontang, Indonesia.",
  openGraph: {
    title: "Bluwrn — Graphic Design & Web Projects",
    description: "Selected graphic design, client work, and web projects by Bluwrn.",
    type: "website",
  },
};

// Runs before React hydration so returning visitors don't see a light-mode flash.
// The system preference is only the default; a manual choice takes priority.
const themeBootstrap = `(function(){
  var theme = null;
  try { theme = localStorage.getItem("bluwrn-theme"); } catch (e) {}
  if (theme !== "dark" && theme !== "light") {
    theme = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
  }
  document.documentElement.setAttribute("data-theme", theme);
  document.documentElement.style.colorScheme = theme;
})();`;

export default function RootLayout({ children }) {
  return (
    <html lang="en" suppressHydrationWarning>
      <head><script dangerouslySetInnerHTML={{ __html: themeBootstrap }} /></head>
      <body>{children}</body>
    </html>
  );
}
