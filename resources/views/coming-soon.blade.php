<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Coming Soon - {{ ucfirst(Request::segment(1) ?? 'Portfolio') }} | Umair Tufail</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            background-color: #0a0a0a;
            height: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0a0a0a !important;
            background-image: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
            background-attachment: fixed;
            color: #ffffff;
            min-height: 100vh;
            height: 100%;
            overflow-x: hidden;
            position: relative;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        /* Animated background particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        .particle:nth-child(1) { width: 2px; height: 2px; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 3px; height: 3px; left: 20%; animation-delay: 2s; }
        .particle:nth-child(3) { width: 1px; height: 1px; left: 30%; animation-delay: 4s; }
        .particle:nth-child(4) { width: 4px; height: 4px; left: 40%; animation-delay: 6s; }
        .particle:nth-child(5) { width: 2px; height: 2px; left: 50%; animation-delay: 8s; }
        .particle:nth-child(6) { width: 3px; height: 3px; left: 60%; animation-delay: 10s; }
        .particle:nth-child(7) { width: 1px; height: 1px; left: 70%; animation-delay: 12s; }
        .particle:nth-child(8) { width: 2px; height: 2px; left: 80%; animation-delay: 14s; }
        .particle:nth-child(9) { width: 3px; height: 3px; left: 90%; animation-delay: 16s; }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Animated star background */
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .star {
            position: absolute;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: twinkle 4s ease-in-out infinite;
        }

        .star::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 1px;
            height: 20px;
            background: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 0.03), transparent);
            transform: translate(-50%, -50%);
        }

        .star::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.03), transparent);
            transform: translate(-50%, -50%);
        }

        .star:nth-child(1) { top: 20%; left: 15%; width: 2px; height: 2px; animation-delay: 0s; }
        .star:nth-child(2) { top: 30%; left: 80%; width: 1px; height: 1px; animation-delay: 1s; }
        .star:nth-child(3) { top: 60%; left: 25%; width: 3px; height: 3px; animation-delay: 2s; }
        .star:nth-child(4) { top: 80%; left: 70%; width: 2px; height: 2px; animation-delay: 3s; }
        .star:nth-child(5) { top: 15%; left: 60%; width: 1px; height: 1px; animation-delay: 1.5s; }
        .star:nth-child(6) { top: 40%; left: 10%; width: 2px; height: 2px; animation-delay: 2.5s; }
        .star:nth-child(7) { top: 70%; left: 90%; width: 1px; height: 1px; animation-delay: 0.5s; }
        .star:nth-child(8) { top: 25%; left: 45%; width: 2px; height: 2px; animation-delay: 3.5s; }

        @keyframes twinkle {
            0%, 100% {
                opacity: 0.05;
                transform: scale(1);
            }
            50% {
                opacity: 0.15;
                transform: scale(1.2);
            }
        }

        /* Constellation lines */
        .constellation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .constellation-line {
            position: absolute;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.02), transparent);
            height: 1px;
            animation: constellation-glow 8s ease-in-out infinite;
            transform-origin: left center;
        }

        .constellation-line:nth-child(1) {
            top: 25%;
            left: 15%;
            width: 150px;
            transform: rotate(25deg);
            animation-delay: 0s;
        }

        .constellation-line:nth-child(2) {
            top: 60%;
            left: 70%;
            width: 100px;
            transform: rotate(-30deg);
            animation-delay: 2s;
        }

        .constellation-line:nth-child(3) {
            top: 40%;
            left: 30%;
            width: 120px;
            transform: rotate(60deg);
            animation-delay: 4s;
        }

        .constellation-line:nth-child(4) {
            top: 80%;
            left: 20%;
            width: 180px;
            transform: rotate(-15deg);
            animation-delay: 6s;
        }

        @keyframes constellation-glow {
            0%, 100% {
                opacity: 0;
            }
            50% {
                opacity: 0.8;
            }
        }

        /* Geometric background pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(45deg, rgba(255,255,255,0.02) 1px, transparent 1px),
                linear-gradient(-45deg, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 60px 60px;
            z-index: -1;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
            position: relative;
            z-index: 2;
            background-color: transparent;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 60px;
            opacity: 0;
            animation: fadeInDown 1s ease-out 0.5s forwards;
            letter-spacing: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .main-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .title {
            font-size: clamp(36px, 6vw, 64px);
            font-weight: 800;
            margin-bottom: 30px;
            opacity: 0;
            animation: fadeInUp 1.2s ease-out 1s forwards;
            letter-spacing: -2px;
            line-height: 1.1;
        }

        .title .highlight {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
        }

        .subtitle {
            font-size: clamp(16px, 2.5vw, 20px);
            color: #b0b0b0;
            margin-bottom: 40px;
            opacity: 0;
            animation: fadeInUp 1.2s ease-out 1.5s forwards;
            line-height: 1.6;
            font-weight: 300;
        }

        .description {
            font-size: 15px;
            color: #888888;
            margin-bottom: 50px;
            opacity: 0;
            animation: fadeInUp 1.2s ease-out 2s forwards;
            line-height: 1.7;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .keywords {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-bottom: 60px;
            opacity: 0;
            animation: fadeInUp 1.2s ease-out 2.5s forwards;
        }

        .keyword {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 6px 14px;
            border-radius: 25px;
            font-size: 13px;
            color: #cccccc;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            animation: keywordPulse 3s ease-in-out infinite;
        }

        .keyword:nth-child(even) {
            animation-delay: 1.5s;
        }

        .keyword:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            color: #ffffff;
        }

        @keyframes keywordPulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.1);
            }
            50% {
                transform: scale(1.02);
                box-shadow: 0 0 20px 0 rgba(255, 255, 255, 0.05);
            }
        }

        .progress-container {
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
            opacity: 0;
            animation: fadeInUp 1.2s ease-out 3s forwards;
        }

        .progress-label {
            font-size: 13px;
            color: #888888;
            margin-bottom: 10px;
            text-align: center;
        }

        .progress-bar {
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            overflow: hidden;
            position: relative;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
            width: 0%;
            animation: progressFill 4s ease-out 3.5s forwards;
            position: relative;
        }

        .progress-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.4) 50%, transparent 100%);
            animation: shine 2s ease-in-out infinite;
        }

        @keyframes progressFill {
            from { width: 0%; }
            to { width: var(--progress-width, 87%); }
        }

        @keyframes shine {
            0% { transform: translateX(-100%); }
            50% { transform: translateX(100%); }
            100% { transform: translateX(100%); }
        }

        .cta-section {
            margin-top: 60px;
            opacity: 0;
            animation: fadeInUp 1.2s ease-out 3.5s forwards;
        }

        .notify-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            border: none;
            padding: 14px 36px;
            border-radius: 30px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            margin-bottom: 30px;
        }

        .notify-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
        }

        .notify-button:active {
            transform: translateY(-1px);
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }

        .social-link {
            color: #888888;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            padding: 8px 18px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .social-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .footer {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            color: #666666;
            opacity: 0;
            animation: fadeIn 1s ease-out 4s forwards;
        }

        /* Animation keyframes */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }
            
            .keywords {
                gap: 10px;
            }
            
            .keyword {
                font-size: 12px;
                padding: 6px 12px;
            }
            
            .social-links {
                gap: 20px;
                flex-wrap: wrap;
            }
            
            .progress-container {
                max-width: 300px;
            }
        }

    </style>
