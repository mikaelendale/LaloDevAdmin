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
                        <h4 class="card-title">{{ $subsection->name }} Course Module preview</h4>
                        <p>{{ $subsection->detail }}</p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="container">
                                        <h2>Add New Module to Subsection: {{ $subsection->name }}</h2>

                                        <form method="POST" action="{{ route('module.add') }}">
                                            @csrf

                                            <!-- Hidden input to pass the subsection ID -->
                                            <input type="hidden" name="subsection_id" value="{{ $subsection->id }}">

                                            <!-- Module Name -->
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Module Name</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>

                                            <!-- Module Description -->
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                            </div>

                                            <!-- Video URL -->
                                            <div class="mb-3">
                                                <label for="video_url" class="form-label">Video URL</label>
                                                <input type="url" class="form-control" id="video_url" name="video_url"
                                                    value="{{ old('video_url') }}" required>
                                            </div>

                                            <!-- Order -->
                                            <div class="mb-3">
                                                <label for="order" class="form-label">Order</label>
                                                <input type="number" class="form-control" id="order" name="order"
                                                    value="{{ old('order') }}" required>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Add Module</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Scrollable modal button -->
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                        data-bs-target="#exampleModalScrollable">Add New Module</button>

                    <!-- Scrollable modal -->
                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add New Module</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form for adding a new module -->
                                    <form action="{{ route('module.store', $subsection->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="subsection_id" value="{{ $subsection->id }}">

                                        <div class="mb-3">
                                            <label for="moduleName" class="form-label">Module Name</label>
                                            <input type="text" class="form-control" id="moduleName" name="name"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="moduleDescription" class="form-label">Module
                                                Description</label>
                                            <textarea class="form-control" id="moduleDescription" name="description" rows="3" required></textarea>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Module</button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>
        </div>
    </div>
@endsection
