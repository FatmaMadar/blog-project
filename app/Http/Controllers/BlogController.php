<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index()
    {
        
          $blogs = Blog::simplepaginate(2); 
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
            'content' => 'required|min:10',
        ]);

        Blog::create($data);

        return redirect()->route('blogs.index')->with('success', 'تم إضافة المدونة بنجاح!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
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
        'content' => 'required|min:10',
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
