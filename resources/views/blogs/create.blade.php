@extends('layouts.app')

@section('title', 'إضافة مدونة جديدة')

@section('content')
    <div class="blog-page">
        <div class="blog-form-card">
            <h2>إضافة مدونة جديدة</h2>

            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('blogs.store') }}" method="POST" class="blog-form">
                @csrf

                <div class="form-group">
                    <label for="title">العنوان:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label for="content">المحتوى:</label>
                    <textarea name="content" id="content" rows="6" class="form-control" required>{{ old('content') }}</textarea>
                </div>

                <div class="blog-form-actions">
                    <button type="submit" class="btn btn-success">حفظ المدونة</button>
                    <a href="{{ route('blogs.index') }}" class="btn-link">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection