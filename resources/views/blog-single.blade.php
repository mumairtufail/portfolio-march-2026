<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>{{ $blog->title }} - Umair Tufail</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
            color: #ffffff;
            line-height: 1.6;
        }

        .header {
            position: fixed;
            top: 0;
            right: 0;
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px 40px;
            z-index: 100;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .like-btn-footer {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #b0b0b0;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .like-btn-footer:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.3);
            color: #ffffff;
        }

        .like-btn-footer.liked {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border-color: #ef4444;
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .like-btn-footer.liked:hover {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
        }

        .like-text {
            font-size: 14px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 120px 40px 40px;
        }

        .article-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .article-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .article-meta {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #b0b0b0;
        }

        .author-section {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.08) 0%, rgba(255, 193, 7, 0.05) 100%);
            border: 1px solid rgba(255, 215, 0, 0.15);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            text-align: center;
        }

        .author-section .author-name {
            font-size: 18px;
            font-weight: 600;
            color: #ffd700;
            margin-bottom: 5px;
        }

        .author-section .author-title {
            font-size: 14px;
            color: #b0b0b0;
            font-style: italic;
        }

        .difficulty-badge {
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
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

        .featured-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 6px 15px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .article-tags {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .tag {
            background: rgba(255, 255, 255, 0.1);
            color: #d0d0d0;
            padding: 6px 12px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 500;
        }

        .article-content {
            background: transparent;
            padding: 40px 0;
            margin-bottom: 40px;
            line-height: 1.8;
        }

        .article-content p {
            margin-bottom: 20px;
            font-size: 16px;
            color: #e5e7eb;
        }

        .article-content h1, .article-content h2, .article-content h3 {
            color: #ffffff;
            margin: 30px 0 15px 0;
            font-weight: 600;
        }

        .article-content h1 {
            font-size: 2rem;
            border-bottom: 2px solid rgba(102, 126, 234, 0.3);
            padding-bottom: 10px;
            margin-bottom: 25px;
        }
        
        .article-content h2 {
            font-size: 1.6rem;
            color: #667eea;
            margin-top: 40px;
        }
        
        .article-content h3 {
            font-size: 1.3rem;
            color: #8b9dc3;
        }

        .article-content ul, .article-content ol {
            margin: 20px 0;
            padding-left: 30px;
        }

        .article-content li {
            margin-bottom: 8px;
            color: #e5e7eb;
        }

        .article-content code {
            background: rgba(255, 255, 255, 0.1);
            color: #ffd700;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Monaco', 'Consolas', monospace;
            font-size: 14px;
        }

        .article-content pre {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            overflow-x: auto;
        }

        .article-content pre code {
            background: none;
            padding: 0;
            color: #e5e7eb;
        }

        .article-content blockquote {
            border-left: 4px solid #667eea;
            padding: 15px 20px;
            margin: 20px 0;
            background: rgba(102, 126, 234, 0.05);
            border-radius: 0 10px 10px 0;
            font-style: italic;
        }

        .command-panel {
            background: #1a1a1a;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            margin: 20px 0;
            position: relative;
            overflow: hidden;
        }

        .command-content {
            padding: 16px 60px 16px 20px;
            font-family: 'SF Mono', 'Menlo', 'Consolas', 'Ubuntu Mono', monospace;
            font-size: 14px;
            line-height: 1.5;
            white-space: pre-wrap;
            word-break: break-all;
            color: #e5e7eb;
        }

        .command-panel .git-command { color: #9ece6a; }
        .command-panel .npm-command { color: #73daca; }
        .command-panel .php-command { color: #bb9af7; }
        .command-panel .node-command { color: #f7768e; }

        .copy-btn-simple {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #a0a0a0;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
            opacity: 0.6;
        }

        .command-panel:hover .copy-btn-simple {
            opacity: 1;
        }

        .copy-btn-simple:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.25);
            transform: scale(1.05);
        }

        .copy-btn-simple.copied {
            background: #22c55e;
            border-color: rgba(34, 197, 94, 0.8);
            color: #ffffff;
            opacity: 1;
        }

        .copy-btn-simple.copied:hover {
            transform: scale(1);
        }

        .article-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            flex-wrap: wrap;
            gap: 20px;
        }

        .social-share {
            display: flex;
            gap: 15px;
        }

        .share-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #b0b0b0;
            padding: 10px;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .share-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            transform: translateY(-2px);
        }

        .navigation {
            display: flex;
            gap: 20px;
            margin-top: 40px;
        }

        .nav-btn {
            flex: 1;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            text-decoration: none;
            color: #ffffff;
            text-align: center;
            transition: all 0.3s ease;
        }

        .nav-btn:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateY(-2px);
        }

        .nav-btn-title {
            font-size: 12px;
            color: #b0b0b0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .nav-btn-text {
            font-size: 14px;
            font-weight: 500;
        }

        .heart-icon {
            width: 16px;
            height: 16px;
            fill: currentColor;
        }

        @media (max-width: 768px) {
            .container { padding: 100px 25px 25px; }
            .header { padding: 15px 25px; }
            .article-title { font-size: 2rem; }
            .article-meta { gap: 15px; }
            .article-content { padding: 25px 0; }
            .navigation { flex-direction: column; }
            .article-footer { flex-direction: column; text-align: center; }
            .like-btn-footer { order: -1; margin-bottom: 10px; }
            .command-content { padding-right: 25px; }
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
                'title' => 'GitHub Articles',
                'url' => route('github'),
                'icon' => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>'
            ],
            [
                'title' => $blog->title,
                'icon' => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14,2 14,8 20,8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10,9 9,9 8,9"/></svg>'
            ]
        ]
    ])

    {{-- Cursor Animation Component --}}
    @include('components.cursor-animation')

    <div class="container">
        {{-- Article Header --}}
        <div class="article-header">
            <h1 class="article-title">{{ $blog->title }}</h1>
            
            <div class="article-meta">
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                    {{ $blog->read_time }} min read
                </div>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M9 11H7v6h2v-6zm4 0h-2v6h2v-6zm4 0h-2v6h2v-6zm2-7v2H3V4h3.5l1-1h5l1 1H17z"/></svg>
                    {{ $blog->published_at->format('M d, Y') }}
                </div>
                <div class="meta-item">
                    <span class="difficulty-badge difficulty-{{ strtolower($blog->difficulty_level) }}">
                        {{ $blog->difficulty_level }}
                    </span>
                </div>
                @if($blog->is_featured)
                    <div class="meta-item">
                        <span class="featured-badge">Featured</span>
                    </div>
                @endif
            </div>

            {{-- Author Section --}}
            <div class="author-section">
                <div class="author-name">{{ $blog->author ?? 'Umair Tufail' }}</div>
                <div class="author-title">Software Engineer & Tech Enthusiast</div>
            </div>

            {{-- Tags --}}
            <div class="article-tags">
                @foreach($blog->tags_array as $tag)
                    <span class="tag">{{ $tag }}</span>
                @endforeach
            </div>
        </div>

        {{-- Article Content --}}
        <div class="article-content">
            {!! $blog->content !!}
        </div>

        {{-- Article Footer --}}
        <div class="article-footer">
            <div class="social-share">
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn" title="Share on Twitter">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn" title="Share on LinkedIn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                </a>
                <a href="javascript:void(0)" onclick="copyPageLink()" class="share-btn" title="Copy Link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/></svg>
                </a>
            </div>
            
            <button class="like-btn-footer {{ $hasLiked ? 'liked' : '' }}" onclick="likeBlog({{ $blog->id }}, this)" data-blog-id="{{ $blog->id }}" data-liked="{{ $hasLiked ? 'true' : 'false' }}">
                <svg viewBox="0 0 24 24" class="heart-icon"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                <span class="likes-count">{{ $blog->likes_count }}</span>
                <span class="like-text">{{ $hasLiked ? 'You liked this!' : 'Like this article' }}</span>
            </button>
        </div>

        {{-- Navigation --}}
        <div class="navigation">
            <a href="{{ route('github') }}" class="nav-btn">
                <div class="nav-btn-title">Back to</div>
                <div class="nav-btn-text">All Articles</div>
            </a>
            <a href="https://github.com/mumairtufail" target="_blank" class="nav-btn">
                <div class="nav-btn-title">Visit</div>
                <div class="nav-btn-text">GitHub</div>
            </a>
            {{-- === NEW BUTTON START === --}}
            <a href="{{ route('git.cheatsheet') }}" class="nav-btn">
                <div class="nav-btn-title">View</div>
                <div class="nav-btn-text">Git Cheat Sheet</div>
            </a>
            {{-- === NEW BUTTON END === --}}
        </div>
    </div>

    <script>
        // Like functionality
        async function likeBlog(blogId, button) {
            const isLiked = button.getAttribute('data-liked') === 'true';
            const action = isLiked ? 'unlike' : 'like';
            
            try {
                const response = await fetch(`/blogs/${blogId}/${action}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                if (response.ok) {
                    const data = await response.json();
                    const likesCount = button.querySelector('.likes-count');
                    const likeText = button.querySelector('.like-text');
                    
                    likesCount.textContent = data.likes_count;
                    
                    if (data.liked) {
                        button.classList.add('liked');
                        button.setAttribute('data-liked', 'true');
                        likeText.textContent = 'You liked this!';
                    } else {
                        button.classList.remove('liked');
                        button.setAttribute('data-liked', 'false');
                        likeText.textContent = 'Like this article';
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

        // Copy page link functionality
        function copyPageLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                const btn = event.target.closest('.share-btn');
                const originalColor = btn.style.color;
                btn.style.color = '#22c55e';
                setTimeout(() => {
                    btn.style.color = originalColor;
                }, 1000);
            });
        }

        // Copy command functionality
        function copyToClipboard(button) {
            const commandContent = button.parentElement.querySelector('.command-content');
            const text = commandContent.textContent.trim();
            
            navigator.clipboard.writeText(text).then(() => {
                const originalText = button.textContent;
                button.textContent = "Copied!";
                button.classList.add('copied');
                button.disabled = true;
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.classList.remove('copied');
                    button.disabled = false;
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }

        // Smooth scroll for anchor links
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            // Replace <pre><code> blocks with command panels
            document.querySelectorAll('.article-content pre code').forEach(codeBlock => {
                const pre = codeBlock.parentElement;
                const code = codeBlock.innerHTML.trim(); // Use innerHTML to preserve spans

                const commandPanel = document.createElement('div');
                commandPanel.className = 'command-panel';

                const commandContent = document.createElement('div');
                commandContent.className = 'command-content';
                commandContent.innerHTML = code; // Use innerHTML

                const copyButton = document.createElement('button');
                copyButton.className = 'copy-btn-simple';
                copyButton.textContent = 'Copy';
                copyButton.onclick = () => copyToClipboard(copyButton);

                commandPanel.appendChild(commandContent);
                commandPanel.appendChild(copyButton);

                pre.parentNode.replaceChild(commandPanel, pre);
            });
        });
    </script>
</body>
</html>