@extends('layouts.master')

@section('title')
    Create Badge
@endsection

@section('script')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Badges
        @endslot
        @slot('title')
            Create
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{ route('badge.store', $selectedCourse->id) }}" method="POST">
                                @csrf
                                <!-- Badge Name -->
                                <div class="mb-3">
                                    <label for="name">Badge Name</label>
                                    <input id="name" name="name" type="text" class="form-control" required>
                                </div>

                                <!-- Badge Description -->
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <input id="description" name="description" type="text" class="form-control">
                                </div>

                                <!-- Badge Icon -->
                                <div class="mb-3">
                                    <label for="icon">Icon</label>
                                    <input id="icon" name="icon" type="text" class="form-control">
                                </div>

                                <!-- Badge Color -->
                                <div class="mb-3">
                                    <label for="color">Color</label>
                                    <input id="color" name="color" type="text" class="form-control">
                                </div>

                                <!-- Select Course -->
                                <div class="mb-3">
                                    <label for="courseSelect">Select Course</label>
                                    <select id="courseSelect" name="course_id" class="form-control" required>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}"
                                                {{ $selectedCourse->id == $course->id ? 'selected' : '' }}>
                                                {{ $course->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                                    <a href="{{ route('courses.edit', $selectedCourse->id) }}"
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
