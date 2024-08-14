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
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Create student</h4>

                    <form action="{{route('students.store')}}" method="POST">
                        @csrf 
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" name="name"
                                placeholder="Enter Your First Name">
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="formrow-email-input" name="email"
                                        placeholder="Enter Your Email ID">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="formrow-password-input" name="password"
                                        placeholder="Enter Your Password">
                                </div>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="formrow-inputCity" name="dob"
                                        placeholder="Enter Your Living City">
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
