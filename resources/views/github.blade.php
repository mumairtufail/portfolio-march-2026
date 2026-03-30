<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Umair Tufail - GitHub Profile</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
            color: #ffffff;
            min-height: 100vh;
            position: relative;
        }

        .header {
            position: fixed;
            top: 0;
            right: 0;
            padding: 30px 40px;
            z-index: 100;
        }

        .back-btn {
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 10px 25px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 120px 40px 40px;
        }

        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60vh;
            flex-direction: column;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255, 255, 255, 0.1);
            border-top: 3px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        .name {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .username {
            font-size: 18px;
            color: #b0b0b0;
            margin-bottom: 15px;
        }

        .bio {
            font-size: 16px;
            color: #e0e0e0;
            line-height: 1.6;
            margin-bottom: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .stats {
            display: flex;
            gap: 25px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .stat {
            background: rgba(255, 255, 255, 0.05);
            padding: 15px 20px;
            border-radius: 12px;
            text-align: center;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: #667eea;
            display: block;
        }

        .stat-label {
            font-size: 14px;
            color: #b0b0b0;
            margin-top: 5px;
        }

        .stat a {
            display: block;
            width: 100%;
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 8px;
            padding: 5px;
        }

        .stat a:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: translateY(-2px);
        }

        .repos-section {
            margin-top: 40px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 25px;
            color: #ffffff;
        }

        .repos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .repo-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
        }

        .repo-card:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateY(-5px);
        }

        .repo-name {
            font-size: 18px;
            font-weight: 600;
            color: #667eea;
            margin-bottom: 10px;
        }

        .repo-desc {
            color: #b0b0b0;
            font-size: 14px;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .repo-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: #888888;
        }

        .language-tag {
            background: rgba(102, 126, 234, 0.2);
            color: #667eea;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 12px;
        }

        /* Blog Styles */
        .section-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #ffffff;
            text-align: center;
        }

        .blogs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .blog-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .blog-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.05), transparent);
            transition: left 0.5s ease;
        }

        .blog-card:hover::before {
            left: 100%;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .blog-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
            gap: 15px;
        }

        .blog-title {
            font-size: 18px;
            font-weight: 600;
            color: #ffffff;
            margin: 0;
            line-height: 1.3;
            flex: 1;
        }

        .blog-author {
            font-size: 13px;
            color: #4f46e5;
            font-style: italic;
            margin: 5px 0 10px 0;
            font-weight: 500;
        }

        .featured-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            flex-shrink: 0;
        }

        .blog-excerpt {
            color: #b0b0b0;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .blog-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .difficulty-badge {
            padding: 4px 10px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .difficulty-beginner {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
        }

        .difficulty-intermediate {
            background: rgba(251, 191, 36, 0.2);
            color: #fbbf24;
        }

        .difficulty-advanced {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
        }

        .read-time, .publish-date {
            font-size: 12px;
            color: #888888;
        }

        .blog-tags {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .tag {
            background: rgba(255, 255, 255, 0.1);
            color: #d0d0d0;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 500;
        }

        .blog-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .like-btn {
            background: none;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #b0b0b0;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .like-btn:hover {
            border-color: #ef4444;
            color: #ef4444;
            transform: scale(1.05);
        }

        .like-btn.liked {
            background: #ef4444;
            border-color: #ef4444;
            color: #ffffff;
        }

        .heart-icon {
            width: 16px;
            height: 16px;
            fill: currentColor;
            transition: transform 0.3s ease;
        }

        .like-btn:hover .heart-icon {
            transform: scale(1.2);
        }

        .read-more-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 8px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .read-more-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .floating-cert-btn {
            position: fixed;
            bottom: 210px;
            right: 30px;
            background: linear-gradient(135deg, #24292e 0%, #1a1d21 100%);
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #ffffff;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease;
            z-index: 1000;
            border: 2px solid rgba(255, 255, 255, 0.1);
            padding: 12px 16px;
            min-width: 80px;
        }

        .floating-cert-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);
            border-color: rgba(255, 255, 255, 0.3);
            background: linear-gradient(135deg, #2d3439 0%, #24292e 100%);
        }

        .floating-cert-btn:active {
            transform: translateY(-2px);
        }

        .floating-cert-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 15px;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .floating-cert-btn:hover::before {
            opacity: 1;
        }

        .cert-btn-text {
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
            color: #b0b0b0;
            transition: color 0.3s ease;
        }

        .floating-cert-btn:hover .cert-btn-text {
            color: #ffffff;
        }

        .cert-icon {
            width: 24px;
            height: 24px;
            fill: currentColor;
        }

        .floating-git-btn {
            position: fixed;
            bottom: 120px;
            right: 30px;
            background: linear-gradient(135deg, #24292e 0%, #1a1d21 100%);
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #ffffff;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease;
            z-index: 1000;
            border: 2px solid rgba(255, 255, 255, 0.1);
            padding: 12px 16px;
            min-width: 80px;
        }

        .floating-git-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);
            border-color: rgba(255, 255, 255, 0.3);
            background: linear-gradient(135deg, #2d3439 0%, #24292e 100%);
        }

        .floating-git-btn:active {
            transform: translateY(-2px);
        }

        .floating-git-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 15px;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .floating-git-btn:hover::before {
            opacity: 1;
        }

        .git-btn-text {
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
            color: #b0b0b0;
            transition: color 0.3s ease;
        }

        .floating-git-btn:hover .git-btn-text {
            color: #ffffff;
        }

        .git-icon {
            width: 24px;
            height: 24px;
            fill: currentColor;
        }

        .floating-github-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #24292e 0%, #1a1d21 100%);
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #ffffff;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease;
            z-index: 1000;
            border: 2px solid rgba(255, 255, 255, 0.1);
            padding: 12px 16px;
            min-width: 80px;
        }

        .floating-github-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);
            border-color: rgba(255, 255, 255, 0.3);
            background: linear-gradient(135deg, #2d3439 0%, #24292e 100%);
        }

        .floating-github-btn:active {
            transform: translateY(-2px);
        }

        .floating-github-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 15px;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .floating-github-btn:hover::before {
            opacity: 1;
        }

        .github-btn-text {
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
            color: #b0b0b0;
            transition: color 0.3s ease;
        }

        .floating-github-btn:hover .github-btn-text {
            color: #ffffff;
        }

        /* GitHub icon using CSS */
        .github-icon {
            width: 24px;
            height: 24px;
            fill: currentColor;
        }

        .error-message {
            text-align: center;
            color: #ff6b6b;
            background: rgba(255, 107, 107, 0.1);
            border: 1px solid rgba(255, 107, 107, 0.3);
            border-radius: 15px;
            padding: 30px;
            margin: 40px 0;
        }

        .search-box {
            position: fixed;
            top: 20px;
            right: 40px;
            z-index: 99;
        }

        .search-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 8px 16px;
            color: #ffffff;
            font-size: 12px;
            width: 300px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            line-height: 1;
            box-sizing: border-box;
        }

        .search-input:focus {
            outline: none;
            border-color: #667eea;
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        /* === PROFILE CARD STYLES === */
        .profile-card {
            position: relative; /* Essential for containing the pseudo-elements and badge */
            overflow: hidden; /* Clips the blurred edges of the orbs */
            background: #1a1d21; /* Base background color */
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            max-width: 1200px;
            margin: 0 auto 2rem;
            width: 100%;
        }

        /* Glowing Orb 1 */
        .profile-card::before {
            content: '';
            position: absolute;
            top: -150px;
            left: -150px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.4), transparent 60%);
            filter: blur(100px);
            animation: moveBlob1 20s infinite alternate ease-in-out;
            z-index: 1;
        }
        
        /* Glowing Orb 2 */
        .profile-card::after {
            content: '';
            position: absolute;
            bottom: -200px;
            right: -200px;
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(118, 75, 162, 0.4), transparent 60%);
            filter: blur(120px);
            animation: moveBlob2 25s infinite alternate ease-in-out;
            z-index: 1;
        }

        /* Keyframes for the orb animations */
        @keyframes moveBlob1 {
            0% { transform: translate(0, 0) rotate(0deg) scale(1); }
            100% { transform: translate(100px, 80px) rotate(180deg) scale(1.1); }
        }

        @keyframes moveBlob2 {
            0% { transform: translate(0, 0) rotate(0deg) scale(1); }
            100% { transform: translate(-120px, -50px) rotate(270deg) scale(1.2); }
        }
        
        /* === GITHUB CERTIFIED BADGE === */
        .github-certified-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: #ffffff;
            padding: 6px 12px;
            border-radius: 50px; /* pill shape */
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            z-index: 3;
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .github-certified-badge svg {
            width: 16px;
            height: 16px;
            fill: currentColor;
        }

        /* Ensure profile content is on top of the animation */
        .profile-content {
            position: relative;
            z-index: 2; /* Sits on top of the pseudo-elements */
            display: flex;
            gap: 3rem;
            align-items: flex-start;
        }

        .profile-left {
            flex-shrink: 0;
        }

        .profile-right {
            flex: 1;
            min-width: 0;
        }
        
        /* === MODIFIED AVATAR STYLES === */
        .avatar-large {
            width: 250px;
            height: 250px;
            border-radius: 20px;
            border: 4px solid #4f46e5;
            box-shadow: 0 8px 24px rgba(79, 70, 229, 0.3);
            transition: transform 0.3s ease;
            object-fit: cover;
            background-color: #000; /* Added this line */
        }

        .avatar-large:hover {
            transform: scale(1.05);
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            border: 4px solid #4f46e5;
            box-shadow: 0 8px 24px rgba(79, 70, 229, 0.3);
            transition: transform 0.3s ease;
            background-color: #000; /* Added this line */
        }
        /* === END OF MODIFIED STYLES === */

        .avatar:hover {
            transform: scale(1.05);
        }

        .profile-card .name {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0 0 0.5rem;
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .profile-card .username {
            font-size: 1.2rem;
            color: #ffffff;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .profile-card .bio {
            font-size: 1.1rem;
            color: #e5e7eb;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .profile-card .stats {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .profile-card .stat {
            text-align: center;
            min-width: 60px;
            background: rgba(0,0,0,0.2); /* Slightly darker stats for contrast */
        }

        .profile-card .stat-number {
            display: block;
            font-size: 1.4rem;
            font-weight: 700;
            color: #4f46e5;
            margin-bottom: 0.3rem;
        }

        .profile-card .stat-label {
            font-size: 0.75rem;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            font-weight: 500;
        }

        /* Loading Animation */
        #loading {
            text-align: center;
            padding: 3rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .container { padding: 100px 25px 25px; }
            .stats { gap: 15px; }
            .repos-grid { grid-template-columns: 1fr; }
            
            .search-box {
                top: 15px;
                right: 25px;
            }
            
            .search-input {
                width: 250px;
                padding: 6px 12px;
                font-size: 11px;
            }
            
            .floating-cert-btn {
                bottom: 190px;
                right: 20px;
                padding: 10px 12px;
                min-width: 70px;
            }
            
            .cert-btn-text {
                font-size: 8px;
                margin-bottom: 5px;
            }
            
            .cert-icon {
                width: 20px;
                height: 20px;
            }
            
            .floating-git-btn {
                bottom: 110px;
                right: 20px;
                padding: 10px 12px;
                min-width: 70px;
            }
            
            .git-btn-text {
                font-size: 9px;
                margin-bottom: 5px;
            }
            
            .git-icon {
                width: 20px;
                height: 20px;
            }
            
            .floating-github-btn {
                bottom: 20px;
                right: 20px;
                padding: 10px 12px;
                min-width: 70px;
            }
            
            .github-btn-text {
                font-size: 9px;
                margin-bottom: 5px;
            }
            
            .github-icon {
                width: 20px;
                height: 20px;
            }

            /* Profile responsive styles */
            .profile-card {
                padding: 1.5rem;
                margin: 0 1rem;
            }
            
            .github-certified-badge {
                top: 15px;
                right: 15px;
                font-size: 10px;
                padding: 4px 8px;
                gap: 4px;
            }
            
            .github-certified-badge svg {
                width: 12px;
                height: 12px;
            }

            .profile-content {
                flex-direction: column;
                gap: 2rem;
                text-align: center;
            }

            .avatar-large {
                width: 180px;
                height: 180px;
                margin: 0 auto;
            }

            .profile-card .name {
                font-size: 2rem;
            }

            .profile-card .stats {
                justify-content: center;
                gap: 1rem;
            }

            .stat-number {
                font-size: 1.2rem;
            }

            .stat-label {
                font-size: 0.7rem;
            }
        }

        @media (max-width: 480px) {
            .search-input {
                width: 200px;
            }
            
            .floating-cert-btn {
                bottom: 175px;
                right: 15px;
                padding: 8px 10px;
                min-width: 60px;
            }
            
            .cert-btn-text {
                font-size: 7px;
                margin-bottom: 4px;
            }
            
            .cert-icon {
                width: 18px;
                height: 18px;
            }
            
            .floating-git-btn {
                bottom: 95px;
                right: 15px;
                padding: 8px 10px;
                min-width: 60px;
            }
            
            .git-btn-text {
                font-size: 8px;
                margin-bottom: 4px;
            }
            
            .git-icon {
                width: 18px;
                height: 18px;
            }
            
            .floating-github-btn {
                bottom: 15px;
                right: 15px;
                padding: 8px 10px;
                min-width: 60px;
            }
            
            .github-btn-text {
                font-size: 8px;
                margin-bottom: 4px;
            }
            
            .github-icon {
                width: 18px;
                height: 18px;
            }
        }
    </style>
