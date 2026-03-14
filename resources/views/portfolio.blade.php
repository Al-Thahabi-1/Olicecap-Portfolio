<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olivecap studio</title>
    <meta name="description" content="Web developer building modern, fast business websites for restaurants, clinics, and local businesses.">

    {{-- Tailwind CDN (replace with proper Vite build in Laravel) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ink:    '#0D0D0F',
                        smoke:  '#141417',
                        panel:  '#1A1A1F',
                        edge:   '#242429',
                        muted:  '#5A5A6E',
                        slate:  '#9898AA',
                        light:  '#E8E8F0',
                        cream:  '#F2EDE6',
                        gold:   '#C8A96E',
                        'gold-soft': '#D4BC8A',
                    },
                    fontFamily: {
                        display: ['"Cormorant Garamond"', 'Georgia', 'serif'],
                        body:    ['"DM Sans"', 'sans-serif'],
                        mono:    ['"JetBrains Mono"', 'monospace'],
                    },
                    letterSpacing: {
                        widest2: '0.25em',
                    },
                }
            }
        }
    </script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --ink:    #0D0D0F;
            --smoke:  #141417;
            --panel:  #1A1A1F;
            --edge:   #242429;
            --muted:  #5A5A6E;
            --slate:  #9898AA;
            --light:  #E8E8F0;
            --cream:  #F2EDE6;
            --gold:   #C8A96E;
        }

        html { background: var(--ink); }
        body { background: var(--ink); color: var(--light); font-family: 'DM Sans', sans-serif; overflow-x: hidden; }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 3px; }
        ::-webkit-scrollbar-track { background: var(--ink); }
        ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 2px; }

        /* ── NOISE OVERLAY ── */
        body::before {
            content: '';
            position: fixed; inset: 0; z-index: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
        }

        /* ── CURSOR ── */
        .cursor { position: fixed; width: 8px; height: 8px; background: var(--gold); border-radius: 50%; pointer-events: none; z-index: 9999; transform: translate(-50%,-50%); transition: transform .15s ease, width .3s ease, height .3s ease, background .3s ease; }
        .cursor-ring { position: fixed; width: 36px; height: 36px; border: 1px solid rgba(200,169,110,.35); border-radius: 50%; pointer-events: none; z-index: 9998; transform: translate(-50%,-50%); transition: all .25s cubic-bezier(.25,.46,.45,.94); }
        body:hover .cursor { opacity: 1; }

        /* ── NAV ── */
        nav { position: fixed; top: 0; left: 0; right: 0; z-index: 100; transition: background .4s, border-color .4s; }
        nav.scrolled { background: rgba(13,13,15,.92); backdrop-filter: blur(16px); border-bottom: 1px solid var(--edge); }
        .nav-link { position: relative; color: var(--slate); font-size: .8rem; letter-spacing: .12em; text-transform: uppercase; font-weight: 500; transition: color .3s; }
        .nav-link::after { content: ''; position: absolute; left: 0; bottom: -2px; width: 0; height: 1px; background: var(--gold); transition: width .35s cubic-bezier(.4,0,.2,1); }
        .nav-link:hover { color: var(--gold); }
        .nav-link:hover::after { width: 100%; }

        /* ── HERO ── */
        .hero-eyebrow { font-family: 'JetBrains Mono', monospace; font-size: .75rem; letter-spacing: .3em; color: var(--gold); text-transform: uppercase; }
        .hero-title { font-family: 'Cormorant Garamond', serif; font-size: clamp(3.5rem, 10vw, 8rem); font-weight: 600; line-height: 1.0; color: var(--cream); letter-spacing: -.01em; }
        .hero-title em { font-style: italic; color: var(--gold); }
        .hero-sub { color: var(--slate); font-size: clamp(.95rem, 2vw, 1.05rem); font-weight: 300; max-width: 480px; line-height: 1.75; }

        /* ── GRADIENT ORBS ── */
        .orb { position: absolute; border-radius: 50%; filter: blur(80px); pointer-events: none; }
        .orb-1 { width: 600px; height: 600px; background: radial-gradient(circle, rgba(200,169,110,.07) 0%, transparent 70%); top: -150px; right: -100px; animation: drift 12s ease-in-out infinite alternate; }
        .orb-2 { width: 400px; height: 400px; background: radial-gradient(circle, rgba(200,169,110,.04) 0%, transparent 70%); bottom: 0; left: -100px; animation: drift 16s ease-in-out infinite alternate-reverse; }
        @keyframes drift { from { transform: translate(0,0) scale(1); } to { transform: translate(30px,20px) scale(1.05); } }

        /* ── HORIZONTAL RULE ── */
        .gold-rule { height: 1px; background: linear-gradient(90deg, transparent, var(--gold), transparent); opacity: .4; }

        /* ── SECTION LABEL ── */
        .section-label { font-family: 'JetBrains Mono', monospace; font-size: .7rem; letter-spacing: .3em; text-transform: uppercase; color: var(--gold); margin-bottom: 1rem; display: flex; align-items: center; gap: .75rem; }
        .section-label::before { content: ''; width: 2rem; height: 1px; background: var(--gold); opacity: .6; flex-shrink: 0; }
        .section-title { font-family: 'Cormorant Garamond', serif; font-size: clamp(2.2rem, 5vw, 3.5rem); font-weight: 600; color: var(--cream); line-height: 1.1; }

        /* ── BUTTONS ── */
        .btn-primary { display: inline-flex; align-items: center; gap: .6rem; padding: .85rem 2rem; background: var(--gold); color: var(--ink); font-weight: 600; font-size: .875rem; letter-spacing: .04em; border-radius: 2px; transition: all .3s cubic-bezier(.4,0,.2,1); cursor: pointer; text-decoration: none; }
        .btn-primary:hover { background: var(--gold-soft); transform: translateY(-2px); box-shadow: 0 8px 30px rgba(200,169,110,.3); }
        .btn-outline { display: inline-flex; align-items: center; gap: .6rem; padding: .85rem 2rem; border: 1px solid rgba(200,169,110,.4); color: var(--gold); font-weight: 500; font-size: .875rem; letter-spacing: .04em; border-radius: 2px; transition: all .3s; cursor: pointer; text-decoration: none; background: transparent; }
        .btn-outline:hover { border-color: var(--gold); background: rgba(200,169,110,.06); transform: translateY(-2px); }

        /* ── CARDS ── */
        .service-card { background: var(--panel); border: 1px solid var(--edge); border-radius: 4px; padding: 2rem; transition: all .4s cubic-bezier(.4,0,.2,1); position: relative; overflow: hidden; }
        .service-card::before { content: ''; position: absolute; inset: 0; background: linear-gradient(135deg, rgba(200,169,110,.05) 0%, transparent 60%); opacity: 0; transition: opacity .4s; }
        .service-card:hover { border-color: rgba(200,169,110,.35); transform: translateY(-4px); box-shadow: 0 20px 60px rgba(0,0,0,.4); }
        .service-card:hover::before { opacity: 1; }
        .service-icon { width: 44px; height: 44px; border: 1px solid rgba(200,169,110,.3); border-radius: 2px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; color: var(--gold); transition: all .3s; }
        .service-card:hover .service-icon { background: rgba(200,169,110,.1); border-color: var(--gold); }

        /* ── PROJECT CARDS ── */
        .project-card { background: var(--panel); border: 1px solid var(--edge); border-radius: 4px; overflow: hidden; transition: all .4s cubic-bezier(.4,0,.2,1); }
        .project-card:hover { border-color: rgba(200,169,110,.3); transform: translateY(-6px); box-shadow: 0 30px 80px rgba(0,0,0,.5); }
        .project-img { width: 100%; aspect-ratio: 16/10; object-fit: cover; display: block; background: var(--edge); position: relative; overflow: hidden; }
        .project-img-inner { width: 100%; height: 100%; transition: transform .6s cubic-bezier(.4,0,.2,1); }
        .project-card:hover .project-img-inner { transform: scale(1.04); }
        .project-tag { font-family: 'JetBrains Mono', monospace; font-size: .65rem; letter-spacing: .2em; text-transform: uppercase; color: var(--gold); background: rgba(200,169,110,.1); border: 1px solid rgba(200,169,110,.2); padding: .2rem .6rem; border-radius: 2px; display: inline-block; }

        /* ── TECH STACK ── */
        .tech-pill { display: flex; align-items: center; gap: .6rem; padding: .75rem 1.25rem; background: var(--panel); border: 1px solid var(--edge); border-radius: 2px; font-size: .875rem; font-weight: 500; color: var(--light); transition: all .3s; }
        .tech-pill:hover { border-color: rgba(200,169,110,.4); color: var(--gold); background: rgba(200,169,110,.04); transform: translateY(-2px); }
        .tech-dot { width: 6px; height: 6px; background: var(--gold); border-radius: 50%; flex-shrink: 0; }

        /* ── WHY CARDS ── */
        .why-item { display: flex; align-items: flex-start; gap: 1rem; padding: 1.5rem; background: var(--panel); border: 1px solid var(--edge); border-radius: 4px; transition: all .3s; }
        .why-item:hover { border-color: rgba(200,169,110,.3); background: rgba(200,169,110,.02); }
        .why-num { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 600; color: rgba(200,169,110,.3); line-height: 1; flex-shrink: 0; width: 2rem; }

        /* ── CONTACT ── */
        .contact-link { display: flex; align-items: center; gap: .75rem; padding: 1rem 1.5rem; background: var(--panel); border: 1px solid var(--edge); border-radius: 4px; color: var(--light); font-weight: 500; text-decoration: none; transition: all .35s; }
        .contact-link:hover { border-color: rgba(200,169,110,.4); color: var(--gold); background: rgba(200,169,110,.04); transform: translateX(4px); }
        .contact-link svg { color: var(--gold); flex-shrink: 0; }

        /* ── REVEAL ANIMATIONS ── */
        .reveal { opacity: 0; transform: translateY(30px); transition: opacity .7s cubic-bezier(.4,0,.2,1), transform .7s cubic-bezier(.4,0,.2,1); }
        .reveal.in-view { opacity: 1; transform: none; }
        .reveal-delay-1 { transition-delay: .1s; }
        .reveal-delay-2 { transition-delay: .2s; }
        .reveal-delay-3 { transition-delay: .3s; }
        .reveal-delay-4 { transition-delay: .4s; }
        .reveal-delay-5 { transition-delay: .5s; }

        /* ── HERO ANIMATIONS ── */
        @keyframes fadeUp { from { opacity:0; transform: translateY(24px); } to { opacity:1; transform:none; } }
        .hero-anim-1 { animation: fadeUp .8s cubic-bezier(.4,0,.2,1) .2s both; }
        .hero-anim-2 { animation: fadeUp .8s cubic-bezier(.4,0,.2,1) .4s both; }
        .hero-anim-3 { animation: fadeUp .8s cubic-bezier(.4,0,.2,1) .6s both; }
        .hero-anim-4 { animation: fadeUp .8s cubic-bezier(.4,0,.2,1) .85s both; }

        /* ── DIVIDER LINE ANIM ── */
        @keyframes expandLine { from { width: 0; } to { width: 4rem; } }
        .line-animate { animation: expandLine 1s cubic-bezier(.4,0,.2,1) 1s both; }

        /* ── MARQUEE ── */
        .marquee-track { display: flex; gap: 3rem; animation: marquee 20s linear infinite; white-space: nowrap; }
        .marquee-track:hover { animation-play-state: paused; }
        @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }

        /* ── MOBILE NAV ── */
        .mobile-menu { display: none; flex-direction: column; gap: 1.5rem; padding: 2rem; background: rgba(13,13,15,.98); backdrop-filter: blur(20px); border-bottom: 1px solid var(--edge); }
        .mobile-menu.open { display: flex; }

        /* ── STAT ── */
        .stat-num { font-family: 'Cormorant Garamond', serif; font-size: 3rem; font-weight: 600; color: var(--gold); line-height: 1; }
    </style>
</head>
<body>

{{-- CUSTOM CURSOR (hidden on touch devices) --}}
<div class="cursor hidden md:block" id="cursor"></div>
<div class="cursor-ring hidden md:block" id="cursorRing"></div>

{{-- ══════════════════════════════════════
     NAVIGATION
══════════════════════════════════════ --}}
<nav id="navbar">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo --}}
            <a href="#hero" class="flex items-center gap-2 group">
                <span class="font-display text-xl text-cream font-semibold tracking-tight group-hover:text-gold transition-colors duration-300">Olivecap</span>
                <span class="hidden sm:block w-px h-4 bg-edge mx-1"></span>
                <span class="hidden sm:block font-mono text-xs text-muted tracking-widest uppercase"> Studio </span>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="#about"    class="nav-link">About</a>
                <a href="#services" class="nav-link">Services</a>
                <a href="#work"     class="nav-link">Work</a>
                <a href="#stack"    class="nav-link">Stack</a>
                <a href="#contact"  class="nav-link">Contact</a>
                <a href="https://wa.me/905551234567" target="_blank" class="btn-primary text-xs py-2.5 px-5">
                    Hire Us
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
                </a>
            </div>

            {{-- Mobile Hamburger --}}
            <button id="menuBtn" class="md:hidden flex flex-col gap-1.5 p-2" aria-label="Menu">
                <span class="menu-bar block w-6 h-px bg-light transition-all duration-300"></span>
                <span class="menu-bar block w-4 h-px bg-light transition-all duration-300"></span>
                <span class="menu-bar block w-6 h-px bg-light transition-all duration-300"></span>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div class="mobile-menu" id="mobileMenu">
        <a href="#about"    class="nav-link text-base py-1" onclick="closeMobileMenu()">About</a>
        <a href="#services" class="nav-link text-base py-1" onclick="closeMobileMenu()">Services</a>
        <a href="#work"     class="nav-link text-base py-1" onclick="closeMobileMenu()">Work</a>
        <a href="#stack"    class="nav-link text-base py-1" onclick="closeMobileMenu()">Stack</a>
        <a href="#contact"  class="nav-link text-base py-1" onclick="closeMobileMenu()">Contact</a>
        <a href="https://wa.me/905551234567" target="_blank" class="btn-primary self-start">Hire Us</a>
    </div>
