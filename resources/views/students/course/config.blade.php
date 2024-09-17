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
            config
        @endslot
    @endcomponent
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Course Information</h4>

                    <div class="row">
                        <div class="col-sm-6">
                            <form>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label for="productname">Course Name</label>
                                        <input id="productname" name="name" type="text" class="form-control"
                                            value="{{ old('name', $courses->name) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="manufacturername">Course picture </label>
                                        <input id="manufacturername" name="image" type="text" class="form-control"
                                            value="{{ old('image', $courses->image) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="manufacturerbrand">Category</label>
                                        <input id="manufacturerbrand" name="category" type="text" class="form-control"
                                            value="{{ old('category', $courses->category) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price">Duration</label>
                                        <input id="price" name="duration" type="text" class="form-control"
                                            value="{{ old('duration', $courses->duration) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label">Level</label>
                                        <select class="form-control" name="level">
                                            <option value="beginner"
                                                {{ old('level', $courses->level) == 'beginner' ? 'selected' : '' }}>Beginner
                                            </option>
                                            <option value="intermediate"
                                                {{ old('level', $courses->level) == 'intermediate' ? 'selected' : '' }}>
                                                Intermediate</option>
                                            <option value="advanced"
                                                {{ old('level', $courses->level) == 'advanced' ? 'selected' : '' }}>Advanced
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                        Changes</button>
                                    <a href="{{ route('courses.manage') }}"
                                        class="btn btn-secondary waves-effect waves-light">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="card-title mb-4"> <a class="btn btn-soft-info"
                                                href="{{ route('badge.create', $courses->id) }}"><i
                                                    class="bx bx-plus align-middle"></i>&nbsp; Add Badge to Course</a>
                                        </h4>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="align-middle">ID</th>
                                                    <th class="align-middle">Badge Name</th>
                                                    <th class="align-middle">Description</th>
                                                    <th class="align-middle">Icon</th>
                                                    <th class="align-middle">Color</th>
                                                    <th class="align-middle">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($courses->badges->isEmpty())
                                                    <tr>
                                                        <td colspan="6" class="text-center">There are no badges available
                                                            for this course.</td>
                                                    </tr>
                                                @else
                                                    @foreach ($courses->badges as $badge)
                                                        <tr>
                                                            <td>
                                                                {{ $badge->id }}
                                                            </td>
                                                            <td>
                                                                <a href="javascript: void(0);"
                                                                    class="text-body fw-bold">{{ $badge->name }}</a>
                                                            </td>
                                                            <td>{{ $badge->description }}</td>
                                                            <td>
                                                                <img src="{{ asset('path_to_icons/' . $badge->icon) }}"
                                                                    alt="{{ $badge->name }}"
                                                                    style="width: 30px; height: 30px;">
                                                            </td>
                                                            <td>
                                                                <span class="badge"
                                                                    style="background-color: {{ $badge->color }};">
                                                                    {{ $badge->color }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <!-- Edit and Delete Buttons -->
                                                                <a href="{{ route('badge.edit', $badge->id) }}"
                                                                    class="btn btn-soft-primary">
                                                                    Edit
                                                                </a>
                                                                <form action="{{ route('badge.destroy', $badge->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure you want to delete this badge?');"
                                                                    style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-soft-danger">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="card-title mb-4"> <a class="btn btn-success"
                                href="{{ route('subsection.create', $courses->id) }}"><i
                                    class="bx bx-plus align-middle"></i>&nbsp; Add Course Subsection</a>
                        </h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">ID</th>
                                    <th class="align-middle">Name of Course section</th>
                                    <th class="align-middle">Detail</th>
                                    <th class="align-middle">Action</th>
                                    <th class="align-middle"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($courses->subsections->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">There are no subsections available.</td>
                                    </tr>
                                @else
                                    @foreach ($courses->subsections as $subsections)
                                        <tr>
                                            <td>
                                                {{ $subsections->order }}
                                            </td>
                                            <td>
                                                <a href="javascript: void(0);"
                                                    class="text-body fw-bold">{{ $subsections->name }}</a>
                                            </td>
                                            <td>{{ $subsections->detail }}</td>
                                            <td>
                                                <a href="{{ route('subsection.edit', $subsections->id) }}"
                                                    class="btn btn-soft-primary">
                                                    Edit Details
                                                </a>
                                                <a href="{{ route('subsection.view', $subsections->id) }}"
                                                    class="btn btn-soft-primary">
                                                    View Modules
                                                </a>
                                            </td>
                                            <td>
                                                <!-- Delete Button -->
                                                <form action="{{ route('subsection.destroy', $subsections->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this subsection?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-soft-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
@endsection
