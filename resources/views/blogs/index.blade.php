
@extends('layouts.app')

@section('title', 'قائمة المدونات')

@section('content')
    <h2> جميع المدونات</h2>

    <a href="{{ route('blogs.create') }}" class="btn btn-primary">إضافة مدونة جديدة</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($blogs as $blog)
        <div class="post-item">
            <h3 class="post-title">{{ $blog->title }}</h3>
            <p class="post-excerpt">{{ Str::limit($blog->content, 100) }}</p>
            
            <small class="post-meta">
                 تاريخ الإضافة: {{ $blog->created_at->format('Y-m-d H:i') }}
                @if($blog->created_at != $blog->updated_at)
                    |  آخر تعديل: {{ $blog->updated_at->format('Y-m-d H:i') }}
                @endif
            </small>

            <div class="action-buttons">
                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info btn-sm">عرض</a>
                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                
                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذه المدونة؟')">حذف</button>
                </form>
            </div>
        </div>
    @empty
        <div class="alert alert-danger">
             عذراً، لا توجد أي مدونات مضافة حالياً.
        </div>
    @endforelse

    <div class="pagination-wrapper">
        {{ $blogs->links() }}
    </div>

@endsection