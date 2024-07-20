@extends('layouts.master')

@section('title')
    Community
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Community
        @endslot
        @slot('title')
            Community
        @endslot
    @endcomponent
    @if (session('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
     @endif
     @if ($community_stat === 'on')
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             <i class="mdi mdi-check-all me-2"></i>
             Community page online 
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     @elseif ($community_stat === 'off')
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <i class="mdi mdi-block-helper me-2"></i>
             Danger the Community page is down turn it on
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     @endif
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0 me-4">
                            <i class="mdi mdi-web text-primary h1"></i>
                        </div>

                        <div class="flex-grow-1">
                            <div class="text-muted">
                                <h5>Community | page</h5>
                                <p class="mb-1">community.lalodev.com</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body border-top">

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <p class="text-muted mb-2">Current Status</p>
                                <h5>{{ $community_stat }}</h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end mt-4 mt-sm-0">
                                <p class="text-muted mb-2">No of users joined</p>
                                <h5><span class="badge bg-success ms-1 align-bottom">{{ $count }}</span></h5>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-sm-4">
                                <div>

                                    <p class="text-muted mb-2">Today</p>
                                    <h5>{{ $today }}</h5>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mt-4 mt-sm-0">

                                    <p class="text-muted mb-2">This Week</p>
                                    <h5>{{ $weeklyCount }}</h5>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mt-4 mt-sm-0">

                                    <p class="text-muted mb-2">This month</p>
                                    <h5>{{ $monthlyCount }}</h5>

                                    
                                </div>
                                
                            </div><div class="mt-3">
                                        <a href="{{ route('community.community_config', 1) }}" class="btn btn-warning btn-sm w-md">Edit</a>
                                    </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Table Edits</h4>
                    <p class="card-title-desc">Table Edits is a lightweight jQuery plugin for making table rows editable.
                    </p>

                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            @foreach ($joined as $joined)
                            <tbody>
                                <tr data-id="1">
                                    <td data-field="id" style="width: 80px">{{ $joined->id }}</td>
                                    <td data-field="name">{{ $joined->name }}</td>
                                    <td data-field="age">{{ $joined->email }}</td>
                                    <td data-field="gender">{{ $joined->typeofuser }}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection
