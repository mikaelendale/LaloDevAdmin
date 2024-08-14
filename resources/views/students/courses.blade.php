@extends('layouts.master')

@section('title')
    Docs
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Lalo Learn
        @endslot
        @slot('title')
            Courses
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <form method="GET" action="{{ route('courses.index') }}">
                        <div class="row g-3">
                            <div class="col-xxl-4 col-lg-6">
                                <input type="search" name="search" class="form-control" id="searchTableList"
                                    placeholder="Search for ..." value="{{ request()->search }}">
                            </div>
                            <div class="col-xxl-2 col-lg-6">
                                <select class="form-select" name="status" id="idStatus"
                                    aria-label="Default select example">
                                    <option value="all">Status</option>
                                    <option value="unpublished" {{ request()->status == 'unpublished' ? 'selected' : '' }}>
                                        Pending
                                    </option>
                                    <option value="published" {{ request()->status == 'published' ? 'selected' : '' }}>
                                        Approved</option>
                                    </option>
                                </select>
                            </div>
                            <div class="col-xxl-2 col-lg-4">
                                <select class="form-select" name="type" id="idType"
                                    aria-label="Default select example">
                                    <option value="all">Select Type</option>
                                    <option value="beginner" {{ request()->type == 'beginner' ? 'selected' : '' }}>Beginner
                                    </option>
                                    <option value="intermediate" {{ request()->type == 'intermediate' ? 'selected' : '' }}>
                                        Intermediate</option>
                                    <option value="advanced" {{ request()->type == 'advanced' ? 'selected' : '' }}>Advanced
                                    </option>
                                </select>
                            </div>
                            <div class="col-xxl-2 col-lg-4">
                                <div id="datepicker1">
                                    <input type="text" name="date" class="form-control" placeholder="Select date"
                                        data-date-format="dd M, yyyy" data-date-container="#datepicker1"
                                        data-date-autoclose="true" data-provide="datepicker" value="{{ request()->date }}">
                                </div>
                            </div>
                            <div class="col-xxl-2 col-lg-4">
                                <button type="submit" class="btn btn-soft-secondary w-100"><i
                                        class="mdi mdi-filter-outline align-middle"></i> Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($courses as $course)
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-4">
                                <div class="avatar-md">
                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                        <img src="{{ $course->image }}" alt="" height="30">
                                    </span>
                                </div>
                            </div>


                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="text-truncate font-size-15"><a href="{{ route('courses.detail', $course->id) }}"
                                        class="text-dark">{{ $course->name }}</a></h5>
                                <p class="text-muted mb-4">{{ $course->description }}</p>
                                <div class="avatar-group">
                                    @foreach ($course->enrollments as $enrollment)
                                        @if ($enrollment->student)
                                            <!-- Ensure the student relationship exists -->
                                            <div class="avatar-group-item">
                                                <a href="javascript:void(0);" class="d-inline-block">
                                                    <img src="{{ asset('students_pic/' . $enrollment->student->profile_pic) }}"
                                                        alt="" class="rounded-circle avatar-xs">
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-3">
                                <span class="badge bg-success">{{ $course->status }}</span>
                            </li>
                            <li class="list-inline-item me-3">
                                <i class="bx bx-calendar me-1"></i>
                                {{ $course->created_at ? $course->created_at->format('jS, F Y') : 'Date not available' }}
                            </li>
                        </ul>
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
