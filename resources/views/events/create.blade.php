@extends('layouts.master')

@section('title')
    Events
@endsection
@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
            Events
        @endslot
        @slot('title')
            Add
        @endslot
    @endcomponent
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Fill out the form</h4>
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="title"
                                                    placeholder="Enter the title" name="title" value="{{ old('title') }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="formrow-inputZip" class="form-label">Publication Date</label>
                                                <input type="datetime-local" class="form-control" id="published_at"
                                                    name="published_at" value="{{ old('published_at') }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-email-input" class="form-label">Content</label>
                                                <textarea class="form-control" id="content" name="content" rows="6" required>{{ old('content') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-password-input" class="form-label">Excerpt</label>
                                                <textarea class="form-control" id="excerpt" name="excerpt" rows="2" required>{{ old('excerpt') }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-inputZip" class="form-label">Meta Description</label>

                                                <textarea required class="form-control" id="meta_description" name="meta_description" rows="1">{{ old('meta_description') }}</textarea>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="formrow-inputState" class="form-label">State</label>
                                                <select id="" name="status" required class="form-select" required>
                                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>
                                                        Draft
                                                    </option>
                                                    <option value="published" {{ old('status') == 'published' ?: '' }}>
                                                        Published</option>
                                                    <option value="pending" {{ old('status') == 'pending' ?: '' }}>Pending
                                                    </option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="formrow-inputZip" class="form-label">SEO Title</label>
                                                <input required type="text" class="form-control" id="seo_title"
                                                    name="seo_title" value="{{ old('seo_title') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="formrow-inputCity" class="form-label">Slug</label>
                                                <input required type="text" class="form-control" id="slug"
                                                    name="slug" value="{{ old('slug') }}" required
                                                    placeholder="Input the slug">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="featured_image" class="form-label">Featured Image</label>
                                        <input  class="form-control" type="file" id="featured_image"
                                            name="featured_image">
                                    </div> 
                                </div>
                            </div>
                            <div>
                                <button type="submit"
                                    class="btn btn-outline-success waves-effect btn-label waves-light"><i
                                        class="bx bx-check-double label-icon"></i>Create the blogpost</button>
                                <a href="/blogs/index"><button type="button"
                                        class="btn btn-outline-danger waves-effect btn-label waves-light"><i
                                            class="bx bx-trash label-icon"></i> Cancel</button></a>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </form>
        <!-- end card body -->
    </div>
    <!-- end card -->
    </div>
    </div> 

@endsection
@section('script')
    <!-- apexcharts -->
    <!-- Plugins js -->
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>

    <!-- Form file upload init js -->
    <script src="{{ URL::asset('build/js/pages/form-file-upload.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection
