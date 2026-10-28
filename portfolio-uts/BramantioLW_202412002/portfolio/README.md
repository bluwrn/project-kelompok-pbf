# Bluwrn

Personal portfolio for my graphic design work and web projects. Built with Next.js.

## What's here

- Six featured design projects and a browsable archive of 27 artworks.
- Category filters and an image viewer for individual or grouped designs.
- Light and dark modes, with the selected theme saved in the browser.
- Sections for web projects, about, skills, and contact.


## Run locally

Requires Node.js 20.9 or newer.

```bash
npm install
npm run dev
```

Open `http://localhost:3000`.

For a production build:

```bash
npm run build
npm run start
```

## Project files

- `app/` — page, layout, and global styles.
- `components/` — artwork gallery, software showcase, and theme toggle.
- `data/artworks.js` — artwork titles, categories, groups, and featured selection.
- `public/artwork/` — portfolio images.
- `public/projects/` — reserved for software project screenshots.

To add or change artwork, put the image in `public/artwork/` and update `data/artworks.js`.

## Status

The design gallery and theme toggle are implemented. Software screenshots, project links, and contact information still need to be added. A production build should be verified locally before deployment.
