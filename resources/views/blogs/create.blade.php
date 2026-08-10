@extends('layouts.app')

@section('title', 'إضافة مدونة جديدة')

@section('content')
    <h2> إضافة مدونة جديدة</h2>

    <form action="{{ route('blogs.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">العنوان:</label><br>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">المحتوى:</label><br>
            <textarea name="content" id="content" rows="6" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success"> حفظ المدونة</button>
        <a href="{{ route('blogs.index') }}" class="btn-link">إلغاء</a>
    </form>
@endsection