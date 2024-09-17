@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Lalo Learn
        @endslot
        @slot('title')
            Dashboard
        @endslot
    @endcomponent
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="row mb-3">
            <div class="col-xl-4 col-sm-6">

            </div>
            <div class="col-lg-8 col-sm-6">
                <form class="mt-4 mt-sm-0 float-sm-end d-sm-flex align-items-center">

                    <ul class="nav nav-pills product-view-nav justify-content-end mt-3 mt-sm-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('students.create')}}"><i
                                    class="bx bx-plus align-middle"></i></a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">List of students under Lalo Dev</h4>
                    <p class="card-title-desc">
                    </p>

                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('students_pic/' . $student->profile_pic) }}" alt=""
                                                class="rounded-circle header-profile-user">
                                        </td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>
                                            @if ($student->status == 'pending')
                                                <span class="badge bg-danger">{{ $student->status }}</span>
                                            @endif
                                            @if ($student->status == 'oncheck')
                                                <span class="badge bg-warning">{{ $student->status }}</span>
                                            @endif
                                            @if ($student->status == 'approved')
                                                <span class="badge bg-success">{{ $student->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $student->created_at ? $student->created_at->format('jS, F Y') : 'Date not available' }}
                                        </td>

                                        <td>
                                            <a class="btn btn-soft-primary"
                                                href="{{ route('students.edit', $student->id) }}">Edit</a>
                                        </td>
                                        <td>
                                            @if ($student->status !== 'approved')
                                                <form action="{{route('students.approve', $student->id)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                    <button class="btn btn-soft-success" type="submit">Approve</button>
                                                </form>
                                            @else
                                                Approved!
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection
