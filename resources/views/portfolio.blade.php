<!DOCTYPE html>
<html lang="en" dir="ltr" class="scroll-smooth" id="htmlRoot">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OliveCap Studio — Premium Web Solutions</title>
    <meta name="description" content="OliveCap Studio — We design and build premium, fast, conversion-focused websites and digital products for restaurants, clinics, and ambitious local businesses.">

    {{-- Favicon & browser icons --}}
    <link rel="icon" type="image/jpeg" href="/img/logo.jpeg">
    <link rel="apple-touch-icon" href="/img/logo.jpeg">
    <meta name="theme-color" content="#0A0A0B">

    {{-- Open Graph (Google preview, social sharing) --}}
    <meta property="og:title" content="OliveCap Studio — Premium Web Solutions">
    <meta property="og:description" content="We design and build premium, fast, conversion-focused websites and digital products for restaurants, clinics, and ambitious local businesses.">
    <meta property="og:image" content="/img/logo.jpeg">
    <meta property="og:type" content="website">

    {{-- Tailwind CDN with brand-aligned config --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ink:        '#0A0A0B',
                        smoke:      '#101013',
                        panel:      '#16161A',
                        'panel-2':  '#1C1C22',
                        edge:       '#26262E',
                        muted:      '#5A5A6E',
                        slate:      '#9898AA',
                        light:      '#E8E8F0',
                        cream:      '#F5F5F7',
                        teal:       '#5EEAD4',
                        'teal-soft':'#99F6E4',
                        'teal-deep':'#2DD4BF',
                        'teal-glow':'rgba(94,234,212,.15)',
                    },
                    fontFamily: {
                        display: ['"Cormorant Garamond"', 'Georgia', 'serif'],
                        body:    ['"DM Sans"', 'sans-serif'],
                        arabic:  ['"Tajawal"', '"DM Sans"', 'sans-serif'],
                        mono:    ['"JetBrains Mono"', 'monospace'],
                    },
                    letterSpacing: {
                        widest2: '0.25em',
                        widest3: '0.32em',
                    },
                }
            }
        }
    </script>

    {{-- Google Fonts: Latin + Arabic + Turkish (Latin Ext covers TR) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --ink:       #0A0A0B;
            --smoke:     #101013;
            --panel:     #16161A;
            --panel-2:   #1C1C22;
            --edge:      #26262E;
            --muted:     #5A5A6E;
            --slate:     #9898AA;
            --light:     #E8E8F0;
            --cream:     #F5F5F7;
            --teal:      #5EEAD4;
            --teal-soft: #99F6E4;
            --teal-deep: #2DD4BF;
            --teal-glow: rgba(94,234,212,.15);
        }

        html { background: var(--ink); }
        body {
            background: var(--ink);
            color: var(--light);
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        body[dir="rtl"] { font-family: 'Tajawal', 'DM Sans', sans-serif; }
        body[dir="rtl"] .font-display { font-family: 'Tajawal', 'Cormorant Garamond', serif; font-weight: 700; }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: var(--ink); }
        ::-webkit-scrollbar-thumb { background: linear-gradient(var(--teal-deep), var(--teal)); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--teal); }

        ::selection { background: var(--teal); color: var(--ink); }

        /* ── PAGE LOADER ── */
        #pageLoader {
            position: fixed; inset: 0; z-index: 99999;
            background: var(--ink);
            display: flex; align-items: center; justify-content: center;
            transition: opacity .8s ease, visibility .8s ease;
        }
        #pageLoader.hidden-loader { opacity: 0; visibility: hidden; pointer-events: none; }
        .loader-mark {
            width: 80px; height: 80px;
            border-radius: 50%;
            background: #000;
            display: flex; align-items: center; justify-content: center;
            position: relative;
            animation: loaderPulse 2s ease-in-out infinite;
        }
        .loader-mark::before {
            content: '';
            position: absolute; inset: -10px;
            border-radius: 50%;
            border: 1px solid var(--teal);
            opacity: .3;
            animation: loaderRing 2s ease-in-out infinite;
        }
        .loader-c {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem; color: #fff; font-weight: 600;
            position: relative; line-height: 1;
        }
        .loader-c::after {
            content: ''; position: absolute;
            top: 50%; right: 18%;
            width: 14px; height: 14px;
            background: radial-gradient(circle at 30% 30%, var(--teal-soft), var(--teal-deep));
            border-radius: 50%;
            transform: translate(0,-50%);
            box-shadow: 0 0 20px var(--teal);
        }
        @keyframes loaderPulse { 0%,100% { transform: scale(1); } 50% { transform: scale(1.05); } }
        @keyframes loaderRing { 0%,100% { transform: scale(1); opacity:.3; } 50% { transform: scale(1.15); opacity:.6; } }

        /* ── SCROLL PROGRESS BAR ── */
        #scrollProgress {
            position: fixed; top: 0; left: 0; height: 2px; width: 0;
            background: linear-gradient(90deg, var(--teal-deep), var(--teal), var(--teal-soft));
            z-index: 9999;
            box-shadow: 0 0 12px var(--teal);
            transition: width .1s linear;
        }

        /* ── NOISE OVERLAY ── */
        body::before {
            content: '';
            position: fixed; inset: 0; z-index: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
            pointer-events: none;
        }

        /* ── CURSOR ── */
        .cursor {
            position: fixed; width: 6px; height: 6px;
            background: var(--teal); border-radius: 50%;
            pointer-events: none; z-index: 9999;
            transform: translate(-50%,-50%);
            transition: transform .15s ease, width .3s ease, height .3s ease, background .3s ease;
            box-shadow: 0 0 12px var(--teal);
        }
        .cursor-ring {
            position: fixed; width: 32px; height: 32px;
            border: 1px solid rgba(94,234,212,.4); border-radius: 50%;
            pointer-events: none; z-index: 9998;
            transform: translate(-50%,-50%);
            transition: width .25s ease, height .25s ease, border-color .25s ease, background .25s ease;
        }
        .cursor-ring.cursor-grow {
            width: 56px; height: 56px;
            border-color: rgba(94,234,212,.7);
            background: rgba(94,234,212,.06);
        }

        /* Hamburger → X */
        #menuBtn.open .menu-bar:nth-child(1) { transform: translateY(7px) rotate(45deg); width: 24px; }
        #menuBtn.open .menu-bar:nth-child(2) { opacity: 0; transform: scaleX(0); }
        #menuBtn.open .menu-bar:nth-child(3) { transform: translateY(-7px) rotate(-45deg); width: 24px; }

        /* ── NAV ── */
        nav {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            transition: background .4s, border-color .4s, padding .3s;
        }
        nav.scrolled {
            background: rgba(10,10,11,.85);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(38,38,46,.6);
        }
        .nav-link {
            position: relative;
            color: var(--slate);
            font-size: .78rem; letter-spacing: .14em;
            text-transform: uppercase; font-weight: 500;
            transition: color .3s;
        }
        .nav-link::after {
            content: ''; position: absolute;
            left: 0; bottom: -4px;
            width: 0; height: 1px;
            background: linear-gradient(90deg, var(--teal-deep), var(--teal));
            transition: width .35s cubic-bezier(.4,0,.2,1);
        }
        .nav-link:hover { color: var(--teal); }
        .nav-link:hover::after { width: 100%; }
        body[dir="rtl"] .nav-link { font-family: 'Tajawal', sans-serif; letter-spacing: 0; font-weight: 500; }

        /* ── LOGO MARK (mini animated version of brand) ── */
        .logo-mark {
            width: 36px; height: 36px;
            background: #000; border-radius: 50%;
            position: relative;
            display: inline-flex; align-items: center; justify-content: center;
            border: 1px solid rgba(94,234,212,.15);
            transition: all .4s ease;
        }
        .logo-mark::before {
            content: '';
            position: absolute; inset: 4px;
            border-radius: 50%;
            border: 1.5px solid #fff;
            border-right-color: transparent;
            transform: rotate(45deg);
        }
        .logo-mark::after {
            content: '';
            position: absolute;
            top: 50%; left: 58%;
            width: 8px; height: 8px;
            background: radial-gradient(circle at 30% 30%, var(--teal-soft), var(--teal-deep));
            border-radius: 50%;
            transform: translate(-50%,-50%);
            box-shadow: 0 0 8px var(--teal);
            animation: logoBallFloat 4s ease-in-out infinite;
        }
        .logo-mark:hover { transform: scale(1.08); border-color: var(--teal); }
        @keyframes logoBallFloat {
            0%,100% { transform: translate(-50%,-50%) scale(1); box-shadow: 0 0 8px var(--teal); }
            50%     { transform: translate(-50%,-55%) scale(1.1); box-shadow: 0 0 16px var(--teal); }
        }

        /* ── LANGUAGE SWITCHER ── */
        .lang-switcher {
            display: inline-flex; align-items: center;
            background: var(--panel); border: 1px solid var(--edge);
            border-radius: 999px; padding: 3px;
            position: relative;
            font-family: 'JetBrains Mono', monospace;
        }
        .lang-btn {
            padding: 4px 10px;
            font-size: .65rem; letter-spacing: .15em;
            text-transform: uppercase; font-weight: 600;
            color: var(--muted); cursor: pointer;
            border-radius: 999px;
            transition: color .25s ease;
            position: relative; z-index: 2;
            background: transparent; border: 0;
        }
        .lang-btn.active { color: var(--ink); }
        .lang-indicator {
            position: absolute; top: 3px; bottom: 3px; left: 0;
            background: var(--teal);
            border-radius: 999px;
            transition: all .35s cubic-bezier(.4,0,.2,1);
            z-index: 1;
            box-shadow: 0 0 12px rgba(94,234,212,.5);
        }

        /* ── HERO ── */
        .hero-eyebrow {
            font-family: 'JetBrains Mono', monospace;
            font-size: .72rem; letter-spacing: .32em;
            color: var(--teal); text-transform: uppercase;
        }
        body[dir="rtl"] .hero-eyebrow { font-family: 'Tajawal', sans-serif; letter-spacing: .15em; font-weight: 500; }
        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(3rem, 7.5vw, 6.4rem);
            font-weight: 500; line-height: 1.13;
            color: var(--cream); letter-spacing: -.018em;
        }
        .hero-title em {
            font-style: italic;
            background: linear-gradient(135deg, var(--teal-soft), var(--teal-deep));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        body[dir="rtl"] .hero-title { font-family: 'Tajawal', serif; font-weight: 800; line-height: 1.1; }
        body[dir="rtl"] .hero-title em { font-style: normal; font-weight: 800; }
        .hero-sub {
            color: var(--slate);
            font-size: clamp(1rem, 1.6vw, 1.1rem);
            font-weight: 300; max-width: 540px; line-height: 1.75;
        }

        /* ── HERO 3D SPHERE (echo of logo) ── */
        .hero-sphere {
            position: absolute;
            width: clamp(165px, 21vw, 285px);
            height: clamp(165px, 21vw, 285px);
            right: -6%; top: 20%;
            border-radius: 50%;
            background: radial-gradient(circle at 32% 28%,
                var(--teal-soft) 0%,
                var(--teal) 28%,
                var(--teal-deep) 60%,
                #0a4a44 100%);
            box-shadow:
                inset -14px -20px 56px rgba(0,0,0,.5),
                inset 14px 18px 40px rgba(255,255,255,.11),
                0 0 48px rgba(94,234,212,.06),
                0 20px 50px rgba(0,0,0,.38);
            opacity: .58;
            animation: sphereFloat 8s ease-in-out infinite;
            pointer-events: none;
        }
        body[dir="rtl"] .hero-sphere { right: auto; left: -8%; }
        .hero-sphere::before {
            content: '';
            position: absolute;
            top: 18%; left: 22%;
            width: 30%; height: 25%;
            background: radial-gradient(ellipse, rgba(255,255,255,.4), transparent 70%);
            border-radius: 50%;
            filter: blur(6px);
        }
        @keyframes sphereFloat {
            0%,100% { transform: translateY(0) rotate(0); }
            50%     { transform: translateY(-30px) rotate(8deg); }
        }

        /* ── GRADIENT ORBS ── */
        .orb { position: absolute; border-radius: 50%; filter: blur(90px); pointer-events: none; }
        .orb-1 {
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(94,234,212,.08) 0%, transparent 70%);
            top: -150px; right: -100px;
            animation: drift 14s ease-in-out infinite alternate;
        }
        .orb-2 {
            width: 450px; height: 450px;
            background: radial-gradient(circle, rgba(94,234,212,.05) 0%, transparent 70%);
            bottom: 0; left: -100px;
            animation: drift 18s ease-in-out infinite alternate-reverse;
        }
        @keyframes drift {
            from { transform: translate(0,0) scale(1); }
            to   { transform: translate(40px,30px) scale(1.08); }
        }

        /* ── HORIZONTAL RULE ── */
        .teal-rule {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--teal), transparent);
            opacity: .3;
        }

        /* ── SECTION LABEL ── */
        .section-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: .68rem; letter-spacing: .32em;
            text-transform: uppercase; color: var(--teal);
            margin-bottom: 1.25rem;
            display: flex; align-items: center; gap: .9rem;
        }
        .section-label::before {
            content: '';
            width: 2.25rem; height: 1px;
            background: linear-gradient(90deg, var(--teal-deep), transparent);
            flex-shrink: 0;
        }
        body[dir="rtl"] .section-label { font-family: 'Tajawal', sans-serif; letter-spacing: .1em; font-weight: 600; }
        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2.2rem, 5.2vw, 3.6rem);
            font-weight: 500; color: var(--cream); line-height: 1.05;
            letter-spacing: -.015em;
        }
        body[dir="rtl"] .section-title { font-family: 'Tajawal', serif; font-weight: 700; line-height: 1.25; }
        .section-title em {
            font-style: italic;
            background: linear-gradient(135deg, var(--teal-soft), var(--teal-deep));
            -webkit-background-clip: text; background-clip: text; color: transparent;
        }
        body[dir="rtl"] .section-title em { font-style: normal; font-weight: 800; }

        /* ── BUTTONS ── */
        .btn-primary {
            display: inline-flex; align-items: center; gap: .65rem;
            padding: .9rem 2rem;
            background: var(--teal); color: var(--ink);
            font-weight: 600; font-size: .85rem; letter-spacing: .03em;
            border-radius: 999px;
            transition: all .35s cubic-bezier(.4,0,.2,1);
            cursor: pointer; text-decoration: none;
            position: relative; overflow: hidden;
            border: 0;
        }
        .btn-primary::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, var(--teal-soft), var(--teal-deep));
            opacity: 0; transition: opacity .35s;
        }
        .btn-primary > * { position: relative; z-index: 1; }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(94,234,212,.35);
        }
        .btn-primary:hover::before { opacity: 1; }

        .btn-outline {
            display: inline-flex; align-items: center; gap: .65rem;
            padding: .9rem 2rem;
            border: 1px solid rgba(94,234,212,.4);
            color: var(--teal); font-weight: 500;
            font-size: .85rem; letter-spacing: .03em;
            border-radius: 999px;
            transition: all .35s; cursor: pointer;
            text-decoration: none; background: transparent;
            position: relative; overflow: hidden;
        }
        .btn-outline::after {
            content: ''; position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(94,234,212,.1), transparent 70%);
            opacity: 0; transition: opacity .35s;
        }
        .btn-outline:hover {
            border-color: var(--teal);
            background: rgba(94,234,212,.05);
            transform: translateY(-2px);
        }
        .btn-outline:hover::after { opacity: 1; }

        body[dir="rtl"] .btn-primary,
        body[dir="rtl"] .btn-outline { font-family: 'Tajawal', sans-serif; font-weight: 600; }

        /* ── CARDS ── */
        .service-card {
            background: var(--panel);
            border: 1px solid var(--edge);
            border-radius: 12px;
            padding: 2rem;
            transition: all .45s cubic-bezier(.4,0,.2,1);
            position: relative; overflow: hidden;
        }
        .service-card::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(94,234,212,.06) 0%, transparent 60%);
            opacity: 0; transition: opacity .4s;
        }
        .service-card::after {
            content: ''; position: absolute;
            top: 0; left: 0; right: 0; height: 1px;
            background: linear-gradient(90deg, transparent, var(--teal), transparent);
            opacity: 0; transition: opacity .4s;
        }
        .service-card:hover {
            border-color: rgba(94,234,212,.3);
            transform: translateY(-6px);
            box-shadow: 0 24px 70px rgba(0,0,0,.45), 0 0 30px rgba(94,234,212,.05);
        }
        .service-card:hover::before { opacity: 1; }
        .service-card:hover::after { opacity: 1; }

        .service-icon {
            width: 48px; height: 48px;
            border: 1px solid rgba(94,234,212,.25);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.5rem;
            color: var(--teal);
            background: rgba(94,234,212,.04);
            transition: all .4s;
        }
        .service-card:hover .service-icon {
            background: rgba(94,234,212,.12);
            border-color: var(--teal);
            transform: rotate(-4deg) scale(1.05);
        }

        /* ── PROJECT CARDS ── */
        .project-card {
            background: var(--panel);
            border: 1px solid var(--edge);
            border-radius: 14px;
            overflow: hidden;
            transition: all .45s cubic-bezier(.4,0,.2,1);
        }
        .project-card:hover {
            border-color: rgba(94,234,212,.3);
            transform: translateY(-8px);
            box-shadow: 0 36px 90px rgba(0,0,0,.55), 0 0 40px rgba(94,234,212,.06);
        }
        .project-img { width: 100%; aspect-ratio: 16/10; display: block; background: var(--edge); position: relative; overflow: hidden; }
        .project-img-inner {
            width: 100%; height: 100%;
            transition: transform .7s cubic-bezier(.4,0,.2,1);
        }
        .project-card:hover .project-img-inner { transform: scale(1.06); }
        .project-tag {
            font-family: 'JetBrains Mono', monospace;
            font-size: .62rem; letter-spacing: .22em;
            text-transform: uppercase;
            color: var(--teal);
            background: rgba(94,234,212,.08);
            border: 1px solid rgba(94,234,212,.18);
            padding: .25rem .65rem;
            border-radius: 999px;
            display: inline-block;
        }
        body[dir="rtl"] .project-tag { font-family: 'Tajawal', sans-serif; letter-spacing: 0; font-weight: 600; }

        /* ── SERVICE CARDS (Focused 2×2) ── */
        .svc-card {
            background: var(--panel);
            border: 1px solid var(--edge);
            border-radius: 12px;
            padding: 2.5rem;
            position: relative; overflow: hidden;
            transition: transform .4s cubic-bezier(.4,0,.2,1), border-color .4s, box-shadow .4s;
        }
        .svc-card::before {
            content: '';
            position: absolute; inset: 0;
            background: radial-gradient(circle at 0% 0%, rgba(94,234,212,.05), transparent 65%);
            opacity: 0; transition: opacity .4s;
        }
        .svc-card:hover { transform: translateY(-5px); border-color: rgba(94,234,212,.28); box-shadow: 0 28px 70px rgba(0,0,0,.45), 0 0 0 1px rgba(94,234,212,.06); }
        .svc-card:hover::before { opacity: 1; }
        .svc-num {
            font-family: 'JetBrains Mono', monospace;
            font-size: .6rem; letter-spacing: .3em;
            text-transform: uppercase; color: var(--teal); opacity: .5;
            margin-bottom: 1.5rem; display: block;
        }
        .svc-tag {
            font-family: 'JetBrains Mono', monospace;
            font-size: .58rem; letter-spacing: .14em;
            text-transform: uppercase; color: var(--muted);
            background: rgba(255,255,255,.03);
            border: 1px solid var(--edge);
            padding: .2rem .6rem; border-radius: 999px; display: inline-block;
        }
        .svc-badge {
            font-family: 'JetBrains Mono', monospace;
            font-size: .58rem; letter-spacing: .18em;
            text-transform: uppercase;
        }
        .svc-badge-core  { color: var(--teal); background: rgba(94,234,212,.08); border: 1px solid rgba(94,234,212,.2); padding: .2rem .65rem; border-radius: 999px; }
        .svc-badge-exp   { color: var(--teal-soft); background: rgba(153,246,228,.07); border: 1px solid rgba(153,246,228,.25); padding: .2rem .65rem; border-radius: 999px; }
        /* Grader card special treatment */
        .svc-card-grader { border-color: rgba(94,234,212,.18); background: linear-gradient(140deg, var(--panel) 60%, rgba(94,234,212,.04) 100%); }
        .svc-card-grader:hover { border-color: rgba(94,234,212,.5); box-shadow: 0 28px 70px rgba(0,0,0,.45), 0 0 50px rgba(94,234,212,.12); }
        .grader-orb {
            position: absolute; width: 220px; height: 220px;
            top: -80px; right: -70px;
            background: radial-gradient(circle, rgba(94,234,212,.13), transparent 70%);
            border-radius: 50%; pointer-events: none;
            animation: graderPulse 5s ease-in-out infinite;
        }
        @keyframes graderPulse {
            0%,100% { opacity: .55; transform: scale(1); }
            50%      { opacity: .9; transform: scale(1.18); }
        }

        /* ── WHY OLIVECAP CARDS ── */
        .why-card {
            border: 1px solid var(--edge);
            border-radius: 12px; overflow: hidden;
            transition: border-color .35s ease, transform .35s ease, box-shadow .35s ease;
        }
        .why-card:hover {
            border-color: rgba(94,234,212,.22);
            transform: translateY(-4px);
            box-shadow: 0 24px 60px rgba(0,0,0,.4), 0 0 30px rgba(94,234,212,.05);
        }
        .why-card-inner {
            background: var(--panel);
            padding: 2.5rem;
            height: 100%;
        }
        .why-card-ai { border-color: rgba(94,234,212,.15); }
        .why-card-ai:hover { border-color: rgba(94,234,212,.38); box-shadow: 0 24px 60px rgba(0,0,0,.4), 0 0 40px rgba(94,234,212,.09); }
        .why-num {
            font-family: 'JetBrains Mono', monospace;
            font-size: .6rem; letter-spacing: .3em;
            text-transform: uppercase; color: var(--teal); opacity: .5;
            margin-bottom: 1.5rem; display: block;
        }

        /* ── CAPABILITY CARDS ── */
        .capability-card {
            background: var(--panel);
            border: 1px solid var(--edge);
            border-radius: 8px;
            padding: 1.75rem;
            transition: border-color .3s ease, transform .3s ease;
        }
        .capability-card:hover {
            border-color: rgba(94,234,212,.22);
            transform: translateY(-3px);
        }
        .cap-step {
            font-family: 'JetBrains Mono', monospace;
            font-size: .62rem; letter-spacing: .28em;
            text-transform: uppercase;
            color: var(--teal); opacity: .65;
            margin-bottom: 1rem;
        }

        /* ── WORK / PROJECT SHOWCASE ── */
        .work-card {
            background: var(--panel);
            border: 1px solid var(--edge);
            border-radius: 12px; overflow: hidden;
            transition: transform .4s cubic-bezier(.4,0,.2,1), border-color .4s, box-shadow .4s;
        }
        .work-card:hover {
            transform: translateY(-5px);
            border-color: rgba(94,234,212,.25);
            box-shadow: 0 32px 80px rgba(0,0,0,.5), 0 0 36px rgba(94,234,212,.06);
        }
        .work-preview { width: 100%; position: relative; overflow: hidden; }
        .work-preview-inner { position: absolute; inset: 0; transition: transform .65s cubic-bezier(.4,0,.2,1); }
        .work-card:hover .work-preview-inner { transform: scale(1.04); }
        .work-num {
            font-family: 'JetBrains Mono', monospace;
            font-size: .58rem; letter-spacing: .3em;
            text-transform: uppercase; color: var(--teal); opacity: .5;
        }
        .work-category {
            font-family: 'JetBrains Mono', monospace;
            font-size: .6rem; letter-spacing: .18em;
            text-transform: uppercase; color: var(--muted);
        }
        .work-tag {
            font-family: 'JetBrains Mono', monospace;
            font-size: .58rem; letter-spacing: .12em; text-transform: uppercase;
            color: var(--muted); background: rgba(255,255,255,.03);
            border: 1px solid var(--edge); padding: .18rem .55rem; border-radius: 999px;
        }
        .work-status { font-family: 'JetBrains Mono', monospace; font-size: .58rem; letter-spacing: .18em; text-transform: uppercase; padding: .2rem .65rem; border-radius: 999px; }
        .work-status-exp   { color: var(--teal-soft); background: rgba(153,246,228,.07); border: 1px solid rgba(153,246,228,.22); }
        .work-status-proto { color: var(--teal); background: rgba(94,234,212,.07); border: 1px solid rgba(94,234,212,.18); }
        .work-card-ai   { border-color: rgba(94,234,212,.18); }
        .work-card-ai:hover  { border-color: rgba(94,234,212,.45); box-shadow: 0 32px 80px rgba(0,0,0,.5), 0 0 50px rgba(94,234,212,.12); }
        .work-card-crm  { border-color: rgba(94,234,212,.12); }
        .work-card-crm:hover { border-color: rgba(94,234,212,.35); }

        /* ── TECH STACK PILLS ── */
        .tech-pill {
            display: flex; align-items: center; gap: .65rem;
            padding: .8rem 1.3rem;
            background: var(--panel);
            border: 1px solid var(--edge);
            border-radius: 999px;
            font-size: .85rem; font-weight: 500;
            color: var(--light);
            transition: all .3s;
        }
        .tech-pill:hover {
            border-color: rgba(94,234,212,.4);
            color: var(--teal);
            background: rgba(94,234,212,.04);
            transform: translateY(-3px);
        }
        .tech-dot {
            width: 7px; height: 7px;
            background: var(--teal);
            border-radius: 50%; flex-shrink: 0;
            box-shadow: 0 0 8px var(--teal);
        }

        /* ── WHY CARDS ── */
        .why-item {
            display: flex; align-items: flex-start; gap: 1.25rem;
            padding: 1.5rem 1.75rem;
            background: var(--panel);
            border: 1px solid var(--edge);
            border-radius: 10px;
            transition: all .35s;
        }
        .why-item:hover {
            border-color: rgba(94,234,212,.3);
            background: rgba(94,234,212,.02);
            transform: translateX(6px);
        }
        body[dir="rtl"] .why-item:hover { transform: translateX(-6px); }
        .why-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.6rem; font-weight: 600;
            color: rgba(94,234,212,.4);
            line-height: 1; flex-shrink: 0; width: 2.25rem;
        }

        /* ── CONTACT LINKS ── */
        .contact-link {
            display: flex; align-items: center; gap: .85rem;
            padding: 1.1rem 1.5rem;
            background: var(--panel);
            border: 1px solid var(--edge);
            border-radius: 10px;
            color: var(--light); font-weight: 500;
            text-decoration: none; transition: all .35s;
        }
        .contact-link:hover {
            border-color: rgba(94,234,212,.45);
            color: var(--teal);
            background: rgba(94,234,212,.04);
            transform: translateY(-3px);
        }

        /* ── REVEAL ANIMATIONS ── */
        .reveal { opacity: 0; transform: translateY(32px); transition: opacity .8s cubic-bezier(.4,0,.2,1), transform .8s cubic-bezier(.4,0,.2,1); }
        .reveal.in-view { opacity: 1; transform: none; }
        .reveal-delay-1 { transition-delay: .1s; }
        .reveal-delay-2 { transition-delay: .2s; }
        .reveal-delay-3 { transition-delay: .3s; }
        .reveal-delay-4 { transition-delay: .4s; }
        .reveal-delay-5 { transition-delay: .5s; }

        /* ── HERO ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: none; }
        }
        .hero-anim-1 { animation: fadeUp .9s cubic-bezier(.4,0,.2,1) .3s both; }
        .hero-anim-2 { animation: fadeUp .9s cubic-bezier(.4,0,.2,1) .5s both; }
        .hero-anim-3 { animation: fadeUp .9s cubic-bezier(.4,0,.2,1) .75s both; }
        .hero-anim-4 { animation: fadeUp .9s cubic-bezier(.4,0,.2,1) 1.0s both; }
        .hero-anim-5 { animation: fadeUp .9s cubic-bezier(.4,0,.2,1) 1.2s both; }

        /* ── MARQUEE ── */
        .marquee-wrap { overflow: hidden; }
        .marquee-track {
            display: flex; gap: 3rem;
            animation: marquee 28s linear infinite;
            white-space: nowrap; width: max-content;
        }
        .marquee-track:hover { animation-play-state: paused; }
        @keyframes marquee {
            from { transform: translateX(0); }
            to   { transform: translateX(-50%); }
        }
        body[dir="rtl"] .marquee-track { animation-direction: reverse; }

        /* ── MOBILE NAV ── */
        .mobile-menu {
            display: none; flex-direction: column; gap: 1.5rem;
            padding: 2rem;
            background: rgba(10,10,11,.97);
            backdrop-filter: blur(24px);
            border-bottom: 1px solid var(--edge);
        }
        .mobile-menu.open { display: flex; }

        /* ── STAT NUMBER ── */
        .stat-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3.2rem; font-weight: 600;
            background: linear-gradient(135deg, var(--cream), var(--teal));
            -webkit-background-clip: text; background-clip: text;
            color: transparent;
            line-height: 1;
        }
        body[dir="rtl"] .stat-num { font-family: 'Tajawal', sans-serif; font-weight: 800; }

        /* ── TESTIMONIAL CARD ── */
        .testimonial-card {
            background: var(--panel);
            border: 1px solid var(--edge);
            border-radius: 14px;
            padding: 2rem;
            position: relative;
            transition: all .4s;
        }
        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: -10px; left: 24px;
            font-family: 'Cormorant Garamond', serif;
            font-size: 5rem; line-height: 1;
            color: var(--teal); opacity: .25;
        }
        .testimonial-card:hover {
            border-color: rgba(94,234,212,.3);
            transform: translateY(-4px);
        }

        /* ── MAGNETIC BUTTON HELPER ── */
        .magnetic { transition: transform .25s cubic-bezier(.25,.46,.45,.94); }

        /* ── HIDE CURSOR ON TOUCH ── */
        @media (hover: none) {
            .cursor, .cursor-ring { display: none !important; }
            * { cursor: auto !important; }
        }

        /* ── RTL TWEAKS ── */
        body[dir="rtl"] .nav-link::after { left: auto; right: 0; }
        body[dir="rtl"] .section-label::before {
            background: linear-gradient(-90deg, var(--teal-deep), transparent);
        }

        /* ── SCROLL DOWN INDICATOR ── */
        .scroll-indicator {
            position: absolute; bottom: 2rem;
            left: 50%; transform: translateX(-50%);
            display: flex; flex-direction: column; align-items: center; gap: .6rem;
            opacity: .5;
        }
        .scroll-indicator-bar {
            width: 1px; height: 50px;
            background: linear-gradient(to bottom, var(--teal), transparent);
            position: relative; overflow: hidden;
        }
        .scroll-indicator-bar::after {
            content: ''; position: absolute;
            top: -10px; left: 0; right: 0; height: 10px;
            background: var(--teal);
            animation: scrollDot 2s ease-in-out infinite;
        }
        @keyframes scrollDot {
            0%   { top: -10px; }
            50%  { top: 100%; }
            100% { top: -10px; }
        }
    </style>
