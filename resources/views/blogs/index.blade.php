{{-- نستخدم مكون Breeze الرئيسي بدلاً من @extends --}}
<x-app-layout>
  
    {{-- نملأ فتحة "header" عشان تظهر كعنوان للصفحة --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('جميع المدونات') }}
        </h2>
    </x-slot>

    {{-- هذا هو السلة (Slot) الرئيسي، كل المحتوى هنا يظهر في منتصف الصفحة --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- كل الستايلات هنا تعتمد على الكلاسات الي حطيتيها في app.blade.php --}}
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold"> جميع المدونات</h2>
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">➕ إضافة مدونة جديدة</a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @forelse ($blogs as $blog)
                        <div class="post-item">
                            <h3 class="post-title">{{ $blog->title }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                                بواسطة: {{ $blog->user?->name ?? 'Unknown User' }}
                            </p>
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

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
