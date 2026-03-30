<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Umair Tufail - Senior Backend / Full-Stack Engineer Portfolio</title>
    <meta name="description" content="Senior Backend / Full-Stack Engineer with 4+ years of experience building high-scale SaaS products, multi-tenant systems, and real-time platforms.">
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
                linear-gradient(180deg, rgba(10, 10, 10, 0.3) 0%, transparent 30%);
            z-index: -1;
            pointer-events: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 40px 40px;
        }

        /* Banner Section */
        .banner-section {
            position: relative;
            width: calc(100% - 80px); /* Add margin from sides */
            height: 45vh; /* Reduced from 60vh (25% reduction) */
            min-height: 300px; /* Reduced from 400px (25% reduction) */
            max-height: 450px; /* Reduced from 600px (25% reduction) */
            margin: 80px 40px 30px 40px; /* Removed extra bottom margin */
            animation: fadeInUp 1s ease-out;
        }

        .banner-background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ asset('assets/profile/cover.png') }}');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            border-radius: 20px;
            overflow: hidden;
        }

        .banner-content-wrapper {
            position: relative;
            z-index: 3;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .banner-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                135deg,
                rgba(0, 0, 0, 0.4) 0%,
                rgba(10, 10, 10, 0.6) 50%,
                rgba(0, 0, 0, 0.4) 100%
            );
            z-index: 1;
        }

        .banner-background::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                45deg,
                rgba(102, 126, 234, 0.1) 0%,
                transparent 50%,
                rgba(118, 75, 162, 0.1) 100%
            );
            z-index: 2;
        }

        .banner-content {
            position: relative;
            z-index: 3;
            text-align: center;
            color: #ffffff;
            max-width: 800px;
            padding: 0 20px;
        }

        .banner-title {
            font-size: 56px;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            line-height: 1.2;
        }

        .banner-subtitle {
            font-size: 24px;
            margin-bottom: 15px;
            color: #f0f0f0;
            font-weight: 500;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .banner-tagline {
            font-size: 18px;
            color: #d0d0d0;
            line-height: 1.6;
            margin-bottom: 30px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .banner-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .banner-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .banner-cta:hover::before {
            left: 100%;
        }

        .banner-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        }

        /* Profile Picture at Bottom Center of Banner */
        .banner-profile {
            position: absolute;
            bottom: -90px; /* Adjusted for larger image */
            left: 50%;
            transform: translateX(-50%);
            z-index: 4;
            width: 180px; /* Increased from 150px */
            height: 180px; /* Increased from 150px */
            border-radius: 50%;
            border: 12px solid #0a0a0a; /* Increased from 8px to 12px */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .banner-profile:hover {
            transform: translateX(-50%) scale(1.05);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        }

        .banner-profile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .banner-profile:hover img {
            transform: scale(1.1);
        }

        /* Spinning Border Animation */
        .banner-profile::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(45deg, #667eea, #764ba2, #667eea);
            border-radius: 50%;
            z-index: -1;
            animation: spin 3s linear infinite;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .banner-profile:hover::before {
            opacity: 1;
        }

        /* Hero Section - Updated to accommodate banner */
        .hero-section {
            text-align: center;
            margin-bottom: 80px;
            margin-top: 50px; /* Increased slightly to accommodate larger profile picture */
            animation: fadeInUp 1s ease-out;
        }

        .hero-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 30px;
            position: relative;
            overflow: hidden;
            border: 3px solid transparent;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .hero-image:hover img {
            transform: scale(1.05);
        }

        .hero-title {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 24px;
            color: #b0b0b0;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .hero-tagline {
            font-size: 18px;
            color: #e0e0e0;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Section Styles */
        .section {
            margin-bottom: 80px;
            animation: fadeInUp 1s ease-out;
        }

        .section-title {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 40px;
            text-align: center;
            color: #ffffff;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        /* Card Styles */
        .card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 15px;
            padding: 30px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.05), transparent);
            transition: left 0.6s ease;
        }

        .card:hover::before {
            left: 100%;
        }

        .card:hover {
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(102, 126, 234, 0.2);
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        /* Education Section */
        .education-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
        }

        .education-card {
            position: relative;
            padding-right: 150px; /* reserve space for larger logo on right */
            min-height: 140px;
        }

        .education-logo {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 120px; /* increased size */
            height: 120px; /* increased size */
            border-radius: 12px;
            overflow: hidden;
            background: transparent; /* remove background */
            border: none; /* remove border */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .education-logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            display: block;
        }

        .education-card.gold-medal::before {
            position: absolute;
            top: 20px;
            right: 150px; /* push trophy left for larger logo */
            font-size: 24px;
            z-index: 2;
            transition: all 0.3s ease;
        }

        /* Celebration Animation for Gold Medal Card */
        .education-card.gold-medal {
            overflow: hidden;
            position: relative;
        }

        .education-card.gold-medal:hover {
            animation: celebrate 1s ease-in-out;
            background: linear-gradient(45deg, rgba(255, 215, 0, 0.1), rgba(255, 165, 0, 0.1), rgba(255, 215, 0, 0.1));
            border-color: rgba(255, 215, 0, 0.3);
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.3);
        }

        .education-card.gold-medal:hover::before {
            animation: trophyBounce 0.8s ease-in-out infinite;
            font-size: 28px;
        }

        /* Confetti particles on hover */
        .education-card.gold-medal:hover::after {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            font-size: 16px;
            pointer-events: none;
            z-index: 3;
            animation: confettiFall 2s ease-out;
            overflow: hidden;
            white-space: nowrap;
            color: transparent;
            text-shadow: 0 0 0 #FFD700;
        }

        /* Gold Medal Badge Enhanced Animation */
        .education-card.gold-medal:hover .gold-medal-badge {
            animation: goldGlow 1.5s ease-in-out infinite alternate;
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
        }

        @keyframes celebrate {
            0% { transform: scale(1); }
            25% { transform: scale(1.02) rotate(1deg); }
            50% { transform: scale(1.05) rotate(-1deg); }
            75% { transform: scale(1.02) rotate(0.5deg); }
            100% { transform: scale(1) rotate(0deg); }
        }

        @keyframes trophyBounce {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-5px) rotate(5deg); }
            50% { transform: translateY(-8px) rotate(-3deg); }
            75% { transform: translateY(-3px) rotate(2deg); }
        }

        @keyframes confettiFall {
            0% {
                transform: translateY(-100%) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100%) rotate(360deg);
                opacity: 0;
            }
        }

        @keyframes goldGlow {
            0% {
                background: linear-gradient(135deg, #FFD700, #FFA500);
                text-shadow: 0 0 5px rgba(255, 215, 0, 0.8);
            }
            100% {
                background: linear-gradient(135deg, #FFA500, #FFD700, #FFFF00);
                text-shadow: 0 0 15px rgba(255, 215, 0, 1);
            }
        }

        /* Additional sparkle effect */
        .education-card.gold-medal:hover .education-degree {
            animation: textSparkle 2s ease-in-out infinite;
        }

        @keyframes textSparkle {
            0%, 100% { 
                color: #ffffff;
                text-shadow: none;
            }
            50% { 
                color: #FFD700;
                text-shadow: 0 0 10px rgba(255, 215, 0, 0.8);
            }
        }

        .education-degree {
            font-size: 20px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .education-institution {
            font-size: 16px;
            color: #667eea;
            margin-bottom: 8px;
        }

        .education-date {
            font-size: 14px;
            color: #b0b0b0;
        }

        .gold-medal-badge {
            display: inline-block;
            background: linear-gradient(135deg, #FFD700, #FFA500);
            color: #000;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 10px;
        }

        /* Status Badges */
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 10px;
            margin-left: 5px;
            transition: all 0.3s ease;
        }

        .status-badge.completed {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: #fff;
            box-shadow: 0 2px 8px rgba(76, 175, 80, 0.3);
        }

        .status-badge.pursuing {
            background: linear-gradient(135deg, #2196F3, #1976D2);
            color: #fff;
            box-shadow: 0 2px 8px rgba(33, 150, 243, 0.3);
        }

        .education-card:hover .status-badge.completed {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.4);
            background: linear-gradient(135deg, #45a049, #388e3c);
        }

        .education-card:hover .status-badge.pursuing {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(33, 150, 243, 0.4);
            background: linear-gradient(135deg, #1976D2, #1565C0);
        }

        /* Current Degree Styling */
        .education-card.current-degree {
            border-color: rgba(102, 126, 234, 0.3);
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            position: relative;
        }

        .education-card.current-degree::before {
            position: absolute;
            top: 20px;
            right: 150px;
            font-size: 24px;
            z-index: 2;
        }

        .education-card.current-degree:hover {
            border-color: rgba(102, 126, 234, 0.5);
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            box-shadow: 0 0 25px rgba(102, 126, 234, 0.2);
        }

        .education-card.current-degree .education-date {
            color: #667eea;
            font-weight: 500;
        }

        /* Services Section */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
        }

        .service-card {
            text-align: center;
        }

        .service-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .service-title {
            font-size: 18px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 15px;
        }

        .service-description {
            font-size: 14px;
            color: #b0b0b0;
            line-height: 1.6;
        }

        /* Skills Section */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .skill-category {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
        }

        .skill-category:hover {
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(102, 126, 234, 0.2);
        }

        .skill-category-title {
            font-size: 16px;
            font-weight: 600;
            color: #667eea;
            margin-bottom: 15px;
        }

        .skill-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .skill-tag {
            background: rgba(102, 126, 234, 0.1);
            color: #ffffff;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .skill-tag:hover {
            background: rgba(102, 126, 234, 0.2);
            transform: translateY(-2px);
        }

        /* Experience Section */
        .experience-timeline {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 0;
        }

        .experience-timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transform: translateX(-50%);
            z-index: 1;
        }

        .experience-item {
            position: relative;
            margin-bottom: 40px;
            width: 45%;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
        }

        /* Add negative margin-top to create overlap effect */
        .experience-item:not(:first-child) {
            margin-top: -30px;
        }

        /* Left side items */
        .experience-item:nth-child(odd) {
            left: 0;
            text-align: right;
        }

        /* Right side items */
        .experience-item:nth-child(even) {
            left: 55%;
            text-align: left;
        }

        /* Timeline dots */
        .experience-item::before {
            content: '';
            position: absolute;
            top: 30px;
            width: 16px;
            height: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            border: 3px solid #0a0a0a;
            z-index: 2;
        }

        /* Left side dots */
        .experience-item:nth-child(odd)::before {
            right: -32px;
        }

        /* Right side dots */
        .experience-item:nth-child(even)::before {
            left: -32px;
        }

        /* Connecting lines from cards to center line */
        .experience-item::after {
            content: '';
            position: absolute;
            top: 38px;
            width: 25px;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            z-index: 1;
        }

        /* Left side connecting lines */
        .experience-item:nth-child(odd)::after {
            right: -25px;
        }

        /* Right side connecting lines */
        .experience-item:nth-child(even)::after {
            left: -25px;
        }

        .experience-item:hover {
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(102, 126, 234, 0.2);
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .experience-item:hover::before {
            transform: scale(1.2);
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.5);
        }

        .experience-company {
            font-size: 20px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 5px;
        }

        .experience-position {
            font-size: 16px;
            color: #667eea;
            margin-bottom: 8px;
        }

        .experience-duration {
            font-size: 14px;
            color: #b0b0b0;
            margin-bottom: 15px;
        }

        .experience-highlights {
            list-style: none;
            padding: 0;
        }

        .experience-highlights li {
            position: relative;
            padding-left: 20px;
            margin-bottom: 8px;
            color: #e0e0e0;
            font-size: 14px;
            line-height: 1.5;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .experience-highlights li::before {
            content: '▸';
            position: absolute;
            left: 0;
            color: #667eea;
            font-weight: bold;
        }

        /* Projects Section */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .project-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .project-card:hover {
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(102, 126, 234, 0.2);
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .project-image {
            width: 100%;
            height: 240px;
            background: radial-gradient(circle at center, rgba(102, 126, 234, 0.15) 0%, rgba(118, 75, 162, 0.08) 45%, rgba(0, 0, 0, 0.35) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 16px;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.28);
        }

        .project-image-empty {
            font-size: 14px;
            color: #b0b0b0;
            text-align: center;
            padding: 0 16px;
        }

        .project-shot-count {
            position: absolute;
            right: 12px;
            bottom: 12px;
            background: rgba(0, 0, 0, 0.65);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 999px;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            backdrop-filter: blur(6px);
            pointer-events: none;
        }

        .project-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s ease;
        }

        .project-card:hover .project-image::before {
            left: 100%;
        }

        .project-content {
            padding: 25px;
        }

        .project-title {
            font-size: 18px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .project-description {
            font-size: 14px;
            color: #b0b0b0;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
        }

        .tech-tag {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: 500;
        }

        .project-metrics {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .project-likes {
            display: flex;
            align-items: center;
            gap: 4px;
            color: #b0b0b0;
            font-size: 11px;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 4px 8px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .project-likes::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 107, 107, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .project-likes:hover::before {
            left: 100%;
        }

        .project-likes:hover {
            color: #ff6b6b;
            border-color: rgba(255, 107, 107, 0.3);
            background: rgba(255, 107, 107, 0.05);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.15);
        }

        .like-icon {
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            font-size: 12px;
            filter: grayscale(100%);
            position: relative;
            z-index: 1;
        }

        .like-icon.liked {
            color: #ff6b6b;
            filter: grayscale(0%);
            animation: likeAnimation 0.8s ease;
            text-shadow: 0 0 10px rgba(255, 107, 107, 0.5);
        }

        .like-count {
            font-weight: 600;
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .like-text {
            font-size: 10px;
            opacity: 0.8;
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .project-likes:hover .like-count {
            color: #ffffff;
        }

        .project-likes:hover .like-text {
            opacity: 1;
        }

        .project-likes.liked {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 78, 80, 0.1));
            border-color: rgba(255, 107, 107, 0.4);
            color: #ff6b6b;
            animation: likedPulse 2s ease-in-out infinite;
        }

        .project-likes.liked .like-count {
            color: #ff6b6b;
            font-weight: 700;
        }

        .project-likes.liked .like-text {
            color: #ff6b6b;
        }

        @keyframes likedPulse {
            0%, 100% {
                box-shadow: 0 4px 15px rgba(255, 107, 107, 0.15);
            }
            50% {
                box-shadow: 0 4px 15px rgba(255, 107, 107, 0.25);
            }
        }

        @keyframes likeAnimation {
            0% { 
                transform: scale(1); 
            }
            15% { 
                transform: scale(1.3) rotate(-5deg); 
            }
            30% { 
                transform: scale(1.1) rotate(5deg); 
            }
            45% { 
                transform: scale(1.25) rotate(-3deg); 
            }
            60% { 
                transform: scale(1.05) rotate(2deg); 
            }
            75% { 
                transform: scale(1.15) rotate(-1deg); 
            }
            100% { 
                transform: scale(1) rotate(0deg); 
            }
        }

        /* Floating hearts animation */
        @keyframes floatingHearts {
            0% {
                opacity: 1;
                transform: translateY(0) scale(0.5);
            }
            50% {
                opacity: 0.8;
                transform: translateY(-20px) scale(0.8);
            }
            100% {
                opacity: 0;
                transform: translateY(-40px) scale(0.3);
            }
        }

        .floating-heart {
            position: absolute;
            color: #ff6b6b;
            font-size: 10px;
            pointer-events: none;
            animation: floatingHearts 1.5s ease-out forwards;
            z-index: 1000;
        }

        .project-type {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: 500;
        }

        .project-card.is-clickable {
            cursor: pointer;
        }

        .project-card.is-clickable .project-title {
            transition: color 0.3s ease;
        }

        .project-card.is-clickable:hover .project-title {
            color: #91a5ff;
        }

        /* Project Modal */
        .project-modal {
            position: fixed;
            inset: 0;
            background: rgba(3, 5, 12, 0.88);
            backdrop-filter: blur(5px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 2500;
            padding: 18px;
        }

        .project-modal.open {
            display: flex;
        }

        .project-modal-content {
            width: min(1100px, 100%);
            max-height: 92vh;
            overflow: auto;
            background: #111726;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .project-modal-close {
            position: absolute;
            right: 12px;
            top: 12px;
            width: 36px;
            height: 36px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 50%;
            background: rgba(6, 9, 17, 0.7);
            color: #fff;
            cursor: pointer;
            font-size: 18px;
            z-index: 4;
        }

        .project-modal-gallery {
            position: relative;
            padding: 18px 56px;
            min-height: 360px;
            background: linear-gradient(180deg, rgba(25, 33, 53, 0.65), rgba(16, 21, 35, 0.5));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .project-modal-image {
            width: 100%;
            max-height: 62vh;
            object-fit: contain;
            object-position: center;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.25);
        }

        .project-modal-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            background: rgba(6, 9, 17, 0.7);
            color: #fff;
            cursor: pointer;
            font-size: 20px;
            line-height: 1;
        }

        .project-modal-nav.prev { left: 12px; }
        .project-modal-nav.next { right: 12px; }

        .project-modal-thumbs {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            padding: 10px 18px 14px;
            background: rgba(0, 0, 0, 0.18);
        }

        .project-thumb {
            width: 96px;
            height: 70px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.02);
            padding: 4px;
            flex: 0 0 auto;
            cursor: pointer;
            opacity: 0.7;
        }

        .project-thumb.active {
            border-color: rgba(145, 165, 255, 0.85);
            opacity: 1;
        }

        .project-thumb img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 6px;
        }

        .project-modal-body {
            padding: 20px;
        }

        .project-modal-title {
            font-size: 26px;
            margin-bottom: 8px;
            color: #ffffff;
        }

        .project-modal-description {
            color: #c0c6d9;
            margin-bottom: 12px;
            line-height: 1.7;
        }

        .project-modal-meta {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 14px;
        }

        .project-modal-type {
            background: rgba(145, 165, 255, 0.15);
            color: #c8d4ff;
            border: 1px solid rgba(145, 165, 255, 0.35);
            border-radius: 999px;
            font-size: 12px;
            padding: 6px 12px;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .project-modal-gallery {
                padding: 12px 42px;
                min-height: 280px;
            }

            .project-modal-title {
                font-size: 21px;
            }

            .project-thumb {
                width: 80px;
                height: 60px;
            }
        }

        /* View All Projects Button */
        .view-all-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 15px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0 auto;
            display: block;
            width: fit-content;
        }

        .view-all-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        /* View All Card Styles */
        .view-all-card {
            border: 2px dashed rgba(102, 126, 234, 0.3);
            background: rgba(102, 126, 234, 0.05);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 300px;
        }

        .view-all-card:hover {
            border-color: rgba(102, 126, 234, 0.6);
            background: rgba(102, 126, 234, 0.1);
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
        }

        .view-all-content {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        .view-all-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 15px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .view-all-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        .view-all-image {
            background: rgba(102, 126, 234, 0.1) !important;
            color: #667eea;
        }

        .view-all-link {
            text-decoration: none;
            color: inherit;
        }

        .view-all-link:hover .project-type {
            color: #ffffff;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transform: scale(1.05);
        }

        /* Contact Form Styles */
        .contact-container {
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 20px;
            padding: 40px;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .contact-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            border-radius: 20px;
            z-index: -1;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-subtitle {
            font-size: 16px;
            color: #b0b0b0;
            line-height: 1.5;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .form-group {
            position: relative;
        }

        .form-input,
        .form-textarea {
            width: 100%;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #ffffff;
            font-size: 15px;
            font-family: inherit;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(5px);
        }

        .form-input:focus,
        .form-textarea:focus {
            outline: none;
            border-color: rgba(102, 126, 234, 0.5);
            background: rgba(255, 255, 255, 0.05);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
            font-family: inherit;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #666666;
            transition: opacity 0.3s ease;
        }

        .form-input:focus::placeholder,
        .form-textarea:focus::placeholder {
            opacity: 0.5;
        }

        .submit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            border: none;
            padding: 18px 32px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 16px;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn.loading {
            opacity: 0.8;
            cursor: not-allowed;
            transform: none;
        }

        .submit-btn.loading .btn-text {
            opacity: 0;
        }

        .loading-spinner {
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .submit-btn.loading .loading-spinner {
            opacity: 1;
        }

        .success-message,
        .error-message {
            padding: 16px 20px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            margin-top: 20px;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }

        .success-message {
            background: rgba(76, 175, 80, 0.1);
            border: 1px solid rgba(76, 175, 80, 0.3);
            color: #4CAF50;
        }

        .error-message {
            background: rgba(244, 67, 54, 0.1);
            border: 1px solid rgba(244, 67, 54, 0.3);
            color: #f44336;
        }

        .success-message.show,
        .error-message.show {
            opacity: 1;
            transform: translateY(0);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .character-count {
            font-size: 12px;
            color: #666666;
            text-align: right;
            margin-top: 4px;
            transition: color 0.3s ease;
        }

        .character-count.warning {
            color: #FF9800;
        }

        .character-count.error {
            color: #f44336;
        }

        /* Enhanced floating label effect */
        .floating-input {
            position: relative;
        }

        .floating-label {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            padding: 0 8px;
            font-size: 15px;
            color: #666666;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .floating-input input:focus + .floating-label,
        .floating-input input:not(:placeholder-shown) + .floating-label,
        .floating-input textarea:focus + .floating-label,
        .floating-input textarea:not(:placeholder-shown) + .floating-label {
            top: 0;
            font-size: 12px;
            color: #667eea;
            font-weight: 600;
        }

        .floating-input textarea + .floating-label {
            top: 24px;
            transform: translateY(0);
        }

        .floating-input textarea:focus + .floating-label,
        .floating-input textarea:not(:placeholder-shown) + .floating-label {
            top: 0;
            transform: translateY(0);
        }

        .validation-message {
            font-size: 12px;
            margin-top: 6px;
            transition: all 0.3s ease;
        }

        .validation-message.error {
            color: #f44336;
        }

        .validation-message.success {
            color: #4CAF50;
        }

        .form-input.invalid,
        .form-textarea.invalid {
            border-color: rgba(244, 67, 54, 0.5);
            box-shadow: 0 0 0 3px rgba(244, 67, 54, 0.1);
        }

        .form-input.valid,
        .form-textarea.valid {
            border-color: rgba(76, 175, 80, 0.5);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 80px;
            padding: 40px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-tagline {
            font-size: 18px;
            color: #b0b0b0;
            margin-bottom: 20px;
            font-style: italic;
        }

        .footer-text {
            font-size: 14px;
            color: #666;
        }

        /* Animations */
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 100px 20px 20px;
            }

            /* Banner responsive */
            .banner-section {
                width: calc(100% - 40px); /* Reduced side margins for mobile */
                height: 37.5vh; /* Reduced from 50vh (25% reduction) */
                min-height: 225px; /* Reduced from 300px (25% reduction) */
                margin: 80px 20px 60px 20px; /* Restored normal bottom margin */
            }

            .banner-background {
                border-radius: 15px;
            }

            .banner-title {
                font-size: 36px;
            }

            .banner-subtitle {
                font-size: 20px;
            }

            .banner-tagline {
                font-size: 16px;
            }

            .banner-profile {
                width: 150px; /* Increased from 120px */
                height: 150px; /* Increased from 120px */
                bottom: -75px; /* Adjusted for larger image */
                border: 9px solid #0a0a0a; /* Increased from 6px to 9px */
            }

            .hero-section {
                margin-top: 40px; /* Adjusted for larger profile picture on tablet */
            }

            .hero-title {
                font-size: 36px;
            }

            .hero-subtitle {
                font-size: 20px;
            }

            .hero-tagline {
                font-size: 16px;
            }

            .section-title {
                font-size: 28px;
            }

            .education-grid,
            .services-grid,
            .projects-grid {
                grid-template-columns: 1fr;
            }

            .contact-container {
                padding: 30px 24px;
                margin: 0 10px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .form-title {
                font-size: 24px;
            }

            .experience-timeline {
                padding: 20px 0;
            }

            .experience-timeline::before {
                left: 30px;
                transform: none;
            }

            .experience-item {
                width: calc(100% - 60px);
                left: 60px !important;
                text-align: left !important;
                margin-bottom: 40px;
            }

            .experience-item::before {
                left: -38px !important;
                right: auto !important;
            }

            .experience-item::after {
                left: -30px !important;
                right: auto !important;
                width: 30px;
            }

            .card {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 80px 15px 15px;
            }

            /* Banner mobile */
            .banner-section {
                width: calc(100% - 30px); /* Minimal side margins for small mobile */
                height: 30vh; /* Reduced from 40vh (25% reduction) */
                min-height: 187px; /* Reduced from 250px (25% reduction) */
                margin: 70px 15px 50px 15px; /* Restored normal bottom margin */
            }

            .banner-background {
                border-radius: 10px;
            }

            .banner-title {
                font-size: 28px;
            }

            .banner-subtitle {
                font-size: 18px;
            }

            .banner-tagline {
                font-size: 14px;
            }

            .banner-cta {
                padding: 12px 24px;
                font-size: 14px;
            }

            .banner-profile {
                width: 120px; /* Increased from 100px */
                height: 120px; /* Increased from 100px */
                bottom: -60px; /* Adjusted for larger image */
                border: 7px solid #0a0a0a; /* Increased from 5px to 7px */
            }

            /* Education logos responsive */
            .education-card { padding-right: 120px; }
            .education-logo { width: 100px; height: 100px; right: 16px; border: none; background: transparent; }
            .education-card.gold-medal::before { right: 120px; }

            /* Education logos small mobile */
            .education-card { padding-right: 110px; }
            .education-logo { width: 90px; height: 90px; right: 12px; border: none; background: transparent; }
            .education-card.gold-medal::before { right: 110px; }

            .experience-timeline {
                padding: 15px 0;
            }

            .experience-timeline::before {
                left: 20px;
                transform: none;
            }

            .experience-item {
                width: calc(100% - 50px);
                left: 50px !important;
                text-align: left !important;
                margin-bottom: 35px;
                padding: 20px;
            }

            .experience-item::before {
                left: -28px !important;
                right: auto !important;
                width: 14px;
                height: 14px;
            }

            .experience-item::after {
                left: -25px !important;
                right: auto !important;
                width: 25px;
            }

            .hero-section {
                margin-top: 35px; /* Adjusted for larger profile picture on mobile */
            }

            .hero-title {
                font-size: 28px;
            }

            .hero-subtitle {
                font-size: 18px;
            }

            .section {
                margin-bottom: 60px;
            }

            .section-title {
                font-size: 24px;
                margin-bottom: 30px;
            }
        }

        /* Scroll animations */
        .section {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .section.visible {
            opacity: 1;
            transform: translateY(0);
        }

    </style>
</head>
<body>
    {{-- Breadcrumb Navigation --}}
    @include('components.breadcrumb', [
        'breadcrumbs' => [
            [
                'title' => 'Home',
                'url' => '/',
                'icon' => '<svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>'
            ],
            [
                'title' => 'Portfolio',
                'icon' => '<svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-2 .89-2 2v11c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm6 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1z"/></svg>'
            ]
        ]
    ])

    {{-- Cursor Animation Component --}}
    @include('components.cursor-animation')

    <!-- Banner Section -->
    <section class="banner-section">
        <div class="banner-background"></div>
        
        <!-- Profile Picture at Bottom Center -->
        <div class="banner-profile">
            <img src="{{ asset('assets/profile/profile.png') }}" alt="Umair Tufail">
        </div>
    </section>

    <div class="container">
        <!-- Hero Section -->
        <section class="hero-section" itemscope itemtype="https://schema.org/Person">
            <h1 class="hero-title" itemprop="name">Umair Tufail</h1>
            <h2 class="hero-subtitle" itemprop="jobTitle">Senior Backend / Full-Stack Engineer</h2>
            <p class="hero-tagline" itemprop="description">
                Senior Backend / Full-Stack Engineer with 4+ years of experience building high-scale SaaS products, 
                multi-tenant systems, and real-time platforms used in production. Specialized in Laravel (TALL stack), 
                RESTful APIs, cloud-native architecture on AWS, and performance-critical backend engineering.
            </p>
            <meta itemprop="email" content="mumairtufail786@gmail.com">
            <meta itemprop="telephone" content="+923354455494">
            <meta itemprop="addressLocality" content="Lahore">
            <meta itemprop="addressCountry" content="Pakistan">
        </section>

        <!-- Services Section -->
        <section class="section">
            <h2 class="section-title">Services</h2>
            <div class="services-grid">
                <div class="card service-card">
                    <h3 class="service-title">RESTful API Development & Integration</h3>
                    <p class="service-description">Design and develop robust APIs with comprehensive documentation, authentication, and rate limiting for seamless third-party integrations.</p>
                </div>
                <div class="card service-card">
                    <h3 class="service-title">Laravel/PHP Backend Development</h3>
                    <p class="service-description">Build scalable backend systems using Laravel framework with clean architecture, optimized performance, and maintainable code.</p>
                </div>
                <div class="card service-card">
                    <h3 class="service-title">Database Design & Optimization</h3>
                    <p class="service-description">Create efficient database schemas, optimize queries, and implement caching strategies for improved application performance.</p>
                </div>
                <div class="card service-card">
                    <h3 class="service-title">AWS Cloud Infrastructure & Deployment</h3>
                    <p class="service-description">Deploy and manage applications on AWS cloud with auto-scaling, load balancing, and cost-effective infrastructure solutions.</p>
                </div>
                <div class="card service-card">
                    <h3 class="service-title">DevOps & CI/CD Pipeline Implementation</h3>
                    <p class="service-description">Automate deployment processes with GitHub Actions, implement continuous integration, and streamline development workflows.</p>
                </div>
                <div class="card service-card">
                    <h3 class="service-title">Scalable Web Application Architecture</h3>
                    <p class="service-description">Design microservices architecture, implement design patterns, and create systems that scale with business growth.</p>
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section class="section">
            <h2 class="section-title">Technical Skills</h2>
            <div class="skills-grid">
                <div class="skill-category">
                    <h3 class="skill-category-title">Backend & Stack</h3>
                    <div class="skill-tags">
                        <span class="skill-tag">PHP</span>
                        <span class="skill-tag">Laravel (TALL Stack)</span>
                        <span class="skill-tag">Blade</span>
                        <span class="skill-tag">Livewire</span>
                        <span class="skill-tag">Python</span>
                        <span class="skill-tag">Node.js</span>
                    </div>
                </div>
                <div class="skill-category">
                    <h3 class="skill-category-title">Cloud & DevOps</h3>
                    <div class="skill-tags">
                        <span class="skill-tag">AWS EC2</span>
                        <span class="skill-tag">S3</span>
                        <span class="skill-tag">CloudFront</span>
                        <span class="skill-tag">Lightsail</span>
                        <span class="skill-tag">Amplify</span>
                        <span class="skill-tag">Route 53</span>
                        <span class="skill-tag">CI/CD Pipelines</span>
                        <span class="skill-tag">Server Management</span>
                    </div>
                </div>
                <div class="skill-category">
                    <h3 class="skill-category-title">Database & Architecture</h3>
                    <div class="skill-tags">
                        <span class="skill-tag">MySQL</span>
                        <span class="skill-tag">Database Design</span>
                        <span class="skill-tag">Multi-Tenant Systems</span>
                        <span class="skill-tag">SaaS Architecture</span>
                        <span class="skill-tag">Query Optimization</span>
                        <span class="skill-tag">MVC</span>
                        <span class="skill-tag">Microservices</span>
                    </div>
                </div>
                <div class="skill-category">
                    <h3 class="skill-category-title">Frontend & Tools</h3>
                    <div class="skill-tags">
                        <span class="skill-tag">HTML/CSS</span>
                        <span class="skill-tag">Tailwind CSS</span>
                        <span class="skill-tag">JavaScript</span>
                        <span class="skill-tag">Git</span>
                        <span class="skill-tag">Swagger/OpenAPI</span>
                        <span class="skill-tag">Agile/Scrum</span>
                        <span class="skill-tag">Power BI</span>
                    </div>
                </div>
                <div class="skill-category">
                    <h3 class="skill-category-title">AI & Advanced</h3>
                    <div class="skill-tags">
                        <span class="skill-tag">AI-powered SaaS</span>
                        <span class="skill-tag">Chatbots</span>
                        <span class="skill-tag">AI-assisted Dev</span>
                        <span class="skill-tag">RBAC</span>
                        <span class="skill-tag">Real-time Systems</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Education Section -->
        <section class="section">
            <h2 class="section-title">Education</h2>
            <div class="education-grid">
                <div class="card education-card gold-medal">
                    <h3 class="education-degree">ADP Computer Science</h3>
                    <p class="education-institution">Superior University Lahore, Pakistan</p>
                    <p class="education-date">Relevant Courses: Programming Fundamentals, OOP, DSA, Web Development, Mobile App Development, Database, Software Engineering</p>
                    <span class="status-badge completed">Completed</span>
                    <div class="education-logo" aria-label="Superior University Lahore logo">
                        <img src="{{ asset('assets/superior_university.png') }}" alt="Superior University Lahore Logo">
                    </div>
                </div>
            </div>
        </section>

        <!-- Experience Section -->
        <section class="section">
            <h2 class="section-title">Professional Experience</h2>
            <div class="experience-timeline">
                <div class="experience-item">
                    <h3 class="experience-company">Navicosoft</h3>
                    <h4 class="experience-position">Senior Backend Developer (PHP Laravel)</h4>
                    <p class="experience-duration">March 2025 - Present (On-site)</p>
                    <ul class="experience-highlights">
                        <li>Architected a scalable multi-tenant backend for domain registration, hosting, SSL, and reseller management</li>
                        <li>Integrated Plesk, cPanel, WHMCS modules, and domain registrar services for full automation</li>
                        <li>Implemented tenant-based SSO using a master IdP across reseller portals</li>
                        <li>Built secure REST APIs with role-based access and real-time transaction tracking</li>
                    </ul>
                </div>
                <div class="experience-item">
                    <h3 class="experience-company">Tecjaunt</h3>
                    <h4 class="experience-position">Senior Backend Developer</h4>
                    <p class="experience-duration">Sep 2023 - Feb 2025 (Hybrid)</p>
                    <ul class="experience-highlights">
                        <li>Designed and delivered 1,500+ production-grade REST APIs for ride-sharing and SaaS platforms</li>
                        <li>Owned backend deployments and cloud architecture on AWS with CI/CD pipelines</li>
                        <li>Led backend optimization and scalability for high-concurrency workloads</li>
                        <li>Introduced automation and AI-assisted workflows to accelerate team delivery</li>
                    </ul>
                </div>
                <div class="experience-item">
                    <h3 class="experience-company">Vebtual Limited</h3>
                    <h4 class="experience-position">Junior Backend Developer</h4>
                    <p class="experience-duration">May 2023 - Sep 2023 (Hybrid)</p>
                    <ul class="experience-highlights">
                        <li>Developed backend services for a construction-site CRM system</li>
                        <li>Implemented virtual control modules for process automation</li>
                        <li>Built dashboards with Blade, HTML, CSS, and JavaScript for internal users</li>
                        <li>Optimized backend logic and queries to improve reliability and performance</li>
                    </ul>
                </div>
                <div class="experience-item">
                    <h3 class="experience-company">Freelance</h3>
                    <h4 class="experience-position">Backend / Full-Stack Engineer</h4>
                    <p class="experience-duration">Remote</p>
                    <ul class="experience-highlights">
                        <li>Delivered SaaS and web platforms for clients across Canada, UAE, Qatar, and the US</li>
                        <li>Built TMS, ERP, inventory, and booking platforms with secure payment flows and admin dashboards</li>
                        <li>Owned end-to-end client communication, requirement gathering, and delivery</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section class="section">
            <h2 class="section-title">Featured Projects</h2>
            @php
                $projectImageMap = [
                    'AirIdeal' => [
                        'assets/portfolio/airideal/employee.png',
                        'assets/portfolio/airideal/project.png',
                    ],
                    'Bali Jewels' => [
                        'assets/portfolio/balijewels/balijewles_home.png',
                        'assets/portfolio/balijewels/bali_product_home.png',
                        'assets/portfolio/balijewels/jewel_dashboard.png',
                    ],
                    'Tourism Booking Platform' => [
                        'assets/portfolio/balloon/home.png',
                        'assets/portfolio/balloon/services.png',
                        'assets/portfolio/balloon/about.png',
                        'assets/portfolio/balloon/balloon_login.png',
                    ],
                    '911 Limo App' => [
                        'assets/portfolio/mockups/911limo/Mockups Desktop (1).png',
                        'assets/portfolio/mockups/911limo/Mockups Mobile.png',
                        'assets/portfolio/mockups/911limo/Mockups sizes Mobile.png',
                        'assets/portfolio/mockups/Mockups Desktop.png',
                        'assets/portfolio/mockups/Mockups Desktop-1.png',
                        'assets/portfolio/mockups/Mockups 2Desktop.png',
                    ],
                    'Ezanias TMS' => [
                        'assets/portfolio/tms/tms_dashboard_dark.png',
                        'assets/portfolio/tms/tms_light.png',
                        'assets/portfolio/tms/tms_login.png',
                    ],
                    'Careeros' => [
                        'assets/portfolio/careeros/careeros_dashboard.png',
                        'assets/portfolio/careeros/careeros_resumeanalysis.png',
                    ],
                    'ANR Inventory System' => [
                        'assets/portfolio/inventory/air_inventory_home.png',
                        'assets/portfolio/inventory/air_inventory_product.png',
                    ],
                    'Lumenialab' => [
                        'assets/portfolio/lumenialab/home.png',
                        'assets/portfolio/lumenialab/services.png',
                    ],
                    'Master Identity Provider (IdP)' => [
                        'assets/portfolio/master idp/master idp_dashboard.png',
                        'assets/portfolio/master idp/master_idp_tenant.png',
                        'assets/portfolio/master idp/plans.png',
                    ],
                    'Meedan' => [
                        'assets/portfolio/medaan/home.png',
                    ],
                    'Navicosoft Reseller Portal' => [
                        'assets/portfolio/reselerfrontend/resellerfrontend.png',
                        'assets/portfolio/reselerfrontend/customer.png',
                        'assets/portfolio/reselerfrontend/domindetail.png',
                        'assets/portfolio/reselerfrontend/domain_ai_search.png',
                    ],
                    'Satradelink' => [
                        'assets/portfolio/satradelink/home.png',
                        'assets/portfolio/satradelink/about.png',
                        'assets/portfolio/satradelink/about_last.png',
                    ],
                    'Vendor Shendor' => [
                        'assets/portfolio/vendorshendor/landingpage.png',
                        'assets/portfolio/vendorshendor/feature.png',
                        'assets/portfolio/vendorshendor/productslist.png',
                        'assets/portfolio/vendorshendor/productdetail.png',
                        'assets/portfolio/vendorshendor/store_editor.png',
                        'assets/portfolio/vendorshendor/createproducts.png',
                        'assets/portfolio/vendorshendor/samplestore.png',
                        'assets/portfolio/vendorshendor/superadmin.png',
                    ],
                ];
            @endphp
            <div class="projects-grid">
                @foreach($projects as $project)
                @php
                    $gallery = $projectImageMap[$project->title] ?? [];
                    $galleryEncoded = array_map(fn ($path) => str_replace(' ', '%20', $path), $gallery);
                    $primaryImage = $galleryEncoded[0] ?? null;
                @endphp
                <div class="project-card {{ count($gallery) > 0 ? 'is-clickable' : '' }}"
                     data-project-id="{{ $project->id }}"
                     data-project-title="{{ $project->title }}"
                     data-project-description="{{ e($project->description) }}"
                     data-project-type="{{ $project->type }}"
                     data-project-technologies='@json($project->technologies)'
                     data-project-gallery='@json($galleryEncoded)'>
                    <div class="project-image">
                        @if($primaryImage)
                            <img src="{{ asset($primaryImage) }}" alt="{{ $project->title }} screenshot">
                            @if(count($galleryEncoded) > 1)
                                <span class="project-shot-count">{{ count($galleryEncoded) }} screenshots</span>
                            @endif
                        @else
                            <div class="project-image-empty">Screenshots will be added soon</div>
                        @endif
                    </div>
                    <div class="project-content">
                        <h3 class="project-title">{{ $project->title }}</h3>
                        <p class="project-description">{{ $project->description }}</p>
                        <div class="project-tech">
                            @foreach($project->technologies as $tech)
                            <span class="tech-tag">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <div class="project-metrics">
                            <div class="project-likes {{ $project->hasLiked ? 'liked' : '' }}" onclick="toggleLike({{ $project->id }}, event)">
                                <span class="like-icon {{ $project->hasLiked ? 'liked' : '' }}">❤️</span>
                                <span class="like-count">{{ $project->likes }}</span>
                                <span class="like-text">likes</span>
                            </div>
                            <span class="project-type">{{ $project->type }}</span>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- View All Projects Card -->
                <div class="project-card view-all-card">
                    <div class="view-all-content">
                        <a href="{{ route('github') }}" class="view-all-button">
                            View All Projects
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="m9 18 6-6-6-6"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="project-modal" id="projectModal" aria-hidden="true">
            <div class="project-modal-content">
                <button class="project-modal-close" id="projectModalClose" aria-label="Close project preview">&times;</button>
                <div class="project-modal-gallery">
                    <button class="project-modal-nav prev" id="projectModalPrev" aria-label="Previous screenshot">&#8249;</button>
                    <img id="projectModalImage" class="project-modal-image" alt="Project screenshot">
                    <button class="project-modal-nav next" id="projectModalNext" aria-label="Next screenshot">&#8250;</button>
                </div>
                <div class="project-modal-thumbs" id="projectModalThumbs"></div>
                <div class="project-modal-body">
                    <h3 class="project-modal-title" id="projectModalTitle"></h3>
                    <p class="project-modal-description" id="projectModalDescription"></p>
                    <div class="project-modal-meta">
                        <span class="project-modal-type" id="projectModalType"></span>
                    </div>
                    <div class="project-tech" id="projectModalTech"></div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <section class="section" id="contact">
            <h2 class="section-title">Get In Touch</h2>
            <div class="contact-container">
                <div class="form-header">
                    <h2 class="form-title">Contact Me</h2>
                    <p class="form-subtitle">Ready to bring your project to life? Let's discuss how I can help you build something amazing.</p>
                </div>

                <form class="contact-form" id="contactForm" action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <div class="floating-input">
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    class="form-input @error('name') invalid @enderror" 
                                    placeholder=" "
                                    value="{{ old('name') }}"
                                    required
                                >
                                <label for="name" class="floating-label">Your Name</label>
                            </div>
                            <div class="validation-message error" id="nameError">
                                @error('name'){{ $message }}@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="floating-input">
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="form-input @error('email') invalid @enderror" 
                                    placeholder=" "
                                    value="{{ old('email') }}"
                                    required
                                >
                                <label for="email" class="floating-label">Email Address</label>
                            </div>
                            <div class="validation-message error" id="emailError">
                                @error('email'){{ $message }}@enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="floating-input">
                            <textarea 
                                id="message" 
                                name="message" 
                                class="form-textarea @error('message') invalid @enderror" 
                                placeholder=" "
                                maxlength="1000"
                                required
                            >{{ old('message') }}</textarea>
                            <label for="message" class="floating-label">Your Message</label>
                        </div>
                        <div class="character-count" id="charCount">{{ strlen(old('message', '')) }}/1000 characters</div>
                        <div class="validation-message error" id="messageError">
                            @error('message'){{ $message }}@enderror
                        </div>
                    </div>

                    <button type="submit" class="submit-btn" id="submitBtn">
                        <span class="btn-text">Send Message</span>
                        <svg class="btn-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22,2 15,22 11,13 2,9"></polygon>
                        </svg>
                        <div class="loading-spinner"></div>
                    </button>
                </form>

                @if(session('success'))
                <div class="success-message show" id="successMessage">
                    🎉 {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="error-message show" id="errorMessage">
                    ❌ {{ session('error') }}
                </div>
                @endif

                <div class="success-message" id="ajaxSuccessMessage">
                    🎉 Thank you! Your message has been sent successfully. I'll get back to you within 24 hours.
                </div>

                <div class="error-message" id="ajaxErrorMessage">
                    ❌ Oops! There was an error sending your me ssage. Please try again or contact me directly.
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p class="footer-tagline">"Building the backend that powers tomorrow's digital experiences"</p>
        <p class="footer-text">© 2026 Umair Tufail. Crafted with passion for backend excellence.</p>
    </footer>

    <script>
        // Gold Medal Celebration Effect
        function createCelebrationParticles(element) {
            const particles = ['⭐', '⭐', '⭐', '⭐', '⭐', '⭐', '⭐'];
            const colors = ['#FFD700', '#FFA500', '#FFFF00', '#FF8C00'];
            
            for (let i = 0; i < 15; i++) {
                const particle = document.createElement('div');
                particle.style.cssText = `
                    position: absolute;
                    font-size: ${Math.random() * 10 + 12}px;
                    color: ${colors[Math.floor(Math.random() * colors.length)]};
                    left: ${Math.random() * 100}%;
                    top: ${Math.random() * 100}%;
                    pointer-events: none;
                    z-index: 1000;
                    animation: celebrationParticle ${Math.random() * 2 + 1}s ease-out forwards;
                    user-select: none;
                `;
                particle.textContent = particles[Math.floor(Math.random() * particles.length)];
                element.appendChild(particle);
                
                setTimeout(() => {
                    if (particle.parentNode) {
                        particle.parentNode.removeChild(particle);
                    }
                }, 3000);
            }
        }

        // Add celebration styles
        const celebrationStyle = document.createElement('style');
        celebrationStyle.textContent = `
            @keyframes celebrationParticle {
                0% {
                    transform: scale(0) rotate(0deg) translateY(0);
                    opacity: 1;
                }
                50% {
                    transform: scale(1.2) rotate(180deg) translateY(-20px);
                    opacity: 1;
                }
                100% {
                    transform: scale(0.8) rotate(360deg) translateY(-50px);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(celebrationStyle);

        // Add event listeners for gold medal card
        document.addEventListener('DOMContentLoaded', () => {
            const goldMedalCard = document.querySelector('.education-card.gold-medal');
            if (goldMedalCard) {
                goldMedalCard.addEventListener('mouseenter', () => {
                    createCelebrationParticles(goldMedalCard);
                    
                    // Play celebration sound (optional)
                    // You can add this if you want sound effects
                    // const audio = new Audio('path/to/celebration-sound.mp3');
                    // audio.volume = 0.3;
                    // audio.play().catch(() => {}); // Ignore errors if user hasn't interacted yet
                });
            }
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.addEventListener('DOMContentLoaded', () => {
            // Observe all sections for scroll animations
            document.querySelectorAll('.section').forEach(section => {
                observer.observe(section);
            });

            // Initialize contact form
            new ContactForm();
        });

        // Smooth scrolling for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Enhanced card hover effects
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-5px) scale(1)';
            });
        });

        const projectModal = document.getElementById('projectModal');
        const projectModalImage = document.getElementById('projectModalImage');
        const projectModalTitle = document.getElementById('projectModalTitle');
        const projectModalDescription = document.getElementById('projectModalDescription');
        const projectModalType = document.getElementById('projectModalType');
        const projectModalTech = document.getElementById('projectModalTech');
        const projectModalThumbs = document.getElementById('projectModalThumbs');
        const projectModalPrev = document.getElementById('projectModalPrev');
        const projectModalNext = document.getElementById('projectModalNext');
        const projectModalClose = document.getElementById('projectModalClose');

        const projectModalState = {
            images: [],
            currentIndex: 0
        };

        function renderProjectModalImage() {
            if (!projectModalState.images.length) {
                projectModalImage.removeAttribute('src');
                return;
            }

            projectModalImage.src = projectModalState.images[projectModalState.currentIndex];
            Array.from(projectModalThumbs.children).forEach((thumb, idx) => {
                thumb.classList.toggle('active', idx === projectModalState.currentIndex);
            });
        }

        function openProjectModal(card) {
            const gallery = JSON.parse(card.dataset.projectGallery || '[]');
            if (!gallery.length) {
                return;
            }

            projectModalState.images = gallery.map((item) => `/` + item.replace(/^\/+/, ''));
            projectModalState.currentIndex = 0;

            projectModalTitle.textContent = card.dataset.projectTitle || 'Project';
            projectModalDescription.textContent = card.dataset.projectDescription || '';
            projectModalType.textContent = card.dataset.projectType || '';

            const techList = JSON.parse(card.dataset.projectTechnologies || '[]');
            projectModalTech.innerHTML = '';
            techList.forEach((tech) => {
                const tag = document.createElement('span');
                tag.className = 'tech-tag';
                tag.textContent = tech;
                projectModalTech.appendChild(tag);
            });

            projectModalThumbs.innerHTML = '';
            projectModalState.images.forEach((src, idx) => {
                const thumb = document.createElement('button');
                thumb.type = 'button';
                thumb.className = 'project-thumb';
                thumb.innerHTML = `<img src="${src}" alt="Screenshot ${idx + 1}">`;
                thumb.addEventListener('click', () => {
                    projectModalState.currentIndex = idx;
                    renderProjectModalImage();
                });
                projectModalThumbs.appendChild(thumb);
            });

            renderProjectModalImage();
            projectModal.classList.add('open');
            projectModal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeProjectModal() {
            projectModal.classList.remove('open');
            projectModal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        function moveProjectModal(step) {
            if (!projectModalState.images.length) return;
            projectModalState.currentIndex = (projectModalState.currentIndex + step + projectModalState.images.length) % projectModalState.images.length;
            renderProjectModalImage();
        }

        document.querySelectorAll('.project-card.is-clickable').forEach(card => {
            card.addEventListener('click', function(event) {
                if (event.target.closest('.project-likes') || event.target.closest('.view-all-button')) {
                    return;
                }
                openProjectModal(this);
            });
        });

        if (projectModalClose) {
            projectModalClose.addEventListener('click', closeProjectModal);
            projectModalPrev.addEventListener('click', () => moveProjectModal(-1));
            projectModalNext.addEventListener('click', () => moveProjectModal(1));
            projectModal.addEventListener('click', (event) => {
                if (event.target === projectModal) {
                    closeProjectModal();
                }
            });

            document.addEventListener('keydown', (event) => {
                if (!projectModal.classList.contains('open')) return;
                if (event.key === 'Escape') closeProjectModal();
                if (event.key === 'ArrowLeft') moveProjectModal(-1);
                if (event.key === 'ArrowRight') moveProjectModal(1);
            });
        }

        // Like functionality
        async function toggleLike(projectId, event) {
            if (event) {
                event.stopPropagation();
            }
            const projectCard = document.querySelector(`[data-project-id="${projectId}"]`);
            const likesContainer = projectCard.querySelector('.project-likes');
            const likeIcon = projectCard.querySelector('.like-icon');
            const likeCount = projectCard.querySelector('.like-count');
            const isLiked = likeIcon.classList.contains('liked');
            
            // Prevent multiple clicks during animation
            if (likesContainer.classList.contains('animating')) return;
            likesContainer.classList.add('animating');
            
            try {
                const url = isLiked ? `/projects/${projectId}/unlike` : `/projects/${projectId}/like`;
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // Update count with animation
                    likeCount.style.transform = 'scale(0)';
                    
                    setTimeout(() => {
                        likeCount.textContent = data.likes;
                        likeCount.style.transform = 'scale(1)';
                        
                        if (data.liked) {
                            likeIcon.classList.add('liked');
                            likesContainer.classList.add('liked');
                            createFloatingHearts(likesContainer);
                        } else {
                            likeIcon.classList.remove('liked');
                            likesContainer.classList.remove('liked');
                        }
                    }, 150);
                }
            } catch (error) {
                console.error('Error toggling like:', error);
            } finally {
                setTimeout(() => {
                    likesContainer.classList.remove('animating');
                }, 800);
            }
        }

        // Create floating hearts animation
        function createFloatingHearts(container) {
            const hearts = ['❤️', '💖', '💕', '💗'];
            const rect = container.getBoundingClientRect();
            
            for (let i = 0; i < 3; i++) {
                const heart = document.createElement('div');
                heart.className = 'floating-heart';
                heart.textContent = hearts[Math.floor(Math.random() * hearts.length)];
                heart.style.left = (rect.left + Math.random() * rect.width) + 'px';
                heart.style.top = rect.top + 'px';
                heart.style.animationDelay = (i * 0.2) + 's';
                
                document.body.appendChild(heart);
                
                setTimeout(() => {
                    heart.remove();
                }, 1500);
            }
        }

        // Contact Form Class
        class ContactForm {
            constructor() {
                this.form = document.getElementById('contactForm');
                this.nameInput = document.getElementById('name');
                this.emailInput = document.getElementById('email');
                this.messageInput = document.getElementById('message');
                this.submitBtn = document.getElementById('submitBtn');
                this.charCount = document.getElementById('charCount');
                this.ajaxSuccessMessage = document.getElementById('ajaxSuccessMessage');
                this.ajaxErrorMessage = document.getElementById('ajaxErrorMessage');

                if (this.form) {
                    this.initializeEventListeners();
                    this.updateCharCount();
                }
            }

            initializeEventListeners() {
                // Form submission
                this.form.addEventListener('submit', (e) => this.handleSubmit(e));

                // Real-time validation
                this.nameInput.addEventListener('blur', () => this.validateName());
                this.emailInput.addEventListener('blur', () => this.validateEmail());
                this.messageInput.addEventListener('input', () => this.updateCharCount());
                this.messageInput.addEventListener('blur', () => this.validateMessage());

                // Clear validation on focus
                [this.nameInput, this.emailInput, this.messageInput].forEach(input => {
                    input.addEventListener('focus', () => this.clearValidation(input));
                });

                // Hide session messages after delay
                setTimeout(() => {
                    document.querySelectorAll('.success-message.show, .error-message.show').forEach(msg => {
                        msg.classList.remove('show');
                    });
                }, 5000);
            }

            validateName() {
                const name = this.nameInput.value.trim();
                const errorElement = document.getElementById('nameError');

                if (name.length < 2) {
                    this.showValidationError(this.nameInput, errorElement, 'Name must be at least 2 characters long');
                    return false;
                }

                this.showValidationSuccess(this.nameInput, errorElement);
                return true;
            }

            validateEmail() {
                const email = this.emailInput.value.trim();
                const errorElement = document.getElementById('emailError');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!emailRegex.test(email)) {
                    this.showValidationError(this.emailInput, errorElement, 'Please enter a valid email address');
                    return false;
                }

                this.showValidationSuccess(this.emailInput, errorElement);
                return true;
            }

            validateMessage() {
                const message = this.messageInput.value.trim();
                const errorElement = document.getElementById('messageError');

                if (message.length < 10) {
                    this.showValidationError(this.messageInput, errorElement, 'Message must be at least 10 characters long');
                    return false;
                }

                if (message.length > 1000) {
                    this.showValidationError(this.messageInput, errorElement, 'Message must not exceed 1000 characters');
                    return false;
                }

                this.showValidationSuccess(this.messageInput, errorElement);
                return true;
            }

            showValidationError(input, errorElement, message) {
                input.classList.remove('valid');
                input.classList.add('invalid');
                errorElement.textContent = message;
                errorElement.classList.remove('success');
                errorElement.classList.add('error');
            }

            showValidationSuccess(input, errorElement) {
                input.classList.remove('invalid');
                input.classList.add('valid');
                errorElement.textContent = '';
                errorElement.classList.remove('error');
                errorElement.classList.add('success');
            }

            clearValidation(input) {
                input.classList.remove('invalid', 'valid');
                const errorElement = document.getElementById(input.id + 'Error');
                if (errorElement) {
                    errorElement.textContent = '';
                    errorElement.classList.remove('error', 'success');
                }
            }

            updateCharCount() {
                const length = this.messageInput.value.length;
                this.charCount.textContent = `${length}/1000 characters`;

                this.charCount.classList.remove('warning', 'error');
                if (length > 900) {
                    this.charCount.classList.add('error');
                } else if (length > 800) {
                    this.charCount.classList.add('warning');
                }
            }

            async handleSubmit(e) {
                e.preventDefault();

                // Validate all fields
                const isNameValid = this.validateName();
                const isEmailValid = this.validateEmail();
                const isMessageValid = this.validateMessage();

                if (!isNameValid || !isEmailValid || !isMessageValid) {
                    this.showError('Please correct the errors above before submitting.');
                    return;
                }

                // Show loading state
                this.setLoadingState(true);
                this.hideMessages();

                try {
                    const formData = new FormData(this.form);
                    
                    const response = await fetch(this.form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    });

                    const data = await response.json();
                    
                    if (data.success) {
                        this.showSuccess();
                        this.resetForm();
                    } else {
                        this.showError(data.message || 'Failed to send message. Please try again.');
                    }
                } catch (error) {
                    this.showError('Failed to send message. Please try again.');
                } finally {
                    this.setLoadingState(false);
                }
            }

            setLoadingState(isLoading) {
                this.submitBtn.classList.toggle('loading', isLoading);
                this.submitBtn.disabled = isLoading;
            }

            showSuccess() {
                this.ajaxSuccessMessage.classList.add('show');
                setTimeout(() => {
                    this.ajaxSuccessMessage.classList.remove('show');
                }, 5000);
            }

            showError(message) {
                this.ajaxErrorMessage.textContent = `❌ ${message}`;
                this.ajaxErrorMessage.classList.add('show');
                setTimeout(() => {
                    this.ajaxErrorMessage.classList.remove('show');
                }, 5000);
            }

            hideMessages() {
                this.ajaxSuccessMessage.classList.remove('show');
                this.ajaxErrorMessage.classList.remove('show');
            }

            resetForm() {
                this.form.reset();
                this.updateCharCount();
                [this.nameInput, this.emailInput, this.messageInput].forEach(input => {
                    this.clearValidation(input);
                });
            }
        }

        // Add interactive effects for form elements
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.form-input, .form-textarea').forEach(input => {
                input.addEventListener('focus', function() {
                    this.closest('.form-group').style.transform = 'translateY(-2px)';
                });

                input.addEventListener('blur', function() {
                    this.closest('.form-group').style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>