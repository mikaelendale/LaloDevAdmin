@extends('layouts.master')

@section('title')
    Blog
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Blogs
        @endslot
        @slot('title')
            All
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Create New Blog Post</a>
                    <h4 class="card-title">Avaliable Blog posts</h4>
                    </p>

                    <div class="table-responsive">
                        @if ($blogs->isEmpty())
                            <p>No blog posts found.</p>
                        @else
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Excerpt</th>
                                        <th>Status</th>
                                        <th>Publication Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->excerpt }}</td>
                                            @if ($blog->status == 'published')
                                                <td data-field="status">
                                                    <button disabled type="button" class="btn btn-success"
                                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                        {{ ucfirst($blog->status) }}
                                                    </button>
                                                </td>
                                            @elseif ($blog->status == 'pending')
                                                <td data-field="status">
                                                    <button disabled type="button" class="btn btn-warning"
                                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                        {{ ucfirst($blog->status) }}
                                                    </button>
                                                </td>
                                            @elseif ($blog->status == 'draft')
                                                <td data-field="status">
                                                    <button disabled type="button" class="btn btn-secondary"
                                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                        {{ ucfirst($blog->status) }}
                                                    </button>
                                                </td>
                                            @endif
                                            <td>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'N/A' }}
                                            </td>
                                            <td>
                                                @if ($blog->featured_image)
                                                    <img src="{{ asset('blog_images/' . $blog->featured_image) }}"
                                                        alt="Featured Image" width="100">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('blogs.edit', $blog->id) }}"
                                                    class="btn btn-secondary btn-sm">Edit</a>
                                                    <a href="{{ route('blogs.detail', $blog->id) }}"
                                                    class="btn btn-ptimary btn-sm">Detail</a>
                                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection
