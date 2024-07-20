@extends('layouts.master')

@section('title')
    Community
@endsection

@section('css')
    <!-- select2 css -->
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Community
        @endslot
        @slot('title')
            Config
        @endslot
    @endcomponent
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('community.config_update', 1) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="community_site_status">Community Site Status</label>
            <select name="community_site_status" id="community_site_status" class="form-control" required>
                <option value="on" >On
                </option>
                <option value="off" >Off
                </option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Configuration</button>
    </form>
    {{-- <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Community site config</h4>
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status-select" class="form-label">Community website page status</label>
                                    <select name="community_site_status " class="form-control" id="status-select">
                                        <option value="on"
                                            {{ $sites->community_site_status == 'on' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="off"
                                            {{ $sites->community_site_status == 'off' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
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

    </div> --}}
    <!-- end row -->
@endsection