</nav>

{{-- ══════════════════════════════════════
     HERO SECTION
══════════════════════════════════════ --}}
<section id="hero" class="relative min-h-screen flex items-center overflow-hidden">

    {{-- Background orbs --}}
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    {{-- Grid lines --}}
    <div class="absolute inset-0 opacity-5" style="background-image: linear-gradient(var(--edge) 1px, transparent 1px), linear-gradient(90deg, var(--edge) 1px, transparent 1px); background-size: 80px 80px;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-10 pt-32 pb-24 lg:pt-40 lg:pb-32 w-full">
        <div class="max-w-5xl">

            <p class="hero-eyebrow hero-anim-1 mb-6">
                ✦ &nbsp;Web Developers &nbsp;·&nbsp; Laravel &nbsp;·&nbsp; Mersin, Ankara, Turkey
            </p>

            <h1 class="hero-title hero-anim-2 mb-8">
                Building <em>Modern</em><br>
                Web Solutions<br>
                That <em>Convert</em>
            </h1>

            <p class="hero-sub hero-anim-3 mb-12">
                We design and develop fast, elegant websites for restaurants, clinics, retail shops, and local businesses — turning your brand into a powerful online presence.
            </p>

            <div class="hero-anim-4 flex flex-wrap items-center gap-4">
                <a href="#work" class="btn-primary">
                    View Our Work
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
                </a>
                <a href="#contact" class="btn-outline">
                    Contact Us
                </a>
            </div>

        </div>

        {{-- Floating Stats --}}
        <div class="mt-24 lg:mt-32 grid grid-cols-3 gap-px bg-edge rounded overflow-hidden max-w-2xl">
            <div class="bg-smoke p-6 text-center">
                <div class="stat-num">5+</div>
                <div class="text-muted text-xs font-mono uppercase tracking-widest mt-1">Projects</div>
            </div>
            <div class="bg-smoke p-6 text-center">
                <div class="stat-num">3+</div>
                <div class="text-muted text-xs font-mono uppercase tracking-widest mt-1">Years Dev</div>
            </div>
            <div class="bg-smoke p-6 text-center">
                <div class="stat-num">24h</div>
                <div class="text-muted text-xs font-mono uppercase tracking-widest mt-1">Response</div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-40">
        <span class="font-mono text-xs tracking-widest text-slate uppercase">Scroll</span>
        <div class="w-px h-12 bg-gradient-to-b from-gold to-transparent"></div>
    </div>