</head>
<body>
    <div class="stars">
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
    </div>

    <div class="constellation">
        <div class="constellation-line"></div>
        <div class="constellation-line"></div>
        <div class="constellation-line"></div>
        <div class="constellation-line"></div>
    </div>

    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    {{-- Cursor Animation Component --}}
    @include('components.cursor-animation')

    <div class="container">
        <div class="logo">UMAIR.DEV</div>
        
        <div class="main-content">
            @php
                $currentPage = Request::segment(1);
                $pageConfig = [
                    'portfolio' => [
                        'title' => 'My <span class="highlight">Portfolio</span> is Loading',
                        'subtitle' => 'Crafting digital experiences that showcase innovation and creativity',
                        'description' => 'I\'m putting the final touches on my portfolio showcase. Each project tells a story of problem-solving, creativity, and technical excellence. Think of it as a curated gallery of my digital adventures.',
                        'keywords' => ['Full-Stack Engineer', 'UI/UX Enthusiast', 'Code Architect', 'Problem Solver', 'Digital Craftsman', 'Innovation Driver']
                    ],
                    'blogs' => [
                        'title' => 'My <span class="highlight">Blog</span> is Brewing',
                        'subtitle' => 'Crafting insightful articles about code, life, and everything in between',
                        'description' => 'I\'m brewing some amazing blog posts filled with technical insights, personal experiences, and the occasional programming humor. Think of it as a developer\'s diary meets a technical handbook - but way more entertaining.',
                        'keywords' => ['Technical Writer', 'Code Storyteller', 'Bug Chronicles', 'Developer Insights', 'Tech Philosophy', 'Code Adventures']
                    ],
                    'story' => [
                        'title' => 'My <span class="highlight">Story</span> Unfolds',
                        'subtitle' => 'From curious beginner to passionate developer - the journey continues',
                        'description' => 'Every great developer has a story. Mine involves late-night coding sessions, countless Stack Overflow visits, and that magical moment when everything finally clicks. I\'m crafting a beautiful narrative about my journey in tech.',
                        'keywords' => ['Journey Teller', 'Growth Hacker', 'Learning Enthusiast', 'Code Evolution', 'Tech Dreamer', 'Problem Solver']
                    ],
                    'default' => [
                        'title' => 'Something <span class="highlight">Extraordinary</span> is Brewing',
                        'subtitle' => 'Crafting digital experiences that blend innovation with elegance',
                        'description' => 'I\'m currently putting the finishing touches on my portfolio. Think of it as a fine wine aging to perfection, or a complex algorithm optimizing for brilliance. Either way, it\'s going to be worth the wait.',
                        'keywords' => ['Full-Stack Engineer', 'UI/UX Enthusiast', 'Code Architect', 'Problem Solver', 'Digital Craftsman', 'Innovation Driver']
                    ]
                ];
                
                $config = $pageConfig[$currentPage] ?? $pageConfig['default'];
            @endphp
            
            <h1 class="title">{!! $config['title'] !!}</h1>
            
            <p class="subtitle">{{ $config['subtitle'] }}</p>
            
            <p class="description">
                {{ $config['description'] }}
            </p>
            
            <div class="keywords">
                @foreach($config['keywords'] as $keyword)
                    <span class="keyword">{{ $keyword }}</span>
                @endforeach
                <span class="keyword">Tech Storyteller</span>
                <span class="keyword">Pixel Perfectionist</span>
                <span class="keyword">Logic Wizard</span>
                <span class="keyword">Coffee-to-Code Converter</span>
                <span class="keyword">Bug Whisperer</span>
                <span class="keyword">Deadline Ninja</span>
            </div>
            
            <div class="progress-container">
                @php
                    $progressConfig = [
                        'portfolio' => ['label' => 'Portfolio Progress', 'percentage' => 85],
                        'blogs' => ['label' => 'Blog Platform Progress', 'percentage' => 75],
                        'story' => ['label' => 'Story Page Progress', 'percentage' => 60],
                        'default' => ['label' => 'Portfolio Progress', 'percentage' => 87]
                    ];
                    $progress = $progressConfig[$currentPage] ?? $progressConfig['default'];
                @endphp
                <div class="progress-label">{{ $progress['label'] }}</div>
                <div class="progress-bar">
                    <div class="progress-fill" style="--progress-width: {{ $progress['percentage'] }}%"></div>
                </div>
            </div>
            
            <div class="cta-section">
                <button class="notify-button" onclick="showNotification()">Notify Me When Ready</button>
                
                <div class="social-links">
                    <a href="/" class="social-link">← Back to Profile</a>
                    <a href="mailto:mumairtufail786@gmail.com" class="social-link">Email</a>
                    <a href="https://www.linkedin.com/in/umair-laravel-dev" target="_blank" class="social-link">LinkedIn</a>
                    <a href="https://github.com/mumairtufail" target="_blank" class="social-link">GitHub</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer">
        &copy; 2026 Umair Tufail. Preparing something special for you.
    </div>

    <script>
        // Notification function
        function showNotification() {
            const currentPage = window.location.pathname.substring(1) || 'portfolio';
            const messages = {
                'portfolio': "Thanks! I'll notify you when my portfolio showcase is ready ✨",
                'blogs': "Thanks! I'll notify you when my blog is ready to inspire ✨",
                'story': "Thanks! I'll ping you when my story is ready to share ✨",
                'default': "Thanks! I'll ping you when the magic is ready ✨"
            };
            
            const message = messages[currentPage] || messages['default'];
            
            // Create a beautiful notification
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 30px;
                right: 30px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 20px 30px;
                border-radius: 15px;
                box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
                z-index: 10000;
                transform: translateX(400px);
                transition: all 0.5s ease;
                font-weight: 600;
                backdrop-filter: blur(10px);
            `;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            // Animate out and remove
            setTimeout(() => {
                notification.style.transform = 'translateX(400px)';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 500);
            }, 3000);
        }
    </script>
</body>
</html>
