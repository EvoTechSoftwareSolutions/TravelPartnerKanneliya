// Header.jsx - Reusable across all pages
import { useState, useEffect } from "react";

export default function Header() {
  const [scrolled, setScrolled] = useState(false);
  const [menuOpen, setMenuOpen] = useState(false);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 40);
    window.addEventListener("scroll", onScroll);
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  const navLinks = ["Home", "Packages", "About", "Kanneliya", "Gallery", "Contact"];

  return (
    <>
      <style>{`
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Jost:wght@300;400;500;600&display=swap');

        .kn-header {
          position: fixed;
          top: 0; left: 0; right: 0;
          z-index: 1000;
          transition: background 0.5s ease, backdrop-filter 0.5s ease, box-shadow 0.5s ease;
          padding: 0 40px;
          height: 72px;
          display: flex;
          align-items: center;
          justify-content: space-between;
          font-family: 'Jost', sans-serif;
        }
        .kn-header.scrolled {
          background: rgba(10, 20, 15, 0.85);
          backdrop-filter: blur(16px);
          box-shadow: 0 1px 0 rgba(255,255,255,0.06);
        }

        .kn-logo {
          display: flex;
          align-items: center;
          gap: 12px;
          text-decoration: none;
          cursor: pointer;
        }
        .kn-logo-circle {
          width: 52px; height: 52px;
          border-radius: 50%;
          border: 2px solid rgba(255,255,255,0.25);
          display: flex; align-items: center; justify-content: center;
          overflow: hidden;
          background: rgba(20,40,28,0.7);
        }
        .kn-logo-circle svg {
          width: 34px; height: 34px;
        }

        .kn-nav {
          display: flex;
          align-items: center;
          gap: 36px;
          list-style: none;
          margin: 0; padding: 0;
        }
        .kn-nav a {
          color: rgba(255,255,255,0.82);
          text-decoration: none;
          font-size: 13px;
          font-weight: 400;
          letter-spacing: 0.08em;
          text-transform: uppercase;
          transition: color 0.3s;
          position: relative;
          padding-bottom: 4px;
        }
        .kn-nav a::after {
          content: '';
          position: absolute;
          bottom: 0; left: 0;
          width: 0; height: 1px;
          background: #4dd9ac;
          transition: width 0.35s ease;
        }
        .kn-nav a:hover { color: #fff; }
        .kn-nav a:hover::after { width: 100%; }

        .kn-cta {
          border: 1px solid rgba(255,255,255,0.55);
          color: #fff;
          background: transparent;
          padding: 9px 24px;
          font-family: 'Jost', sans-serif;
          font-size: 12px;
          letter-spacing: 0.12em;
          text-transform: uppercase;
          cursor: pointer;
          border-radius: 2px;
          transition: background 0.3s, border-color 0.3s, color 0.3s;
        }
        .kn-cta:hover {
          background: #4dd9ac;
          border-color: #4dd9ac;
          color: #0a1410;
        }

        /* Hamburger */
        .kn-hamburger {
          display: none;
          flex-direction: column;
          gap: 5px;
          cursor: pointer;
          padding: 4px;
        }
        .kn-hamburger span {
          display: block;
          width: 24px; height: 2px;
          background: #fff;
          border-radius: 2px;
          transition: transform 0.3s, opacity 0.3s;
        }
        .kn-hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .kn-hamburger.open span:nth-child(2) { opacity: 0; }
        .kn-hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

        /* Mobile drawer */
        .kn-mobile-nav {
          display: none;
          position: fixed;
          top: 72px; left: 0; right: 0;
          background: rgba(10,20,15,0.97);
          backdrop-filter: blur(20px);
          z-index: 999;
          flex-direction: column;
          padding: 24px 32px 32px;
          gap: 0;
          border-top: 1px solid rgba(255,255,255,0.08);
          transform: translateY(-20px);
          opacity: 0;
          pointer-events: none;
          transition: transform 0.35s ease, opacity 0.35s ease;
        }
        .kn-mobile-nav.open {
          transform: translateY(0);
          opacity: 1;
          pointer-events: all;
        }
        .kn-mobile-nav a {
          color: rgba(255,255,255,0.8);
          text-decoration: none;
          font-size: 15px;
          font-family: 'Jost', sans-serif;
          letter-spacing: 0.1em;
          text-transform: uppercase;
          padding: 14px 0;
          border-bottom: 1px solid rgba(255,255,255,0.07);
          transition: color 0.3s;
        }
        .kn-mobile-nav a:hover { color: #4dd9ac; }
        .kn-mobile-cta {
          margin-top: 20px;
          border: 1px solid rgba(255,255,255,0.4);
          color: #fff;
          background: transparent;
          padding: 12px 24px;
          font-family: 'Jost', sans-serif;
          font-size: 12px;
          letter-spacing: 0.12em;
          text-transform: uppercase;
          cursor: pointer;
          border-radius: 2px;
          width: 100%;
          transition: background 0.3s;
        }
        .kn-mobile-cta:hover { background: #4dd9ac; border-color: #4dd9ac; color: #0a1410; }

        /* Social sidebar */
        .kn-social {
          position: fixed;
          left: 32px;
          top: 50%;
          transform: translateY(-50%);
          z-index: 100;
          display: flex;
          flex-direction: column;
          align-items: center;
          gap: 16px;
        }
        .kn-social-label {
          font-family: 'Jost', sans-serif;
          font-size: 10px;
          letter-spacing: 0.22em;
          color: rgba(255,255,255,0.55);
          text-transform: uppercase;
          writing-mode: vertical-rl;
          transform: rotate(180deg);
          margin-bottom: 12px;
        }
        .kn-social a {
          color: rgba(255,255,255,0.55);
          transition: color 0.3s, transform 0.3s;
          display: flex;
          align-items: center;
          justify-content: center;
        }
        .kn-social a:hover { color: #4dd9ac; transform: scale(1.2); }

        @media (max-width: 900px) {
          .kn-nav, .kn-cta { display: none; }
          .kn-hamburger { display: flex; }
          .kn-mobile-nav { display: flex; }
          .kn-social { display: none; }
          .kn-header { padding: 0 20px; }
        }
      `}</style>

      <header className={`kn-header${scrolled ? " scrolled" : ""}`}>
        {/* Logo */}
        <div className="kn-logo">
          <div className="kn-logo-circle">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="20" cy="20" r="18" stroke="#4dd9ac" strokeWidth="1.5" fill="none"/>
              <path d="M20 30 L20 18" stroke="#4dd9ac" strokeWidth="1.5"/>
              <path d="M20 18 C20 18 14 14 14 10 C14 7 17 6 20 8 C23 6 26 7 26 10 C26 14 20 18 20 18Z" fill="#4dd9ac" opacity="0.9"/>
              <path d="M20 18 C20 18 16 15 15 12" stroke="#4dd9ac" strokeWidth="1" opacity="0.6"/>
              <path d="M20 18 C20 18 24 15 25 12" stroke="#4dd9ac" strokeWidth="1" opacity="0.6"/>
              <path d="M13 30 Q20 24 27 30" stroke="#4dd9ac" strokeWidth="1.2" fill="none" opacity="0.7"/>
            </svg>
          </div>
        </div>

        {/* Desktop Nav */}
        <nav>
          <ul className="kn-nav">
            {navLinks.map(link => (
              <li key={link}><a href="#">{link}</a></li>
            ))}
          </ul>
        </nav>

        {/* CTA */}
        <button className="kn-cta">Call Us</button>

        {/* Hamburger */}
        <div className={`kn-hamburger${menuOpen ? " open" : ""}`} onClick={() => setMenuOpen(!menuOpen)}>
          <span/><span/><span/>
        </div>
      </header>

      {/* Mobile Nav */}
      <div className={`kn-mobile-nav${menuOpen ? " open" : ""}`}>
        {navLinks.map(link => (
          <a key={link} href="#" onClick={() => setMenuOpen(false)}>{link}</a>
        ))}
        <button className="kn-mobile-cta">Call Us</button>
      </div>

      {/* Social Sidebar */}
      <div className="kn-social">
        <span className="kn-social-label">Follow Us</span>
        <a href="#" aria-label="Facebook">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
          </svg>
        </a>
        <a href="#" aria-label="Instagram">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
            <circle cx="12" cy="12" r="4"/>
            <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
          </svg>
        </a>
        <a href="#" aria-label="YouTube">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 00-1.95 1.96A29 29 0 001 12a29 29 0 00.46 5.58A2.78 2.78 0 003.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58zM10 15.5v-7l6 3.5-6 3.5z"/>
          </svg>
        </a>
      </div>
    </>
  );
}