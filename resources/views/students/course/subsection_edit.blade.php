@extends('layouts.master')

@section('title')
    course
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Subsection
        @endslot
        @slot('title')
            Edit
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
                            <form action="{{ route('subsection.update', $subsection->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <h4 class="card-title">Course Information</h4>
                                <div class="mb-3">
                                    <label for="productname">Sub section Name</label>
                                    <input id="productname" name="name" type="text" class="form-control"
                                        value="{{ old('name', $subsection->name) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="manufacturerbrand">Detail</label>
                                    <input id="manufacturerbrand" name="detail" type="text" class="form-control"
                                        value="{{ old('category', $subsection->detail) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="manufacturerbrand">Order</label>
                                    <input id="manufacturerbrand" name="order" type="number" class="form-control"
                                        value="{{ old('order', $subsection->order) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="productdesc">Section Description</label>
                                    <textarea class="form-control" id="description" rows="5"
                                        value="{{ old('description', $subsection->description) }}"></textarea>
                                    <div class="card">
                                        <div class="card-body">
                                            <blockquote class="blockquote font-size-14 mb-0">
                                                <p>{{ $subsection->description }}</p>
                                                </footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                        Changes</button>
                                    <a href="{{route('courses.edit', $course->id)}}"
                                        class="btn btn-secondary waves-effect waves-light">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form action="">
                                <h4 class="card-title">Course Information</h4>

                                <div class="mb-3">
                                    <label for="productname">Sub section Name</label>
                                    <input id="productname" name="name" type="text" class="form-control"
                                        value="{{ old('name', $subsection->name) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="manufacturerbrand">Detail</label>
                                    <input id="manufacturerbrand" name="category" type="text" class="form-control"
                                        value="{{ old('category', $subsection->detail) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="manufacturerbrand">Order</label>
                                    <input id="manufacturerbrand" name="order" type="text" class="form-control"
                                        value="{{ old('order', $subsection->order) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="productdesc">Product Description</label>
                                    <textarea class="form-control" id="productdesc" rows="5"
                                        value="{{ old('description', $subsection->description) }}"></textarea>
                                    <div class="card">
                                        <div class="card-body">
                                            <blockquote class="blockquote font-size-14 mb-0">
                                                <p>{{ $subsection->description }}</p>
                                                </footer>
                                            </blockquote>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                        Changes</button>
                                    <button type="button"
                                        class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