</head>
<body dir="ltr">

{{-- ══════════════════════════════════════
     PAGE LOADER
══════════════════════════════════════ --}}
<div id="pageLoader">
    <div class="loader-mark">
        <span class="loader-c">C</span>
    </div>
</div>

{{-- SCROLL PROGRESS BAR --}}
<div id="scrollProgress"></div>

{{-- CUSTOM CURSOR (hidden on touch) --}}
<div class="cursor hidden md:block" id="cursor"></div>
<div class="cursor-ring hidden md:block" id="cursorRing"></div>

{{-- ══════════════════════════════════════
     NAVIGATION
══════════════════════════════════════ --}}
<nav id="navbar">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo --}}
            <a href="#hero" class="flex items-center gap-3 group">
                <img src="/img/logo.jpeg" alt="OliveCap Logo" class="h-9 w-auto rounded-full object-cover transition-transform duration-300 group-hover:scale-105" style="box-shadow: 0 0 8px rgba(94,234,212,.2);">
                <span class="flex items-center gap-2">
                    <span class="font-display text-xl text-cream font-semibold tracking-tight group-hover:text-teal transition-colors duration-300">OliveCap</span>
                    <span class="hidden sm:block w-px h-4 bg-edge"></span>
                    <span class="hidden sm:block font-mono text-[10px] text-muted tracking-widest uppercase">Studio</span>
                </span>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-7">
                <a href="#about"    class="nav-link" data-i18n="nav.about">About</a>
                <a href="#services" class="nav-link" data-i18n="nav.services">Services</a>
                <a href="#work"     class="nav-link" data-i18n="nav.work">Work</a>
                <a href="#stack"    class="nav-link" data-i18n="nav.stack">Stack</a>
                <a href="#contact"  class="nav-link" data-i18n="nav.contact">Contact</a>

                {{-- Language Switcher --}}
                <div class="lang-switcher" role="tablist" aria-label="Language">
                    <span class="lang-indicator" id="langIndicator"></span>
                    <button class="lang-btn active" data-lang="en">EN</button>
                    <button class="lang-btn" data-lang="ar">AR</button>
                    <button class="lang-btn" data-lang="tr">TR</button>
                </div>

                <a href="https://wa.me/905538604023" target="_blank" class="btn-primary text-xs py-2.5 px-5 magnetic">
                    <span data-i18n="nav.hire">Hire Us</span>
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
        <a href="#about"    class="nav-link text-base py-1" onclick="closeMobileMenu()" data-i18n="nav.about">About</a>
        <a href="#services" class="nav-link text-base py-1" onclick="closeMobileMenu()" data-i18n="nav.services">Services</a>
        <a href="#work"     class="nav-link text-base py-1" onclick="closeMobileMenu()" data-i18n="nav.work">Work</a>
        <a href="#stack"    class="nav-link text-base py-1" onclick="closeMobileMenu()" data-i18n="nav.stack">Stack</a>
        <a href="#contact"  class="nav-link text-base py-1" onclick="closeMobileMenu()" data-i18n="nav.contact">Contact</a>

        <div class="lang-switcher self-start" role="tablist">
            <span class="lang-indicator" id="langIndicatorMobile"></span>
            <button class="lang-btn active" data-lang="en">EN</button>
            <button class="lang-btn" data-lang="ar">AR</button>
            <button class="lang-btn" data-lang="tr">TR</button>
        </div>

        <a href="https://wa.me/905538604023" target="_blank" class="btn-primary self-start" data-i18n="nav.hire">Hire Us</a>
    </div>
