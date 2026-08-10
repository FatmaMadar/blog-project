@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <h2>{{ $blog->title }}</h2>
    <p class="post-content-full">{{ $blog->content }}</p>

    <div class="meta-box">
        <p><strong> تاريخ الإضافة:</strong> {{ $blog->created_at->format('Y-m-d H:i:s') }}</p>
        @if($blog->created_at != $blog->updated_at)
            <p><strong> آخر تحديث:</strong> {{ $blog->updated_at->format('Y-m-d H:i:s') }}</p>
        @endif
    </div>

    <a href="{{ route('blogs.index') }}" class="btn btn-secondary"> العودة للقائمة</a>
@endsection