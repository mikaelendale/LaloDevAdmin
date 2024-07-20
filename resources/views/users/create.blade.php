@extends('layouts.master')

@section('title')
    User
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            User
        @endslot
        @slot('title')
            Create
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
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Form Grid Layout</h4>

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email') }}" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Where</label>
                                    <select name="where" id="where" class="form-control" required>
                                        <option value="telegram">Telegram</option>
                                        <option value="instagram">Instagram</option>
                                        <option value="linkedin">Linkedin</option>
                                        <option value="twitter">X</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">User type</label>
                                    <select name="typeofuser" id="typeofuser" class="form-control" required>
                                        <option value="Developer">A Developer</option>
                                        <option value="User">A User</option>
                                        <option value="Customer">A Customer</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Phone No</label>
                                    <input id="phone_no" class="form-control" type="no" name="phone_no"
                                        :value="old('phone_no')" placeholder="Phone Number" required autocomplete="phone">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                required>
                                </div>
                            </div>
                        </div> 
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div> 
@endsection
