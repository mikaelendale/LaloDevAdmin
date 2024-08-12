@extends('layouts.master')

@section('title')
    Courses
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Detail
        @endslot
        @slot('title')
            Course
        @endslot
    @endcomponent
    <div class="row">
        @if ($course)
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-semibold">Overview</h5>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="col">Course Name</th>
                                        <td scope="col">{{ $course->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Category</th>
                                        <td>{{ $course->category }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Subsections</th>
                                        <td>{{ $course->subsections->count() }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No of Enrolled Students</th>
                                        <td><span
                                                class="badge badge-soft-success">{{ $course->enrollments->count() }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td><span class="badge badge-soft-info">{{ $course->status }}</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Posted Date</th>
                                        <td>{{ $course->created_at ? $course->created_at->format('jS, F Y') : 'Date not available' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Close Date</th>
                                        <td>{{ $course->close_date ? $course->close_date->format('jS, F Y') : 'Date not available' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="hstack gap-2">
                            <button class="btn btn-soft-primary w-100">Edit</button>
                            <button class="btn btn-soft-danger w-100">Deactivate</button>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ $course->image }}" alt="" height="50" class="mx-auto d-block">
                            <h5 class="mt-3 mb-1">{{ $course->name }}</h5>
                            <p class="text-muted mb-0">Since {{ $course->start_date }}</p>
                        </div>

                        <ul class="list-unstyled mt-4">
                            @foreach ($course->subsections as $subsection)
                                <li>
                                    <div class="d-flex">
                                        <i class="bx bx-phone text-primary fs-4"></i>
                                        <div class="ms-3">
                                            <h6 class="fs-14 mb-2">{{ $subsection->name }}</h6>
                                            <p class="text-muted fs-14 mb-0">{{ $subsection->description }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-4">
                            <a href="#!" class="btn btn-soft-primary btn-hover w-100 rounded"><i
                                    class="mdi mdi-eye"></i> View all</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="d-flex">
                            <img src="{{ $course->image }}" alt="" height="50">
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="fw-semibold mb-3">Description</h5>
                        <p class="text-muted">{{ $course->description }}</p>

                        <h5 class="fw-semibold mb-3">Outcomes:</h5>
                        <ul class="vstack gap-3">
                            <li>{{ $course->outcomes }}</li>
                        </ul>

                        <h5 class="fw-semibold mb-3">Instructor Experience:</h5>
                        <ul class="vstack gap-3">
                            <li>{{ $course->instructor_experience }}</li>
                        </ul>

                        <div class="mt-4">
                            @foreach ($course->subsections as $subsection)
                                <span class="badge badge-soft-warning">{{ $subsection->name }}</span>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mt-1">Share this course:</li>
                                <li class="list-inline-item mt-1">
                                    <a href="javascript:void(0)" class="btn btn-outline-primary btn-hover"><i
                                            class="uil uil-facebook-f"></i> Facebook</a>
                                </li>
                                <li class="list-inline-item mt-1">
                                    <a href="javascript:void(0)" class="btn btn-outline-danger btn-hover"><i
                                            class="uil uil-google"></i> Google+</a>
                                </li>
                                <li class="list-inline-item mt-1">
                                    <a href="javascript:void(0)" class="btn btn-outline-success btn-hover"><i
                                            class="uil uil-linkedin-alt"></i> LinkedIn</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
    </div>
@else
    <p>Course not found.</p>
    @endif

@endsection
