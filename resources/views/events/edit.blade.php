@extends('layouts.master')

@section('title')
    Events
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Events
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
                    <h4 class="card-title mb-4">Edit the events </h4>

                    <form action="{{ route('events.update', $events->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title', $events->title) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Content</label>
                                    <textarea class="form-control" name="content" id="content" class="form-control" rows="5">{{ old('content', $events->content) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-password-input" class="form-label">Excerpt</label>
                                            <input type="text" name="excerpt" id="excerpt" class="form-control"
                                                value="{{ old('excerpt', $events->excerpt) }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        @if ($events->featured_image)
                                                            <img class="rounded avatar-sm"
                                                                src=" {{ asset('event_images/' . $events->featured_image) }}"
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
                                                        {{ old('status', $events->status) == 'draft' ? 'selected' : '' }}>
                                                        Draft
                                                    </option>
                                                    <option value="published"
                                                        {{ old('status', $events->status) == 'published' ? 'selected' : '' }}>
                                                        Published
                                                    </option>
                                                    <option value="pending"
                                                        {{ old('status', $events->status) == 'pending' ? 'selected' : '' }}>
                                                        Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="published_at" class="form-label">Publication Date</label>
                                                <input type="date" name="published_at" id="published_at"
                                                    class="form-control"
                                                    value="{{ old('published_at', $events->published_at ? $events->published_at->format('Y-m-d') : '') }}">
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
                                            value="{{ old('slug', $events->slug) }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="seo_title" class="form-label">SEO Title</label>
                                        <input type="text" name="seo_title" id="seo_title" class="form-control"
                                            value="{{ old('seo_title', $events->seo_title) }}">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <input type="text" name="meta_description" id="meta_description"
                                            class="form-control"
                                            value="{{ old('meta_description', $events->meta_description) }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Your form fields for updating -->
                            <div>
                                <button type="submit" class="btn btn-success w-md">Submit</button>
                    </form><a href="{{ route('events.index') }}" class="btn btn-warning">Back</a>
                    <span>
                        <form action="{{ route('events.destroy', $events->id) }}" method="POST" class="mt-3"
                            id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete
                                event</button>
                        </form>
                    </span>
                </div>
            </div>
        </div>
        <!-- end card body -->
    </div>
    <script>
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this blog post?')) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
@endsection
