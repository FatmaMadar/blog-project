@extends('layouts.app')

@section('title', 'تعديل المدونة')

@section('content')
    <h2> تعديل المدونة: {{ $blog->title }}</h2>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">العنوان:</label><br>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
        </div>

        <div class="form-group">
            <label for="content">المحتوى:</label><br>
            <textarea name="content" id="content" rows="6" class="form-control" required>{{ old('content', $blog->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success"> تحديث المدونة</button>
        <a href="{{ route('blogs.index') }}" class="btn-link">إلغاء</a>
    </form>
@endsection