@extends('layouts.master')

@section('title')
    Edit Badge
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Badges
        @endslot
        @slot('title')
            Edit Badge
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
                    <form action="{{ route('badge.update', ['course' => $course->id, 'badge' => $badge->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        <h4 class="card-title">Edit Badge</h4>

                        <!-- Badge Name -->
                        <div class="mb-3">
                            <label for="name">Badge Name</label>
                            <input id="name" name="name" type="text" class="form-control"
                                value="{{ old('name', $badge->name) }}" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="5" required>{{ old('description', $badge->description) }}</textarea>
                        </div>

                        <!-- Icon -->
                        <div class="mb-3">
                            <label for="icon">Icon</label>
                            <input id="icon" name="icon" type="text" class="form-control"
                                value="{{ old('icon', $badge->icon) }}" required>
                        </div>

                        <!-- Color -->
                        <div class="mb-3">
                            <label for="color">Color</label>
                            <input id="color" name="color" type="text" class="form-control"
                                value="{{ old('color', $badge->color) }}" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                            <a href="{{ route('courses.edit', $course->id) }}"
                                class="btn btn-secondary waves-effect waves-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
