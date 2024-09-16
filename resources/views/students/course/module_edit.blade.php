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

                                    <form method="POST" action="{{route('module.add',  $subsection->id) }}">

                                        <input type="hidden" name="_token"
                                            value="s4dYFwuHgOtPEcEL8aua8JBH3B7mtuq2FAZ2BDOc" autocomplete="off"> <input
                                            type="hidden" name="_method" value="PUT">
                                        <!-- Use PUT for update requests -->

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="Mikael" placeholder="Enter Your Name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="user@gmail.com" placeholder="Enter Your Email ID">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="phone_no" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" id="phone_no" name="phone_no"
                                                    value="0931133242" placeholder="Enter Your Phone Number">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="class_attended" class="form-label">Class Attended</label>
                                                <input type="text" class="form-control" id="class_attended"
                                                    name="class_attended" value="beginner"
                                                    placeholder="Enter Class Attended">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" class="form-select">
                                                    <option value="pending">Pending
                                                    </option>
                                                    <option value="approved" selected="">Approved
                                                    </option>
                                                    <option value="oncheck">On Check
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="payment" class="form-label">Payment</label>
                                                <input type="text" class="form-control" id="payment" name="payment"
                                                    value="1" placeholder="Enter Payment Status">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="telegram_username" class="form-label">Telegram Username</label>
                                                <input type="text" class="form-control" id="telegram_username"
                                                    name="telegram_username" value="https://t.me/yourusername"
                                                    placeholder="Enter Telegram Username">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select name="gender" class="form-select">
                                                    <option value="male" selected="">male
                                                    </option>
                                                    <option value="female">female
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    value="Addis Ababa" placeholder="Enter Address">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dob" class="form-label">Valid from</label>
                                                <input type="date" class="form-control" id="dob"
                                                    name="time_duration">
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
                </div>
            </div>
        </div>
    </div>
@endsection
