<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
        'ip_address',
        'user_agent',
        'is_read',
        'read_at'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Scope for unread contacts
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    // Scope for recent contacts
    public function scopeRecent($query, $days = 7)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    // Mark as read
    public function markAsRead()
    {
        $this->update([
            'is_read' => true,
            'read_at' => now()
        ]);
    }

    // Get formatted created date
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('M d, Y \a\t h:i A');
    }
}
