<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CategoryBlog; // Ganti dari Category ke CategoryBlog
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with(['category', 'tags'])
                    ->published()
                    ->latest()
                    ->paginate(6);

        $categories = CategoryBlog::withCount('blogs')->get(); // Ganti dari Category ke CategoryBlog
        $popularTags = Tag::withCount('blogs')->orderBy('blogs_count', 'desc')->limit(10)->get();

        return view('blog', compact('blogs', 'categories', 'popularTags'));
    }

    public function show($slug)
    {
        $blog = Blog::with(['category', 'tags', 'comments'])
                   ->where('slug', $slug)
                   ->published()
                   ->firstOrFail();

        // Related posts berdasarkan tags
        $relatedBlogs = $blog->getRelatedPosts(3);

        // Recent posts untuk sidebar
        $recentBlogs = Blog::with('category')
                          ->published()
                          ->latest()
                          ->take(5)
                          ->get();

        // Categories untuk sidebar
        $categories = CategoryBlog::withCount('blogs')->get(); // Ganti dari Category ke CategoryBlog

        // Popular tags untuk sidebar
        $popularTags = Tag::withCount('blogs')
                         ->orderBy('blogs_count', 'desc')
                         ->limit(10)
                         ->get();

        $comments = $blog->comments()->orderBy('created_at', 'desc')->get();

        return view('blog_detail', compact(
            'blog', 
            'relatedBlogs', 
            'recentBlogs', 
            'categories', 
            'popularTags', 
            'comments'
        ));
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'komentar' => 'required|string',
            'blog_id' => 'required|exists:blogs,id',
            'origin' => 'sometimes|string'
        ]);

        Comment::create([
            'blog_id' => $request->blog_id,
            'nama' => $request->nama,
            'komentar' => $request->komentar,
            'origin' => $request->origin ?? 'blog'
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    // Method untuk filter by category
    public function byCategory($slug)
    {
        $category = CategoryBlog::where('slug', $slug)->firstOrFail(); // Ganti dari Category ke CategoryBlog
        
        $blogs = Blog::with(['category', 'tags'])
                    ->where('category_id', $category->id)
                    ->published()
                    ->latest()
                    ->paginate(6);

        $categories = CategoryBlog::withCount('blogs')->get(); // Ganti dari Category ke CategoryBlog
        $popularTags = Tag::withCount('blogs')->orderBy('blogs_count', 'desc')->limit(10)->get();

        return view('blog', compact('blogs', 'categories', 'popularTags', 'category'));
    }

    // Method untuk filter by tag
    public function byTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        
        $blogs = $tag->blogs()
                    ->with(['category', 'tags'])
                    ->published()
                    ->latest()
                    ->paginate(6);

        $categories = CategoryBlog::withCount('blogs')->get(); // Ganti dari Category ke CategoryBlog
        $popularTags = Tag::withCount('blogs')->orderBy('blogs_count', 'desc')->limit(10)->get();

        return view('blog', compact('blogs', 'categories', 'popularTags', 'tag'));
    }
}