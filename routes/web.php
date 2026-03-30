<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Contact;

Route::get('/', function () {
    $blogs = Blog::published()->orderBy('is_featured', 'desc')->orderBy('created_at', 'desc')->get();
    return view('profile', compact('blogs'));
});

Route::get('/original', function () {
    return view('profile-original-backup');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/github', function () {
    $blogs = Blog::published()->orderBy('is_featured', 'desc')->orderBy('created_at', 'desc')->get();
    
    // Add liked status for each blog
    $blogs->each(function ($blog) {
        $blog->hasLiked = session('liked_blog_' . $blog->id, false);
    });
    
    return view('github', compact('blogs'));
})->name('github');

Route::get('/blog/{blog}', function (Blog $blog) {
    $hasLiked = session('liked_blog_' . $blog->id, false);
    
    return view('blog-single', compact('blog', 'hasLiked'));
})->name('blog.show');

Route::post('/blogs/{blog}/like', function (Blog $blog) {
    // Simple session-based like tracking (you can enhance this with user authentication)
    $sessionKey = 'liked_blog_' . $blog->id;
    $hasLiked = session($sessionKey, false);
    
    if (!$hasLiked) {
        $blog->increment('likes_count');
        session([$sessionKey => true]);
        $liked = true;
    } else {
        $liked = true; // Already liked
    }
    
    return response()->json([
        'success' => true,
        'likes_count' => $blog->likes_count,
        'liked' => $liked
    ]);
})->name('blogs.like');

Route::post('/blogs/{blog}/unlike', function (Blog $blog) {
    // Simple session-based like tracking
    $sessionKey = 'liked_blog_' . $blog->id;
    $hasLiked = session($sessionKey, false);
    
    if ($hasLiked) {
        $blog->decrement('likes_count');
        session()->forget($sessionKey);
        $liked = false;
    } else {
        $liked = false; // Already not liked
    }
    
    return response()->json([
        'success' => true,
        'likes_count' => $blog->likes_count,
        'liked' => $liked
    ]);
})->name('blogs.unlike');

Route::get('/git-cheatsheet', function () {
    return view('git-cheatsheet');
})->name('git.cheatsheet');

Route::get('/test-commands', function () {
    $testContent = "This is a test. Let's try git init and git add . then git commit -m 'test'. Also gh repo create.";
    $commands = \App\Models\Command::searchCommands($testContent);
    return response()->json([
        'content' => $testContent,
        'commands_found' => $commands->toArray()
    ]);
});

// Portfolio Route
Route::get('/portfolio', function () {
    try {
        $projects = Project::where('is_featured', true)->orderBy('order')->get();
        
        // Add liked status for each project
        $projects->each(function ($project) {
            $project->hasLiked = session('liked_project_' . $project->id, false);
        });
        
        return view('portfolio', compact('projects'));
    } catch (\Exception $e) {
        dd('Error: ' . $e->getMessage());
    }
})->name('portfolio');

// Project Like Routes
Route::post('/projects/{project}/like', function (Project $project) {
    $sessionKey = 'liked_project_' . $project->id;
    $hasLiked = session($sessionKey, false);
    
    if (!$hasLiked) {
        $project->increment('likes');
        session([$sessionKey => true]);
        $liked = true;
    } else {
        $liked = true; // Already liked
    }
    
    return response()->json([
        'success' => true,
        'likes' => $project->likes,
        'liked' => $liked
    ]);
})->name('projects.like');

Route::post('/projects/{project}/unlike', function (Project $project) {
    $sessionKey = 'liked_project_' . $project->id;
    $hasLiked = session($sessionKey, false);
    
    if ($hasLiked) {
        $project->decrement('likes');
        session()->forget($sessionKey);
        $liked = false;
    } else {
        $liked = false; // Already not liked
    }
    
    return response()->json([
        'success' => true,
        'likes' => $project->likes,
        'liked' => $liked
    ]);
})->name('projects.unlike');

Route::get('/blogs', function () {
    return view('coming-soon');
})->name('blogs');

Route::get('/story', function () {
    return view('coming-soon');
})->name('story');

// Contact Form Route
Route::post('/contact', function (Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required|string|min:2|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string|min:10|max:1000',
    ]);

    try {
        // Save contact form submission to database
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Optional: Send email notification
        // Mail::to('withabdullah88@gmail.com')->send(new ContactFormMail($contact));
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your message has been sent successfully. I\'ll get back to you within 24 hours.'
            ]);
        }

        return redirect()->back()->with('success', 'Thank you! Your message has been sent successfully. I\'ll get back to you within 24 hours.');
        
    } catch (\Exception $e) {
        \Log::error('Contact form submission failed: ' . $e->getMessage());
        
        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error sending your message. Please try again later.'
            ], 500);
        }

        return redirect()->back()->with('error', 'Sorry, there was an error sending your message. Please try again later.');
    }
})->name('contact.send');

// Admin route to view contact submissions (simple implementation)
Route::get('/admin/contacts', function () {
    $contacts = Contact::orderBy('created_at', 'desc')->paginate(20);
    
    return view('admin.contacts', compact('contacts'));
})->name('admin.contacts');

// Mark contact as read
Route::post('/admin/contacts/{contact}/read', function (Contact $contact) {
    $contact->markAsRead();
    
    return response()->json([
        'success' => true,
        'message' => 'Contact marked as read'
    ]);
})->name('admin.contacts.read');