</nav>

{{-- ══════════════════════════════════════
     HERO SECTION
══════════════════════════════════════ --}}
<section id="hero" class="relative min-h-screen flex items-center overflow-hidden">

    {{-- Background orbs --}}
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    {{-- 3D Sphere echoing the logo --}}
    <div class="hero-sphere hidden lg:block"></div>

    {{-- Subtle grid lines --}}
    <div class="absolute inset-0 opacity-[.04]" style="background-image: linear-gradient(var(--edge) 1px, transparent 1px), linear-gradient(90deg, var(--edge) 1px, transparent 1px); background-size: 80px 80px;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-10 pt-32 pb-24 lg:pt-40 lg:pb-32 w-full">
        <div class="max-w-5xl">

            <p class="hero-eyebrow hero-anim-1 mb-7 inline-flex items-center gap-3">
                <span class="inline-block w-8 h-px bg-teal opacity-60"></span>
                <span data-i18n="hero.eyebrow"></span>
            </p>

            <h1 class="hero-title hero-anim-2 mb-9" data-i18n-html="hero.title">
                AI-Powered <em>Business Systems</em><br>
                Built for Real Small Businesses
            </h1>

            <p class="hero-sub hero-anim-3 mb-12" data-i18n="hero.subtitle">
                We help real businesses improve their digital presence through websites, admin panels, lead tracking, and AI-powered tools.
            </p>

            <div class="hero-anim-4 flex flex-wrap items-center gap-4 mb-16">
                <a href="#contact" class="btn-primary magnetic">
                    <span data-i18n="hero.cta_primary">Get Your Business Reviewed</span>
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
                </a>
                <a href="#contact" class="btn-outline magnetic" data-i18n="hero.cta_secondary">Start a Conversation</a>
            </div>

            {{-- Stats --}}
            <div class="hero-anim-5 grid grid-cols-3 gap-px bg-edge rounded-xl overflow-hidden max-w-2xl">
                <div class="bg-smoke px-5 py-7 text-center">
                    <div class="stat-num" data-counter="20" data-suffix="+">0</div>
                    <div class="text-muted text-[10px] font-mono uppercase tracking-widest3 mt-2" data-i18n="hero.stat_projects">Projects</div>
                </div>
                <div class="bg-smoke px-5 py-7 text-center">
                    <div class="stat-num" data-counter="3" data-suffix="+">0</div>
                    <div class="text-muted text-[10px] font-mono uppercase tracking-widest3 mt-2" data-i18n="hero.stat_years">Years Dev</div>
                </div>
                <div class="bg-smoke px-5 py-7 text-center">
                    <div class="stat-num" data-counter="24" data-suffix="h">0</div>
                    <div class="text-muted text-[10px] font-mono uppercase tracking-widest3 mt-2" data-i18n="hero.stat_response">Response</div>
                </div>
            </div>

        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="scroll-indicator hidden md:flex">
        <span class="font-mono text-[10px] tracking-widest3 text-slate uppercase" data-i18n="hero.scroll">Scroll</span>
        <div class="scroll-indicator-bar"></div>
    </div>
</section>

{{-- ══════════════════════════════════════
     MARQUEE BAND
══════════════════════════════════════ --}}
<div class="py-5 border-y border-edge bg-smoke marquee-wrap">
    <div class="marquee-track">
        @foreach(array_fill(0, 2, ['Laravel', 'PHP', 'Tailwind CSS', 'Flutter', 'MySQL', 'Premium Design', 'Fast Delivery', 'Clean Code', 'Conversion-Focused', 'Multi-language', 'QR Menus', 'Mobile-First']) as $items)
            @foreach($items as $item)
                <span class="font-mono text-xs text-muted tracking-widest uppercase">{{ $item }}</span>
                <span class="text-teal opacity-50">✦</span>
            @endforeach
        @endforeach
    </div>
</div>

{{-- ══════════════════════════════════════
     POSITIONING SECTION
══════════════════════════════════════ --}}
<section id="about" class="py-28 lg:py-40 relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-start">

            {{-- Left: Strategic positioning --}}
            <div>
                <p class="section-label reveal" data-i18n="about.label">The OliveCap System</p>
                <h2 class="section-title reveal reveal-delay-1 mb-8" data-i18n-html="about.title">
                    Built Around<br>
                    <em>Real Business Needs</em>
                </h2>
                <div class="space-y-6 reveal reveal-delay-2">
                    <p class="text-slate leading-relaxed font-light text-lg" data-i18n="about.p1">
                        OliveCap builds practical business systems for small businesses — combining websites, admin panels, lead tracking, and AI-enhanced workflows into one coherent growth structure.
                    </p>
                    <p class="text-muted leading-relaxed" data-i18n="about.p2">
                        We don't sell templates or generic designs. We study how your business operates, then build systems that improve lead flow, customer communication, and internal management.
                    </p>
                </div>

                <div class="mt-10 pt-8 border-t border-edge reveal reveal-delay-3">
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div>
                            <div class="text-cream font-semibold text-sm mb-1">Fares</div>
                            <div class="text-muted text-[11px] font-mono leading-relaxed">Development · Tech Lead<br>Client Communication</div>
                        </div>
                        <div>
                            <div class="text-cream font-semibold text-sm mb-1">N. Talep</div>
                            <div class="text-muted text-[11px] font-mono leading-relaxed">Design · Content<br>Visual Direction</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <a href="#contact" class="btn-primary magnetic" data-i18n="about.cta">Start a Project</a>
                        <a href="#work" class="btn-outline magnetic" data-i18n="about.cta_secondary">See Our Work</a>
                    </div>
                </div>
            </div>

            {{-- Right: 4 capability cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 reveal reveal-delay-2">
                <div class="capability-card reveal" style="transition-delay: 0s">
                    <div class="cap-step">01</div>
                    <h3 class="text-cream font-semibold text-base mb-3" data-i18n="about.cap1_title">Analyze</h3>
                    <p class="text-muted text-sm leading-relaxed font-light" data-i18n="about.cap1_body">We review your digital presence, customer flow, and communication structure to identify real gaps.</p>
                </div>
                <div class="capability-card reveal" style="transition-delay: 0.08s">
                    <div class="cap-step">02</div>
                    <h3 class="text-cream font-semibold text-base mb-3" data-i18n="about.cap2_title">Build</h3>
                    <p class="text-muted text-sm leading-relaxed font-light" data-i18n="about.cap2_body">We create business websites and admin panel systems tailored for real operational needs.</p>
                </div>
                <div class="capability-card reveal" style="transition-delay: 0.16s">
                    <div class="cap-step">03</div>
                    <h3 class="text-cream font-semibold text-base mb-3" data-i18n="about.cap3_title">Track</h3>
                    <p class="text-muted text-sm leading-relaxed font-light" data-i18n="about.cap3_body">LeadBox CRM organizes inquiries, leads, and customer follow-ups in one clean system.</p>
                </div>
                <div class="capability-card reveal" style="transition-delay: 0.24s">
                    <div class="cap-step">04</div>
                    <h3 class="text-cream font-semibold text-base mb-3" data-i18n="about.cap4_title">Improve</h3>
                    <p class="text-muted text-sm leading-relaxed font-light" data-i18n="about.cap4_body">AI-enhanced workflows sharpen lead flow, clarity, and customer experience over time.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="teal-rule max-w-7xl mx-auto px-6 lg:px-10" id="afterAbout"></div>

{{-- ══════════════════════════════════════
     SERVICES SECTION
══════════════════════════════════════ --}}
<section id="services" class="py-28 lg:py-40">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        {{-- Header --}}
        <div class="max-w-3xl mb-20">
            <p class="section-label reveal" data-i18n="services.label">What We Build</p>
            <h2 class="section-title reveal reveal-delay-1 mb-6" data-i18n-html="services.title">
                Systems Built<br>
                <em>for Modern Small Businesses</em>
            </h2>
            <p class="text-muted text-base font-light leading-relaxed reveal reveal-delay-2" style="max-width:52ch" data-i18n="services.intro">
                OliveCap focuses on practical business systems — combining websites, admin panels, lead tracking, and AI-enhanced workflows into one scalable operation.
            </p>
        </div>

        {{-- 2×2 Grid --}}
        <div class="grid sm:grid-cols-2 gap-6">

            {{-- 01 — Business Website System --}}
            <div class="svc-card reveal">
                <span class="svc-num">01</span>
                <div class="flex items-start justify-between gap-4 mb-4">
                    <h3 class="text-cream font-semibold text-xl leading-snug" data-i18n="services.s1_title">Business Website System</h3>
                    <span class="svc-badge svc-badge-core shrink-0 mt-1" data-i18n="services.badge_core">Core Service</span>
                </div>
                <p class="text-slate text-sm leading-relaxed font-light mb-7" data-i18n="services.s1_desc">
                    Complete business websites with admin panels, contact flows, and scalable structure built for real business operations.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="svc-tag">Admin Panel</span>
                    <span class="svc-tag">CMS</span>
                    <span class="svc-tag">Business Website</span>
                    <span class="svc-tag">WhatsApp CTA</span>
                </div>
            </div>

            {{-- 02 — Website Conversion Setup --}}
            <div class="svc-card reveal" style="transition-delay:.08s">
                <span class="svc-num">02</span>
                <h3 class="text-cream font-semibold text-xl leading-snug mb-4" data-i18n="services.s2_title">Website Conversion Setup</h3>
                <p class="text-slate text-sm leading-relaxed font-light mb-7" data-i18n="services.s2_desc">
                    Improve communication clarity, customer trust, and lead conversion on your existing website.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="svc-tag">Conversion</span>
                    <span class="svc-tag">CTA Optimization</span>
                    <span class="svc-tag">Trust Setup</span>
                    <span class="svc-tag">Customer Flow</span>
                </div>
            </div>

            {{-- 03 — LeadBox CRM --}}
            <div class="svc-card reveal" style="transition-delay:.14s">
                <span class="svc-num">03</span>
                <h3 class="text-cream font-semibold text-xl leading-snug mb-4" data-i18n="services.s3_title">LeadBox CRM</h3>
                <p class="text-slate text-sm leading-relaxed font-light mb-7" data-i18n="services.s3_desc">
                    A lightweight lead tracking system for organizing inquiries, follow-ups, and customer communication.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="svc-tag">Lead Tracking</span>
                    <span class="svc-tag">Follow-ups</span>
                    <span class="svc-tag">Contact Forms</span>
                    <span class="svc-tag">WhatsApp Leads</span>
                </div>
            </div>

            {{-- 04 — OliveCap Business Grader --}}
            <div class="svc-card svc-card-grader reveal" style="transition-delay:.2s">
                <div class="grader-orb"></div>
                <span class="svc-num" style="opacity:.7">04</span>
                <div class="flex items-start justify-between gap-4 mb-4">
                    <h3 class="text-cream font-semibold text-xl leading-snug" data-i18n="services.s4_title">OliveCap Business Grader</h3>
                    <span class="svc-badge svc-badge-exp shrink-0 mt-1" data-i18n="services.badge_exp">Experimental</span>
                </div>
                <p class="text-slate text-sm leading-relaxed font-light mb-7" data-i18n="services.s4_desc">
                    An AI-enhanced digital presence review that analyzes websites, communication flow, and business clarity.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="svc-tag">AI-Enhanced</span>
                    <span class="svc-tag">Digital Presence</span>
                    <span class="svc-tag">Analysis</span>
                    <span class="svc-tag">Reports</span>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="teal-rule max-w-7xl mx-auto px-6 lg:px-10"></div>

{{-- ══════════════════════════════════════
     SELECTED WORK SECTION
══════════════════════════════════════ --}}
<section id="work" class="py-28 lg:py-40">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        {{-- Header --}}
        <div class="max-w-3xl mb-20">
            <p class="section-label reveal" data-i18n="work.label">Selected Work</p>
            <h2 class="section-title reveal reveal-delay-1 mb-6" data-i18n-html="work.title">
                Systems Built for<br>
                <em>Real Businesses</em>
            </h2>
            <p class="text-muted text-base font-light leading-relaxed reveal reveal-delay-2" style="max-width:52ch" data-i18n="work.intro">
                A selection of business systems, websites, and digital experiences designed for real-world operations.
            </p>
        </div>

        {{-- FEATURED: Prego Education --}}
        <div class="work-card lg:grid lg:grid-cols-2 mb-6 reveal">
            <div class="work-preview" style="min-height:280px">
                <div class="work-preview-inner" style="background:linear-gradient(135deg,#0a1a14 0%,#0f2e22 40%,#135c3e 100%)">
                    <div class="absolute inset-0" style="background:radial-gradient(ellipse at 30% 60%,rgba(94,234,212,.15),transparent 60%)"></div>
                    <div class="absolute top-8 left-8 right-8 space-y-2.5 opacity-30">
                        <div class="h-2 rounded-full w-3/4" style="background:rgba(255,255,255,.2)"></div>
                        <div class="h-2 rounded-full w-1/2" style="background:rgba(255,255,255,.15)"></div>
                    </div>
                    <div class="absolute bottom-8 left-8 right-8 grid grid-cols-3 gap-3 opacity-30">
                        <div class="h-16 rounded-lg" style="background:rgba(94,234,212,.2);border:1px solid rgba(94,234,212,.3)"></div>
                        <div class="h-16 rounded-lg" style="background:rgba(94,234,212,.15);border:1px solid rgba(94,234,212,.2)"></div>
                        <div class="h-16 rounded-lg" style="background:rgba(94,234,212,.1);border:1px solid rgba(94,234,212,.15)"></div>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <div class="font-mono text-[10px] tracking-widest text-white/35 uppercase mb-3">Education Platform</div>
                            <div class="text-3xl text-white font-semibold" style="font-family:'Cormorant Garamond',serif">Prego</div>
                        </div>
                    </div>
                    <div class="absolute top-4 right-4"><span class="font-mono text-[10px] tracking-widest text-white/50 uppercase bg-black/30 px-2.5 py-1 rounded-full backdrop-blur-sm">2024</span></div>
                </div>
            </div>
            <div class="p-8 lg:p-12 flex flex-col justify-center">
                <div class="flex items-center gap-3 mb-5">
                    <span class="work-num">01</span>
                    <span class="work-category">Education Platform & Admin System</span>
                </div>
                <h3 class="text-cream font-semibold text-2xl lg:text-3xl leading-snug mb-5">Prego Education</h3>
                <p class="text-slate text-sm leading-relaxed font-light mb-7" style="max-width:44ch" data-i18n="work.prego_desc">
                    A multilingual education platform built to help students explore universities and manage educational content through a custom admin panel.
                </p>
                <div class="flex flex-wrap gap-2 mb-8">
                    <span class="work-tag">Laravel</span>
                    <span class="work-tag">Admin Panel</span>
                    <span class="work-tag">CMS</span>
                    <span class="work-tag">Education</span>
                    <span class="work-tag">Responsive</span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="https://eduprego.com/" target="_blank" class="btn-primary text-sm py-2.5 px-6">Visit Project ↗</a>
                    <a href="https://wa.me/905538604023" target="_blank" class="btn-outline text-sm py-2.5 px-6">Details</a>
                </div>
            </div>
        </div>

        {{-- Row 2: WhatsApp Lead Flow + AlMostafa --}}
        <div class="grid sm:grid-cols-2 gap-6 mb-6">

            {{-- WhatsApp Lead Flow System --}}
            <div class="work-card reveal" style="transition-delay:.08s">
                <div class="work-preview" style="aspect-ratio:16/9">
                    <div class="work-preview-inner" style="background:linear-gradient(135deg,#060f09 0%,#0a1f0e 50%,#0d2e14 100%)">
                        <div class="absolute inset-0" style="background:radial-gradient(ellipse at 70% 40%,rgba(94,234,212,.12),transparent 55%)"></div>
                        <div class="absolute left-8 top-8 space-y-2 opacity-35">
                            <div class="h-7 rounded-2xl rounded-tl-sm" style="background:rgba(37,211,102,.35);border:1px solid rgba(37,211,102,.4);width:140px"></div>
                            <div class="h-7 rounded-2xl rounded-tl-sm" style="background:rgba(37,211,102,.25);border:1px solid rgba(37,211,102,.3);width:110px"></div>
                        </div>
                        <div class="absolute right-8 bottom-8 flex flex-col items-end space-y-2 opacity-35">
                            <div class="h-7 rounded-2xl rounded-tr-sm" style="background:rgba(94,234,212,.3);border:1px solid rgba(94,234,212,.35);width:130px"></div>
                            <div class="h-7 rounded-2xl rounded-tr-sm" style="background:rgba(94,234,212,.2);border:1px solid rgba(94,234,212,.25);width:90px"></div>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center"><div class="font-mono text-[10px] tracking-widest text-white/30 uppercase">Lead Flow System</div></div>
                        <div class="absolute top-4 right-4"><span class="font-mono text-[10px] tracking-widest text-white/50 uppercase bg-black/30 px-2.5 py-1 rounded-full backdrop-blur-sm">2025</span></div>
                    </div>
                </div>
                <div class="p-7">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="work-num">02</span>
                        <span class="work-category">Lead Automation & Communication</span>
                    </div>
                    <h3 class="text-cream font-semibold text-xl leading-snug mb-3">WhatsApp Lead Flow System</h3>
                    <p class="text-slate text-sm leading-relaxed font-light mb-5" data-i18n="work.wa_desc">
                        A WhatsApp-based lead flow designed to help businesses collect inquiries, automate first contact, and organize customer communication more efficiently.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="work-tag">WhatsApp</span>
                        <span class="work-tag">Automation</span>
                        <span class="work-tag">Lead Flow</span>
                        <span class="work-tag">Customer Comms</span>
                    </div>
                </div>
            </div>

            {{-- AlMostafa Consulting --}}
            <div class="work-card reveal" style="transition-delay:.14s">
                <div class="work-preview" style="aspect-ratio:16/9">
                    <div class="work-preview-inner" style="background:linear-gradient(135deg,#060d18 0%,#0d1e36 50%,#142952 100%)">
                        <div class="absolute inset-0" style="background:radial-gradient(ellipse at 50% 30%,rgba(99,179,237,.1),transparent 60%)"></div>
                        <div class="absolute bottom-0 left-0 right-0 flex items-end justify-center gap-3 px-8 opacity-20" style="height:75%">
                            <div class="w-8 rounded-t" style="height:70%;background:rgba(99,179,237,.5);border:1px solid rgba(99,179,237,.6)"></div>
                            <div class="w-8 rounded-t" style="height:88%;background:rgba(99,179,237,.6);border:1px solid rgba(99,179,237,.7)"></div>
                            <div class="w-8 rounded-t" style="height:55%;background:rgba(99,179,237,.4);border:1px solid rgba(99,179,237,.5)"></div>
                            <div class="w-8 rounded-t" style="height:75%;background:rgba(99,179,237,.5);border:1px solid rgba(99,179,237,.6)"></div>
                            <div class="w-8 rounded-t" style="height:62%;background:rgba(99,179,237,.35);border:1px solid rgba(99,179,237,.45)"></div>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center"><div class="font-mono text-[10px] tracking-widest text-white/30 uppercase">Consulting Website</div></div>
                        <div class="absolute top-4 right-4"><span class="font-mono text-[10px] tracking-widest text-white/50 uppercase bg-black/30 px-2.5 py-1 rounded-full backdrop-blur-sm">2024</span></div>
                    </div>
                </div>
                <div class="p-7">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="work-num">03</span>
                        <span class="work-category">Business Consulting Website</span>
                    </div>
                    <h3 class="text-cream font-semibold text-xl leading-snug mb-3">AlMostafa Consulting</h3>
                    <p class="text-slate text-sm leading-relaxed font-light mb-5" data-i18n="work.almostafa_desc">
                        A professional consulting website focused on clear service presentation, trust building, and direct client communication.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-5">
                        <span class="work-tag">Consulting</span>
                        <span class="work-tag">Business Website</span>
                        <span class="work-tag">Trust</span>
                        <span class="work-tag">Contact Flow</span>
                    </div>
                    <a href="https://almostafa.com/" target="_blank" class="btn-outline text-xs py-2 px-4 inline-flex items-center gap-1.5">Visit ↗</a>
                </div>
            </div>

        </div>

        {{-- Row 3: Gümüşhane + Business Grader + LeadBox --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Gümüşhane Yayla Bal --}}
            <div class="work-card reveal">
                <div class="work-preview" style="aspect-ratio:16/9">
                    <div class="work-preview-inner" style="background:linear-gradient(135deg,#110b02 0%,#241506 50%,#3d2208 100%)">
                        <div class="absolute inset-0" style="background:radial-gradient(ellipse at 50% 50%,rgba(217,119,6,.14),transparent 65%)"></div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-25">
                            <svg width="110" height="100" viewBox="0 0 110 100" fill="none">
                                <polygon points="55,5 90,25 90,65 55,85 20,65 20,25" stroke="rgba(217,119,6,.9)" stroke-width="1.5" fill="rgba(217,119,6,.08)"/>
                                <polygon points="55,22 78,34 78,60 55,72 32,60 32,34" stroke="rgba(217,119,6,.6)" stroke-width="1" fill="rgba(217,119,6,.05)"/>
                                <circle cx="55" cy="47" r="6" fill="rgba(217,119,6,.4)"/>
                            </svg>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center"><div class="font-mono text-[10px] tracking-widest text-white/30 uppercase">Local Business</div></div>
                        <div class="absolute top-4 right-4"><span class="font-mono text-[10px] tracking-widest text-white/50 uppercase bg-black/30 px-2.5 py-1 rounded-full backdrop-blur-sm">2025</span></div>
                    </div>
                </div>
                <div class="p-7">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="work-num">04</span>
                        <span class="work-category">Local Product Business</span>
                    </div>
                    <h3 class="text-cream font-semibold text-lg leading-snug mb-3">Gümüşhane Yayla Bal</h3>
                    <p class="text-slate text-sm leading-relaxed font-light mb-5" data-i18n="work.gum_desc">
                        A local business website designed to present products clearly and improve customer communication through simple conversion-focused structure.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="work-tag">Local Business</span>
                        <span class="work-tag">Product Website</span>
                        <span class="work-tag">WhatsApp CTA</span>
                        <span class="work-tag">Conversion</span>
                    </div>
                </div>
            </div>

            {{-- OliveCap Business Grader --}}
            <div class="work-card work-card-ai reveal" style="transition-delay:.08s">
                <div class="work-preview" style="aspect-ratio:16/9">
                    <div class="work-preview-inner" style="background:linear-gradient(135deg,#020c0a 0%,#061412 50%,#091e1b 100%)">
                        <div class="grader-orb" style="width:160px;height:160px;top:-50px;right:-50px;animation-duration:4.5s"></div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-35">
                            <svg width="110" height="110" viewBox="0 0 110 110" fill="none">
                                <circle cx="55" cy="55" r="48" stroke="rgba(94,234,212,.5)" stroke-width="1" stroke-dasharray="4 6"/>
                                <circle cx="55" cy="55" r="34" stroke="rgba(94,234,212,.4)" stroke-width="1" stroke-dasharray="3 5"/>
                                <circle cx="55" cy="55" r="20" stroke="rgba(94,234,212,.7)" stroke-width="1.5" fill="rgba(94,234,212,.06)"/>
                                <circle cx="55" cy="55" r="5" fill="rgba(94,234,212,.75)"/>
                            </svg>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center"><div class="font-mono text-[10px] tracking-widest uppercase" style="color:rgba(94,234,212,.4)">AI Analysis</div></div>
                        <div class="absolute top-4 right-4"><span class="work-status work-status-exp" style="font-size:.55rem">Experimental</span></div>
                    </div>
                </div>
                <div class="p-7">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="work-num">05</span>
                        <span class="work-category">AI-Enhanced Business Analysis</span>
                    </div>
                    <h3 class="text-cream font-semibold text-lg leading-snug mb-3">OliveCap Business Grader</h3>
                    <p class="text-slate text-sm leading-relaxed font-light mb-5" data-i18n="work.grader_desc">
                        An experimental digital presence analysis system designed to evaluate business clarity, lead flow, and online communication structure.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="work-tag">AI</span>
                        <span class="work-tag">Analysis</span>
                        <span class="work-tag">Digital Presence</span>
                        <span class="work-tag">Reports</span>
                    </div>
                </div>
            </div>

            {{-- LeadBox CRM --}}
            <div class="work-card work-card-crm reveal" style="transition-delay:.14s">
                <div class="work-preview" style="aspect-ratio:16/9">
                    <div class="work-preview-inner" style="background:linear-gradient(135deg,#050c12 0%,#091826 50%,#0d2338 100%)">
                        <div class="absolute inset-0" style="background:radial-gradient(ellipse at 40% 50%,rgba(94,234,212,.09),transparent 60%)"></div>
                        <div class="absolute inset-0 flex items-center justify-center px-8 opacity-30">
                            <div class="grid grid-cols-3 gap-2 w-full">
                                <div class="space-y-1.5">
                                    <div class="h-1.5 rounded w-full" style="background:rgba(255,255,255,.2)"></div>
                                    <div class="h-9 rounded" style="background:rgba(94,234,212,.2);border:1px solid rgba(94,234,212,.3)"></div>
                                    <div class="h-9 rounded" style="background:rgba(94,234,212,.15);border:1px solid rgba(94,234,212,.22)"></div>
                                </div>
                                <div class="space-y-1.5">
                                    <div class="h-1.5 rounded w-full" style="background:rgba(255,255,255,.15)"></div>
                                    <div class="h-9 rounded" style="background:rgba(94,234,212,.1);border:1px solid rgba(94,234,212,.18)"></div>
                                </div>
                                <div class="space-y-1.5">
                                    <div class="h-1.5 rounded w-full" style="background:rgba(255,255,255,.2)"></div>
                                    <div class="h-9 rounded" style="background:rgba(94,234,212,.2);border:1px solid rgba(94,234,212,.3)"></div>
                                    <div class="h-9 rounded" style="background:rgba(94,234,212,.12);border:1px solid rgba(94,234,212,.18)"></div>
                                    <div class="h-9 rounded" style="background:rgba(94,234,212,.07);border:1px solid rgba(94,234,212,.12)"></div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center"><div class="font-mono text-[10px] tracking-widest text-white/30 uppercase">Lead Management</div></div>
                        <div class="absolute top-4 right-4"><span class="work-status work-status-proto" style="font-size:.55rem">Prototype</span></div>
                    </div>
                </div>
                <div class="p-7">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="work-num">06</span>
                        <span class="work-category">Lead Tracking & Customer Management</span>
                    </div>
                    <h3 class="text-cream font-semibold text-lg leading-snug mb-3">LeadBox CRM</h3>
                    <p class="text-slate text-sm leading-relaxed font-light mb-5">
                        <span data-i18n="work.leadbox_desc">A lightweight CRM prototype designed to help small businesses organize inquiries, track lead status, and manage customer follow-ups through a simple operational dashboard.</span>
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="work-tag">CRM</span>
                        <span class="work-tag">Lead Tracking</span>
                        <span class="work-tag">Follow-ups</span>
                        <span class="work-tag">Dashboard</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<div class="teal-rule max-w-7xl mx-auto px-6 lg:px-10"></div>

{{-- ══════════════════════════════════════
     WHY OLIVECAP SECTION
══════════════════════════════════════ --}}
<section id="why" class="py-28 lg:py-40 relative">
    {{-- Subtle background glow --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] rounded-full" style="background:radial-gradient(ellipse,rgba(94,234,212,.04) 0%,transparent 70%)"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-10">

        {{-- Header --}}
        <div class="grid lg:grid-cols-2 gap-12 items-end mb-20">
            <div>
                <p class="section-label reveal" data-i18n="why.label">Why OliveCap</p>
                <h2 class="section-title reveal reveal-delay-1" data-i18n-html="why.title">
                    Why Businesses<br>
                    <em>Choose OliveCap</em>
                </h2>
            </div>
            <p class="text-muted text-base font-light leading-relaxed reveal reveal-delay-2 lg:mb-2" style="max-width:48ch" data-i18n="why.intro">
                We focus on practical systems that help small businesses look professional, manage content, and turn visitors into real inquiries.
            </p>
        </div>

        {{-- 4 Value Cards --}}
        <div class="grid sm:grid-cols-2 gap-5">

            {{-- Card 01 --}}
            <div class="why-card reveal">
                <div class="why-card-inner">
                    <div class="why-num">01</div>
                    <h3 class="text-cream font-semibold text-xl mb-4 leading-snug" data-i18n="why.c1_title">Business-First Mindset</h3>
                    <p class="text-slate text-sm leading-relaxed font-light" data-i18n="why.c1_body">
                        We design around real business goals — clarity, trust, communication, and customer conversion — not just visual decoration.
                    </p>
                </div>
            </div>

            {{-- Card 02 --}}
            <div class="why-card reveal" style="transition-delay:.08s">
                <div class="why-card-inner">
                    <div class="why-num">02</div>
                    <h3 class="text-cream font-semibold text-xl mb-4 leading-snug" data-i18n="why.c2_title">Admin Panel Included</h3>
                    <p class="text-slate text-sm leading-relaxed font-light" data-i18n="why.c2_body">
                        Your business website can be managed easily through a custom admin panel, so content stays fresh without depending on a developer for every small change.
                    </p>
                </div>
            </div>

            {{-- Card 03 --}}
            <div class="why-card reveal" style="transition-delay:.14s">
                <div class="why-card-inner">
                    <div class="why-num">03</div>
                    <h3 class="text-cream font-semibold text-xl mb-4 leading-snug" data-i18n="why.c3_title">Lead-Focused Structure</h3>
                    <p class="text-slate text-sm leading-relaxed font-light" data-i18n="why.c3_body">
                        Pages are structured to guide visitors toward action through clear messaging, contact forms, WhatsApp CTAs, and simple customer flows.
                    </p>
                </div>
            </div>

            {{-- Card 04 --}}
            <div class="why-card why-card-ai reveal" style="transition-delay:.2s">
                <div class="why-card-inner">
                    <div class="why-num" style="opacity:.75">04</div>
                    <h3 class="text-cream font-semibold text-xl mb-4 leading-snug" data-i18n="why.c4_title">AI-Enhanced Workflow</h3>
                    <p class="text-slate text-sm leading-relaxed font-light" data-i18n="why.c4_body">
                        We use AI-assisted analysis and workflows to identify weak points, improve clarity, and generate practical digital improvement ideas.
                    </p>
                    <div class="mt-6 pt-5 border-t" style="border-color:rgba(94,234,212,.12)">
                        <span class="font-mono text-[10px] tracking-widest uppercase" style="color:rgba(94,234,212,.55)">AI-Enhanced · OliveCap 2025</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<div class="teal-rule max-w-7xl mx-auto px-6 lg:px-10"></div>

{{-- ══════════════════════════════════════
     CONTACT
══════════════════════════════════════ --}}
<section id="contact" class="py-28 lg:py-40 relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[500px] h-[500px] opacity-10 rounded-full filter blur-3xl pointer-events-none" style="background: var(--teal);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-10">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <p class="section-label reveal justify-center" style="justify-content: center;" data-i18n="contact.label">Ready to Start</p>
            <h2 class="section-title reveal reveal-delay-1 mb-6" data-i18n-html="contact.title">
                Let’s Build a <br>
                <em>Better Digital Presence</em>
            </h2>
            <p class="text-muted leading-relaxed font-light reveal reveal-delay-2" data-i18n="contact.intro">
                Let’s explore how OliveCap can help your business through websites, admin systems, lead tracking, and AI-enhanced workflows.
            </p>
        </div>

        <div class="grid sm:grid-cols-3 lg:grid-cols-5 gap-4 max-w-5xl mx-auto">
            <a href="https://wa.me/905538604023" target="_blank" class="contact-link reveal reveal-delay-1">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" class="text-green-400 flex-shrink-0">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                <div>
                    <div class="text-[11px] text-muted font-mono mb-0.5">WhatsApp</div>
                    <div class="text-sm font-medium" data-i18n="contact.whatsapp">Send a Message</div>
                </div>
            </a>

<a href="https://linkedin.com/in/faresabughassan" target="_blank" class="contact-link reveal reveal-delay-3">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" class="text-blue-400 flex-shrink-0">
                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
                <div>
                    <div class="text-[11px] text-muted font-mono mb-0.5">LinkedIn</div>
                    <div class="text-sm font-medium" data-i18n="contact.linkedin">Connect With Us</div>
                </div>
            </a>

            <a href="mailto:fares025.rk@gmail.com" class="contact-link reveal reveal-delay-4">
                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" class="text-teal flex-shrink-0">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <div>
                    <div class="text-[11px] text-muted font-mono mb-0.5">Email</div>
                    <div class="text-sm font-medium" data-i18n="contact.email">Send an Email</div>
                </div>
            </a>

            <a href="https://instagram.com/olivecap.tr" target="_blank" class="contact-link reveal" style="transition-delay:.4s">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="flex-shrink-0" style="color:#e1306c">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                    <circle cx="12" cy="12" r="4"/>
                    <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                </svg>
                <div>
                    <div class="text-[11px] text-muted font-mono mb-0.5">Instagram</div>
                    <div class="text-sm font-medium">Follow Us</div>
                </div>
            </a>

            <a href="https://www.facebook.com/share/18cQLL9VEc/?mibextid=wwXIfr" target="_blank" class="contact-link reveal" style="transition-delay:.5s">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" class="flex-shrink-0" style="color:#1877f2">
                    <path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.491 0-1.956.93-1.956 1.887v2.267h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/>
                </svg>
                <div>
                    <div class="text-[11px] text-muted font-mono mb-0.5">Facebook</div>
                    <div class="text-sm font-medium">Like Our Page</div>
                </div>
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     FOOTER
══════════════════════════════════════ --}}
<footer class="border-t border-edge py-10 relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <img src="/img/logo.jpeg" alt="OliveCap Logo" class="h-7 w-auto rounded-full object-cover" style="box-shadow: 0 0 6px rgba(94,234,212,.15);">
            <span class="font-display text-lg text-cream">OliveCap</span>
            <span class="text-edge">|</span>
            <span class="text-muted text-xs font-mono">Studio</span>
        </div>
        <p class="text-muted text-xs font-mono text-center">
            &copy; {{ date('Y') }} · <span data-i18n="footer.tagline">AI-Powered Business Systems Studio</span> · Mersin, Turkey
        </p>
        <div class="flex items-center gap-2 text-muted text-xs font-mono">
            <span class="w-2 h-2 bg-teal rounded-full animate-pulse inline-block" style="box-shadow:0 0 8px var(--teal);"></span>
            <span data-i18n="footer.available">Available for projects</span>
        </div>
    </div>
</footer>

{{-- ══════════════════════════════════════
     i18n DICTIONARY
══════════════════════════════════════ --}}
<script>
window.I18N = {
  en: {
    'nav.about':'About','nav.services':'Services','nav.work':'Work','nav.stack':'Stack','nav.contact':'Contact','nav.hire':'Hire Us',
    'hero.eyebrow':'Premium Web Studio · Mersin · Ankara · Turkey',
    'hero.title':'AI-Powered <em>Business Systems</em><br>Built for Real Small Businesses',
    'hero.subtitle':'We help real businesses improve their digital presence through websites, admin panels, lead tracking, and AI-powered tools.',
    'hero.cta_primary':'Get Your Business Reviewed','hero.cta_secondary':'Start a Conversation',
    'hero.stat_projects':'Projects','hero.stat_years':'Years Dev','hero.stat_response':'Response','hero.scroll':'Scroll',
    'about.label':'The OliveCap System',
    'about.title':'Built Around<br><em>Real Business Needs</em>',
    'about.p1':'OliveCap builds practical business systems for small businesses — combining websites, admin panels, lead tracking, and AI-enhanced workflows into one coherent growth structure.',
    'about.p2':'We don\'t sell templates or generic designs. We study how your business operates, then build systems that improve lead flow, customer communication, and internal management.',
    'about.cta':'Start a Project','about.cta_secondary':'See Our Work',
    'about.cap1_title':'Analyze','about.cap1_body':'We review your digital presence, customer flow, and communication structure to identify real gaps.',
    'about.cap2_title':'Build','about.cap2_body':'We create business websites and admin panel systems tailored for real operational needs.',
    'about.cap3_title':'Track','about.cap3_body':'LeadBox CRM organizes inquiries, leads, and customer follow-ups in one clean system.',
    'about.cap4_title':'Improve','about.cap4_body':'AI-enhanced workflows sharpen lead flow, clarity, and customer experience over time.',
    'services.label':'What We Build',
    'services.title':'Systems Built<br><em>for Modern Small Businesses</em>',
    'services.intro':'OliveCap focuses on practical business systems — combining websites, admin panels, lead tracking, and AI-enhanced workflows into one scalable operation.',
    'services.s1_title':'Business Website System','services.s1_desc':'Complete business websites with admin panels, contact flows, and scalable structure built for real business operations.',
    'services.badge_core':'Core Service',
    'services.s2_title':'Website Conversion Setup','services.s2_desc':'Improve communication clarity, customer trust, and lead conversion on your existing website.',
    'services.s3_title':'LeadBox CRM','services.s3_desc':'A lightweight lead tracking system for organizing inquiries, follow-ups, and customer communication.',
    'services.s4_title':'OliveCap Business Grader','services.s4_desc':'An AI-enhanced digital presence review that analyzes websites, communication flow, and business clarity.',
    'services.badge_exp':'Experimental',
    'work.label':'Selected Work',
    'work.title':'Systems Built for<br><em>Real Businesses</em>',
    'work.intro':'A selection of business systems, websites, and digital experiences designed for real-world operations.',
    'work.prego_desc':'A multilingual education platform built to help students explore universities and manage educational content through a custom admin panel.',
    'work.wa_desc':'A WhatsApp-based lead flow designed to help businesses collect inquiries, automate first contact, and organize customer communication more efficiently.',
    'work.almostafa_desc':'A professional consulting website focused on clear service presentation, trust building, and direct client communication.',
    'work.gum_desc':'A local business website designed to present products clearly and improve customer communication through simple conversion-focused structure.',
    'work.grader_desc':'An experimental digital presence analysis system designed to evaluate business clarity, lead flow, and online communication structure.',
    'work.leadbox_desc':'A lightweight CRM prototype designed to help small businesses organize inquiries, track lead status, and manage customer follow-ups through a simple operational dashboard.',
    'why.label':'Why OliveCap',
    'why.title':'Why Businesses<br><em>Choose OliveCap</em>',
    'why.intro':'We focus on practical systems that help small businesses look professional, manage content, and turn visitors into real inquiries.',
    'why.c1_title':'Business-First Mindset','why.c1_body':'We design around real business goals — clarity, trust, communication, and customer conversion — not just visual decoration.',
    'why.c2_title':'Admin Panel Included','why.c2_body':'Your business website can be managed easily through a custom admin panel, so content stays fresh without depending on a developer for every small change.',
    'why.c3_title':'Lead-Focused Structure','why.c3_body':'Pages are structured to guide visitors toward action through clear messaging, contact forms, WhatsApp CTAs, and simple customer flows.',
    'why.c4_title':'AI-Enhanced Workflow','why.c4_body':'We use AI-assisted analysis and workflows to identify weak points, improve clarity, and generate practical digital improvement ideas.',
    'contact.label':'Ready to Start',
    'contact.title':'Let\'s Build a<br><em>Better Digital Presence</em>',
    'contact.intro':'Let\'s explore how OliveCap can help your business through websites, admin systems, lead tracking, and AI-enhanced workflows.',
    'contact.whatsapp':'Send a Message','contact.linkedin':'Connect With Us','contact.email':'Send an Email',
    'footer.tagline':'AI-Powered Business Systems Studio','footer.available':'Available for projects',
  },
  ar: {
    'nav.about':'من نحن','nav.services':'الخدمات','nav.work':'الأعمال','nav.stack':'التقنيات','nav.contact':'تواصل','nav.hire':'وظّفنا',
    'hero.eyebrow':'استوديو ويب فاخر · مرسين · أنقرة · تركيا',
    'hero.title':'أنظمة أعمال <em>ذكية</em><br>مبنية لشركاتكم الصغيرة',
    'hero.subtitle':'نساعد الشركات الحقيقية على تحسين حضورها الرقمي من خلال مواقع ويب ولوحات إدارة وتتبع العملاء المحتملين وأدوات مدعومة بالذكاء الاصطناعي.',
    'hero.cta_primary':'احصل على مراجعة لعملك','hero.cta_secondary':'ابدأ المحادثة',
    'hero.stat_projects':'مشروع','hero.stat_years':'سنوات خبرة','hero.stat_response':'استجابة','hero.scroll':'مرّر',
    'about.label':'نظام أوليف كاب',
    'about.title':'مبني حول<br><em>احتياجات الأعمال الحقيقية</em>',
    'about.p1':'يبني أوليف كاب أنظمة أعمال عملية للشركات الصغيرة — تجمع بين المواقع الإلكترونية ولوحات الإدارة وتتبع العملاء المحتملين وسير العمل المعزّز بالذكاء الاصطناعي في هيكل نمو متماسك.',
    'about.p2':'لا نبيع قوالب جاهزة أو تصاميم عشوائية. ندرس كيف يعمل عملك، ثم نبني أنظمة تحسّن تدفق العملاء المحتملين وتواصل العملاء والإدارة الداخلية.',
    'about.cta':'ابدأ مشروعاً','about.cta_secondary':'شاهد أعمالنا',
    'about.cap1_title':'تحليل','about.cap1_body':'نراجع حضورك الرقمي وتدفق العملاء وبنية التواصل لتحديد الفجوات الحقيقية.',
    'about.cap2_title':'بناء','about.cap2_body':'نبني مواقع أعمال وأنظمة لوحة إدارة مصمّمة للاحتياجات التشغيلية الحقيقية.',
    'about.cap3_title':'تتبع','about.cap3_body':'يتولّى نظام LeadBox CRM تنظيم الاستفسارات والعملاء المحتملين والمتابعات في نظام واحد نظيف.',
    'about.cap4_title':'تحسين','about.cap4_body':'تُحسّن سير العمل المعزّزة بالذكاء الاصطناعي تدفق العملاء المحتملين والوضوح وتجربة العملاء بمرور الوقت.',
    'services.label':'ما نبنيه',
    'services.title':'أنظمة مبنية<br><em>للشركات الصغيرة الحديثة</em>',
    'services.intro':'يركّز أوليف كاب على أنظمة الأعمال العملية — تجمع بين المواقع ولوحات الإدارة وتتبع العملاء المحتملين وسير العمل المعزّز بالذكاء الاصطناعي في عملية واحدة قابلة للتوسّع.',
    'services.s1_title':'نظام موقع الأعمال','services.s1_desc':'مواقع أعمال متكاملة مع لوحات إدارة وتدفقات تواصل وبنية قابلة للتوسّع مبنية للعمليات التجارية الحقيقية.',
    'services.badge_core':'خدمة أساسية',
    'services.s2_title':'إعداد تحويل الموقع','services.s2_desc':'تحسين وضوح التواصل وثقة العملاء وتحويل العملاء المحتملين على موقعك الحالي.',
    'services.s3_title':'LeadBox CRM','services.s3_desc':'نظام خفيف لتتبع العملاء المحتملين لتنظيم الاستفسارات والمتابعات وتواصل العملاء.',
    'services.s4_title':'مقيّم أعمال أوليف كاب','services.s4_desc':'مراجعة معزّزة بالذكاء الاصطناعي للحضور الرقمي تحلّل المواقع وتدفق التواصل ووضوح الأعمال.',
    'services.badge_exp':'تجريبي',
    'work.label':'أعمال مختارة',
    'work.title':'أنظمة مبنية<br><em>لأعمال حقيقية</em>',
    'work.intro':'مجموعة مختارة من أنظمة الأعمال والمواقع والتجارب الرقمية المصمّمة للعمليات الواقعية.',
    'work.prego_desc':'منصة تعليمية متعددة اللغات مبنية لمساعدة الطلاب في استكشاف الجامعات وإدارة المحتوى التعليمي من خلال لوحة إدارة مخصّصة.',
    'work.wa_desc':'نظام تدفق عملاء محتملين عبر واتساب مصمّم لمساعدة الشركات في جمع الاستفسارات وأتمتة الاتصال الأول وتنظيم تواصل العملاء بكفاءة أكبر.',
    'work.almostafa_desc':'موقع استشاري احترافي مركّز على عرض الخدمات بوضوح وبناء الثقة والتواصل المباشر مع العملاء.',
    'work.gum_desc':'موقع أعمال محلي مصمّم لعرض المنتجات بوضوح وتحسين تواصل العملاء من خلال بنية مركّزة على التحويل.',
    'work.grader_desc':'نظام تجريبي لتحليل الحضور الرقمي مصمّم لتقييم وضوح الأعمال وتدفق العملاء المحتملين وبنية التواصل عبر الإنترنت.',
    'work.leadbox_desc':'نموذج أوّلي خفيف لنظام CRM مصمّم لمساعدة الشركات الصغيرة في تنظيم الاستفسارات وتتبع حالة العملاء المحتملين وإدارة المتابعات من خلال لوحة تشغيلية بسيطة.',
    'why.label':'لماذا أوليف كاب',
    'why.title':'لماذا تختار الشركات<br><em>أوليف كاب</em>',
    'why.intro':'نركّز على الأنظمة العملية التي تساعد الشركات الصغيرة على الظهور باحترافية وإدارة المحتوى وتحويل الزوار إلى استفسارات حقيقية.',
    'why.c1_title':'عقلية الأعمال أولاً','why.c1_body':'نصمّم حول أهداف الأعمال الحقيقية — الوضوح والثقة والتواصل وتحويل العملاء — وليس مجرد الزخرفة البصرية.',
    'why.c2_title':'لوحة إدارة مضمّنة','why.c2_body':'يمكن إدارة موقع عملك بسهولة من خلال لوحة إدارة مخصّصة، حتى يبقى المحتوى جديداً دون الاعتماد على مطوّر لكل تغيير صغير.',
    'why.c3_title':'هيكل مركّز على العملاء المحتملين','why.c3_body':'تتمحور الصفحات لتوجيه الزوار نحو الإجراء من خلال رسائل واضحة ونماذج تواصل وزرات واتساب وتدفقات عملاء بسيطة.',
    'why.c4_title':'سير عمل معزّز بالذكاء الاصطناعي','why.c4_body':'نستخدم التحليل المدعوم بالذكاء الاصطناعي لتحديد نقاط الضعف وتحسين الوضوح وتوليد أفكار تحسين رقمية عملية.',
    'contact.label':'جاهز للبداية',
    'contact.title':'لنبنِ حضوراً رقمياً<br><em>أفضل معاً</em>',
    'contact.intro':'دعنا نستكشف كيف يمكن لأوليف كاب مساعدة عملك من خلال المواقع وأنظمة الإدارة وتتبع العملاء المحتملين وسير العمل المعزّز بالذكاء الاصطناعي.',
    'contact.whatsapp':'أرسل رسالة','contact.linkedin':'تواصل معنا','contact.email':'أرسل بريداً',
    'footer.tagline':'استوديو أنظمة أعمال بالذكاء الاصطناعي','footer.available':'متاحون لمشاريع جديدة',
  },
  tr: {
    'nav.about':'Hakkımızda','nav.services':'Hizmetler','nav.work':'Çalışmalar','nav.stack':'Teknoloji','nav.contact':'İletişim','nav.hire':'Bizi Tut',
    'hero.eyebrow':'Premium Web Stüdyo · Mersin · Ankara · Türkiye',
    'hero.title':'Gerçek Küçük İşletmeler İçin<br><em>Akıllı İş Sistemleri</em>',
    'hero.subtitle':'Gerçek işletmelerin dijital varlıklarını web siteleri, yönetim panelleri, potansiyel müşteri takibi ve yapay zeka destekli araçlarla geliştirmelerine yardımcı oluyoruz.',
    'hero.cta_primary':'İşletmenizi İnceletelim','hero.cta_secondary':'Sohbet Başlatın',
    'hero.stat_projects':'Proje','hero.stat_years':'Yıl Deneyim','hero.stat_response':'Yanıt','hero.scroll':'Kaydır',
    'about.label':'OliveCap Sistemi',
    'about.title':'Gerçek İş İhtiyaçları<br><em>Üzerine İnşa Edildi</em>',
    'about.p1':'OliveCap, küçük işletmeler için pratik iş sistemleri kurar — web siteleri, yönetim panelleri, potansiyel müşteri takibi ve yapay zeka destekli iş akışlarını tek bir büyüme yapısında birleştirir.',
    'about.p2':'Şablon veya genel tasarım satmıyoruz. İşletmenizin nasıl çalıştığını inceliyor, ardından potansiyel müşteri akışını, müşteri iletişimini ve iç yönetimi geliştiren sistemler oluşturuyoruz.',
    'about.cta':'Proje Başlat','about.cta_secondary':'Çalışmalarımızı Gör',
    'about.cap1_title':'Analiz','about.cap1_body':'Gerçek boşlukları belirlemek için dijital varlığınızı, müşteri akışınızı ve iletişim yapınızı inceliyoruz.',
    'about.cap2_title':'İnşa','about.cap2_body':'Gerçek operasyonel ihtiyaçlara göre özelleştirilmiş iş web siteleri ve yönetim paneli sistemleri oluşturuyoruz.',
    'about.cap3_title':'Takip','about.cap3_body':'LeadBox CRM, sorguları, potansiyel müşterileri ve müşteri takiplerini tek bir temiz sistemde düzenler.',
    'about.cap4_title':'İyileştirme','about.cap4_body':'Yapay zeka destekli iş akışları, potansiyel müşteri akışını, netliği ve müşteri deneyimini zamanla keskinleştirir.',
    'services.label':'Ne İnşa Ediyoruz',
    'services.title':'Modern Küçük İşletmeler<br><em>İçin Sistemler</em>',
    'services.intro':'OliveCap, pratik iş sistemlerine odaklanır — web siteleri, yönetim panelleri, potansiyel müşteri takibi ve yapay zeka destekli iş akışlarını tek bir ölçeklenebilir operasyonda birleştirir.',
    'services.s1_title':'İş Web Sitesi Sistemi','services.s1_desc':'Yönetim panelleri, iletişim akışları ve gerçek iş operasyonları için ölçeklenebilir yapı ile eksiksiz iş web siteleri.',
    'services.badge_core':'Temel Hizmet',
    'services.s2_title':'Web Sitesi Dönüşüm Kurulumu','services.s2_desc':'Mevcut web sitenizde iletişim netliğini, müşteri güvenini ve potansiyel müşteri dönüşümünü iyileştirin.',
    'services.s3_title':'LeadBox CRM','services.s3_desc':'Sorguları, takipleri ve müşteri iletişimini düzenlemek için hafif bir potansiyel müşteri takip sistemi.',
    'services.s4_title':'OliveCap İş Değerlendirici','services.s4_desc':'Web sitelerini, iletişim akışını ve iş netliğini analiz eden yapay zeka destekli dijital varlık incelemesi.',
    'services.badge_exp':'Deneysel',
    'work.label':'Seçilmiş Çalışmalar',
    'work.title':'Gerçek İşletmeler İçin<br><em>Kurulan Sistemler</em>',
    'work.intro':'Gerçek dünya operasyonları için tasarlanmış iş sistemleri, web siteleri ve dijital deneyimlerden oluşan bir seçki.',
    'work.prego_desc':'Öğrencilerin üniversiteleri keşfetmesine ve özel bir yönetim paneli aracılığıyla eğitim içeriğini yönetmesine yardımcı olmak için oluşturulmuş çok dilli eğitim platformu.',
    'work.wa_desc':'İşletmelerin sorguları toplamasına, ilk teması otomatikleştirmesine ve müşteri iletişimini daha verimli organize etmesine yardımcı olmak için tasarlanmış WhatsApp tabanlı potansiyel müşteri akışı.',
    'work.almostafa_desc':'Net hizmet sunumuna, güven oluşturmaya ve doğrudan müşteri iletişimine odaklanan profesyonel danışmanlık web sitesi.',
    'work.gum_desc':'Ürünleri açıkça sunmak ve basit dönüşüm odaklı yapı aracılığıyla müşteri iletişimini geliştirmek için tasarlanmış yerel işletme web sitesi.',
    'work.grader_desc':'İş netliğini, potansiyel müşteri akışını ve çevrimiçi iletişim yapısını değerlendirmek için tasarlanmış deneysel dijital varlık analiz sistemi.',
    'work.leadbox_desc':'Küçük işletmelerin sorguları organize etmesine, potansiyel müşteri durumunu takip etmesine ve müşteri takiplerini basit bir operasyonel pano aracılığıyla yönetmesine yardımcı olmak için tasarlanmış hafif CRM prototipi.',
    'why.label':'Neden OliveCap',
    'why.title':'İşletmeler Neden<br><em>OliveCap\'i Tercih Ediyor</em>',
    'why.intro':'Küçük işletmelerin profesyonel görünmesine, içerik yönetmesine ve ziyaretçileri gerçek sorgulara dönüştürmesine yardımcı olan pratik sistemlere odaklanıyoruz.',
    'why.c1_title':'İş Öncelikli Zihniyet','why.c1_body':'Gerçek iş hedefleri etrafında tasarlıyoruz — netlik, güven, iletişim ve müşteri dönüşümü — sadece görsel süsleme değil.',
    'why.c2_title':'Dahili Yönetim Paneli','why.c2_body':'İş web siteniz özel bir yönetim paneli aracılığıyla kolayca yönetilebilir, böylece her küçük değişiklik için bir geliştirici beklemeden içerik taze kalır.',
    'why.c3_title':'Potansiyel Müşteri Odaklı Yapı','why.c3_body':'Sayfalar, net mesajlar, iletişim formları, WhatsApp CTA\'ları ve basit müşteri akışları aracılığıyla ziyaretçileri eyleme yönlendirecek şekilde yapılandırılmıştır.',
    'why.c4_title':'Yapay Zeka Destekli İş Akışı','why.c4_body':'Zayıf noktaları belirlemek, netliği artırmak ve pratik dijital iyileştirme fikirleri üretmek için yapay zeka destekli analiz ve iş akışları kullanıyoruz.',
    'contact.label':'Başlamaya Hazır',
    'contact.title':'Birlikte Daha İyi Bir<br><em>Dijital Varlık İnşa Edelim</em>',
    'contact.intro':'OliveCap\'in web siteleri, yönetim sistemleri, potansiyel müşteri takibi ve yapay zeka destekli iş akışları aracılığıyla işletmenize nasıl yardımcı olabileceğini keşfedelim.',
    'contact.whatsapp':'Mesaj Gönder','contact.linkedin':'Bizimle Bağlantı Kur','contact.email':'E-posta Gönder',
    'footer.tagline':'Yapay Zeka Destekli İş Sistemleri Stüdyosu','footer.available':'Projeler için müsait',
  }
};
</script>

{{-- ══════════════════════════════════════
     MAIN JAVASCRIPT — Animations + i18n + Interactions
══════════════════════════════════════ --}}
<script>
(function () {
    'use strict';

    /* ─────────────────────────────────────────
       1) PAGE LOADER — fade out on full load
    ───────────────────────────────────────── */
    window.addEventListener('load', () => {
        const loader = document.getElementById('pageLoader');
        if (!loader) return;
        setTimeout(() => {
            loader.classList.add('hidden-loader');
            setTimeout(() => loader.remove(), 900);
        }, 500);
    });

    /* ─────────────────────────────────────────
       2) CUSTOM CURSOR — desktop only
    ───────────────────────────────────────── */
    const cursor     = document.getElementById('cursor');
    const cursorRing = document.getElementById('cursorRing');
    if (cursor && cursorRing && window.matchMedia('(pointer: fine)').matches) {
        let mx = 0, my = 0, rx = 0, ry = 0;
        document.addEventListener('mousemove', (e) => {
            mx = e.clientX; my = e.clientY;
            cursor.style.transform = `translate(${mx}px, ${my}px) translate(-50%, -50%)`;
        });
        const animateRing = () => {
            rx += (mx - rx) * 0.18;
            ry += (my - ry) * 0.18;
            cursorRing.style.transform = `translate(${rx}px, ${ry}px) translate(-50%, -50%)`;
            requestAnimationFrame(animateRing);
        };
        animateRing();

        // Hover-grow on interactive elements
        const grow = () => cursorRing.classList.add('cursor-grow');
        const shrink = () => cursorRing.classList.remove('cursor-grow');
        document.querySelectorAll('a, button, .magnetic, [data-lang]').forEach(el => {
            el.addEventListener('mouseenter', grow);
            el.addEventListener('mouseleave', shrink);
        });
    }

    /* ─────────────────────────────────────────
       3) SCROLL PROGRESS BAR + NAVBAR SCROLLED
    ───────────────────────────────────────── */
    const progressBar = document.getElementById('scrollProgress');
    const navbar      = document.getElementById('navbar');
    const onScroll = () => {
        const scrollTop  = window.scrollY;
        const docHeight  = document.documentElement.scrollHeight - window.innerHeight;
        const pct        = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
        if (progressBar) progressBar.style.width = pct + '%';
        if (navbar) navbar.classList.toggle('scrolled', scrollTop > 40);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* ─────────────────────────────────────────
       4) REVEAL ON SCROLL — IntersectionObserver
    ───────────────────────────────────────── */
    const revealEls = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window && revealEls.length) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
        revealEls.forEach(el => io.observe(el));
    } else {
        revealEls.forEach(el => el.classList.add('in-view'));
    }

    /* ─────────────────────────────────────────
       5) SKILL BARS — fill on view
    ───────────────────────────────────────── */
    const skillBars = document.querySelectorAll('.skill-bar');
    if ('IntersectionObserver' in window && skillBars.length) {
        const skillIo = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const w = entry.target.getAttribute('data-width') || '0%';
                    entry.target.style.width = w;
                    skillIo.unobserve(entry.target);
                }
            });
        }, { threshold: 0.4 });
        skillBars.forEach(b => skillIo.observe(b));
    }

    /* ─────────────────────────────────────────
       6) ANIMATED COUNTERS
    ───────────────────────────────────────── */
    const counters = document.querySelectorAll('[data-counter]');
    if ('IntersectionObserver' in window && counters.length) {
        const animate = (el) => {
            const target = parseInt(el.getAttribute('data-counter'), 10) || 0;
            const suffix = el.getAttribute('data-suffix') || '';
            const dur    = 1800;
            const start  = performance.now();
            const tick = (now) => {
                const t = Math.min((now - start) / dur, 1);
                const eased = 1 - Math.pow(1 - t, 3);
                el.textContent = Math.floor(eased * target) + suffix;
                if (t < 1) requestAnimationFrame(tick);
                else el.textContent = target + suffix;
            };
            requestAnimationFrame(tick);
        };
        const cIo = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) { animate(entry.target); cIo.unobserve(entry.target); }
            });
        }, { threshold: 0.5 });
        counters.forEach(c => cIo.observe(c));
    }

    /* ─────────────────────────────────────────
       7) MOBILE MENU TOGGLE
    ───────────────────────────────────────── */
    const menuBtn    = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            const isOpen = mobileMenu.classList.toggle('open');
            menuBtn.classList.toggle('open', isOpen);
            document.body.style.overflow = isOpen ? 'hidden' : '';
        });
    }
    window.closeMobileMenu = function () {
        if (!mobileMenu) return;
        mobileMenu.classList.remove('open');
        if (menuBtn) menuBtn.classList.remove('open');
        document.body.style.overflow = '';
    };

    /* ─────────────────────────────────────────
       8) SMOOTH SCROLL for anchor links
    ───────────────────────────────────────── */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (!targetId || targetId === '#') return;
            const target = document.querySelector(targetId);
            if (!target) return;
            e.preventDefault();
            const offset = 80;
            const y = target.getBoundingClientRect().top + window.scrollY - offset;
            window.scrollTo({ top: y, behavior: 'smooth' });
            window.closeMobileMenu();
        });
    });

    /* ─────────────────────────────────────────
       9) MAGNETIC BUTTON EFFECT
    ───────────────────────────────────────── */
    if (window.matchMedia('(pointer: fine)').matches) {
        document.querySelectorAll('.magnetic').forEach(el => {
            el.addEventListener('mousemove', (e) => {
                const r = el.getBoundingClientRect();
                const x = e.clientX - r.left - r.width / 2;
                const y = e.clientY - r.top - r.height / 2;
                el.style.transform = `translate(${x * 0.18}px, ${y * 0.28}px)`;
            });
            el.addEventListener('mouseleave', () => { el.style.transform = ''; });
        });
    }

    /* ─────────────────────────────────────────
       10) LANGUAGE SWITCHER (i18n)
    ───────────────────────────────────────── */
    const htmlRoot = document.getElementById('htmlRoot');
    const STORE_KEY = 'olivecap_lang';
    const SUPPORTED = ['en', 'ar', 'tr'];

    function moveIndicator(group) {
        const indicator = group.querySelector('.lang-indicator');
        const active    = group.querySelector('.lang-btn.active');
        if (!indicator || !active) return;
        indicator.style.width     = active.offsetWidth + 'px';
        indicator.style.height    = active.offsetHeight + 'px';
        indicator.style.left      = active.offsetLeft + 'px';
        indicator.style.transform = '';
    }

    function applyLang(lang) {
        if (!SUPPORTED.includes(lang)) lang = 'en';
        const dict = window.I18N && window.I18N[lang];
        if (!dict) return;

        // Direction + html lang
        const dir = (lang === 'ar') ? 'rtl' : 'ltr';
        document.body.setAttribute('dir', dir);
        if (htmlRoot) {
            htmlRoot.setAttribute('lang', lang);
            htmlRoot.setAttribute('dir', dir);
        }

        // Update text content
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if (dict[key] !== undefined) el.textContent = dict[key];
        });
        // Update HTML content (titles with <em>, <br>)
        document.querySelectorAll('[data-i18n-html]').forEach(el => {
            const key = el.getAttribute('data-i18n-html');
            if (dict[key] !== undefined) el.innerHTML = dict[key];
        });

        // Sync all language switcher groups
        document.querySelectorAll('.lang-switcher').forEach(group => {
            group.querySelectorAll('.lang-btn').forEach(b => {
                b.classList.toggle('active', b.getAttribute('data-lang') === lang);
            });
            // Defer indicator move so layout settles after font/dir swap
            requestAnimationFrame(() => moveIndicator(group));
            setTimeout(() => moveIndicator(group), 80);
        });

        // Persist
        try { localStorage.setItem(STORE_KEY, lang); } catch (e) {}
    }

    // Wire up buttons
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const lang = btn.getAttribute('data-lang');
            applyLang(lang);
        });
    });

    // Initial language: localStorage > browser > en
    let initialLang = 'en';
    try {
        const saved = localStorage.getItem(STORE_KEY);
        if (saved && SUPPORTED.includes(saved)) initialLang = saved;
        else {
            const nav = (navigator.language || 'en').slice(0, 2).toLowerCase();
            if (SUPPORTED.includes(nav)) initialLang = nav;
        }
    } catch (e) {}
    applyLang(initialLang);

    // Re-position indicator on resize
    window.addEventListener('resize', () => {
        document.querySelectorAll('.lang-switcher').forEach(moveIndicator);
    });

    /* ─────────────────────────────────────────
       11) PARALLAX HERO SPHERE on mouse
    ───────────────────────────────────────── */
    const sphere = document.querySelector('.hero-sphere');
    if (sphere && window.matchMedia('(pointer: fine)').matches) {
        document.addEventListener('mousemove', (e) => {
            const x = (e.clientX / window.innerWidth - 0.5) * 30;
            const y = (e.clientY / window.innerHeight - 0.5) * 30;
            sphere.style.setProperty('--mx', x + 'px');
            sphere.style.setProperty('--my', y + 'px');
        });
    }

    /* ─────────────────────────────────────────
       12) CURRENT YEAR (footer)
    ───────────────────────────────────────── */
    const yearEl = document.getElementById('currentYear');
    if (yearEl) yearEl.textContent = new Date().getFullYear();

})();
</script>

</body>
</html>