</section>

{{-- ══════════════════════════════════════
     MARQUEE BAND
══════════════════════════════════════ --}}
<div class="py-5 border-y border-edge overflow-hidden bg-smoke">
    <div class="marquee-track">
        @foreach(array_fill(0, 2, ['Laravel', 'PHP', 'Tailwind CSS', 'MySQL', 'Responsive Design', 'Fast Delivery', 'Clean Code', 'Business Websites', 'QR Menus', 'Landing Pages']) as $items)
            @foreach($items as $item)
                <span class="font-mono text-xs text-muted tracking-widest uppercase">{{ $item }}</span>
                <span class="text-gold opacity-40">✦</span>
            @endforeach
        @endforeach
    </div>
</div>

{{-- ══════════════════════════════════════
     ABOUT SECTION
══════════════════════════════════════ --}}
<section id="about" class="py-28 lg:py-40 relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- Left: Text --}}
            <div>
                <p class="section-label reveal">About</p>
                <h2 class="section-title reveal reveal-delay-1 mb-8">
                    Built by a Team.<br>
                    <em class="font-display italic text-gold">Driven by purpose.</em>
                </h2>
                <div class="space-y-5 reveal reveal-delay-2">
                    <p class="text-slate leading-relaxed font-light text-lg">
                        We are<span class="text-light font-medium"> Olivecap </span> — a small creative team building modern digital solutions for local businesses.
                    </p>
                    <p class="text-muted leading-relaxed">
                        Our work is built on <span class="text-slate">Laravel</span> and <span class="text-slate">Tailwind CSS</span> — clean, maintainable code that looks great on every screen. We work closely with clients to understand their real business needs, then deliver results fast.
                    </p>
                    <p class="text-muted leading-relaxed">
                        Whether you need a full business website, a QR menu, or a campaign landing page — we get it done with precision and care.
                    </p>
                </div>
                <div class="mt-10 reveal reveal-delay-3">
                    <a href="#contact" class="btn-primary">Let's Talk</a>
                </div>
            </div>

            {{-- Right: Visual Card --}}
            <div class="reveal reveal-delay-2">
                <div class="relative">
                    {{-- Main card --}}
                    <div class="bg-panel border border-edge rounded-lg p-8 relative z-10">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-10 h-10 rounded-full bg-gold flex items-center justify-center text-ink font-bold text-lg font-display">F</div>
                            <div>
                                <div class="text-light font-semibold text-sm">Fares</div>
                                <div class="text-muted text-xs font-mono">Development / Techical / Lead</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-10 h-10 rounded-full bg-gold flex items-center justify-center text-ink font-bold text-lg font-display">N</div>
                            <div>
                                <div class="text-light font-semibold text-sm">Nil</div>
                                <div class="text-muted text-xs font-mono">Design / Content / Visual Direction</div>
                            </div>
                        </div>
                        <div class="space-y-3">
                            @php
                            $skills = [
                                ['Laravel + PHP', 95],
                                ['Tailwind CSS', 90],
                                ['Fluttler', 95],
                                ['Figma', 90],
                                ['Shopify', 80],
                                ['WordPress', 85],
                                ['MySQL / DB Design', 85],
                                ['Responsive Design', 100],
                                ['Performance Optimization', 90],
                                ['UI / Content Direction', 95]
                            ];
                            @endphp
                            @foreach($skills as $skill)
                            <div>
                                <div class="flex justify-between mb-1.5">
                                    <span class="text-slate text-xs font-mono">{{ $skill[0] }}</span>
                                    <span class="text-gold text-xs font-mono">{{ $skill[1] }}%</span>
                                </div>
                                <div class="h-px bg-edge rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-gold to-gold-soft skill-bar rounded-full" style="width: 0%" data-width="{{ $skill[1] }}%"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-8 pt-6 border-t border-edge flex items-center justify-between">
                            <span class="text-muted text-xs font-mono">Available for projects</span>
                            <span class="flex items-center gap-2 text-xs text-gold font-mono">
                                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse inline-block"></span>
                                Online
                            </span>
                        </div>
                    </div>
                    {{-- Decorative border --}}
                    <div class="absolute -bottom-4 -right-4 w-full h-full border border-gold opacity-10 rounded-lg z-0"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="gold-rule max-w-7xl mx-auto px-6 lg:px-10"></div>

