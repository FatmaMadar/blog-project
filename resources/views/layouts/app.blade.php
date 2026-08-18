<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                margin: 0;
                background: #f3f4f6;
                font-family: Arial, sans-serif;
            }

            main {
                display: block;
                width: 100%;
            }

            .blog-page {
                max-width: 1200px;
                margin: 24px auto;
                padding: 0 20px;
                box-sizing: border-box;
            }

            .blog-form-card {
                background: #ffffff;
                border: 1px solid #dfe3e8;
                border-radius: 12px;
                box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
                padding: 24px 20px;
                max-width: 980px;
                margin: 0 auto;
            }

            .blog-form-card h2 {
                margin: 0 0 20px;
                color: #2c3e50;
                font-size: 28px;
            }

            .blog-show-card {
                background: #ffffff;
                border: 1px solid #dfe3e8;
                border-radius: 12px;
                box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
                padding: 24px 20px;
                max-width: 980px;
                margin: 0 auto;
            }

            .blog-show-card h2 {
                margin: 0 0 20px;
                color: #2c3e50;
                font-size: 28px;
            }

            .blog-show-content {
                color: #2c3e50;
                font-size: 18px;
                line-height: 1.8;
                margin: 0 0 24px;
            }

            .meta-box {
                background: #f8f9fa;
                border: 1px solid #e5e7eb;
                border-radius: 10px;
                padding: 18px 20px;
                margin: 20px 0;
            }

            .meta-box p {
                margin: 10px 0;
                color: #374151;
            }

            .blog-form {
                width: 100%;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .blog-form label {
                display: block;
                margin-bottom: 8px;
                font-weight: 700;
                color: #2c3e50;
            }

            .form-control {
                width: 100%;
                padding: 10px 12px;
                border-radius: 8px;
                border: 1px solid #d1d5db;
                background: white;
                box-sizing: border-box;
                font-size: 16px;
            }

            textarea.form-control {
                resize: vertical;
                min-height: 160px;
            }

            .blog-form-actions {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-top: 24px;
            }

            .btn {
                display: inline-block;
                padding: 10px 20px;
                border: none;
                border-radius: 6px;
                cursor: pointer;
                text-decoration: none;
                font-size: 14px;
                text-align: center;
                transition: all 0.2s ease;
            }

            .btn-sm {
                padding: 6px 14px;
                font-size: 13px;
            }

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
                display: inline-block;
                padding: 10px 0;
                color: #007bff;
                text-decoration: underline;
            }

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

            .pagination-wrapper {
                margin-top: 20px;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                @if (isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </main>
        </div>
    </body>
</html>
