@extends('layouts.master')

@section('title')
    Courses
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            courses
        @endslot
        @slot('title')
            Manage
        @endslot
    @endcomponent
    <div class="row" id="candidate-list">
        <div class="row mb-3">
            <div class="col-xl-4 col-sm-6">

            </div>
            <div class="col-lg-8 col-sm-6">
                <form class="mt-4 mt-sm-0 float-sm-end d-sm-flex align-items-center">

                    <ul class="nav nav-pills product-view-nav justify-content-end mt-3 mt-sm-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('courses.create')}}"><i
                                    class="bx bx-plus align-middle"></i></a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        @foreach ($courses as $course)
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-start mb-3">
                            <div class="flex-grow-1"><span class="badge badge-soft-success">{{ $course->category }}</span>
                            </div> 
                        </div>
                        <div class="text-center mb-3"> <img src="{{$course->image}}" alt=""
                                class="avatar-sm rounded">
                            <h6 class="font-size-15 mt-3 mb-1">{{ $course->name }}</h6>
                            <p class="mb-0 text-muted">{{ $course->level }}</p>
                        </div>
                        <div class="d-flex mb-3 justify-content-center gap-2 text-muted">
                            <div> {{ $course->status }} </div>
                        </div>
                        <div class="hstack gap-2 justify-content-center">
                            @foreach ($course->subsections as $subsection)
                                <span class="badge badge-soft-secondary">{{ $subsection->name }}</span>
                            @endforeach
                        </div>
                        <div class="mt-4 pt-1">
                            <a href="{{route('courses.edit', $course->id)}}" class="btn btn-soft-primary d-block">Edit course</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12">
            <ul class="pagination pagination-rounded justify-content-center mt-2 mb-5">
                <!-- Previous Page Link -->
                @if ($courses->onFirstPage())
                    <li class="page-item disabled">
                        <a href="javascript:void(0);" class="page-link">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $courses->previousPageUrl() }}" class="page-link">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </li>
                @endif

                <!-- Pagination Elements -->
                @foreach ($courses->getUrlRange(1, $courses->lastPage()) as $page => $url)
                    <li class="page-item {{ $courses->currentPage() == $page ? 'active' : '' }}">
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    </li>
                @endforeach

                <!-- Next Page Link -->
                @if ($courses->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $courses->nextPageUrl() }}" class="page-link">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a href="javascript:void(0);" class="page-link">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection
