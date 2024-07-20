@extends('layouts.master')

@section('title')
    Blog
@endsection
@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
            Blogs
        @endslot
        @slot('title')
            Edit
        @endslot
    @endcomponent


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit the blog </h4>

                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title', $blog->title) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Content</label>
                                    <textarea class="form-control" name="content" id="content" class="form-control" rows="5">{{ old('content', $blog->content) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-password-input" class="form-label">Excerpt</label>
                                            <input type="text" name="excerpt" id="excerpt" class="form-control"
                                                value="{{ old('excerpt', $blog->excerpt) }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        @if ($blog->featured_image)
                                                            <img class="rounded avatar-sm"
                                                                src=" {{asset('blog_images/' . $blog->featured_image) }}"
                                                                alt="Featured Image" width="100">
                                                        @endif
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <input type="file" name="featured_image" id="featured_image"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <label for="formrow-password-input" class="form-label">Image</label>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-password-input" class="form-label">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="draft"
                                                        {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>
                                                        Draft
                                                    </option>
                                                    <option value="published"
                                                        {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>
                                                        Published
                                                    </option>
                                                    <option value="pending"
                                                        {{ old('status', $blog->status) == 'pending' ? 'selected' : '' }}>
                                                        Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="published_at" class="form-label">Publication Date</label>
                                                <input type="date" name="published_at" id="published_at"
                                                    class="form-control"
                                                    value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d') : '') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control"
                                            value="{{ old('slug', $blog->slug) }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="seo_title" class="form-label">SEO Title</label>
                                        <input type="text" name="seo_title" id="seo_title" class="form-control"
                                            value="{{ old('seo_title', $blog->seo_title) }}">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <input type="text" name="meta_description" id="meta_description"
                                            class="form-control"
                                            value="{{ old('meta_description', $blog->meta_description) }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Your form fields for updating -->
                            <div>
                                <button type="submit" class="btn btn-success w-md">Submit</button>
                    </form><a href="{{ route('blogs.index') }}" class="btn btn-warning">Back</a>
                    <span>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="mt-3"
                            id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete
                                Blog</button>
                        </form>
                    </span>
                </div>
            </div>
        </div>
        <!-- end card body -->
    </div>
    <!-- end card -->
    </div>
    </div>

    <!-- resources/views/blogs/edit.blade.php -->

    {{-- <div class="container">
        <h1>Edit Blog Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title', $blog->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $blog->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="excerpt" class="form-label">Excerpt</label>
                <input type="text" name="excerpt" id="excerpt" class="form-control"
                    value="{{ old('excerpt', $blog->excerpt) }}">
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control"
                    value="{{ old('slug', $blog->slug) }}" required>
            </div>

            <div class="mb-3">
                <label for="featured_image" class="form-label">Featured Image</label>
                @if ($blog->featured_image)
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="Featured Image" width="100"
                        class="mb-2">
                @endif
                <input type="file" name="featured_image" id="featured_image" class="form-control">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="draft" {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>
                        Publish1ed</option>
                    <option value="pending" {{ old('status', $blog->status) == 'pending' ? 'selected' : '' }}>Pending
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="published_at" class="form-label">Publication Date</label>
                <input type="date" name="published_at" id="published_at" class="form-control"
                    value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d') : '') }}">
            </div>

            <div class="mb-3">
                <label for="seo_title" class="form-label">SEO Title</label>
                <input type="text" name="seo_title" id="seo_title" class="form-control"
                    value="{{ old('seo_title', $blog->seo_title) }}">
            </div>

            <div class="mb-3">
                <label for="meta_description" class="form-label">Meta Description</label>
                <input type="text" name="meta_description" id="meta_description" class="form-control"
                    value="{{ old('meta_description', $blog->meta_description) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Blog Post</button>
        </form>
        <!-- Delete Form -->
        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="mt-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this blog post?')">Delete Blog Post</button>
        </form>

    </div> --}}


    <script>
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this blog post?')) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>

@endsection
