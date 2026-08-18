@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <div class="blog-page">
        <div class="blog-show-card">
            <h2>{{ $blog->title }}</h2>
            <p class="text-sm text-gray-600 mb-3">
                <strong>الكاتب:</strong> {{ $blog->user?->name ?? 'Unknown User' }}
            </p>
            <p class="blog-show-content">{{ $blog->content }}</p>

            <div class="meta-box">
                <p><strong>تاريخ الإضافة:</strong> {{ $blog->created_at->format('Y-m-d H:i:s') }}</p>
                @if($blog->created_at != $blog->updated_at)
                    <p><strong>آخر تحديث:</strong> {{ $blog->updated_at->format('Y-m-d H:i:s') }}</p>
                @endif
            </div>

            <div class="blog-form-actions">
                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">العودة للقائمة</a>
            </div>
        </div>
    </div>
@endsection