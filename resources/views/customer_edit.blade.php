@extends('layouts.master')

@section('title')
    Customers
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Customers
        @endslot
        @slot('title')
            Edit
        @endslot
    @endcomponent
    <form action ="" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <div class="mb-3">
            <label for="marks" class="form-label">User type</label>
            <input type="text" class="form-control" id="typeofuser" name="typeofuser" value="{{ $user->typeofuser }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
    @if (session()->has('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection
