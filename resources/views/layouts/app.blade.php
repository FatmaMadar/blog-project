<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'مدونتي')</title>
    
    
<style>
    

/* ---------- الهيكل العام (من app.blade) ---------- */
body {
    font-family: Arial, sans-serif;
    background: #f9f9f9;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px #ddd;
}

.header {
    background: #3498db;
    color: white;
    padding: 10px;
    text-align: center;
    border-radius: 8px;
}

.footer {
    text-align: center;
    margin-top: 20px;
    color: #888;
}

/* ---------- الحقول والنماذج (create & edit) ---------- */
.form-group {
    margin-bottom: 15px;
}

.form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box; 
}

textarea.form-control {
    resize: vertical; 
}

/* ---------- الأزرار (Buttons) ---------- */
.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    text-align: center;
}

.btn-sm {
    padding: 5px 15px;
    font-size: 13px;
}

/* ألوان الأزرار */
.btn-success {
    background: #28a745;
    color: white;
}

.btn-success:hover {
    background: #218838;
}

.btn-primary {
    background: #007bff;
    color: white;
}

.btn-primary:hover {
    background: #0069d9;
}

.btn-info {
    background: #17a2b8;
    color: white;
}

.btn-info:hover {
    background: #138496;
}

.btn-warning {
    background: #ffc107;
    color: #333;
}

.btn-warning:hover {
    background: #e0a800;
}

.btn-danger {
    background: #dc3545;
    color: white;
}

.btn-danger:hover {
    background: #c82333;
}

.btn-secondary {
    background: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background: #5a6268;
}

.btn-link {
    background: transparent;
    color: #007bff;
    text-decoration: underline;
    padding: 10px 0;
}

/* ---------- رسائل التنبيه ---------- */
.alert {
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
}

.alert-danger {
    background: #f8d7da;
    color: #721c24;
}

/* ---------- صفحة عرض المدونات (Index) ---------- */
.post-item {
    border-bottom: 2px solid #eee;
    padding: 15px 0;
}

.post-title {
    color: #2c3e50;
}

.post-excerpt {
    color: #555;
}

.post-meta {
    color: #999;
    font-size: 14px;
}

.action-buttons {
    margin-top: 10px;
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
}

/* ---------- صفحة العرض الفردي (Show) ---------- */
.post-content-full {
    font-size: 18px;
    line-height: 1.8;
}

.meta-box {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    margin: 20px 0;
}

/* ---------- الترقيم (Pagination) ---------- */
.pagination-wrapper {
    margin-top: 20px;
}
</style>
</head>
<body>
    <div class="container">
        
        <div class="header">
            <h1> مدونتي الخاصة</h1>
        </div>

        @yield('content')

        
    </div>
</body>
</html>