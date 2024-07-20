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
        @foreach ($blogs as $blog)
            <div class="col-md-6 col-xl-3">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mt-0">{{ $blog->title }}</h4>
                        <h6 class="card-subtitle font-14 text-muted">
                            {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'N/A' }}</h6>
                    </div>
                    @if ($blog->featured_image)
                        <img class="img-fluid" src="{{ asset('blog_images/' . $blog->featured_image) }}" alt="Card image cap">
                    @else
                        N/A
                    @endif
                    <div class="card-body">
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 200, '...') }}</p>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="card-link">Edit</a>
                        <a href="{{ route('blogs.detail', $blog->id) }}" class="card-link">Detail</a>
                    </div>
                </div>

            </div>
        @endforeach

    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection
