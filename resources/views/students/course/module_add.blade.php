@extends('layouts.master')

@section('title')
    Course
@endsection

@section('script')
    <!-- Load the Monaco Editor -->
    <script src="https://unpkg.com/monaco-editor@latest/min/vs/loader.js"></script>
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Subsection module
        @endslot
        @slot('title')
            Add
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="card-title">{{ $subsection->name }} Course Module preview</h4>
                        <p>{{ $subsection->detail }}</p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">
                                        <h2>Add New Module to Subsection: {{ $subsection->name }}</h2>

                                        <form method="POST" action="{{ route('module.add') }}"
                                            onsubmit="syncEditorContent()">
                                            @csrf

                                            <!-- Hidden input to pass the subsection ID -->
                                            <input type="hidden" name="subsection_id" value="{{ $subsection->id }}">

                                            <!-- Module Name -->
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Module Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name') }}" required>
                                            </div>

                                            <!-- Module Description -->
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <!-- Monaco editor container -->
                                                <div id="monaco-editor" style="height: 400px; border: 1px solid #ccc;">
                                                </div>
                                                <textarea id="description" name="description" style="display:none;">
                                                    {{ old('description', isset($module) ? $module->description : '') }}
                                                </textarea>
                                            </div>

                                            <!-- Video URL -->
                                            <div class="mb-3">
                                                <label for="video_url" class="form-label">Video URL</label>
                                                <input type="url" class="form-control" id="video_url" name="video_url"
                                                    value="{{ old('video_url') }}" required>
                                            </div>

                                            <!-- Order -->
                                            <div class="mb-3">
                                                <label for="order" class="form-label">Order</label>
                                                <input type="number" class="form-control" id="order" name="order"
                                                    value="{{ old('order') }}" required>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Add Module</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Initialize Monaco Editor
        var editor;
        require.config({
            paths: {
                'vs': 'https://unpkg.com/monaco-editor@latest/min/vs'
            }
        });
        require(['vs/editor/editor.main'], function() {
            editor = monaco.editor.create(document.getElementById('monaco-editor'), {
                value: `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo course Fundamentals</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 p-6 flex justify-center items-center min-h-screen">
    <div class="max-w-3xl w-full bg-white rounded-lg overflow-hidden">
        <!-- Header -->
        <div class="text-center p-6">
            <h1 class="text-2xl font-bold">Demo course Fundamentals</h1>
            <p class="mt-1 text-base">Explore the essentials of Demo course for modern web development.</p>
        </div>
        <!-- Content -->
        <div class="p-6 space-y-6">
            <!-- Introduction -->
            <div class="p-4 rounded-lg bg-gray-50">
                <p class="text-sm mb-4">
                    Welcome to the <strong class="font-semibold">Demo course Fundamentals</strong> module! In this section, you'll explore the basics of Demo course, which is essential for creating dynamic web applications.
                </p>
            </div>
            <!-- Key Topics -->
            <div class="p-4 rounded-lg bg-gray-50">
                <p class="text-base font-semibold mb-2">
                    Key Topics Covered:
                </p>
                <ul class="list-disc list-inside space-y-2 text-sm">
                    <li><strong>Variables and Data Types:</strong> Learn how to declare variables and understand different data types in Demo course.</li>
                    <li><strong>Functions and Scope:</strong> Understand how functions work and the concept of scope within Demo course.</li>
                    <li><strong>Loops and Conditions:</strong> Dive into control structures like loops and conditional statements.</li>
                    <li><strong>DOM Manipulation:</strong> Gain practical experience with manipulating the Document Object Model (DOM) to create interactive web pages.</li>
                </ul>
            </div>
            <!-- Practice Reminder -->
            <div class="p-4 rounded-lg bg-gray-50">
                <p class="text-sm">
                    Remember to <em class="italic">practice</em> writing <code class="bg-gray-200 px-1 rounded">Demo course</code> code as you progress through the lessons.
                </p>
            </div>
        </div>
    </div>
</body>
</html>`,
                language: 'html',
                theme: 'vs-dark',
                automaticLayout: true
            });
        });

        // Sync Monaco Editor content with hidden textarea
        function syncEditorContent() {
            var descriptionField = document.getElementById('description');
            descriptionField.value = editor.getValue();
        }
    </script>
@endsection
