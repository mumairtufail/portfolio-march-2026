<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Git & GitHub Complete Cheat Sheet</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, monospace;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
            color: #ffffff;
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 120px 40px 40px;
        }

        .hero {
            text-align: center;
            margin-bottom: 50px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 18px;
            color: #b0b0b0;
            max-width: 600px;
            margin: 0 auto;
        }

        .toc {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 40px;
        }

        .toc h3 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 20px;
        }

        .toc-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 10px;
        }

        .toc-item {
            color: #ffffff;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .toc-item:hover {
            background: rgba(102, 126, 234, 0.2);
            color: #667eea;
        }

        .section {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .section h2 {
            color: #667eea;
            font-size: 28px;
            margin-bottom: 20px;
            border-bottom: 2px solid rgba(102, 126, 234, 0.3);
            padding-bottom: 10px;
        }

        .section h3 {
            color: #ffffff;
            font-size: 20px;
            margin: 25px 0 15px;
        }

        .command-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .command-item {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 15px;
            transition: all 0.3s ease;
        }

        .command-item:hover {
            border-color: rgba(102, 126, 234, 0.5);
            transform: translateY(-2px);
        }

        .command {
            background: #1a1a1a;
            color: #00ff00;
            font-family: 'Courier New', monospace;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 8px;
            font-size: 14px;
            border: 1px solid rgba(0, 255, 0, 0.2);
            position: relative;
            cursor: pointer;
        }

        .command:hover {
            background: #2a2a2a;
        }

        .command::after {
            content: '';
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.6;
            transition: opacity 0.3s ease;
        }

        .command:hover::after {
            opacity: 1;
        }

        .description {
            color: #b0b0b0;
            font-size: 13px;
            margin-top: 5px;
        }

        .workflow {
            background: rgba(102, 126, 234, 0.1);
            border: 1px solid rgba(102, 126, 234, 0.3);
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }

        .workflow h4 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .workflow-steps {
            list-style: none;
            counter-reset: step-counter;
        }

        .workflow-steps li {
            counter-increment: step-counter;
            margin-bottom: 10px;
            position: relative;
            padding-left: 40px;
        }

        .workflow-steps li::before {
            content: counter(step-counter);
            position: absolute;
            left: 0;
            top: 0;
            background: #667eea;
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .note {
            background: rgba(255, 193, 7, 0.1);
            border: 1px solid rgba(255, 193, 7, 0.3);
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
            color: #ffc107;
        }

        .note::before {
            content: '';
            font-weight: bold;
        }

        .danger {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
            color: #dc3545;
        }

        .danger::before {
            content: '';
            font-weight: bold;
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

        .floating-download-btn {
            position: fixed;
            bottom: 120px;
            right: 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #ffffff;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            z-index: 1000;
            border: 2px solid rgba(255, 255, 255, 0.1);
            padding: 12px 16px;
            min-width: 80px;
            cursor: pointer;
        }

        .floating-download-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.6);
            border-color: rgba(255, 255, 255, 0.3);
            background: linear-gradient(135deg, #7c8ef5 0%, #8a5bb5 100%);
        }

        .floating-download-btn:active {
            transform: translateY(-2px);
        }

        .download-btn-text {
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
            color: #ffffff;
            transition: color 0.3s ease;
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 36px; }
            .container { padding: 100px 25px 25px; }
            .command-grid { grid-template-columns: 1fr; }
            .toc-grid { grid-template-columns: 1fr; }
            
            .search-box {
                top: 15px;
                right: 25px;
            }
            
            .search-input {
                width: 250px;
                padding: 6px 12px;
                font-size: 11px;
            }
            
            .floating-download-btn {
                bottom: 110px;
                right: 20px;
                padding: 10px 12px;
                min-width: 70px;
            }
            
            .download-btn-text {
                font-size: 9px;
                margin-bottom: 5px;
            }
            
            .floating-github-btn {
                bottom: 30px;
                right: 20px;
                padding: 10px 12px;
                min-width: 70px;
            }
            
            .github-btn-text {
                font-size: 9px;
                margin-bottom: 5px;
            }
        }

        @media (max-width: 480px) {
            .search-box {
                top: 12px;
                right: 20px;
            }
            
            .search-input {
                width: 200px;
                padding: 5px 10px;
                font-size: 10px;
            }
            
            .floating-download-btn {
                bottom: 95px;
                right: 15px;
                padding: 8px 10px;
                min-width: 60px;
            }
            
            .download-btn-text {
                font-size: 8px;
                margin-bottom: 4px;
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
        }

        .copy-feedback {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(102, 126, 234, 0.9);
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 14px;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .copy-feedback.show {
            opacity: 1;
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
                'title' => 'GitHub',
                'url' => url('/github'),
                'icon' => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>'
            ],
            [
                'title' => 'Git Cheat Sheet',
                'icon' => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
            ]
        ]
    ])

    {{-- Cursor Animation Component --}}
    @include('components.cursor-animation')

    <div class="search-box">
        <input type="text" class="search-input" placeholder="Search commands..." id="searchInput">
    </div>

    <div class="container">
        <div class="hero">
            <h1>Git & GitHub Cheat Sheet</h1>
            <p>Complete reference guide for Git version control and GitHub collaboration</p>
        </div>

        <!-- Table of Contents -->
        <div class="toc">
            <h3>Quick Navigation</h3>
            <div class="toc-grid">
                <a href="#setup" class="toc-item">Setup & Configuration</a>
                <a href="#basics" class="toc-item">Repository Basics</a>
                <a href="#staging" class="toc-item">Staging & Committing</a>
                <a href="#branching" class="toc-item">Branching & Merging</a>
                <a href="#remote" class="toc-item">Remote Repositories</a>
                <a href="#github" class="toc-item">GitHub Operations</a>
                <a href="#advanced" class="toc-item">Advanced Git</a>
                <a href="#workflows" class="toc-item">Common Workflows</a>
            </div>
        </div>

        <!-- Setup & Configuration -->
        <div class="section" id="setup">
            <h2>Setup & Configuration</h2>
            
            <h3>Initial Setup</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git config --global user.name "Your Name"</div>
                    <div class="description">Set your name globally</div>
                </div>
                <div class="command-item">
                    <div class="command">git config --global user.email "your.email@example.com"</div>
                    <div class="description">Set your email globally</div>
                </div>
                <div class="command-item">
                    <div class="command">git config --list</div>
                    <div class="description">View all configuration settings</div>
                </div>
                <div class="command-item">
                    <div class="command">git config user.name</div>
                    <div class="description">Check current username</div>
                </div>
            </div>

            <h3>SSH Key Setup</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">ssh-keygen -t rsa -b 4096 -C "your.email@example.com"</div>
                    <div class="description">Generate SSH key</div>
                </div>
                <div class="command-item">
                    <div class="command">cat ~/.ssh/id_rsa.pub</div>
                    <div class="description">Display public key</div>
                </div>
                <div class="command-item">
                    <div class="command">ssh -T git@github.com</div>
                    <div class="description">Test SSH connection to GitHub</div>
                </div>
            </div>
        </div>

        <!-- Repository Basics -->
        <div class="section" id="basics">
            <h2>Repository Basics</h2>
            
            <h3>Creating Repositories</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git init</div>
                    <div class="description">Initialize new repository</div>
                </div>
                <div class="command-item">
                    <div class="command">git clone &lt;repository-url&gt;</div>
                    <div class="description">Clone existing repository</div>
                </div>
                <div class="command-item">
                    <div class="command">git clone &lt;url&gt; &lt;directory&gt;</div>
                    <div class="description">Clone to specific directory</div>
                </div>
            </div>

            <h3>Repository Status</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git status</div>
                    <div class="description">Check repository status</div>
                </div>
                <div class="command-item">
                    <div class="command">git log</div>
                    <div class="description">View commit history</div>
                </div>
                <div class="command-item">
                    <div class="command">git log --oneline</div>
                    <div class="description">Condensed commit history</div>
                </div>
                <div class="command-item">
                    <div class="command">git log --graph --oneline --all</div>
                    <div class="description">Visual branch history</div>
                </div>
            </div>
        </div>

        <!-- Staging & Committing -->
        <div class="section" id="staging">
            <h2>Staging & Committing</h2>
            
            <h3>Adding Files</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git add &lt;filename&gt;</div>
                    <div class="description">Add specific file</div>
                </div>
                <div class="command-item">
                    <div class="command">git add .</div>
                    <div class="description">Add all changes</div>
                </div>
                <div class="command-item">
                    <div class="command">git add -A</div>
                    <div class="description">Add all changes including deletions</div>
                </div>
                <div class="command-item">
                    <div class="command">git add -p</div>
                    <div class="description">Interactive staging</div>
                </div>
            </div>

            <h3>Committing</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git commit -m "commit message"</div>
                    <div class="description">Commit with message</div>
                </div>
                <div class="command-item">
                    <div class="command">git commit -am "message"</div>
                    <div class="description">Add and commit tracked files</div>
                </div>
                <div class="command-item">
                    <div class="command">git commit --amend</div>
                    <div class="description">Amend last commit</div>
                </div>
                <div class="command-item">
                    <div class="command">git commit --amend -m "new message"</div>
                    <div class="description">Amend with new message</div>
                </div>
            </div>

            <h3>Undoing Changes</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git restore &lt;filename&gt;</div>
                    <div class="description">Discard changes in file</div>
                </div>
                <div class="command-item">
                    <div class="command">git restore --staged &lt;filename&gt;</div>
                    <div class="description">Unstage file</div>
                </div>
                <div class="command-item">
                    <div class="command">git reset HEAD~1</div>
                    <div class="description">Undo last commit (keep changes)</div>
                </div>
                <div class="command-item">
                    <div class="command">git reset --hard HEAD~1</div>
                    <div class="description">Undo last commit (discard changes)</div>
                </div>
            </div>
        </div>

        <!-- Branching & Merging -->
        <div class="section" id="branching">
            <h2>Branching & Merging</h2>
            
            <h3>Branch Operations</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git branch</div>
                    <div class="description">List local branches</div>
                </div>
                <div class="command-item">
                    <div class="command">git branch -a</div>
                    <div class="description">List all branches</div>
                </div>
                <div class="command-item">
                    <div class="command">git branch &lt;branch-name&gt;</div>
                    <div class="description">Create new branch</div>
                </div>
                <div class="command-item">
                    <div class="command">git checkout &lt;branch-name&gt;</div>
                    <div class="description">Switch to branch</div>
                </div>
                <div class="command-item">
                    <div class="command">git checkout -b &lt;branch-name&gt;</div>
                    <div class="description">Create and switch to branch</div>
                </div>
                <div class="command-item">
                    <div class="command">git branch -d &lt;branch-name&gt;</div>
                    <div class="description">Delete branch</div>
                </div>
                <div class="command-item">
                    <div class="command">git branch -D &lt;branch-name&gt;</div>
                    <div class="description">Force delete branch</div>
                </div>
                <div class="command-item">
                    <div class="command">git switch &lt;branch-name&gt;</div>
                    <div class="description">Modern way to switch branches</div>
                </div>
            </div>

            <h3>Merging</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git merge &lt;branch-name&gt;</div>
                    <div class="description">Merge branch into current</div>
                </div>
                <div class="command-item">
                    <div class="command">git merge --no-ff &lt;branch-name&gt;</div>
                    <div class="description">Merge with merge commit</div>
                </div>
                <div class="command-item">
                    <div class="command">git rebase &lt;branch-name&gt;</div>
                    <div class="description">Rebase current branch</div>
                </div>
                <div class="command-item">
                    <div class="command">git rebase -i HEAD~3</div>
                    <div class="description">Interactive rebase last 3 commits</div>
                </div>
            </div>

            <div class="note">
                Use merge for preserving history, rebase for clean linear history
            </div>
        </div>

        <!-- Remote Repositories -->
        <div class="section" id="remote">
            <h2>Remote Repositories</h2>
            
            <h3>Remote Management</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git remote -v</div>
                    <div class="description">List remotes</div>
                </div>
                <div class="command-item">
                    <div class="command">git remote add origin &lt;url&gt;</div>
                    <div class="description">Add remote origin</div>
                </div>
                <div class="command-item">
                    <div class="command">git remote remove &lt;name&gt;</div>
                    <div class="description">Remove remote</div>
                </div>
                <div class="command-item">
                    <div class="command">git remote rename &lt;old&gt; &lt;new&gt;</div>
                    <div class="description">Rename remote</div>
                </div>
            </div>

            <h3>Pushing & Pulling</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git push origin &lt;branch&gt;</div>
                    <div class="description">Push branch to remote</div>
                </div>
                <div class="command-item">
                    <div class="command">git push -u origin &lt;branch&gt;</div>
                    <div class="description">Push and set upstream</div>
                </div>
                <div class="command-item">
                    <div class="command">git pull</div>
                    <div class="description">Pull changes from remote</div>
                </div>
                <div class="command-item">
                    <div class="command">git pull --rebase</div>
                    <div class="description">Pull with rebase</div>
                </div>
                <div class="command-item">
                    <div class="command">git fetch</div>
                    <div class="description">Fetch changes without merging</div>
                </div>
                <div class="command-item">
                    <div class="command">git push --force-with-lease</div>
                    <div class="description">Safe force push</div>
                </div>
            </div>

            <div class="danger">
                Never use git push --force on shared branches. Use --force-with-lease instead.
            </div>
        </div>

        <!-- GitHub Operations -->
        <div class="section" id="github">
            <h2>GitHub Operations</h2>
            
            <h3>Repository Management</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">gh repo create &lt;name&gt;</div>
                    <div class="description">Create GitHub repository</div>
                </div>
                <div class="command-item">
                    <div class="command">gh repo clone &lt;repo&gt;</div>
                    <div class="description">Clone GitHub repository</div>
                </div>
                <div class="command-item">
                    <div class="command">gh repo fork &lt;repo&gt;</div>
                    <div class="description">Fork repository</div>
                </div>
                <div class="command-item">
                    <div class="command">gh repo view</div>
                    <div class="description">View repository details</div>
                </div>
            </div>

            <h3>Pull Requests</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">gh pr create</div>
                    <div class="description">Create pull request</div>
                </div>
                <div class="command-item">
                    <div class="command">gh pr list</div>
                    <div class="description">List pull requests</div>
                </div>
                <div class="command-item">
                    <div class="command">gh pr checkout &lt;number&gt;</div>
                    <div class="description">Checkout PR locally</div>
                </div>
                <div class="command-item">
                    <div class="command">gh pr merge &lt;number&gt;</div>
                    <div class="description">Merge pull request</div>
                </div>
            </div>

            <h3>Issues</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">gh issue create</div>
                    <div class="description">Create new issue</div>
                </div>
                <div class="command-item">
                    <div class="command">gh issue list</div>
                    <div class="description">List issues</div>
                </div>
                <div class="command-item">
                    <div class="command">gh issue close &lt;number&gt;</div>
                    <div class="description">Close issue</div>
                </div>
                <div class="command-item">
                    <div class="command">gh issue view &lt;number&gt;</div>
                    <div class="description">View issue details</div>
                </div>
            </div>
        </div>

        <!-- Advanced Git -->
        <div class="section" id="advanced">
            <h2>Advanced Git</h2>
            
            <h3>Stashing</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git stash</div>
                    <div class="description">Stash changes</div>
                </div>
                <div class="command-item">
                    <div class="command">git stash pop</div>
                    <div class="description">Apply and remove stash</div>
                </div>
                <div class="command-item">
                    <div class="command">git stash list</div>
                    <div class="description">List stashes</div>
                </div>
                <div class="command-item">
                    <div class="command">git stash apply stash@{0}</div>
                    <div class="description">Apply specific stash</div>
                </div>
            </div>

            <h3>Cherry Picking</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git cherry-pick &lt;commit-hash&gt;</div>
                    <div class="description">Apply specific commit</div>
                </div>
                <div class="command-item">
                    <div class="command">git cherry-pick &lt;hash1&gt;..&lt;hash2&gt;</div>
                    <div class="description">Cherry-pick range of commits</div>
                </div>
            </div>

            <h3>Tagging</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git tag &lt;tag-name&gt;</div>
                    <div class="description">Create lightweight tag</div>
                </div>
                <div class="command-item">
                    <div class="command">git tag -a &lt;tag&gt; -m "message"</div>
                    <div class="description">Create annotated tag</div>
                </div>
                <div class="command-item">
                    <div class="command">git push origin &lt;tag-name&gt;</div>
                    <div class="description">Push tag to remote</div>
                </div>
                <div class="command-item">
                    <div class="command">git push origin --tags</div>
                    <div class="description">Push all tags</div>
                </div>
            </div>

            <h3>Searching</h3>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git grep "search term"</div>
                    <div class="description">Search in repository</div>
                </div>
                <div class="command-item">
                    <div class="command">git log --grep="pattern"</div>
                    <div class="description">Search commit messages</div>
                </div>
                <div class="command-item">
                    <div class="command">git log -S "code"</div>
                    <div class="description">Search for code changes</div>
                </div>
                <div class="command-item">
                    <div class="command">git blame &lt;filename&gt;</div>
                    <div class="description">See who changed what</div>
                </div>
            </div>
        </div>

        <!-- Common Workflows -->
        <div class="section" id="workflows">
            <h2>Common Workflows</h2>
            
            <div class="workflow">
                <h4>Feature Development Workflow</h4>
                <ol class="workflow-steps">
                    <li>git checkout main</li>
                    <li>git pull origin main</li>
                    <li>git checkout -b feature/new-feature</li>
                    <li>Make changes and commit</li>
                    <li>git push -u origin feature/new-feature</li>
                    <li>Create pull request on GitHub</li>
                    <li>Code review and merge</li>
                    <li>git checkout main && git pull</li>
                    <li>git branch -d feature/new-feature</li>
                </ol>
            </div>

            <div class="workflow">
                <h4>Hotfix Workflow</h4>
                <ol class="workflow-steps">
                    <li>git checkout main</li>
                    <li>git checkout -b hotfix/critical-fix</li>
                    <li>Make fix and test</li>
                    <li>git add . && git commit -m "Fix critical issue"</li>
                    <li>git checkout main</li>
                    <li>git merge hotfix/critical-fix</li>
                    <li>git push origin main</li>
                    <li>git tag -a v1.0.1 -m "Hotfix release"</li>
                    <li>git push origin v1.0.1</li>
                </ol>
            </div>

            <div class="workflow">
                <h4>Sync Fork Workflow</h4>
                <ol class="workflow-steps">
                    <li>git remote add upstream &lt;original-repo-url&gt;</li>
                    <li>git fetch upstream</li>
                    <li>git checkout main</li>
                    <li>git merge upstream/main</li>
                    <li>git push origin main</li>
                </ol>
            </div>

            <div class="workflow">
                <h4>Release Workflow</h4>
                <ol class="workflow-steps">
                    <li>git checkout -b release/v1.0.0</li>
                    <li>Update version numbers and changelog</li>
                    <li>git add . && git commit -m "Prepare v1.0.0 release"</li>
                    <li>git checkout main</li>
                    <li>git merge release/v1.0.0</li>
                    <li>git tag -a v1.0.0 -m "Release v1.0.0"</li>
                    <li>git push origin main --tags</li>
                    <li>Create GitHub release</li>
                </ol>
            </div>
        </div>

        <!-- Git Aliases -->
        <div class="section">
            <h2>Useful Git Aliases</h2>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command">git config --global alias.st status</div>
                    <div class="description">Short status</div>
                </div>
                <div class="command-item">
                    <div class="command">git config --global alias.co checkout</div>
                    <div class="description">Short checkout</div>
                </div>
                <div class="command-item">
                    <div class="command">git config --global alias.br branch</div>
                    <div class="description">Short branch</div>
                </div>
                <div class="command-item">
                    <div class="command">git config --global alias.cm "commit -m"</div>
                    <div class="description">Quick commit</div>
                </div>
                <div class="command-item">
                    <div class="command">git config --global alias.lg "log --oneline --graph"</div>
                    <div class="description">Pretty log</div>
                </div>
                <div class="command-item">
                    <div class="command">git config --global alias.unstage "reset HEAD --"</div>
                    <div class="description">Unstage files</div>
                </div>
            </div>
        </div>

        <!-- .gitignore Examples -->
        <div class="section">
            <h2>Common .gitignore Patterns</h2>
            <div class="command-grid">
                <div class="command-item">
                    <div class="command"># Dependencies<br>node_modules/<br>vendor/</div>
                    <div class="description">Ignore package directories</div>
                </div>
                <div class="command-item">
                    <div class="command"># Environment files<br>.env<br>.env.local</div>
                    <div class="description">Environment variables</div>
                </div>
                <div class="command-item">
                    <div class="command"># Build output<br>dist/<br>build/<br>*.min.js</div>
                    <div class="description">Generated files</div>
                </div>
                <div class="command-item">
                    <div class="command"># OS files<br>.DS_Store<br>Thumbs.db</div>
                    <div class="description">System files</div>
                </div>
                <div class="command-item">
                    <div class="command"># IDE files<br>.vscode/<br>.idea/<br>*.swp</div>
                    <div class="description">Editor configurations</div>
                </div>
                <div class="command-item">
                    <div class="command"># Logs<br>*.log<br>logs/</div>
                    <div class="description">Log files</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Download Button -->
    <button class="floating-download-btn" onclick="downloadCheatSheet()" title="Download Git Cheat Sheet">
        <div class="download-btn-text">Download</div>
        <svg style="width: 24px; height: 24px; fill: currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 8V6h2v4h3l-4 4-4-4h3z"/>
            <path d="M5 18v2h14v-2H5z"/>
        </svg>
    </button>

    <!-- Floating GitHub Visit Button -->
    <a href="https://github.com/mumairtufail" target="_blank" class="floating-github-btn" title="Visit GitHub Profile">
        <div class="github-btn-text">Visit GitHub</div>
        <svg class="github-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px; fill: currentColor;">
            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
        </svg>
    </a>

    <div class="copy-feedback" id="copyFeedback">Copied to clipboard!</div>

    <script>
        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const commands = document.querySelectorAll('.command');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            commands.forEach(command => {
                const commandText = command.textContent.toLowerCase();
                const item = command.closest('.command-item');
                
                if (commandText.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = searchTerm === '' ? 'block' : 'none';
                }
            });
        });

        // Copy to clipboard functionality
        const copyFeedback = document.getElementById('copyFeedback');

        commands.forEach(command => {
            command.addEventListener('click', function() {
                const text = this.textContent.trim();
                
                // Remove HTML entities and extra whitespace
                const cleanText = text.replace(/&lt;/g, '<').replace(/&gt;/g, '>');
                
                navigator.clipboard.writeText(cleanText).then(() => {
                    copyFeedback.classList.add('show');
                    setTimeout(() => {
                        copyFeedback.classList.remove('show');
                    }, 2000);
                }).catch(err => {
                    console.error('Failed to copy: ', err);
                });
            });
        });

        // Download cheat sheet functionality
        function downloadCheatSheet() {
            const content = `# Git & GitHub Complete Cheat Sheet

Created by Umair Tufail
GitHub: https://github.com/mumairtufail
LinkedIn: https://www.linkedin.com/in/umair-laravel-dev
Portfolio: Complete developer portfolio with projects and skills

---

## Setup & Configuration

### Initial Setup
git config --global user.name "Your Name"          # Set your name globally
git config --global user.email "your.email@example.com"  # Set your email globally
git config --list                                  # View all configuration settings
git config user.name                              # Check current username

### SSH Key Setup
ssh-keygen -t rsa -b 4096 -C "your.email@example.com"  # Generate SSH key
cat ~/.ssh/id_rsa.pub                             # Display public key
ssh -T git@github.com                             # Test SSH connection to GitHub

## Repository Basics

### Creating Repositories
git init                                          # Initialize new repository
git clone <repository-url>                       # Clone existing repository
git clone <url> <directory>                      # Clone to specific directory

### Repository Status
git status                                        # Check repository status
git log                                          # View commit history
git log --oneline                                # Condensed commit history
git log --graph --oneline --all                 # Visual branch history

## Staging & Committing

### Adding Files
git add <filename>                               # Add specific file
git add .                                        # Add all changes
git add -A                                       # Add all changes including deletions
git add -p                                       # Interactive staging

### Committing
git commit -m "commit message"                   # Commit with message
git commit -am "message"                         # Add and commit tracked files
git commit --amend                               # Amend last commit
git commit --amend -m "new message"              # Amend with new message

### Undoing Changes
git restore <filename>                           # Discard changes in file
git restore --staged <filename>                 # Unstage file
git reset HEAD~1                                 # Undo last commit (keep changes)
git reset --hard HEAD~1                         # Undo last commit (discard changes)

## Branching & Merging

### Branch Operations
git branch                                       # List local branches
git branch -a                                    # List all branches
git branch <branch-name>                         # Create new branch
git checkout <branch-name>                       # Switch to branch
git checkout -b <branch-name>                    # Create and switch to branch
git branch -d <branch-name>                      # Delete branch
git branch -D <branch-name>                      # Force delete branch
git switch <branch-name>                         # Modern way to switch branches

### Merging
git merge <branch-name>                          # Merge branch into current
git merge --no-ff <branch-name>                  # Merge with merge commit
git rebase <branch-name>                         # Rebase current branch
git rebase -i HEAD~3                            # Interactive rebase last 3 commits

## Remote Repositories

### Remote Management
git remote -v                                    # List remotes
git remote add origin <url>                      # Add remote origin
git remote remove <name>                         # Remove remote
git remote rename <old> <new>                    # Rename remote

### Pushing & Pulling
git push origin <branch>                         # Push branch to remote
git push -u origin <branch>                      # Push and set upstream
git pull                                         # Pull changes from remote
git pull --rebase                                # Pull with rebase
git fetch                                        # Fetch changes without merging
git push --force-with-lease                     # Safe force push

## GitHub Operations

### Repository Management
gh repo create <name>                            # Create GitHub repository
gh repo clone <repo>                             # Clone GitHub repository
gh repo fork <repo>                              # Fork repository
gh repo view                                     # View repository details

### Pull Requests
gh pr create                                     # Create pull request
gh pr list                                       # List pull requests
gh pr checkout <number>                          # Checkout PR locally
gh pr merge <number>                             # Merge pull request

### Issues
gh issue create                                  # Create new issue
gh issue list                                    # List issues
gh issue close <number>                          # Close issue
gh issue view <number>                           # View issue details

## Advanced Git

### Stashing
git stash                                        # Stash changes
git stash pop                                    # Apply and remove stash
git stash list                                   # List stashes
git stash apply stash@{0}                        # Apply specific stash

### Cherry Picking
git cherry-pick <commit-hash>                    # Apply specific commit
git cherry-pick <hash1>..<hash2>                 # Cherry-pick range of commits

### Tagging
git tag <tag-name>                               # Create lightweight tag
git tag -a <tag> -m "message"                    # Create annotated tag
git push origin <tag-name>                       # Push tag to remote
git push origin --tags                           # Push all tags

### Searching
git grep "search term"                           # Search in repository
git log --grep="pattern"                         # Search commit messages
git log -S "code"                                # Search for code changes
git blame <filename>                             # See who changed what

## Common Workflows

### Feature Development Workflow
1. git checkout main
2. git pull origin main
3. git checkout -b feature/new-feature
4. Make changes and commit
5. git push -u origin feature/new-feature
6. Create pull request on GitHub
7. Code review and merge
8. git checkout main && git pull
9. git branch -d feature/new-feature

### Hotfix Workflow
1. git checkout main
2. git checkout -b hotfix/critical-fix
3. Make fix and test
4. git add . && git commit -m "Fix critical issue"
5. git checkout main
6. git merge hotfix/critical-fix
7. git push origin main
8. git tag -a v1.0.1 -m "Hotfix release"
9. git push origin v1.0.1

### Sync Fork Workflow
1. git remote add upstream <original-repo-url>
2. git fetch upstream
3. git checkout main
4. git merge upstream/main
5. git push origin main

## Useful Git Aliases
git config --global alias.st status             # Short status
git config --global alias.co checkout           # Short checkout
git config --global alias.br branch             # Short branch
git config --global alias.cm "commit -m"        # Quick commit
git config --global alias.lg "log --oneline --graph"  # Pretty log
git config --global alias.unstage "reset HEAD --"     # Unstage files

## Common .gitignore Patterns
# Dependencies
node_modules/
vendor/

# Environment files
.env
.env.local

# Build output
dist/
build/
*.min.js

# OS files
.DS_Store
Thumbs.db

# IDE files
.vscode/
.idea/
*.swp

# Logs
*.log
logs/
`;

            const blob = new Blob([content], { type: 'text/plain' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'git-github-cheat-sheet.txt';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            document.body.removeChild(a);
            
            // Show download feedback
            copyFeedback.textContent = 'Cheat Sheet Downloaded!';
            copyFeedback.classList.add('show');
            setTimeout(() => {
                copyFeedback.classList.remove('show');
                copyFeedback.textContent = 'Copied to clipboard!';
            }, 3000);
        }

        // Smooth scrolling for TOC links
        document.querySelectorAll('.toc-item').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
