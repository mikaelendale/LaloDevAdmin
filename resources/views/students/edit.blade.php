@extends('layouts.master')

@section('title')
    Edit
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Lalo Learn
        @endslot
        @slot('title')
            Edit
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Form</h4>

                    <form method="POST" action="{{ route('students.update', $student->id) }}">
                        @csrf
                        @method('PUT') <!-- Use PUT for update requests -->

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $student->name) }}" placeholder="Enter Your Name">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $student->email) }}" placeholder="Enter Your Email ID">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone_no" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_no" name="phone_no"
                                    value="{{ old('phone_no', $student->phone_no) }}" placeholder="Enter Your Phone Number">
                            </div>
                            <div class="col-md-6">
                                <label for="class_attended" class="form-label">Class Attended</label>
                                <input type="text" class="form-control" id="class_attended" name="class_attended"
                                    value="{{ old('class_attended', $student->class_attended) }}"
                                    placeholder="Enter Class Attended">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="pending"
                                        {{ old('status', $student->status) === 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="approved"
                                        {{ old('status', $student->status) === 'approved' ? 'selected' : '' }}>Approved
                                    </option>
                                    <option value="oncheck"
                                        {{ old('status', $student->status) === 'oncheck' ? 'selected' : '' }}>On Check
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="payment" class="form-label">Payment</label>
                                <input type="text" class="form-control" id="payment" name="payment"
                                    value="{{ old('payment', $student->payment) }}" placeholder="Enter Payment Status">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telegram_username" class="form-label">Telegram Username</label>
                                <input type="text" class="form-control" id="telegram_username" name="telegram_username"
                                    value="{{ old('telegram_username', $student->telegram_username) }}"
                                    placeholder="Enter Telegram Username">
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="male"
                                        {{ old('gender', $student->gender) === 'male' ? 'selected' : '' }}>male
                                    </option>
                                    <option value="female"
                                        {{ old('gender', $student->gender) === 'female' ? 'selected' : '' }}>female
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ old('address', $student->address) }}" placeholder="Enter Address">
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Valid from</label>
                                <input type="date" class="form-control" id="dob" name="time_duration">
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md">Update</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
