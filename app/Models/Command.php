<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $fillable = [
        'command',
        'description',
        'category',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public static function findByCommand($command)
    {
        return static::where('command', trim($command))
                    ->where('is_active', true)
                    ->first();
    }

    public static function searchCommands($text)
    {
        $commands = [];
        $lines = explode("\n", $text);
        
        foreach ($lines as $line) {
            $trimmedLine = trim($line);
            
            // Extract Git/GitHub commands using simpler regex
            if (preg_match_all('/\b(git\s+[\w\-\.\s<>\/\"\'@~\$\{\}\[\]]+|gh\s+[\w\-\.\s<>\/\"\'@~\$\{\}\[\]]+|ssh-keygen[\w\-\.\s<>\/\"\'@~\$\{\}\[\]]+)\b/', $trimmedLine, $matches)) {
                foreach ($matches[1] as $commandMatch) {
                    $cleanCommand = trim($commandMatch);
                    
                    // Try to find exact match first
                    $foundCommand = static::findByCommand($cleanCommand);
                    
                    if (!$foundCommand) {
                        // Try to find partial matches by checking against our database
                        $allCommands = static::where('is_active', true)->get();
                        
                        foreach ($allCommands as $dbCommand) {
                            $dbCommandBase = explode(' ', $dbCommand->command);
                            $cleanCommandBase = explode(' ', $cleanCommand);
                            
                            // Check if the first few words match (for parameterized commands)
                            if (count($dbCommandBase) >= 2 && count($cleanCommandBase) >= 2) {
                                if ($dbCommandBase[0] === $cleanCommandBase[0] && 
                                    $dbCommandBase[1] === $cleanCommandBase[1]) {
                                    $foundCommand = $dbCommand;
                                    break;
                                }
                            }
                        }
                    }
                    
                    if ($foundCommand) {
                        $commands[] = $foundCommand;
                    }
                }
            }
        }
        
        return collect($commands)->unique('id');
    }

    public static function replaceCommandsInContent($content)
    {
        // Get all commands from database
        $allCommands = static::where('is_active', true)->get();
        
        foreach ($allCommands as $command) {
            // Create a pattern to match this command
            $pattern = '/\b' . preg_quote($command->command, '/') . '\b/';
            
            // Replace with styled command panel
            $replacement = '<div class="detected-command-panel">
                <div class="command-header">
                    <span class="command-category">' . ucfirst($command->category) . '</span>
                </div>
                <div class="command-text">
                    ' . htmlspecialchars($command->command) . '
                    <button class="copy-command-btn" onclick="copyDetectedCommand(this)">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                        </svg>
                        Copy
                    </button>
                </div>
                <div class="command-description">' . htmlspecialchars($command->description) . '</div>
            </div>';
            
            $content = preg_replace($pattern, $replacement, $content);
        }
        
        return $content;
    }
}
