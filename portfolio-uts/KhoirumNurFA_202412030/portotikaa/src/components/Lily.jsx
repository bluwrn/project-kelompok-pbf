/**
 * Gambar bunga lily, dengan ukuran file yang menyesuaikan (srcset):
 * browser otomatis memilih versi yang pas sesuai kebutuhan.
 *
 * Props:
 *  - size: lebar tampilan (angka px atau string css)
 *  - sizes: petunjuk lebar untuk srcset (default diambil dari size)
 *  - eager: true untuk gambar yang langsung terlihat (hero)
 *  - variant: 'photo' (default), 'dots' (gaya titik-titik / stipple untuk tema terang),
 *             atau 'dots-dark' (versi stipple untuk tema gelap)
 */
const SOURCES = {
  photo: {
    src: '/lily-320.webp',
    srcSet: '/lily-160.webp 160w, /lily-320.webp 320w, /lily-480.webp 480w',
    width: 480,
    height: 476,
  },
  dots: {
    src: '/lily-dots-560.webp',
    srcSet: '/lily-dots-360.webp 360w, /lily-dots-560.webp 560w, /lily-dots-760.webp 760w',
    width: 760,
    height: 754,
  },
  'dots-dark': {
    src: '/lily-dots-dark-560.webp',
    srcSet: '/lily-dots-dark-360.webp 360w, /lily-dots-dark-560.webp 560w, /lily-dots-dark-760.webp 760w',
    width: 760,
    height: 754,
  },
};

export default function Lily({ size = 200, sizes, eager = false, variant = 'photo', className = '', style }) {
  const source = SOURCES[variant] ?? SOURCES.photo;
  const sizesAttr = sizes ?? (typeof size === 'number' ? `${size}px` : '480px');
  return (
    <img
      src={source.src}
      srcSet={source.srcSet}
      sizes={sizesAttr}
      width={source.width}
      height={source.height}
      alt=""
      aria-hidden="true"
      loading={eager ? 'eager' : 'lazy'}
      decoding="async"
      fetchPriority={eager ? 'high' : undefined}
      className={className}
      style={{ width: size, height: 'auto', ...style }}
      draggable="false"
    />
  );
}