</head>
<body>
    {{-- Breadcrumb Navigation --}}
    @include('components.breadcrumb', [
        'breadcrumbs' => [
            [
                'title' => 'Home',
                'url' => url('/'),
                'icon' => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>'
            ],
            [
                'title' => 'GitHub Profile',
                'icon' => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>'
            ]
        ]
    ])

    {{-- Cursor Animation Component --}}
    @include('components.cursor-animation')

    {{-- Search Bar --}}
    <div class="search-box">
        <input type="text" class="search-input" placeholder="Search blogs, topics..." id="searchInput">
    </div>

    <div class="container">
        <div id="loading" class="loading">
            <div class="spinner"></div>
            <p>Loading GitHub profile...</p>
        </div>

        <div id="profileContent" style="display: none;">
            <!-- GitHub Profile will be loaded here -->
        </div>

        <div class="blogs-section">
            <h2 class="section-title">Git & GitHub Articles</h2>
            <div class="author-section" style="text-align: center; margin: 20px 0 40px 0;">
                <div style="background: linear-gradient(135deg, rgba(255, 215, 0, 0.08) 0%, rgba(255, 193, 7, 0.05) 100%); border: 1px solid rgba(255, 215, 0, 0.15); border-radius: 15px; padding: 20px; max-width: 400px; margin: 0 auto; backdrop-filter: blur(10px);">
                    <div style="font-size: 16px; font-weight: 600; color: #ffffff; margin-bottom: 8px;">Written by</div>
                    <div style="font-size: 20px; font-weight: 700; color: #ffd700; margin-bottom: 5px;">Umair Tufail</div>
                    <div style="font-size: 14px; color: #b0b0b0; font-style: italic;">Software Engineer & Tech Enthusiast</div>
                </div>
            </div>
            <div class="blogs-grid" id="blogsGrid">
                @foreach($blogs as $blog)
                <div class="blog-card" data-tags="{{ strtolower($blog->tags) }}" data-title="{{ strtolower($blog->title) }}">
                    <div class="blog-header">
                        <h3 class="blog-title">{{ $blog->title }}</h3>
                        @if($blog->is_featured)
                            <span class="featured-badge">Featured</span>
                        @endif
                    </div>
                    <p class="blog-excerpt">{{ $blog->excerpt }}</p>
                    <div class="blog-meta">
                        <span class="difficulty-badge difficulty-{{ strtolower($blog->difficulty_level) }}">
                            {{ $blog->difficulty_level }}
                        </span>
                        <span class="read-time">{{ $blog->read_time }} min read</span>
                        <span class="publish-date">{{ $blog->published_at->format('M d, Y') }}</span>
                    </div>
                    <div class="blog-tags">
                        @foreach($blog->tags_array as $tag)
                            <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <div class="blog-actions">
                        <button class="like-btn {{ $blog->hasLiked ? 'liked' : '' }}" onclick="likeBlog({{ $blog->id }}, this)" data-blog-id="{{ $blog->id }}">
                            <svg viewBox="0 0 24 24" class="heart-icon">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            <span class="likes-count">{{ $blog->likes_count }}</span>
                        </button>
                        <a href="{{ route('blog.show', $blog) }}" class="read-more-btn">Read Article</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Floating Git Cheat Sheet Button -->
    <a href="{{ url('/git-cheatsheet') }}" class="floating-git-btn" title="Git & GitHub Cheat Sheet">
        <div class="git-btn-text">Cheat Sheet</div>
        <svg class="git-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
        </svg>
    </a>

    <!-- Floating GitHub Profile Button -->
    <a href="https://github.com/mumairtufail" target="_blank" class="floating-github-btn" title="Visit GitHub Profile">
        <div class="github-btn-text">Visit GitHub</div>
        <svg class="github-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
        </svg>
    </a>

    <script>
        const GITHUB_USERNAME = 'mumairtufail';
        
        // Search functionality for blogs
        const searchInput = document.getElementById('searchInput');
        
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const blogCards = document.querySelectorAll('.blog-card');
            
            blogCards.forEach(card => {
                const title = card.querySelector('.blog-title').textContent.toLowerCase();
                const excerpt = card.querySelector('.blog-excerpt').textContent.toLowerCase();
                const tags = card.getAttribute('data-tags');
                
                if (title.includes(searchTerm) || 
                    excerpt.includes(searchTerm) || 
                    tags.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = searchTerm === '' ? 'block' : 'none';
                }
            });
        });

        // Load GitHub Profile Data
        async function loadGitHubProfile() {
            const loading = document.getElementById('loading');
            const profileContent = document.getElementById('profileContent');
            
            try {
                const headers = {
                    'Accept': 'application/vnd.github.v3+json',
                    'User-Agent': 'GitHub-Profile-Viewer'
                };
                
                const profileResponse = await fetch(`https://api.github.com/users/${GITHUB_USERNAME}`, {
                    method: 'GET',
                    headers: headers,
                    mode: 'cors'
                });
                
                if (profileResponse.ok) {
                    const profile = await profileResponse.json();
                    
                    profileContent.innerHTML = `
                        <div class="profile-card">
                            <div class="profile-content">
                                <div class="profile-left">
                                    <img src="{{ asset('assets/profile/profile.png') }}" alt="Umair Tufail" class="avatar-large">
                                </div>
                                <div class="profile-right">
                                    <h1 class="name">Umair Tufail</h1>
                                    <div class="username">@${profile.login}</div>
                                    ${profile.bio ? `<div class="bio">${profile.bio}</div>` : ''}
                                    
                                    <div class="stats">
                                        <div class="stat">
                                            <span class="stat-number">${profile.public_repos || 0}</span>
                                            <span class="stat-label">Repositories</span>
                                        </div>
                                        <div class="stat">
                                            <span class="stat-number">1340</span>
                                            <span class="stat-label">Followers</span>
                                        </div>
                                        <div class="stat">
                                            <span class="stat-number">${profile.following || 0}</span>
                                            <span class="stat-label">Following</span>
                                        </div>
                                        ${profile.location ? `
                                        <div class="stat">
                                            <span class="stat-number">📍</span>
                                            <span class="stat-label">${profile.location}</span>
                                        </div>` : ''}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                } else {
                    throw new Error('GitHub API request failed');
                }
            } catch (error) {
                console.warn('GitHub API Error, showing blog stats instead:', error);
                
                const totalBlogs = {{ $blogs->count() }};
                const totalLikes = {{ $blogs->sum('likes_count') }};
                const featuredBlogs = {{ $blogs->where('is_featured', true)->count() }};
                const avgReadTime = {{ round($blogs->avg('read_time')) }};
                
                profileContent.innerHTML = `
                    <div class="profile-card">
                        <div class="profile-content">
                            <div class="profile-left">
                                <img src="{{ asset('assets/profile/profile.png') }}" alt="Umair Tufail" class="avatar-large">
                            </div>
                            <div class="profile-right" style="flex: 1; text-align: center;">
                                <h1 class="name">Umair Tufail</h1>
                                <div class="username">@mumairtufail</div>
                                <div class="bio">Welcome! I'm excited to share my journey as a Software Engineer. I hope this space offers you valuable insights and inspiration.</div>
                                
                                <div class="stats" style="justify-content: center;">
                                    <div class="stat">
                                        <span class="stat-number">${totalBlogs}</span>
                                        <span class="stat-label">Blog Articles</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-number">${totalLikes}</span>
                                        <span class="stat-label">Total Likes</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-number">${featuredBlogs}</span>
                                        <span class="stat-label">Featured Posts</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-number">${avgReadTime} min</span>
                                        <span class="stat-label">Avg Read Time</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }
            
            loading.style.display = 'none';
            profileContent.style.display = 'block';
        }

        // Like functionality
        async function likeBlog(blogId, button) {
            const isLiked = button.classList.contains('liked');
            const action = isLiked ? 'unlike' : 'like';
            
            try {
                const response = await fetch(`/blogs/${blogId}/${action}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    }
                });

                if (response.ok) {
                    const data = await response.json();
                    const likesCount = button.querySelector('.likes-count');
                    likesCount.textContent = data.likes_count;
                    
                    if (data.liked) {
                        button.classList.add('liked');
                    } else {
                        button.classList.remove('liked');
                    }
                    
                    button.style.transform = 'scale(1.1)';
                    setTimeout(() => {
                        button.style.transform = 'scale(1)';
                    }, 200);

                    const heart = button.querySelector('.heart-icon');
                    heart.style.transform = 'scale(1.3)';
                    setTimeout(() => {
                        heart.style.transform = 'scale(1)';
                    }, 300);
                } else {
                    console.error('Error with like action');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }

        if (!document.querySelector('meta[name="csrf-token"]')) {
            const meta = document.createElement('meta');
            meta.name = 'csrf-token';
            meta.content = '{{ csrf_token() }}';
            document.head.appendChild(meta);
        }

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.addEventListener('DOMContentLoaded', () => {
            loadGitHubProfile();
            
            const blogCards = document.querySelectorAll('.blog-card');
            blogCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });
        });
    </script>
</body>
</html>