{{-- ══════════════════════════════════════
     SERVICES SECTION
══════════════════════════════════════ --}}
<section id="services" class="py-28 lg:py-40">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="max-w-xl mb-16">
            <p class="section-label reveal">What I Build</p>
            <h2 class="section-title reveal reveal-delay-1">Services</h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">

            {{-- Service Card: Business Website --}}
            <div class="service-card reveal reveal-delay-1">
                <div class="service-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                </div>
                <h3 class="text-light font-semibold text-lg mb-2">Business Website</h3>
                <p class="text-muted text-sm leading-relaxed font-light">A full, multi-page website for your business. Clean design, fast performance, mobile-first — built to impress clients and rank in search.</p>
                <div class="mt-6 flex items-center gap-2 text-gold text-xs font-mono">
                    <span>→</span> <span>Most Popular</span>
                </div>
            </div>

            {{-- Product Catalog --}}
            <div class="service-card reveal reveal-delay-2">
                <div class="service-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/><path d="M16 3H8a2 2 0 00-2 2v2h12V5a2 2 0 00-2-2z"/></svg>
                </div>
                <h3 class="text-light font-semibold text-lg mb-2">Product Catalog Page</h3>
                <p class="text-muted text-sm leading-relaxed font-light">Showcase your products or services in a structured, elegant catalog. Perfect for furniture stores, retail, and service providers.</p>
            </div>

            {{-- QR Menu --}}
            <div class="service-card reveal reveal-delay-3">
                <div class="service-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="3" height="3"/><rect x="18" y="18" width="3" height="3"/><rect x="14" y="18" width="3" height="3"/><rect x="18" y="14" width="3" height="3"/></svg>
                </div>
                <h3 class="text-light font-semibold text-lg mb-2">QR Menu Page</h3>
                <p class="text-muted text-sm leading-relaxed font-light">A digital menu for restaurants and cafes — beautifully designed, easy to update, accessible via QR code. No app download needed.</p>
            </div>

            {{-- WhatsApp Order --}}
            <div class="service-card reveal reveal-delay-1">
                <div class="service-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                </div>
                <h3 class="text-light font-semibold text-lg mb-2">WhatsApp / Order Page</h3>
                <p class="text-muted text-sm leading-relaxed font-light">A simple one-page order form or menu that sends orders directly to WhatsApp. Great for small businesses that want fast conversions.</p>
            </div>

            {{-- Campaign Landing Page --}}
            <div class="service-card reveal reveal-delay-2 sm:col-span-2 lg:col-span-1">
                <div class="service-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                </div>
                <h3 class="text-light font-semibold text-lg mb-2">Campaign Landing Page</h3>
                <p class="text-muted text-sm leading-relaxed font-light">A focused, high-converting landing page for promotions, offers, or product launches. Designed to capture leads and drive action.</p>
                <div class="mt-6 flex items-center gap-2 text-gold text-xs font-mono">
                    <span>→</span> <span>High Impact</span>
                </div>
            </div>
            {{-- Service Card: Custom Laravel Websites --}}
            <div class="service-card reveal reveal-delay-1">
                <div class="service-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <h3 class="text-light font-semibold text-lg mb-2">Custom Laravel Websites</h3>
                <p class="text-muted text-sm leading-relaxed font-light">Tailored Laravel-based websites built for performance, flexibility, and long-term scalability. Ideal for businesses that need more than a basic template.</p>
            </div>

            {{-- Service Card: Admin Panels & Dashboards --}}
            <div class="service-card reveal reveal-delay-2">
                <div class="service-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>
                </div>
                <h3 class="text-light font-semibold text-lg mb-2">Admin Panels & Dashboards</h3>
                <p class="text-muted text-sm leading-relaxed font-light">Secure and easy-to-manage dashboards for handling content, products, bookings, or internal business data. Built with Laravel for clean management workflows.</p>
            </div>

            {{-- Service Card: Booking & Request Systems --}}
            <div class="service-card reveal reveal-delay-3">
                <div class="service-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                        <path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01"/>
                    </svg>
                </div>
                <h3 class="text-light font-semibold text-lg mb-2">Booking & Request Systems</h3>
                <p class="text-muted text-sm leading-relaxed font-light">Simple and efficient booking or inquiry systems for clinics, service businesses, and local brands — designed to improve communication and save time.</p>
            </div>
            {{-- Service Card: Cross-Platform Mobile Apps --}}
            <div class="service-card reveal reveal-delay-1">
                <div class="service-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <rect x="7" y="2" width="10" height="20" rx="2"/>
                        <path d="M11 18h2"/>
                    </svg>
                </div>
                <h3 class="text-light font-semibold text-lg mb-2">Cross-Platform Mobile Apps</h3>
                <p class="text-muted text-sm leading-relaxed font-light">Modern mobile applications built for Android and iOS using a single codebase — ideal for businesses that need fast, scalable, and user-friendly app experiences.</p>
            </div>

        </div>
    </div>
</section>

<div class="gold-rule max-w-7xl mx-auto px-6 lg:px-10"></div>

