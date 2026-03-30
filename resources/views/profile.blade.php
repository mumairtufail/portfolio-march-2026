<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Umair Tufail - Software Engineer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #0a0a0a;
            color: #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
            font-size: 14px;
            line-height: 1.6;
        }

        /* Subtle grid background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(102, 126, 234, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(118, 75, 162, 0.06) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(102, 126, 234, 0.04) 0%, transparent 50%);
            z-index: -2;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(0deg, rgba(10, 10, 10, 0.3) 0%, transparent 30%),
                linear-gradient(180deg, rgba(10, 10, 10, 0.3) 0%, transparent 30%);
            z-index: -1;
            pointer-events: none;
        }

        /* Layout Container */
        .page-container {
            display: flex;
            min-height: 100vh;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
        }

        /* Left Sidebar for Blog Cards */
        .sidebar-left {
            width: 320px;
            padding: 80px 20px 40px 30px;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.1) transparent;
        }

        .sidebar-left::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-left::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-left::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
        }

        .blog-cards-title {
            font-size: 11px;
            font-weight: 600;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .blog-cards-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, rgba(255, 255, 255, 0.1), transparent);
        }

        /* Blog Cards Container with Animation */
        .blog-cards-container {
            position: relative;
            height: 704px; /* Show exactly 4 cards: 4 * (164px card + 12px margin) = 704px */
            overflow: hidden;
            margin-bottom: 20px;
        }

        .blog-cards-scroll {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            transition: transform 0.8s ease-in-out;
        }

        .blog-card {
            margin-bottom: 12px !important;
            height: 164px; /* Double the original height for better content display */
        }

        @keyframes scrollBlogs {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-100%);
            }
        }

        .blog-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 12px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            height: 164px; /* Double the original height for better content display */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .blog-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.05), transparent);
            transition: left 0.6s ease;
        }

        .blog-card:hover::before {
            left: 100%;
        }

        .blog-card:hover {
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(102, 126, 234, 0.2);
            transform: translateX(4px);
        }

        .blog-number {
            font-size: 10px;
            font-weight: 700;
            color: rgba(102, 126, 234, 0.8);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .blog-number::before {
            content: '';
            width: 20px;
            height: 20px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.15), rgba(118, 75, 162, 0.15));
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            color: #667eea;
        }

        .blog-card[data-index="0"] .blog-number::before { content: '01'; }
        .blog-card[data-index="1"] .blog-number::before { content: '02'; }
        .blog-card[data-index="2"] .blog-number::before { content: '03'; }
        .blog-card[data-index="3"] .blog-number::before { content: '04'; }
        .blog-card[data-index="4"] .blog-number::before { content: '05'; }
        .blog-card[data-index="5"] .blog-number::before { content: '06'; }
        .blog-card[data-index="6"] .blog-number::before { content: '07'; }
        .blog-card[data-index="7"] .blog-number::before { content: '08'; }
        .blog-card[data-index="8"] .blog-number::before { content: '09'; }
        .blog-card[data-index="9"] .blog-number::before { content: '10'; }
        .blog-card[data-index="10"] .blog-number::before { content: '11'; }
        .blog-card[data-index="11"] .blog-number::before { content: '12'; }

        .blog-card-title {
            font-size: 14px;
            font-weight: 600;
            color: #f0f0f0;
            margin-bottom: 8px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .blog-card-excerpt {
            font-size: 12px;
            color: #888;
            line-height: 1.5;
            margin-bottom: 12px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .blog-card-meta {
            display: flex;
            gap: 12px;
            font-size: 10px;
            color: #666;
            margin-top: auto;
        }

        .blog-card-meta span {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .meta-icon {
            width: 12px;
            height: 12px;
            stroke: #a0a0a0;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .difficulty-text {
            font-weight: 500;
        }

        .blog-card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        /* Main Content Area */
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header-content {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 100px 40px 40px;
            min-height: 100vh;
        }

        /* Profile Section */
        .profile-section {
            text-align: center;
            max-width: 650px;
            width: 100%;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-image {
            width: 130px;
            height: 130px;
            margin: 0 auto 35px;
            position: relative;
            animation: fadeInUp 0.8s 0.2s ease-out forwards;
            opacity: 0;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #1a1a1a;
            transition: all 0.4s ease;
        }

        .profile-image .spinning-border {
            position: absolute;
            top: 50%;
            left: 50%;
            width: calc(100% + 12px);
            height: calc(100% + 12px);
            transform: translate(-50%, -50%);
            animation: spin 10s linear infinite;
        }

        .spinning-border circle {
            fill: none;
            stroke: url(#gold-gradient);
            stroke-width: 2.5;
            stroke-dasharray: 4 12;
            stroke-linecap: round;
        }

        @keyframes spin {
            from {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        /* Intro Section */
        .welcome-message {
            font-size: 16px;
            color: #b0b0b0;
            margin-bottom: 25px;
            line-height: 1.7;
            animation: fadeInUp 0.8s 0.4s ease-out forwards;
            opacity: 0;
        }

        .welcome-message .highlight-text {
            color: #667eea;
            font-weight: 600;
        }

        .intro h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 35px;
            letter-spacing: -1px;
            background: linear-gradient(to right, #ffffff, #e0e0e0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 0.8s 0.6s ease-out forwards;
            opacity: 0;
        }

        /* Challenge Button */
        .challenge-button-container {
            margin: 30px auto;
            animation: fadeInUp 0.8s 0.8s ease-out forwards;
            opacity: 0;
        }

        .challenge-intro {
            font-size: 14px;
            color: #999999;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .challenge-trigger-btn {
            background: rgba(255, 255, 255, 0.04);
            color: #e0e0e0;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px 28px;
            border-radius: 25px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .challenge-trigger-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 75%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transform: skewX(-25deg);
            transition: left 0.7s ease-in-out;
        }

        .challenge-trigger-btn:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(102, 126, 234, 0.4);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.2);
        }

        .challenge-trigger-btn:hover::before {
            left: 150%;
        }

        /* Typing Speed Test Container */
        .activity-container {
            width: 100%;
            max-width: 500px;
            margin: 20px auto;
            position: relative;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            overflow: hidden;
            padding: 25px;
            animation: slideDown 0.4s ease-out forwards;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .activity-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .activity-header h3 {
            font-size: 18px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .activity-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #b0b0b0;
            max-width: 160px;
            margin: 0 auto;
        }

        .typing-area {
            margin-bottom: 20px;
        }

        .text-display {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            font-family: 'Courier New', monospace;
            font-size: 16px;
            line-height: 1.6;
            color: #e0e0e0;
            border: 2px solid rgba(139, 69, 219, 0.3);
            min-height: 60px;
        }

        .text-display .correct {
            background: rgba(34, 197, 94, 0.3);
            color: #ffffff;
        }

        .text-display .incorrect {
            background: rgba(239, 68, 68, 0.3);
            color: #ffffff;
        }

        .text-display .current {
            background: rgba(59, 130, 246, 0.5);
            color: #ffffff;
        }

        .text-input {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            font-size: 16px;
            font-family: 'Courier New', monospace;
            resize: none;
            height: 80px;
            transition: all 0.3s ease;
        }

        .text-input:focus {
            outline: none;
            border-color: rgba(139, 69, 219, 0.5);
            box-shadow: 0 0 20px rgba(139, 69, 219, 0.2);
        }

        .text-input:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .activity-controls {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .activity-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 22px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .activity-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 75%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transform: skewX(-25deg);
            transition: left 0.8s ease-in-out;
        }

        .activity-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .activity-btn:hover::before {
            left: 150%;
        }

        .activity-btn.secondary {
            background: transparent;
            color: #c0c0c0;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: none;
            z-index: 1;
        }

        .activity-btn.secondary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 22px;
            transform: scale(0.8);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: -1;
        }

        .activity-btn.secondary:hover {
            border-color: rgba(255, 255, 255, 0.4);
            color: #ffffff;
            box-shadow: none;
            transform: translateY(-2px);
        }

        .activity-btn.secondary:hover::before {
            transform: scale(1);
            opacity: 1;
            left: 0;
            width: 100%;
            transform-origin: center;
            background: rgba(255, 255, 255, 0.1);
            transform: skewX(0deg) scale(1.0);
        }

        .time-selector {
            margin-bottom: 15px;
        }

        .time-selector label {
            display: block;
            font-size: 14px;
            color: #b0b0b0;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .time-select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 8px 12px;
            color: #ffffff;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .time-select option {
            background: #2a2a2a;
            color: #ffffff;
        }

        /* Professional Cards */
        .professional-cards {
            margin-top: 40px;
            animation: fadeInUp 0.8s 1.0s ease-out forwards;
            opacity: 0;
        }

        .cards-grid {
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
            gap: 12px;
            max-width: 100%;
            margin: 0 auto;
        }

        .professional-card {
            text-decoration: none;
            color: #d0d0d0;
            font-size: 14px;
            font-weight: 500;
            padding: 10px 22px;
            border-radius: 22px;
            position: relative;
            transition: all 0.3s ease;
            background: #1a1a1a;
            border: 1px solid transparent;
        }

        .professional-card::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 22px;
            padding: 1px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .professional-card:hover {
            color: #ffffff;
            transform: translateY(-3px);
            background: #202020;
            box-shadow: 0 6px 15px rgba(102, 126, 234, 0.15);
        }

        .professional-card:hover::before {
            opacity: 1;
        }

        /* === FINAL COLLABORATE BUTTON CONTAINER - UPDATED === */
        .final-cta-container {
            margin-top: 40px;
            animation: fadeInUp 0.8s 1.2s ease-out forwards;
            opacity: 0;
        }

        .cta-button {
            display: inline-block;
            text-decoration: none;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 32px;
            border-radius: 22px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            box-shadow: 0 6px 20px rgba(118, 75, 162, 0.3);
            border: none;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .cta-button::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 22px;
            opacity: 0;
            background-size: 200% 200%;
            background-image:
                radial-gradient(circle at 40% 30%, rgba(255, 255, 255, 0.8), transparent 30%),
                radial-gradient(circle at 60% 70%, rgba(255, 255, 255, 0.7), transparent 35%),
                radial-gradient(circle at 20% 80%, rgba(220, 210, 255, 0.6), transparent 25%),
                radial-gradient(circle at 80% 20%, rgba(210, 230, 255, 0.6), transparent 28%);
            filter: blur(5px);
            transition: opacity 0.6s ease-in-out;
            transform: scale(1.1);
        }

        .cta-button:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 10px 25px rgba(118, 75, 162, 0.45);
        }

        .cta-button:hover::before {
            opacity: 0.8;
            transform: scale(1);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .sidebar-left {
                display: none;
            }

            .header {
                left: 0;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 80px 20px 40px;
            }

            .cards-grid {
                flex-wrap: wrap;
                gap: 10px;
            }

            .intro h1 {
                font-size: 28px;
            }

            .welcome-message {
                font-size: 15px;
            }

            .professional-card {
                padding: 9px 18px;
                font-size: 13px;
            }

            .activity-container {
                max-width: 95%;
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .intro h1 {
                font-size: 24px;
            }

            .welcome-message {
                font-size: 14px;
            }

            .challenge-intro {
                font-size: 12px;
            }

            .cards-grid {
                gap: 8px;
            }

            .professional-card {
                padding: 8px 16px;
                font-size: 12px;
            }
        }

    </style>
</head>

<body>

    <!-- SVG Definition for Gold Gradient -->
    <svg width="0" height="0" style="position:absolute">
        <defs>
            <linearGradient id="gold-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#FFD700; stop-opacity:1" />
                <stop offset="100%" style="stop-color:#F0B300; stop-opacity:1" />
            </linearGradient>
        </defs>
    </svg>

    {{-- Cursor Animation Component --}}
    @include('components.cursor-animation')

    <div class="page-container">
        <!-- Left Sidebar -->
        <aside class="sidebar-left">
            <div class="blog-cards-title">Top GitHub Articles</div>
            <div class="blog-cards-container">
                <div class="blog-cards-scroll" id="blogCardsScroll">
                    @if(isset($blogs) && $blogs->count() > 0)
                        @foreach($blogs as $index => $blog)
                            <a href="{{ route('blog.show', $blog) }}" class="blog-card-link">
                                <div class="blog-card" data-index="{{ $index }}">
                                    <div class="blog-number">
                                        @if($blog->is_featured)
                                            FEATURED
                                        @elseif($index < 3)
                                            POPULAR
                                        @else
                                            TRENDING
                                        @endif
                                    </div>
                                    <h3 class="blog-card-title">{{ $blog->title }}</h3>
                                    <p class="blog-card-excerpt">{{ Str::limit($blog->excerpt, 120) }}</p>
                                    <div class="blog-card-meta">
                                        <span>
                                            <svg class="meta-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                                            {{ $blog->read_time }} min read
                                        </span>
                                        <span>
                                            @if($blog->difficulty_level === 'Beginner')
                                                <span class="difficulty-text">Beginner</span>
                                            @elseif($blog->difficulty_level === 'Intermediate')
                                                <span class="difficulty-text">Intermediate</span>
                                            @else
                                                <span class="difficulty-text">Advanced</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        <!-- Duplicate the first few blogs for seamless loop -->
                        @foreach($blogs->take(4) as $index => $blog)
                            <a href="{{ route('blog.show', $blog) }}" class="blog-card-link">
                                <div class="blog-card" data-index="{{ $index + $blogs->count() }}">
                                    <div class="blog-number">
                                        @if($blog->is_featured)
                                            FEATURED
                                        @elseif($index < 3)
                                            POPULAR
                                        @else
                                            TRENDING
                                        @endif
                                    </div>
                                    <h3 class="blog-card-title">{{ $blog->title }}</h3>
                                    <p class="blog-card-excerpt">{{ Str::limit($blog->excerpt, 120) }}</p>
                                    <div class="blog-card-meta">
                                        <span>
                                            <svg class="meta-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                                            {{ $blog->read_time }} min read
                                        </span>
                                        <span>
                                            @if($blog->difficulty_level === 'Beginner')
                                                <span class="difficulty-text">Beginner</span>
                                            @elseif($blog->difficulty_level === 'Intermediate')
                                                <span class="difficulty-text">Intermediate</span>
                                            @else
                                                <span class="difficulty-text">Advanced</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <!-- Fallback static content if no blogs -->
                        <a href="/github" class="blog-card-link">
                            <div class="blog-card" data-index="0">
                                <div class="blog-number">FEATURED</div>
                                <h3 class="blog-card-title">Git Fundamentals: From Zero to Hero</h3>
                                <p class="blog-card-excerpt">Ever lost hours of work because of a "simple" code change? Discover how Git, the time machine for your code, can save your sanity and your career.</p>
                                <div class="blog-card-meta"><span><svg class="meta-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>5 min read</span><span><span class="difficulty-text">Beginner</span></span></div>
                            </div>
                        </a>
                        <a href="/github" class="blog-card-link">
                            <div class="blog-card" data-index="1">
                                <div class="blog-number">POPULAR</div>
                                <h3 class="blog-card-title">The Secret Power of Pull Requests (Even for Solo Devs)</h3>
                                <p class="blog-card-excerpt">Think pull requests are just for big teams? The best developers use PRs to write better code, even when working alone. Here's why.</p>
                                <div class="blog-card-meta"><span><svg class="meta-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>8 min read</span><span><span class="difficulty-text">Advanced</span></span></div>
                            </div>
                        </a>
                        <a href="/github" class="blog-card-link">
                            <div class="blog-card" data-index="2">
                                <div class="blog-number">TRENDING</div>
                                <h3 class="blog-card-title">Git Branching: The Magic of Parallel Universes</h3>
                                <p class="blog-card-excerpt">What if you could experiment with risky code changes without fear? Git branches are your ticket to fearless development. Here's how to master them.</p>
                                <div class="blog-card-meta"><span><svg class="meta-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>10 min read</span><span><span class="difficulty-text">Intermediate</span></span></div>
                            </div>
                        </a>
                        <a href="/github" class="blog-card-link">
                            <div class="blog-card" data-index="3">
                                <div class="blog-number">TRENDING</div>
                                <h3 class="blog-card-title">GitHub Actions: Your Personal DevOps Assistant</h3>
                                <p class="blog-card-excerpt">Tired of manually running tests and deploying? GitHub Actions can automate your entire workflow, for free. Here's how to get started.</p>
                                <div class="blog-card-meta"><span><svg class="meta-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>13 min read</span><span><span class="difficulty-text">Beginner</span></span></div>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="main-wrapper">
            <!-- Main Content -->
            <main class="main-content">
                <div class="profile-section">
                    <!-- Profile Image -->
                    <div class="profile-image">
                        <svg class="spinning-border" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="48" />
                        </svg>
                        <img src="{{ asset('assets/profile/profile.png') }}" alt="Umair Tufail">
                    </div>

                    <!-- Introduction -->
                    <div class="intro">
                        <p class="welcome-message">Welcome! I'm excited to share my journey as a <span
                                class="highlight-text">Software Engineer</span>. I hope this space offers you valuable
                            insights and inspiration.</p>
                        <h1>Hi, I'm Umair Tufail.</h1>
                    </div>

                    <!-- Typing Challenge Button -->
                    <div class="challenge-button-container">
                        <p class="challenge-intro">Your presence here makes my day! I've arranged a beautiful typing
                            challenge for you.</p>
                        <button id="showChallengeBtn" class="challenge-trigger-btn">Try Typing Challenge</button>
                    </div>

                    <!-- Typing Speed Test -->
                    <div class="activity-container" id="activityContainer" style="display: none;">
                        <div class="activity-header">
                            <h3>Beautiful Typing Challenge</h3>
                            <div class="time-selector">
                                <label for="timeSelect">Choose Duration:</label>
                                <select id="timeSelect" class="time-select">
                                    <option value="15">15 seconds</option>
                                    <option value="30">30 seconds</option>
                                    <option value="60">1 minute</option>
                                    <option value="90" selected>1.5 minutes</option>
                                    <option value="120">2 minutes</option>
                                    <option value="180">3 minutes</option>
                                    <option value="240">4 minutes</option>
                                    <option value="300">5 minutes</option>
                                    <option value="360">6 minutes</option>
                                </select>
                            </div>
                            <div class="activity-stats"><span>WPM: <span id="wpm">0</span></span> <span>Time:
                                    <span id="timer">90</span>s</span></div>
                        </div>
                        <div class="typing-area">
                            <div id="textDisplay" class="text-display">Click "Start" to begin the typing challenge!
                            </div>
                            <textarea id="textInput" class="text-input" placeholder="Start typing here..." disabled></textarea>
                        </div>
                        <div class="activity-controls">
                            <button id="startBtn" class="activity-btn">Start Challenge</button>
                            <button id="resultBtn" class="activity-btn secondary"
                                style="display: none;">Progress</button>
                            <button id="resetBtn" class="activity-btn secondary">Reset</button>
                            <button id="closeBtn" class="activity-btn secondary">Close</button>
                        </div>
                    </div>

                    <!-- Professional Cards -->
                    <div class="professional-cards">
                        <div class="cards-grid">
                            <a href="https://github.com/mumairtufail" target="_blank" class="professional-card">GitHub</a>
                            <a href="https://www.linkedin.com/in/umair-laravel-dev" target="_blank"
                                class="professional-card">LinkedIn</a>
                            <a href="/portfolio" class="professional-card">Portfolio</a>
                            <a href="/blogs" class="professional-card">My Blogs</a>
                            <a href="/story" class="professional-card">My Story</a>
                        </div>
                    </div>

                    <!-- Final Call-to-Action Button -->
                    <div class="final-cta-container">
                        <a href="/portfolio#contact" class="cta-button">Let's Collaborate</a>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // PRESERVED TYPING SPEED TEST LOGIC - EXACTLY AS ORIGINAL
        const textDisplay = document.getElementById("textDisplay"),
            textInput = document.getElementById("textInput"),
            wpmElement = document.getElementById("wpm"),
            timerElement = document.getElementById("timer"),
            startBtn = document.getElementById("startBtn"),
            resetBtn = document.getElementById("resetBtn"),
            resultBtn = document.getElementById("resultBtn"),
            closeBtn = document.getElementById("closeBtn"),
            showChallengeBtn = document.getElementById("showChallengeBtn"),
            activityContainer = document.getElementById("activityContainer");
        showChallengeBtn.addEventListener("click", () => {
            activityContainer.style.display = "block", showChallengeBtn.style.display = "none"
        }), closeBtn.addEventListener("click", () => {
            activityContainer.style.display = "none", showChallengeBtn.style.display = "inline-block",
                resetChallenge()
        });
        const sampleTexts = [
            "The journey of a thousand miles begins with a single step, and every keystroke brings us closer to mastering our craft.",
            "In the world of code, creativity meets logic to build solutions that change lives and inspire innovation across the globe.",
            "Great developers don't just write code; they craft experiences, solve problems, and turn complex ideas into elegant simplicity.",
            "Technology is best when it brings people together, connects distant hearts, and makes the impossible seem effortlessly achievable.",
            "Every bug is a puzzle waiting to be solved, every feature is a dream waiting to be built, and every line of code matters.",
            "The art of programming lies not in knowing every syntax, but in thinking clearly, solving creatively, and never stopping learning.",
            "Behind every beautiful website is a developer who believed in the power of clean code, thoughtful design, and user experience.",
            "Success in programming comes from patience with problems, excitement about solutions, and the courage to keep improving daily.",
            "The best code tells a story, the best developers listen to users, and the best solutions make complex things beautifully simple.",
            "Innovation happens when curiosity meets determination, when ideas meet implementation, and when developers dare to dream big.",
            "Programming is like painting with logic, building with imagination, and creating digital worlds where anything is possible to achieve.",
            "In every error message lies a lesson, in every successful deploy lies growth, and in every project lies the potential for greatness."
        ];
        let currentText = "",
            currentIndex = 0,
            startTime = null,
            timerInterval = null,
            timeLeft = 90,
            selectedDuration = 90,
            isActive = !1,
            usedTexts = [];
        const timeSelect = document.getElementById("timeSelect");

        function getRandomText() {
            usedTexts.length === sampleTexts.length && (usedTexts = []);
            const e = sampleTexts.filter((e, t) => !usedTexts.includes(t)),
                t = Math.floor(Math.random() * e.length),
                n = e[t],
                l = sampleTexts.indexOf(n);
            return usedTexts.push(l), n
        }

        function updateDisplay() {
            const e = textInput.value;
            let t = "";
            for (let n = 0; n < currentText.length; n++) n < e.length ? t += e[n] === currentText[n] ?
                `<span class="correct">${currentText[n]}</span>` : `<span class="incorrect">${currentText[n]}</span>` :
                n === e.length ? t += `<span class="current">${currentText[n]}</span>` : t += currentText[n];
            textDisplay.innerHTML = t
        }

        function calculateWPM() {
            if (!startTime) return 0;
            const e = (Date.now() - startTime) / 1e3 / 60,
                t = textInput.value.trim().split(" ").length;
            return Math.round(t / e) || 0
        }

        function startTimer() {
            timerInterval = setInterval(() => {
                timeLeft--, (timerElement.textContent = timeLeft) <= 0 && endChallenge()
            }, 1e3)
        }

        function startChallenge() {
            isActive || (isActive = !0, selectedDuration = parseInt(document.getElementById("timeSelect").value), timeLeft =
                selectedDuration, currentText = getRandomText(), textInput.value = "", textInput.disabled = !1,
                textInput.focus(), timerElement.textContent = timeLeft, startTime = Date.now(), updateDisplay(),
                startTimer(),                 startBtn.textContent = "Active", startBtn.disabled = !0, resultBtn.style
                .display = "inline-block", document.querySelector(".time-selector").style.display = "none")
        }

        function showCurrentResult() {
            if (!isActive) return;
            const e = calculateWPM(),
                t = Math.round(textInput.value.split("").filter((e, t) => e === currentText[t]).length / currentText
                    .length * 100) || 0,
                n = selectedDuration - timeLeft,
                l = textDisplay.innerHTML;
            textDisplay.innerHTML = `
        <div style="text-align: center; color: #ffffff; padding: 15px; border: 1px solid rgba(102, 126, 234, 0.3); border-radius: 10px; background: rgba(102, 126, 234, 0.1);">
            <div style="font-size: 16px; margin-bottom: 10px; font-weight: 600; color: #667eea;">Current Performance</div>
            <div style="display: flex; justify-content: space-around; margin-bottom: 10px;">
                <div><div style="font-size: 12px; color: #b0b0b0;">Speed</div><div style="font-size: 18px; font-weight: 600; color: #667eea;">${e} WPM</div></div>
                <div><div style="font-size: 12px; color: #b0b0b0;">Accuracy</div><div style="font-size: 18px; font-weight: 600; color: #764ba2;">${t}%</div></div>
                <div><div style="font-size: 12px; color: #b0b0b0;">Time Elapsed</div><div style="font-size: 18px; font-weight: 600; color: #10b981;">${n}s</div></div>
            </div>
            <div style="font-size: 12px; color: #888888;">Click anywhere to continue typing...</div>
        </div>`;
            const c = () => {
                textDisplay.innerHTML = l, textInput.focus()
            };
            setTimeout(c, 3e3), textDisplay.addEventListener("click", c, {
                once: !0
            })
        }

        function endChallenge() {
            isActive = !1, clearInterval(timerInterval), textInput.disabled = !0;
            const e = calculateWPM(),
                t = Math.round(textInput.value.split("").filter((e, t) => e === currentText[t]).length / currentText
                    .length * 100) || 0;
                        startBtn.textContent = "Start Challenge", startBtn.disabled = !1, resultBtn.style.display = "none", document
                .querySelector(".time-selector").style.display = "none", document.querySelector(".activity-stats").style
                .display = "none", document.querySelector(".text-input").style.display = "none";
            let n = e >= 80 ? "WOW! You're absolutely incredible!" : e >= 60 ? "Amazing work! You're a typing superstar!" :
                e >= 40 ? "Fantastic job! You did great!" : e >= 25 ? "Well done! Keep up the excellent work!" :
                "Great effort! Every step forward counts!",
                l = t >= 95 ? "Your precision is outstanding!" : t >= 85 ? "Excellent accuracy!" : t >= 75 ?
                "Good accuracy!" : "Keep practicing for better accuracy!";
            textDisplay.innerHTML = `
        <div style="text-align: center; color: #ffffff; animation: celebrationPulse 2s ease-in-out infinite alternate;">
            <div style="font-size: 16px; margin-bottom: 10px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-weight: 600;">${n}</div>
            <div style="font-size: 14px; color: #b0b0b0; margin-bottom: 12px; font-style: italic;">${l}</div>
            <div style="display: flex; justify-content: space-around; margin-top: 12px;">
                <div style="background: rgba(102, 126, 234, 0.2); padding: 10px 15px; border-radius: 10px; border: 1px solid rgba(102, 126, 234, 0.3);"><div style="font-size: 12px; color: #b0b0b0;">Speed</div><div style="font-size: 18px; font-weight: 600; color: #667eea;">${e} WPM</div></div>
                <div style="background: rgba(118, 75, 162, 0.2); padding: 10px 15px; border-radius: 10px; border: 1px solid rgba(118, 75, 162, 0.3);"><div style="font-size: 12px; color: #b0b0b0;">Accuracy</div><div style="font-size: 18px; font-weight: 600; color: #764ba2;">${t}%</div></div>
            </div>
            <div style="margin-top: 12px; font-size: 13px; color: #888888;">${e>=50?"You're in the top tier of typists!":"Practice makes perfect - keep going!"}</div>
        </div>
        <style>@keyframes celebrationPulse { 0% { transform: scale(1); } 100% { transform: scale(1.02); } }</style>`
        }

        function resetChallenge() {
            isActive = !1, clearInterval(timerInterval), selectedDuration = parseInt(document.getElementById("timeSelect")
                    .value), currentText = "", textInput.value = "", textInput.disabled = !0, timeLeft = selectedDuration,
                timerElement.textContent = timeLeft, wpmElement.textContent = "0", textDisplay.textContent =
                'Click "Start" to begin the typing challenge!', startBtn.textContent = "Start Challenge", startBtn
                .disabled = !1, startTime = null, resultBtn.style.display = "none", document.querySelector(".time-selector")
                .style.display = "block", document.querySelector(".activity-stats").style.display = "flex", document
                .querySelector(".text-input").style.display = "block"
        }
        timeSelect.addEventListener("change", () => {
                isActive || (selectedDuration = parseInt(timeSelect.value), timeLeft = selectedDuration, timerElement
                    .textContent = timeLeft)
            }), startBtn.addEventListener("click", startChallenge), resetBtn.addEventListener("click", resetChallenge),
            resultBtn.addEventListener("click", showCurrentResult), textInput.addEventListener("input", () => {
                if (!isActive) return;
                updateDisplay();
                const e = calculateWPM();
                wpmElement.textContent = e, textInput.value.length >= currentText.length && (currentText =
                    getRandomText(), textInput.value = "", updateDisplay())
            }), textInput.addEventListener("paste", e => e.preventDefault()), resetChallenge();

        // Blog Cards Auto-Scroll Animation
        document.addEventListener('DOMContentLoaded', function() {
            const blogCardsScroll = document.getElementById('blogCardsScroll');
            if (blogCardsScroll) {
                const blogCards = blogCardsScroll.querySelectorAll('.blog-card-link');
                const totalCards = blogCards.length;
                const originalBlogCount = Math.floor(totalCards / 2); // Since we duplicate for loop
                
                if (totalCards > 4) {
                    let currentIndex = 0;
                    const cardHeight = 176; // Card height (164px) + margin (12px) = 176px
                    
                    function scrollToNext() {
                        currentIndex++;
                        const translateY = currentIndex * cardHeight;
                        
                        blogCardsScroll.style.transform = `translateY(-${translateY}px)`;
                        
                        // Reset to beginning when we've scrolled through all original cards
                        if (currentIndex >= originalBlogCount) {
                            setTimeout(() => {
                                blogCardsScroll.style.transition = 'none';
                                blogCardsScroll.style.transform = 'translateY(0)';
                                currentIndex = 0;
                                
                                // Restore transition after reset
                                setTimeout(() => {
                                    blogCardsScroll.style.transition = 'transform 0.8s ease-in-out';
                                }, 50);
                            }, 800); // Wait for transition to complete
                        }
                    }
                    
                    // Start the auto-scroll
                    setInterval(scrollToNext, 3000);
                }
            }
        });

    </script>
</body>

</html>
