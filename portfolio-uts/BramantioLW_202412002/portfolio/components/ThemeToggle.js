"use client";

import { useEffect, useState } from "react";

const KEY = "bluwrn-theme";

function systemTheme() {
  return window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
}

function savedTheme() {
  try {
    const value = localStorage.getItem(KEY);
    return value === "dark" || value === "light" ? value : null;
  } catch {
    return null;
  }
}

function applyTheme(value) {
  document.documentElement.dataset.theme = value;
  document.documentElement.style.colorScheme = value;
}

export default function ThemeToggle() {
  // Server/client markup starts identically; the tiny inline head script sets
  // the visual theme before hydration to avoid a flash of the wrong theme.
  const [current, setCurrent] = useState(null);

  useEffect(() => {
    const sync = () => {
      const resolved = savedTheme() ?? systemTheme();
      applyTheme(resolved);
      setCurrent(resolved);
    };
    sync();

    const media = window.matchMedia("(prefers-color-scheme: dark)");
    const onSystemChange = () => { if (!savedTheme()) sync(); };
    media.addEventListener("change", onSystemChange);
    window.addEventListener("storage", sync);
    return () => {
      media.removeEventListener("change", onSystemChange);
      window.removeEventListener("storage", sync);
    };
  }, []);

  const toggle = () => {
    const actual = document.documentElement.dataset.theme === "dark" ? "dark" : "light";
    const next = actual === "dark" ? "light" : "dark";
    applyTheme(next);
    setCurrent(next);
    try { localStorage.setItem(KEY, next); } catch { /* Theme remains active for this tab. */ }
  };

  return (
    <button
      type="button"
      className="theme-toggle"
      onClick={toggle}
      aria-label={current ? `Switch to ${current === "dark" ? "light" : "dark"} mode` : "Toggle color theme"}
      aria-pressed={current === "dark"}
      title={current ? `Switch to ${current === "dark" ? "light" : "dark"} mode` : "Toggle color theme"}
    >
      <svg className="theme-moon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.9 13.1A9 9 0 0 1 10.9 3.1 9 9 0 1 0 20.9 13.1Z" /></svg>
      <svg className="theme-sun" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="4" /><path d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42" /></svg>
      <span className="theme-toggle-label theme-dark-label">DARK</span>
      <span className="theme-toggle-label theme-light-label">LIGHT</span>
    </button>
  );
}
