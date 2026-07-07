<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        // $categories = BlogPost::published()
        //     ->whereNotNull('category')
        //     ->distinct()
        //     ->pluck('category');

        $categories = BlogPost::published()
            ->whereNotNull('category')
            ->pluck('category')
            ->flatten()
            ->filter()
            ->unique()
            ->values();

        // $categoryCounts = BlogPost::published()
        //     ->whereNotNull('category')
        //     ->groupBy('category')
        //     ->selectRaw('category, count(*) as total')
        //     ->pluck('total', 'category');

        // Fix: category counts manual karena gabisa groupBy array
        $categoryCounts = $categories->mapWithKeys(function ($cat) {
            $count = BlogPost::published()
                ->whereJsonContains('category', $cat)
                ->count();
            return [$cat => $count];
        });

        $recentPosts = BlogPost::published()
            ->latest('published_at')
            ->take(5)
            ->get();

        $allTags = BlogPost::published()
            ->whereNotNull('tags')
            ->pluck('tags')
            ->flatMap(fn($t) => array_map('trim', explode(',', $t)))
            ->unique()
            ->values();

        return view('pages.blog', compact('posts', 'categories', 'categoryCounts', 'recentPosts', 'allTags'));
    }

    public function show($slug)
    {
        $post = BlogPost::published()->where('slug', $slug)->firstOrFail();
        $post->incrementViews();

        // ✅ Tambahan comments
        $comments = $post->approvedComments()->latest()->get();

        $comments = $post->approvedComments()
            ->whereNull('parent_id')
            ->with('replies')
            ->latest()
            ->get();

        // $related = BlogPost::published()
        //     ->where('id', '!=', $post->id)
        //     ->where('category', $post->category)
        //     ->latest('published_at')
        //     ->take(3)
        //     ->get();

        // Fix: related posts pakai whereJsonContains
        $related = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->where(function ($query) use ($post) {
                $categories = is_array($post->category) ? $post->category : [$post->category];
                foreach ($categories as $cat) {
                    $query->orWhereJsonContains('category', $cat);
                }
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        $recentPosts = BlogPost::published()
            ->latest('published_at')
            ->take(5)
            ->get();

        $allTags = BlogPost::published()
            ->whereNotNull('tags')
            ->pluck('tags')
            ->flatMap(fn($t) => array_map('trim', explode(',', $t)))
            ->unique()
            ->values();

        return view('pages.blog-detail', compact('post', 'comments', 'related', 'recentPosts', 'allTags'));
    }

    // ✅ Method baru untuk simpan komentar
    public function storeComment(Request $request, $slug)
    {
        $post = BlogPost::published()->where('slug', $slug)->firstOrFail();

        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'nullable|email|max:100',
            'message' => 'required|string|min:5|max:1000',
            'parent_id' => 'nullable|exists:blog_comments,id',
        ]);

        BlogComment::create([
            'blog_post_id' => $post->id,
            'parent_id'    => $request->parent_id,
            'name'         => $request->name,
            'email'        => $request->email,
            'message'      => $request->message,
            'status'       => 'pending',
        ]);

        return back()->with('comment_success', 'Komentar Anda sedang menunggu moderasi.');
    }
}
