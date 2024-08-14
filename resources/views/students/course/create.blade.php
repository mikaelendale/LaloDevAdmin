@extends('layouts.master')

@section('title')
    Students
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Students
        @endslot
        @slot('title')
            Create
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Course </h4>

                    <form action="{{ route('courses.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Course Name</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input" name="name"
                                        placeholder="Enter Your Course Name">
                                </div>
                            </div> 

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Slug</label>
                                    <input type="text" class="form-control" id="formrow-slug-input" name="slug"
                                        placeholder="Enter Your Slug">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Description</label>
                                    <textarea type="text" class="form-control" id="formrow-description-input"
                                        name="description" placeholder="Enter Your description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Image URL</label>
                                    <input type="text" class="form-control" id="formrow-image-input" name="image"
                                        placeholder="https://example.com/path/to /image">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Duration in weeks</label>
                                    <input type="text" class="form-control" id="formrow-image-input" name="duration"
                                        placeholder="1 week ,2 week">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Category</label>
                                    <input type="text" class="form-control" id="formrow-image-input" name="category"
                                        placeholder="Web development , design">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Status</label>
                                    <select id="formrow-inputState" class="form-select" name="status">
                                        <option value="draft">draft</option>
                                        <option value="published">published</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Course Track</label>
                                    <select id="formrow-inputState" class="form-select" name="level">
                                        <option value="beginner">Beginner</option>
                                        <option value="intermediate">Intermediate</option>
                                        <option value="advanced">Advanced</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Outcomes</label>
                                    <textarea type="text" class="form-control" id="formrow-description-input"
                                        name="outcomes" placeholder="Enter the outcomes"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Instructor Experience</label>
                                    <textarea type="text" class="form-control" id="formrow-description-input"
                                        name="instructor_experience" placeholder="Enter the outcomes"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="formrow-image-input" name="start_date">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
@endsection
