<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contact Submissions - Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .header h1 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stat-number {
            font-size: 2em;
            font-weight: bold;
            color: #3498db;
        }

        .stat-label {
            color: #7f8c8d;
            font-size: 0.9em;
        }

        .contacts-table {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f8f9fa;
            font-weight: 600;
            color: #2c3e50;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: 600;
        }

        .status-unread {
            background: #e74c3c;
            color: #fff;
        }

        .status-read {
            background: #27ae60;
            color: #fff;
        }

        .contact-message {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .contact-message:hover {
            white-space: normal;
            overflow: visible;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.8em;
            transition: all 0.3s ease;
        }

        .btn-read {
            background: #3498db;
            color: #fff;
        }

        .btn-read:hover {
            background: #2980b9;
        }

        .btn-read:disabled {
            background: #bdc3c7;
            cursor: not-allowed;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a, .pagination span {
            display: inline-block;
            padding: 8px 16px;
            margin: 0 5px;
            border-radius: 5px;
            text-decoration: none;
            color: #3498db;
            border: 1px solid #ddd;
        }

        .pagination .current {
            background: #3498db;
            color: #fff;
        }

        .no-contacts {
            text-align: center;
            padding: 50px;
            color: #7f8c8d;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            table {
                font-size: 0.9em;
            }

            th, td {
                padding: 10px 8px;
            }

            .contact-message {
                max-width: 150px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Contact Submissions</h1>
            <p>Manage and view all contact form submissions</p>
        </div>

        <div class="stats">
            <div class="stat-card">
                <div class="stat-number">{{ $contacts->total() }}</div>
                <div class="stat-label">Total Contacts</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $contacts->where('is_read', false)->count() }}</div>
                <div class="stat-label">Unread</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $contacts->where('is_read', true)->count() }}</div>
                <div class="stat-label">Read</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $contacts->where('created_at', '>=', now()->subDays(7))->count() }}</div>
                <div class="stat-label">This Week</div>
            </div>
        </div>

        <div class="contacts-table">
            @if($contacts->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->created_at->format('M d, Y H:i') }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>
                                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                            </td>
                            <td>
                                <div class="contact-message" title="{{ $contact->message }}">
                                    {{ $contact->message }}
                                </div>
                            </td>
                            <td>
                                <span class="status-badge {{ $contact->is_read ? 'status-read' : 'status-unread' }}">
                                    {{ $contact->is_read ? 'Read' : 'Unread' }}
                                </span>
                            </td>
                            <td>
                                @if(!$contact->is_read)
                                    <button 
                                        class="action-btn btn-read" 
                                        onclick="markAsRead({{ $contact->id }})"
                                        id="btn-{{ $contact->id }}"
                                    >
                                        Mark as Read
                                    </button>
                                @else
                                    <span class="text-muted">Read on {{ $contact->read_at->format('M d') }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination">
                    {{ $contacts->links() }}
                </div>
            @else
                <div class="no-contacts">
                    <h3>No contact submissions yet</h3>
                    <p>Contact form submissions will appear here once someone fills out the form.</p>
                </div>
            @endif
        </div>
    </div>

    <script>
        async function markAsRead(contactId) {
            const btn = document.getElementById(`btn-${contactId}`);
            btn.disabled = true;
            btn.textContent = 'Marking...';

            try {
                const response = await fetch(`/admin/contacts/${contactId}/read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    }
                });

                const data = await response.json();

                if (data.success) {
                    // Update the UI
                    const row = btn.closest('tr');
                    const statusBadge = row.querySelector('.status-badge');
                    statusBadge.textContent = 'Read';
                    statusBadge.className = 'status-badge status-read';
                    
                    btn.outerHTML = '<span class="text-muted">Just marked as read</span>';
                    
                    // Update stats
                    location.reload();
                } else {
                    btn.disabled = false;
                    btn.textContent = 'Mark as Read';
                    alert('Failed to mark as read');
                }
            } catch (error) {
                btn.disabled = false;
                btn.textContent = 'Mark as Read';
                alert('Error occurred');
            }
        }
    </script>
</body>
</html>