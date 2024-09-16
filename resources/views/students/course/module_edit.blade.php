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
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <h4 class="card-title">{{ $subsection->name }} Add Module 1</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">fill the Form</h4>
                                    <form method="POST" action="{{ route('module.store', $module->id) }}">
                                        @csrf
                                        @method('PUT') <!-- Use PUT for update -->

                                        <!-- Name Field -->
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Module Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name', $module->name) }}">
                                        </div>

                                        <!-- Description Field -->
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description" placeholder="Enter Module Description">{{ old('description', $module->description) }}</textarea>
                                        </div>

                                        <!-- Video URL Field -->
                                        <div class="mb-3">
                                            <label for="video_url" class="form-label">Video URL</label>
                                            <input type="text" class="form-control" id="video_url" name="video_url"
                                                value="{{ old('video_url', $module->video_url) }}"
                                                placeholder="Enter Video URL">
                                        </div>

                                        <!-- Order Field -->
                                        <div class="mb-3">
                                            <label for="order" class="form-label">Order</label>
                                            <input type="number" class="form-control" id="order" name="order"
                                                value="{{ old('order', $module->order) }}" placeholder="Enter Module Order">
                                        </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary w-md">Update Module</button>
                                        </div>
                                    </form>

                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
