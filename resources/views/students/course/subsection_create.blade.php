@extends('layouts.master')

@section('title')
    Course
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Subsection
        @endslot
        @slot('title')
            Create
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
                        <div class="col-sm-6">
                            <form action="{{ route('subsection.store') }}" method="POST">
                                @csrf
                                <h4 class="card-title">Course Information</h4>

                                <!-- Course Selection -->
                                <div class="mb-3">
                                    <label for="courseSelect">Select Course</label>
                                    <select id="courseSelect" name="course_id" class="form-control">
                                        @foreach ($allCourses as $singleCourse)
                                            <option value="{{ $singleCourse->id }}"
                                                {{ $singleCourse->id == $course->id ? 'selected' : '' }}>
                                                {{ $singleCourse->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Subsection Name -->
                                <div class="mb-3">
                                    <label for="productname">Subsection Name</label>
                                    <input id="productname" name="name" type="text" class="form-control">
                                </div>

                                <!-- Detail -->
                                <div class="mb-3">
                                    <label for="manufacturerbrand">Detail</label>
                                    <input id="manufacturerbrand" name="detail" type="text" class="form-control">
                                </div>

                                <!-- Order (Auto-filled) -->
                                <div class="mb-3">
                                    <label for="order">Order</label>
                                    <input id="order" name="order" type="number" class="form-control"
                                        value="{{ $nextOrder }}">
                                </div>

                                <!-- Section Description -->
                                <div class="mb-3">
                                    <label for="description">Section Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                                    <a href="{{ route('courses.edit', $course->id) }}"
                                        class="btn btn-secondary waves-effect waves-light">Cancel</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