{{-- ══════════════════════════════════════
     PORTFOLIO SECTION
══════════════════════════════════════ --}}
<section id="work" class="py-28 lg:py-40">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-16">
            <div>
                <p class="section-label reveal">Featured Work</p>
                <h2 class="section-title reveal reveal-delay-1">Selected Projects</h2>
            </div>
            <p class="text-muted text-sm font-light max-w-xs text-right reveal reveal-delay-2">Each project is tailored to the client's business, not from a template.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">

            {{-- Project 1: Dentora Clinic --}}
            <div class="project-card reveal reveal-delay-1">
                <div class="project-img">
                    <div class="project-img-inner w-full h-52 flex items-center justify-center relative overflow-hidden" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);">
                        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 30% 50%, rgba(99,179,237,.3), transparent 60%);"></div>
                        <div class="text-center z-10">
                            <div class="text-4xl mb-2">🦷</div>
                            <div class="font-display text-2xl text-white font-semibold">Dentora</div>
                            <div class="font-mono text-xs text-blue-300 tracking-widest uppercase mt-1">Clinic</div>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="project-tag">Clinic</span>
                        <span class="project-tag">Healthcare</span>
                    </div>
                    <h3 class="text-light font-semibold text-xl mb-2">Dentora Clinic</h3>
                    <p class="text-muted text-sm leading-relaxed font-light mb-5">A clean, professional website for a modern dental clinic. Includes service pages, appointment CTA, and trust-building sections.</p>
                    <div class="flex items-center gap-3">
                        <a href="#" class="btn-primary text-xs py-2 px-4">Live Demo ↗</a>
                        <a href="#" class="btn-outline text-xs py-2 px-4">Details</a>
                    </div>
                </div>
            </div>

            {{-- Project 2: Restaurant --}}
            <div class="project-card reveal reveal-delay-2">
                <div class="project-img">
                    <div class="project-img-inner w-full h-52 flex items-center justify-center relative overflow-hidden" style="background: linear-gradient(135deg, #1a0a00 0%, #2d1200 50%, #4a1e00 100%);">
                        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 70% 40%, rgba(251,146,60,.25), transparent 60%);"></div>
                        <div class="text-center z-10">
                            <div class="text-4xl mb-2">🍽️</div>
                            <div class="font-display text-2xl text-white font-semibold">Ember & Co.</div>
                            <div class="font-mono text-xs text-orange-300 tracking-widest uppercase mt-1">Restaurant</div>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="project-tag">Restaurant</span>
                        <span class="project-tag">QR Menu</span>
                    </div>
                    <h3 class="text-light font-semibold text-xl mb-2">Restaurant Demo</h3>
                    <p class="text-muted text-sm leading-relaxed font-light mb-5">A full restaurant landing page with digital menu, atmosphere gallery, and WhatsApp reservation integration.</p>
                    <div class="flex items-center gap-3">
                        <a href="#" class="btn-primary text-xs py-2 px-4">Live Demo ↗</a>
                        <a href="#" class="btn-outline text-xs py-2 px-4">Details</a>
                    </div>
                </div>
            </div>

            {{-- Project 3: Furniture --}}
            <div class="project-card reveal reveal-delay-3">
                <div class="project-img">
                    <div class="project-img-inner w-full h-52 flex items-center justify-center relative overflow-hidden" style="background: linear-gradient(135deg, #0d0d0a 0%, #1a1a12 50%, #2a2a1a 100%);">
                        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 50% 60%, rgba(200,169,110,.3), transparent 60%);"></div>
                        <div class="text-center z-10">
                            <div class="text-4xl mb-2">🪑</div>
                            <div class="font-display text-2xl text-white font-semibold">Luxe Chairs</div>
                            <div class="font-mono text-xs tracking-widest uppercase mt-1" style="color:#c8a96e;">Premium Furniture</div>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="project-tag">Furniture</span>
                        <span class="project-tag">Catalog</span>
                    </div>
                    <h3 class="text-light font-semibold text-xl mb-2">Premium Chairs Demo</h3>
                    <p class="text-muted text-sm leading-relaxed font-light mb-5">A luxury product catalog page for a furniture brand. Editorial design, product showcase, and contact-to-order flow.</p>
                    <div class="flex items-center gap-3">
                        <a href="#" class="btn-primary text-xs py-2 px-4">Live Demo ↗</a>
                        <a href="#" class="btn-outline text-xs py-2 px-4">Details</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="gold-rule max-w-7xl mx-auto px-6 lg:px-10"></div>


{{-- ══════════════════════════════════════
     WHO We BUILD FOR SECTION
══════════════════════════════════════ --}}
<section id="clients" class="py-28 lg:py-40 relative overflow-hidden">

    {{-- Subtle background glow --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse, rgba(200,169,110,.04) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-10">

        <div class="max-w-xl mb-16">
            <p class="section-label reveal">Ideal Clients</p>
            <h2 class="section-title reveal reveal-delay-1">
                Who We Work With<br>
                <em class="font-display italic text-gold">Websites For</em>
            </h2>
            <p class="text-muted mt-5 leading-relaxed font-light reveal reveal-delay-2">
                We specialize in fast, business-focused digital solutions for local businesses that want a strong online presence — without unnecessary complexity.
            </p>
        </div>

        @php
        $clientTypes = [
            [
                'icon' => '<path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>',
                'label' => 'Restaurants',
                'desc'  => 'Full websites, digital menus & WhatsApp order pages.',
                'color' => 'rgba(251,146,60,.12)',
                'border'=> 'rgba(251,146,60,.25)',
            ],
            [
                'icon' => '<path d="M20 3H4v10c0 2.21 1.79 4 4 4h6c2.21 0 4-1.79 4-4v-3h2c1.11 0 2-.89 2-2V5c0-1.11-.89-2-2-2zm0 5h-2V5h2v3zM4 19h16v2H4z"/>',
                'label' => 'Cafés & Coffee Shops',
                'desc'  => 'QR menus, brand pages & reservation CTAs.',
                'color' => 'rgba(200,169,110,.08)',
                'border'=> 'rgba(200,169,110,.25)',
            ],
            [
                'icon' => '<path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z"/>',
                'label' => 'Clinics & Healthcare',
                'desc'  => 'Trust-building websites with appointment CTAs.',
                'color' => 'rgba(99,179,237,.08)',
                'border'=> 'rgba(99,179,237,.2)',
            ],
            [
                'icon' => '<path d="M20 4H4v2l8 5 8-5V4zM4 8.236V20h16V8.236l-8 5-8-5z"/>',
                'label' => 'Retail Shops & Stores',
                'desc'  => 'Product catalogs, showcase pages & offer campaigns.',
                'color' => 'rgba(167,243,208,.06)',
                'border'=> 'rgba(167,243,208,.18)',
            ],
            [
                'icon' => '<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" fill="none"/>',
                'label' => 'Furniture & Showrooms',
                'desc'  => 'Premium catalog pages with inquiry & WhatsApp flow.',
                'color' => 'rgba(200,169,110,.08)',
                'border'=> 'rgba(200,169,110,.25)',
            ],
            [
                'icon' => '<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>',
                'label' => 'Service Businesses',
                'desc'  => 'Any Service business that needs a modern web presence fast.',
                'color' => 'rgba(200,169,110,.06)',
                'border'=> 'rgba(200,169,110,.2)',
            ],
        ];
        @endphp

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($clientTypes as $i => $client)
            <div class="service-card reveal reveal-delay-{{ ($i % 3) + 1 }} group">
                <div class="service-icon" style="background: {{ $client['color'] }}; border-color: {{ $client['border'] }};">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" class="text-gold">
                        {!! $client['icon'] !!}
                    </svg>
                </div>
                <h3 class="text-light font-semibold text-base mb-2">{{ $client['label'] }}</h3>
                <p class="text-muted text-sm font-light leading-relaxed">{{ $client['desc'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Bottom CTA banner --}}
        <div class="mt-14 reveal reveal-delay-2">
            <div class="bg-panel border border-edge rounded-lg p-8 lg:p-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8" style="background: linear-gradient(135deg, rgba(200,169,110,.04) 0%, transparent 60%), var(--panel);">
                <div>
                    <p class="font-mono text-xs text-gold tracking-widest uppercase mb-3">Ready to go digital?</p>
                    <h3 class="font-display text-2xl lg:text-3xl text-cream font-semibold leading-tight">
                        Your business deserves<br>
                        <em class="italic text-gold">a website that works.</em>
                    </h3>
                    <p class="text-muted text-sm font-light mt-3 max-w-md leading-relaxed">
                        Fast to launch. Built for mobile. Designed to convert visitors into customers. Let's discuss your project today.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 flex-shrink-0">
                    <a href="https://wa.me/905551234567?text=Hi%20Fares%2C%20I%27d%20like%20to%20discuss%20a%20web%20project." target="_blank" class="btn-primary whitespace-nowrap">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Start on WhatsApp
                    </a>
                    <a href="#contact" class="btn-outline whitespace-nowrap">View Contact Options</a>
                </div>
            </div>
        </div>

    </div>
</section>

<div class="gold-rule max-w-7xl mx-auto px-6 lg:px-10"></div>


{{-- ══════════════════════════════════════
     TECH STACK SECTION
══════════════════════════════════════ --}}
<section id="stack" class="py-28 lg:py-40">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="max-w-xl mb-16">
            <p class="section-label reveal">Tools & Technologies</p>
            <h2 class="section-title reveal reveal-delay-1">our Tech Stack</h2>
            <p class="text-muted mt-4 leading-relaxed font-light reveal reveal-delay-2">The technologies we use to build fast, robust, and maintainable web solutions.</p>
        </div>

        <div class="flex flex-wrap gap-3 reveal reveal-delay-2">
            @php
            $stack = [
                ['Laravel', '🔴'],
                ['PHP', '🐘'],
                ['Tailwind CSS', '🎨'],
                ['MySQL', '🗄️'],
                ['Git / GitHub', '🐙'],
                ['Responsive Design', '📱'],
                ['Alpine.js', '⚡'],
                ['Blade Templates', '🔪'],
                ['Performance Optimization', '🚀'],
                ['REST APIs', '🔗'],
                ['Flutter', '📱'],
                ['Figma', '🎨'],
                ['Shopify', '🛒'],
                ['WordPress', '📄'],
                ['JavaScript', '📜'],
            ];
            @endphp
            @foreach($stack as $index => [$name, $icon])
            <div class="tech-pill reveal" style="transition-delay: {{ $index * 0.05 }}s">
                <span class="tech-dot"></span>
                <span class="font-mono text-xs">{{ $name }}</span>
            </div>
            @endforeach
        </div>

    </div>
</section>

<div class="gold-rule max-w-7xl mx-auto px-6 lg:px-10"></div>

{{-- ══════════════════════════════════════
     WHY WORK WITH US 
══════════════════════════════════════ --}}
<section id="why" class="py-28 lg:py-40">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="grid lg:grid-cols-2 gap-16 items-start">

            <div>
                <p class="section-label reveal">Advantages</p>
                <h2 class="section-title reveal reveal-delay-1 mb-6">
                    Why Work<br>With <em class="font-display italic text-gold">Us?</em>
                </h2>
                <p class="text-muted leading-relaxed font-light reveal reveal-delay-2"> We're a focused ceative team that builds with care, speed, and real business intent.</p>
            </div>

            <div class="grid gap-4">
                @php
                $reasons = [
                    ['Fast Delivery', 'No long waits. We work efficiently and deliver within agreed timelines.'],
                    ['Clean, Modern UI', 'Every design is intentional — readable, beautiful, and on-brand.'],
                    ['Mobile Responsive', 'Your site looks perfect on phones, tablets, and desktops — always.'],
                    ['Business-Focused', 'We build for results: more leads, more orders, more trust.'],
                    ['Simple Structure', 'Clean code that\'s easy to update, maintain, and hand off.'],
                ];
                @endphp
                @foreach($reasons as $i => [$title, $desc])
                <div class="why-item reveal" style="transition-delay: {{ $i * 0.08 }}s">
                    <span class="why-num">0{{ $i + 1 }}</span>
                    <div>
                        <h4 class="text-light font-semibold text-sm mb-1">{{ $title }}</h4>
                        <p class="text-muted text-sm font-light leading-relaxed">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<div class="gold-rule max-w-7xl mx-auto px-6 lg:px-10"></div>

{{-- ══════════════════════════════════════
     CONTACT SECTION
══════════════════════════════════════ --}}
<section id="contact" class="py-28 lg:py-40 relative overflow-hidden">

    {{-- Background glow --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-gold opacity-5 rounded-full filter blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-10">

        <div class="max-w-3xl mx-auto text-center mb-16">
            <p class="section-label reveal justify-center" style="justify-content: center;">Ready to Start</p>
            <h2 class="section-title reveal reveal-delay-1 mb-6">
                Let's Build Something<br>
                <em class="font-display italic text-gold">Great Together</em>
            </h2>
            <p class="text-muted leading-relaxed font-light reveal reveal-delay-2">
                Have a project in mind? We'd love to hear about it. Reach out through any channel below and we'll get back to you as soon as possible.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl mx-auto">

            <a href="https://wa.me/905551234567" target="_blank" class="contact-link reveal reveal-delay-1">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-green-400">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                <div>
                    <div class="text-xs text-muted font-mono mb-0.5">WhatsApp</div>
                    <div class="text-sm font-medium">Send a Message</div>
                </div>
            </a>

            <a href="https://github.com/faresabughassan" target="_blank" class="contact-link reveal reveal-delay-2">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                </svg>
                <div>
                    <div class="text-xs text-muted font-mono mb-0.5">GitHub</div>
                    <div class="text-sm font-medium">See Our GitHub</div>
                </div>
            </a>

            <a href="https://linkedin.com/in/faresabughassan" target="_blank" class="contact-link reveal reveal-delay-3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-blue-400">
                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
                <div>
                    <div class="text-xs text-muted font-mono mb-0.5">LinkedIn</div>
                    <div class="text-sm font-medium">Connect With Us</div>
                </div>
            </a>

            <a href="mailto:fares@example.com" class="contact-link reveal reveal-delay-4">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" class="text-gold">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <div>
                    <div class="text-xs text-muted font-mono mb-0.5">Email</div>
                    <div class="text-sm font-medium">Send an Email</div>
                </div>
            </a>

        </div>

    </div>
</section>

{{-- ══════════════════════════════════════
     FOOTER
══════════════════════════════════════ --}}
<footer class="border-t border-edge py-10">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <span class="font-display text-lg text-cream">Olivecap</span>
            <span class="text-edge">|</span>
            <span class="text-muted text-xs font-mono">Studio</span>
        </div>
        <p class="text-muted text-xs font-mono text-center">
            &copy; {{ date('Y') }} · Built with Laravel + Tailwind CSS · Mersin, Turkey
        </p>
        <div class="flex items-center gap-1 text-muted text-xs font-mono">
            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse inline-block"></span>
            <span>Available for projects</span>
        </div>
    </div>
</footer>

{{-- ══════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════ --}}
<script>
// ── Custom Cursor ──
const cursor = document.getElementById('cursor');
const cursorRing = document.getElementById('cursorRing');
let mouseX = 0, mouseY = 0, ringX = 0, ringY = 0;

document.addEventListener('mousemove', e => {
    mouseX = e.clientX; mouseY = e.clientY;
    cursor.style.left = mouseX + 'px';
    cursor.style.top  = mouseY + 'px';
});

function animateCursor() {
    ringX += (mouseX - ringX) * 0.12;
    ringY += (mouseY - ringY) * 0.12;
    cursorRing.style.left = ringX + 'px';
    cursorRing.style.top  = ringY + 'px';
    requestAnimationFrame(animateCursor);
}
animateCursor();

document.querySelectorAll('a, button, .service-card, .project-card').forEach(el => {
    el.addEventListener('mouseenter', () => {
        cursor.style.width  = '16px';
        cursor.style.height = '16px';
        cursorRing.style.width  = '56px';
        cursorRing.style.height = '56px';
        cursorRing.style.borderColor = 'rgba(200,169,110,.6)';
    });
    el.addEventListener('mouseleave', () => {
        cursor.style.width  = '8px';
        cursor.style.height = '8px';
        cursorRing.style.width  = '36px';
        cursorRing.style.height = '36px';
        cursorRing.style.borderColor = 'rgba(200,169,110,.35)';
    });
});

// ── Navbar scroll ──
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 40);
});

// ── Scroll Reveal ──
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// ── Skill bars ──
const barObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.querySelectorAll('.skill-bar').forEach(bar => {
                const w = bar.dataset.width;
                setTimeout(() => {
                    bar.style.transition = 'width 1s cubic-bezier(.4,0,.2,1)';
                    bar.style.width = w;
                }, 200);
            });
            barObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.3 });

document.querySelectorAll('.skill-bar').forEach(bar => {
    const card = bar.closest('.bg-panel');
    if (card) barObserver.observe(card);
});

// ── Mobile Menu ──
const menuBtn = document.getElementById('menuBtn');
const mobileMenu = document.getElementById('mobileMenu');
let menuOpen = false;

menuBtn.addEventListener('click', () => {
    menuOpen = !menuOpen;
    mobileMenu.classList.toggle('open', menuOpen);
    const bars = menuBtn.querySelectorAll('.menu-bar');
    if (menuOpen) {
        bars[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
        bars[1].style.opacity = '0';
        bars[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
    } else {
        bars.forEach(b => { b.style.transform = ''; b.style.opacity = ''; });
    }
});

function closeMobileMenu() {
    menuOpen = false;
    mobileMenu.classList.remove('open');
    menuBtn.querySelectorAll('.menu-bar').forEach(b => { b.style.transform = ''; b.style.opacity = ''; });
}

// ── Smooth scroll for anchor links ──
document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
        const target = document.querySelector(a.getAttribute('href'));
        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});
</script>

</body>
</html>