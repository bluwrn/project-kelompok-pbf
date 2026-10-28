import { useEffect, useState } from 'react';

/**
 * Ambil daftar repo publik dari GitHub API (tanpa token).
 * - Disimpan di localStorage 30 menit → tidak kena rate limit (60 request/jam).
 * - Kalau gagal / offline, halaman tetap jalan pakai projectsData.js saja.
 */
const CACHE_TTL = 30 * 60 * 1000;

function readCache(key) {
  try {
    const raw = localStorage.getItem(key);
    if (!raw) return null;
    const { savedAt, data } = JSON.parse(raw);
    return Date.now() - savedAt < CACHE_TTL ? data : null;
  } catch {
    return null;
  }
}

// Simpan hanya field yang dipakai supaya cache kecil
const toRepo = (r) => ({
  name: r.name,
  description: r.description,
  url: r.html_url,
  homepage: r.homepage,
  language: r.language,
  stars: r.stargazers_count,
  topics: r.topics ?? [],
  pushedAt: r.pushed_at,
  fork: r.fork,
  archived: r.archived,
});

export default function useGithubRepos(username) {
  const key = `lily-gh-${username}`;
  const [state, setState] = useState(() => {
    const cached = readCache(key);
    return { repos: cached ?? [], loading: !cached, error: null };
  });

  useEffect(() => {
    if (readCache(key)) return;
    const controller = new AbortController();

    fetch(`https://api.github.com/users/${username}/repos?per_page=100&sort=pushed`, {
      headers: { Accept: 'application/vnd.github+json' },
      signal: controller.signal,
    })
      .then((res) => {
        if (!res.ok) throw new Error(res.status === 403 ? 'rate limit' : `HTTP ${res.status}`);
        return res.json();
      })
      .then((data) => {
        const repos = data.map(toRepo);
        setState({ repos, loading: false, error: null });
        try {
          localStorage.setItem(key, JSON.stringify({ savedAt: Date.now(), data: repos }));
        } catch { /* abaikan */ }
      })
      .catch((err) => {
        if (err.name !== 'AbortError') setState((s) => ({ ...s, loading: false, error: err.message }));
      });

    return () => controller.abort();
  }, [key, username]);

  return state;
}
