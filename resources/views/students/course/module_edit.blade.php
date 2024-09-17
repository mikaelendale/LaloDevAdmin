@extends('layouts.master')

@section('title')
    course
@endsection
@section('script')
    <script src="https://unpkg.com/monaco-editor@latest/min/vs/loader.js"></script>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Subsection
        @endslot
        @slot('title')
            Edit
        @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <h4 class="card-title">{{ $subsection->name }} - Add/Update Module</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Fill the Form</h4>

                                    <!-- Ensure the form submits to the correct route -->
                                    <form method="POST" action="{{ route('module.store', $subsection->id) }}">
                                        @csrf
                                        @method('PUT') <!-- Use PUT for updating module -->

                                        <!-- Pass the module ID if it's an existing module (hidden input) -->
                                        @if (isset($module))
                                            <input type="hidden" name="module_id" value="{{ $module->id }}">
                                        @endif

                                        <!-- Name Field -->
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Module Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name', isset($module) ? $module->name : '') }}"
                                                placeholder="Enter Module Name" required>
                                        </div>

                                        <!-- Description Field -->
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <!-- Monaco editor container, ensure you sync this with the textarea -->
                                            <div id="monaco-editor" style="height: 400px;"></div>
                                            <textarea id="description" name="description" style="display:none;">
                                {{ old('description', isset($module) ? $module->description : '') }}
                            </textarea>
                                        </div>

                                        <!-- Video URL Field -->
                                        <div class="mb-3">
                                            <label for="video_url" class="form-label">Video URL</label>
                                            <input type="text" class="form-control" id="video_url" name="video_url"
                                                value="{{ old('video_url', isset($module) ? $module->video_url : '') }}"
                                                placeholder="Enter Video URL" required>
                                        </div>

                                        <!-- Order Field -->
                                        <div class="mb-3">
                                            <label for="order" class="form-label">Order</label>
                                            <input type="number" class="form-control" id="order" name="order"
                                                value="{{ old('order', isset($module) ? $module->order : '') }}"
                                                placeholder="Enter Module Order" required>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary w-md">
                                                {{ isset($module) ? 'Update Module' : 'Add Module' }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        require.config({
            paths: {
                'vs': 'https://unpkg.com/monaco-editor@latest/min/vs'
            }
        });
        require(['vs/editor/editor.main'], function() {
            // Initialize Monaco Editor for description
            var descriptionEditor = monaco.editor.create(document.getElementById('monaco-editor'), {
                value: document.getElementById('description').value,
                language: 'markdown', // Adjust the language as needed
                theme: 'vs-dark', // You can choose different themes
                automaticLayout: true
            });

            // Update hidden textarea with editor content
            descriptionEditor.onDidChangeModelContent(function() {
                document.getElementById('description').value = descriptionEditor.getValue();
            });

            // Initialize Monaco Editor for code
            var codeEditor = monaco.editor.create(document.getElementById('monaco-editor-code'), {
                value: document.getElementById('code').value,
                language: 'javascript', // Adjust the language as needed
                theme: 'vs-dark', // You can choose different themes
                automaticLayout: true
            });

            // Update hidden textarea with editor content
            codeEditor.onDidChangeModelContent(function() {
                document.getElementById('code').value = codeEditor.getValue();
            });
        });
    </script>
@endsection
