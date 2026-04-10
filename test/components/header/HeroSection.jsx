// HeroSection.jsx - Vertical scrolling image slider with overlays
import { useState, useEffect, useRef } from "react";

const SLIDES = [
  {
    id: "01",
    label: "Discover",
    subtitle: "TRAVEL PARTNER KANNELIYA",
    title: "Explore The Hidden\nGems Of The\nRainforest",
    img: "https://images.unsplash.com/photo-1448375240586-882707db888b?w=1600&q=80",
  },
  {
    id: "02",
    label: "Experience",
    subtitle: "NATURE AWAITS YOU",
    title: "Breathe In The\nMagic Of Ancient\nForests",
    img: "https://images.unsplash.com/photo-1542401886-65d6c61db217?w=1600&q=80",
  },
  {
    id: "03",
    label: "Adventure",
    subtitle: "WILDLIFE SANCTUARY",
    title: "Journey Into The\nHeart Of Sri\nLanka's Jungle",
    img: "https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=1600&q=80",
  },
  {
    id: "04",
    label: "Serenity",
    subtitle: "ESCAPE THE ORDINARY",
    title: "Find Your Peace\nAmong The Trees\nAnd Rivers",
    img: "https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=1600&q=80",
  },
];

export default function HeroSection() {
  const [current, setCurrent] = useState(0);
  const [transitioning, setTransitioning] = useState(false);
  const [mouseVisible, setMouseVisible] = useState(true);
  const timerRef = useRef(null);
  const mouseTimer = useRef(null);

  const goTo = (idx) => {
    if (transitioning || idx === current) return;
    setTransitioning(true);
    setTimeout(() => {
      setCurrent(idx);
      setTransitioning(false);
    }, 700);
  };

  const next = () => goTo((current + 1) % SLIDES.length);

  useEffect(() => {
    timerRef.current = setInterval(next, 5500);
    return () => clearInterval(timerRef.current);
  }, [current, transitioning]);

  // Mouse icon fade in/out
  useEffect(() => {
    const cycle = () => {
      setMouseVisible(false);
      setTimeout(() => setMouseVisible(true), 800);
    };
    mouseTimer.current = setInterval(cycle, 2400);
    return () => clearInterval(mouseTimer.current);
  }, []);

  return (
    <>
      <style>{`
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap');

        * { box-sizing: border-box; margin: 0; padding: 0; }

        .hero {
          position: relative;
          width: 100%;
          height: 100vh;
          min-height: 600px;
          overflow: hidden;
          background: #0a1410;
          font-family: 'Jost', sans-serif;
        }

        /* ── Background Images (vertical slide) ── */
        .hero-bg-track {
          position: absolute;
          inset: 0;
          will-change: transform;
        }
        .hero-bg-img {
          position: absolute;
          inset: 0;
          width: 100%; height: 100%;
          object-fit: cover;
          object-position: center;
          opacity: 0;
          transform: translateY(6%);
          transition: opacity 0.9s cubic-bezier(0.4,0,0.2,1),
                      transform 0.9s cubic-bezier(0.4,0,0.2,1);
        }
        .hero-bg-img.active {
          opacity: 1;
          transform: translateY(0%);
        }
        .hero-bg-img.exit {
          opacity: 0;
          transform: translateY(-6%);
        }

        /* ── Overlays ── */
        .hero-overlay-gradient {
          position: absolute;
          inset: 0;
          background: linear-gradient(
            to top,
            rgba(8, 18, 12, 0.92) 0%,
            rgba(8, 18, 12, 0.55) 40%,
            rgba(8, 18, 12, 0.15) 75%,
            rgba(8, 18, 12, 0.08) 100%
          );
          z-index: 2;
        }
        .hero-overlay-side {
          position: absolute;
          inset: 0;
          background: linear-gradient(
            to right,
            rgba(8,18,12,0.65) 0%,
            transparent 60%
          );
          z-index: 3;
        }

        /* ── Content ── */
        .hero-content {
          position: absolute;
          inset: 0;
          z-index: 10;
          display: flex;
          flex-direction: column;
          justify-content: center;
          padding: 0 100px 80px 120px;
        }

        .hero-eyebrow {
          display: flex;
          align-items: center;
          gap: 16px;
          margin-bottom: 28px;
        }
        .hero-eyebrow-line {
          width: 40px; height: 1px;
          background: #4dd9ac;
        }
        .hero-eyebrow-text {
          font-size: 11px;
          letter-spacing: 0.32em;
          color: #4dd9ac;
          text-transform: uppercase;
          font-weight: 400;
          opacity: 0;
          transform: translateX(-12px);
          transition: opacity 0.7s 0.2s ease, transform 0.7s 0.2s ease;
        }
        .hero-eyebrow-text.visible { opacity: 1; transform: translateX(0); }

        .hero-title {
          font-family: 'Cormorant Garamond', serif;
          font-size: clamp(44px, 6vw, 88px);
          font-weight: 300;
          line-height: 1.08;
          color: #fff;
          white-space: pre-line;
          opacity: 0;
          transform: translateY(24px);
          transition: opacity 0.75s 0.35s ease, transform 0.75s 0.35s ease;
        }
        .hero-title.visible { opacity: 1; transform: translateY(0); }

        /* ── Slide counter (right vertical bar) ── */
        .hero-counter {
          position: absolute;
          right: 40px;
          top: 50%;
          transform: translateY(-50%);
          z-index: 20;
          display: flex;
          flex-direction: column;
          align-items: center;
          gap: 0;
        }
        .hero-counter-item {
          display: flex;
          align-items: center;
          justify-content: flex-end;
          gap: 10px;
          padding: 10px 0;
          cursor: pointer;
          position: relative;
        }
        .hero-counter-label {
          font-size: 10px;
          letter-spacing: 0.08em;
          color: rgba(255,255,255,0.3);
          font-weight: 300;
          transition: color 0.4s;
        }
        .hero-counter-item.active .hero-counter-label {
          color: rgba(255,255,255,0.9);
        }
        .hero-counter-line {
          width: 2px;
          height: 28px;
          background: rgba(255,255,255,0.15);
          border-radius: 2px;
          position: relative;
          overflow: hidden;
          transition: background 0.4s;
        }
        .hero-counter-item.active .hero-counter-line {
          background: rgba(77,217,172,0.25);
        }
        .hero-counter-fill {
          position: absolute;
          bottom: 0; left: 0; right: 0;
          height: 0%;
          background: #4dd9ac;
          border-radius: 2px;
          transition: height 0s;
        }
        .hero-counter-item.active .hero-counter-fill {
          height: 100%;
          transition: height 5.5s linear;
        }

        /* ── Mouse icon ── */
        .hero-mouse {
          position: absolute;
          bottom: 36px;
          left: 50%;
          transform: translateX(-50%);
          z-index: 20;
          display: flex;
          flex-direction: column;
          align-items: center;
          gap: 0;
          opacity: 1;
          transition: opacity 0.7s ease;
        }
        .hero-mouse.hidden { opacity: 0; }
        .hero-mouse svg {
          width: 26px; height: 38px;
          color: rgba(255,255,255,0.65);
        }
        .hero-mouse-tail {
          width: 1px;
          height: 32px;
          background: linear-gradient(to bottom, rgba(77,217,172,0.7), transparent);
          margin-top: 4px;
          animation: tailPulse 1.8s ease-in-out infinite;
        }
        @keyframes tailPulse {
          0%, 100% { opacity: 0.3; transform: scaleY(0.4); transform-origin: top; }
          50% { opacity: 1; transform: scaleY(1); transform-origin: top; }
        }

        /* ── Responsive ── */
        @media (max-width: 900px) {
          .hero-content {
            padding: 0 56px 80px 56px;
          }
        }
        @media (max-width: 600px) {
          .hero-content {
            padding: 0 28px 80px 28px;
          }
          .hero-counter {
            right: 16px;
          }
        }
      `}</style>

      <section className="hero">
        {/* Background images */}
        {SLIDES.map((slide, i) => (
          <img
            key={slide.id}
            className={`hero-bg-img${i === current ? " active" : i === (current - 1 + SLIDES.length) % SLIDES.length ? " exit" : ""}`}
            src={slide.img}
            alt={slide.label}
          />
        ))}

        {/* Overlays */}
        <div className="hero-overlay-gradient" />
        <div className="hero-overlay-side" />

        {/* Content */}
        <div className="hero-content">
          <div className="hero-eyebrow">
            <div className="hero-eyebrow-line" />
            <span className={`hero-eyebrow-text${!transitioning ? " visible" : ""}`}>
              {SLIDES[current].subtitle}
            </span>
          </div>
          <h1 className={`hero-title${!transitioning ? " visible" : ""}`}>
            {SLIDES[current].title}
          </h1>
        </div>

        {/* Slide counter */}
        <div className="hero-counter">
          {SLIDES.map((slide, i) => (
            <div
              key={slide.id}
              className={`hero-counter-item${i === current ? " active" : ""}`}
              onClick={() => goTo(i)}
            >
              <span className="hero-counter-label">{slide.id}</span>
              <div className="hero-counter-line">
                <div className="hero-counter-fill" />
              </div>
            </div>
          ))}
        </div>

        {/* Mouse icon */}
        <div className={`hero-mouse${mouseVisible ? "" : " hidden"}`}>
          <svg viewBox="0 0 26 38" fill="none" stroke="currentColor" strokeWidth="1.5">
            <rect x="1" y="1" width="24" height="36" rx="12" ry="12"/>
            <line x1="13" y1="8" x2="13" y2="14" strokeLinecap="round" strokeWidth="2"/>
          </svg>
          <div className="hero-mouse-tail" />
        </div>
      </section>
    </>
  );
}