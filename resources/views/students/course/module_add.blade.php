@extends('layouts.master')

@section('title')
    course
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Subsection module
        @endslot
        @slot('title')
            add
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
                </div>
            </div>
        </div>
    </div>
@endsection
