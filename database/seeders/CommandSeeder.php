<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commands = [
            // Setup & Configuration - with variations
            ['command' => 'git config --global user.name', 'description' => 'Set your name globally', 'category' => 'setup'],
            ['command' => 'git config --global user.email', 'description' => 'Set your email globally', 'category' => 'setup'],
            ['command' => 'git config --list', 'description' => 'View all configuration settings', 'category' => 'setup'],
            ['command' => 'git config user.name', 'description' => 'Check current username', 'category' => 'setup'],
            ['command' => 'git config user.email', 'description' => 'Check current email', 'category' => 'setup'],
            
            // SSH Setup
            ['command' => 'ssh-keygen -t rsa -b 4096', 'description' => 'Generate SSH key', 'category' => 'ssh'],
            ['command' => 'cat ~/.ssh/id_rsa.pub', 'description' => 'Display public key', 'category' => 'ssh'],
            ['command' => 'ssh -T git@github.com', 'description' => 'Test SSH connection to GitHub', 'category' => 'ssh'],
            
            // Repository Basics
            ['command' => 'git init', 'description' => 'Initialize new repository', 'category' => 'basics'],
            ['command' => 'git clone', 'description' => 'Clone existing repository', 'category' => 'basics'],
            ['command' => 'git status', 'description' => 'Check repository status', 'category' => 'basics'],
            ['command' => 'git log', 'description' => 'View commit history', 'category' => 'basics'],
            ['command' => 'git log --oneline', 'description' => 'Condensed commit history', 'category' => 'basics'],
            ['command' => 'git log --graph', 'description' => 'Visual commit history', 'category' => 'basics'],
            
            // Staging & Committing
            ['command' => 'git add .', 'description' => 'Add all changes', 'category' => 'staging'],
            ['command' => 'git add', 'description' => 'Add specific file', 'category' => 'staging'],
            ['command' => 'git commit -m', 'description' => 'Commit with message', 'category' => 'staging'],
            ['command' => 'git commit -am', 'description' => 'Add and commit tracked files', 'category' => 'staging'],
            ['command' => 'git commit --amend', 'description' => 'Amend last commit', 'category' => 'staging'],
            
            // Branching
            ['command' => 'git branch', 'description' => 'List local branches', 'category' => 'branching'],
            ['command' => 'git branch -a', 'description' => 'List all branches', 'category' => 'branching'],
            ['command' => 'git checkout', 'description' => 'Switch to branch', 'category' => 'branching'],
            ['command' => 'git checkout -b', 'description' => 'Create and switch to branch', 'category' => 'branching'],
            ['command' => 'git switch', 'description' => 'Modern way to switch branches', 'category' => 'branching'],
            ['command' => 'git merge', 'description' => 'Merge branch into current', 'category' => 'branching'],
            ['command' => 'git branch -d', 'description' => 'Delete branch', 'category' => 'branching'],
            
            // Remote Operations
            ['command' => 'git remote -v', 'description' => 'List remotes', 'category' => 'remote'],
            ['command' => 'git remote add origin', 'description' => 'Add remote origin', 'category' => 'remote'],
            ['command' => 'git push origin', 'description' => 'Push branch to remote', 'category' => 'remote'],
            ['command' => 'git push -u origin', 'description' => 'Push and set upstream', 'category' => 'remote'],
            ['command' => 'git push --force-with-lease', 'description' => 'Safe force push', 'category' => 'remote'],
            ['command' => 'git pull', 'description' => 'Pull changes from remote', 'category' => 'remote'],
            ['command' => 'git pull --rebase', 'description' => 'Pull with rebase', 'category' => 'remote'],
            ['command' => 'git fetch', 'description' => 'Fetch changes without merging', 'category' => 'remote'],
            
            // GitHub CLI
            ['command' => 'gh repo create', 'description' => 'Create GitHub repository', 'category' => 'github'],
            ['command' => 'gh repo clone', 'description' => 'Clone GitHub repository', 'category' => 'github'],
            ['command' => 'gh pr create', 'description' => 'Create pull request', 'category' => 'github'],
            ['command' => 'gh pr list', 'description' => 'List pull requests', 'category' => 'github'],
            ['command' => 'gh pr checkout', 'description' => 'Checkout pull request', 'category' => 'github'],
            ['command' => 'gh issue create', 'description' => 'Create new issue', 'category' => 'github'],
            ['command' => 'gh issue list', 'description' => 'List issues', 'category' => 'github'],
            
            // Advanced Commands
            ['command' => 'git stash', 'description' => 'Stash changes', 'category' => 'advanced'],
            ['command' => 'git stash pop', 'description' => 'Apply and remove stash', 'category' => 'advanced'],
            ['command' => 'git stash list', 'description' => 'List stashes', 'category' => 'advanced'],
            ['command' => 'git rebase', 'description' => 'Rebase current branch', 'category' => 'advanced'],
            ['command' => 'git rebase -i', 'description' => 'Interactive rebase', 'category' => 'advanced'],
            ['command' => 'git cherry-pick', 'description' => 'Apply specific commit', 'category' => 'advanced'],
            ['command' => 'git reset --hard', 'description' => 'Hard reset to commit', 'category' => 'advanced'],
            ['command' => 'git restore', 'description' => 'Restore file changes', 'category' => 'advanced'],
            ['command' => 'git tag', 'description' => 'Create or list tags', 'category' => 'advanced'],
        ];

        foreach ($commands as $command) {
            \App\Models\Command::create($command);
        }
    }
}
