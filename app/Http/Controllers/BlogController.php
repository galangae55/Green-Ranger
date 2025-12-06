<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CategoryBlog;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Query dasar
        $query = Blog::with(['category', 'tags'])
                    ->published();
        
        // SEARCH FUNCTIONALITY
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('excerpt', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');
            });
        }
        
        // FILTER BY CATEGORY
        if ($request->has('category') && !empty($request->category)) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        
        // FILTER BY TAG
        if ($request->has('tag') && !empty($request->tag)) {
            $query->whereHas('tags', function($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }
        
        // SORTING FUNCTIONALITY
        $sort = $request->get('sort', 'terbaru');
        
        switch ($sort) {
            case 'terlama':
                $query->orderBy('created_at', 'asc');
                break;
            case 'a-z':
                $query->orderBy('title', 'asc');
                break;
            case 'z-a':
                $query->orderBy('title', 'desc');
                break;
            case 'terbaru':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        
        // Pagination
        $blogs = $query->paginate(6);
        
        // Data untuk filter sidebar
        $categories = CategoryBlog::withCount(['blogs' => function($query) {
            $query->published();
        }])->get();
        
        $tags = Tag::withCount(['blogs' => function($query) {
            $query->published();
        }])->orderBy('blogs_count', 'desc')->get();
        
        // Recent posts untuk sidebar
        $recentBlogs = Blog::with('category')
                          ->published()
                          ->orderBy('created_at', 'desc')
                          ->take(5)
                          ->get();
        
        // Pastikan semua variabel yang diperlukan dikirim ke view
        return view('blog', compact(
            'blogs', 
            'categories', 
            'tags', 
            'recentBlogs', 
            'sort'
        ));
    }

    public function show($slug)
    {
        $blog = Blog::with(['category', 'tags', 'comments'])
                   ->where('slug', $slug)
                   ->where('is_published', true)
                   ->firstOrFail();
        
        
        // Related posts berdasarkan tags
        $relatedBlogs = $blog->getRelatedPosts(4);
        
        // Data untuk sidebar
        $recentBlogs = Blog::with('category')
                          ->where('is_published', true)
                          ->where('id', '!=', $blog->id)
                          ->orderBy('created_at', 'desc')
                          ->take(5)
                          ->get();
        
        $categories = CategoryBlog::withCount(['blogs' => function($query) {
            $query->where('is_published', true);
        }])->get();
        
        $tags = Tag::withCount(['blogs' => function($query) {
            $query->where('is_published', true);
        }])->orderBy('blogs_count', 'desc')->get();
        
        return view('blog_detail', compact(
            'blog', 
            'relatedBlogs', 
            'recentBlogs', 
            'categories', 
            'tags'
        ));
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'komentar' => 'required|string|min:3|max:1000',
            'blog_id' => 'required|exists:blogs,id',
        ]);
        
        Comment::create([
            'blog_id' => $request->blog_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'komentar' => $request->komentar,
            'is_approved' => true,
            'origin' => 'blog'
        ]);
        
        return back()->with('success', 'Komentar berhasil ditambahkan! Menunggu persetujuan admin.');
    }
    public function category($slug)
    {
        $category = CategoryBlog::where('slug', $slug)->firstOrFail();
        $blogs = Blog::with(['category', 'tags'])
                    ->where('category_id', $category->id)
                    ->where('is_published', true)
                    ->orderBy('created_at', 'desc')
                    ->paginate(6);
        
        $categories = CategoryBlog::withCount(['blogs' => function($query) {
            $query->where('is_published', true);
        }])->get();
        
        $tags = Tag::withCount(['blogs' => function($query) {
            $query->where('is_published', true);
        }])->orderBy('blogs_count', 'desc')->get();
        
        $recentBlogs = Blog::with('category')
                          ->where('is_published', true)
                          ->orderBy('created_at', 'desc')
                          ->take(5)
                          ->get();
        
        return view('blog', compact(
            'blogs', 
            'categories', 
            'tags', 
            'recentBlogs',
            'category'
        ));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $blogs = $tag->blogs()
                    ->with(['category', 'tags'])
                    ->where('is_published', true)
                    ->orderBy('created_at', 'desc')
                    ->paginate(6);
        
        $categories = CategoryBlog::withCount(['blogs' => function($query) {
            $query->where('is_published', true);
        }])->get();
        
        $tags = Tag::withCount(['blogs' => function($query) {
            $query->where('is_published', true);
        }])->orderBy('blogs_count', 'desc')->get();
        
        $recentBlogs = Blog::with('category')
                          ->where('is_published', true)
                          ->orderBy('created_at', 'desc')
                          ->take(5)
                          ->get();
        
        return view('blog', compact(
            'blogs', 
            'categories', 
            'tags', 
            'recentBlogs',
            'tag'
        ));
    }
}