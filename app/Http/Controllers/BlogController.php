<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
  
    public function index()
    {
        $blogs = Blog::with('user')->simplePaginate(2);

        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
        ]);

        $data['user_id'] = auth()->id();

        Blog::create($data);

        return redirect()->route('blogs.index')->with('success', 'تم إضافة المدونة بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog->load('user');

        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
{
    $blog = Blog::findOrFail($id);
    return view('blogs.edit', compact('blog'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $data = $request->validate([
        'title' => 'required|min:3',
        'content' => 'required',
    ]);

    $blog = Blog::findOrFail($id);
    $blog->update($data);

    return redirect()->route('blogs.index')->with('success', 'تم تحديث المدونة بنجاح!');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $blog = Blog::findOrFail($id);
    $blog->delete();

    return redirect()->route('blogs.index')->with('success', 'تم حذف المدونة بنجاح!');
}
}
