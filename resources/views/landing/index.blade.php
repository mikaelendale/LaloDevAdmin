@extends('layouts.master')

@section('title')
    Landing
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Landing
        @endslot
        @slot('title')
            Status
        @endslot
    @endcomponent
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($landing->status == 'on')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            Home page is online
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @else
        <a href="{{ route('landing.config', $landing->id) }}">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bx bx-block me-2"></i>
                Home page is offline
                config
            </div>
        </a>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="https://lalodev.com/images/icon.png" alt=""
                                        class="avatar-md rounded-circle img-thumbnail">
                                </div>
                                <div class="flex-grow-1 align-self-center">
                                    <div class="text-muted">
                                        <p class="mb-2">Welcome to Landinfg Dashboard</p>
                                        <h5 class="mb-1">Lalo Dev</h5>
                                        <p class="mb-0">Digital Agency</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 align-self-center">
                            <div class="text-lg-center mt-4 mt-lg-0">
                                <div class="row">
                                    <div class="col-4">
                                        <div>
                                            <p class="text-muted text-truncate mb-2">Website Status</p>
                                            @if ($landing->status == 'on')
                                                <h5 class="badge badge-soft-success mb-0">{{ $landing->status }}</h5>
                                            @else
                                                <h5 class="badge badge-soft-danger mb-0">{{ $landing->status }}</h5>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <p class="text-muted text-truncate mb-2">Auth Access</p>
                                            @if ($landing->login == 'on')
                                                <h5 class="badge badge-soft-success mb-0">{{ $landing->login }}</h5>
                                            @else
                                                <h5 class="badge badge-soft-danger mb-0">{{ $landing->login }}</h5>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <p class="text-muted text-truncate mb-2">Footer Section</p>
                                            @if ($landing->footer == 'on')
                                                <h5 class="badge badge-soft-success mb-0">{{ $landing->footer }}</h5>
                                            @else
                                                <h5 class="badge badge-soft-danger mb-0">{{ $landing->footer }}</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="clearfix mt-4 mt-lg-0">
                                <div class="dropdown float-end">
                                    <a href="{{ route('landing.config', $landing->id) }}" class="btn btn-primary"
                                        type="button">
                                        <i class="bx bxs-cog align-middle me-1"></i> Setting
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-12">
            <div class="row">

                <div class="col-sm-3">
                    <a href="">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar-xs me-3">
                                        <span
                                            class="avatar-title rounded-circle bg-primary-subtle text-primary font-size-18">
                                            <i class="bx bx-navigation"></i>
                                        </span>
                                    </div>
                                    <h5 class="font-size-14 mb-0">Nav Bar </h5>
                                </div>
                                <div class="text-muted mt-4">
                                    <h4>Web Navigation </h4>
                                    <div class="d-flex">
                                        @if ($landing->status == 'on')
                                            <span class="badge badge-soft-success font-size-12">on</span>
                                        @else
                                            <span class="badge badge-soft-danger font-size-12">off</span>
                                        @endif
                                        <span class="ms-2 text-truncate">current moment</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title rounded-circle bg-primary-subtle text-primary font-size-18">
                                        <i class="bx bx-map-pin"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Register</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>User registration</h4>
                                <div class="d-flex">
                                    @if ($landing->register == 'on')
                                        <span class="badge badge-soft-success font-size-12"> {{ $landing->register }}</span>
                                    @else
                                        <span class="badge badge-soft-danger font-size-12"> {{ $landing->register }}</span>
                                    @endif
                                    <span class="ms-2 text-truncate">Currently
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title rounded-circle bg-primary-subtle text-primary font-size-18">
                                        <i class="bx bx-mail-send"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">CTA section</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>Call to Action</h4>

                                <div class="d-flex">
                                    @if ($landing->cta_section == 'on')
                                        <span class="badge badge-soft-success font-size-12">
                                            {{ $landing->cta_section }}</span>
                                    @else
                                        <span class="badge badge-soft-danger font-size-12">
                                            {{ $landing->cta_section }}</span>
                                    @endif
                                    <span class="ms-2 text-truncate">From previous period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title rounded-circle bg-primary-subtle text-primary font-size-18">
                                        <i class="bx bx-question-mark"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">FAQ</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>Asked questions</h4>

                                <div class="d-flex">
                                    @if ($landing->faq == 'on')
                                        <span class="badge badge-soft-success font-size-12">
                                            {{ $landing->faq }}</span>
                                    @else
                                        <span class="badge badge-soft-danger font-size-12">
                                            {{ $landing->faq }}</span>
                                    @endif <span class="ms-2 text-truncate">From previous
                                        period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <a href="{{ route('landing.config', $landing->id) }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-4">
                                <div class="avatar-md">
                                    <span class="avatar-title rounded-circle bg-light text-info font-size-16">
                                        <i class="bx bx-info-circle bx-lg"></i>
                                    </span>
                                </div>
                            </div>


                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="text-truncate font-size-15"><a class="text-dark">
                                        About section
                                    </a></h5>
                                <p class="text-muted mb-4">Lalo Dev details on home page </p>
                                <div class="avatar-group">
                                    <div class="avatar-group-item">
                                        <a href="{{ route('landing.config', $landing->id) }}" class="d-inline-block">
                                            @if ($landing->about_section == 'on')
                                                <span class="badge badge-soft-success font-size-12">
                                                    {{ $landing->about_section }}</span>
                                            @else
                                                <span class="badge badge-soft-danger font-size-12">
                                                    {{ $landing->about_section }}</span>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6">
            <a href="{{ route('landing.config', $landing->id) }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-4">
                                <div class="avatar-md">
                                    <span class="avatar-title rounded-circle bg-light text-success font-size-16">
                                        <i class="bx bx-search bx-lg"></i>
                                    </span>
                                </div>
                            </div>


                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="text-truncate font-size-15"><a class="text-dark">
                                        Explore section
                                    </a></h5>
                                <p class="text-muted mb-4">Lalo Dev Explore on home page </p>
                                <div class="avatar-group">
                                    <div class="avatar-group-item">
                                        <a href="{{ route('landing.config', $landing->id) }}" class="d-inline-block">
                                            @if ($landing->explore_section == 'on')
                                                <span class="badge badge-soft-success font-size-12">
                                                    {{ $landing->explore_section }}</span>
                                            @else
                                                <span class="badge badge-soft-danger font-size-12">
                                                    {{ $landing->explore_section }}</span>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6">
            <a href="{{ route('landing.config', $landing->id) }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-4">
                                <div class="avatar-md">
                                    <span class="avatar-title rounded-circle bg-light text-warning font-size-16">
                                        <i class="bx bx-user bx-lg"></i>
                                    </span>
                                </div>
                            </div>


                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="text-truncate font-size-15"><a class="text-dark">
                                        CTA section
                                    </a></h5>
                                <p class="text-muted mb-4">Lalo Dev CTA on home page </p>
                                <div class="avatar-group">
                                    <div class="avatar-group-item">
                                        <a href="{{ route('landing.config', $landing->id) }}" class="d-inline-block">
                                            @if ($landing->cta_section == 'on')
                                                <span class="badge badge-soft-success font-size-12">
                                                    {{ $landing->cta_section }}</span>
                                            @else
                                                <span class="badge badge-soft-danger font-size-12">
                                                    {{ $landing->cta_section }}</span>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6">
            <a href="{{ route('landing.config', $landing->id) }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-4">
                                <div class="avatar-md">
                                    <span class="avatar-title rounded-circle bg-light text-primary font-size-16">
                                        <i class="bx bx-link-alt bx-lg"></i>
                                    </span>
                                </div>
                            </div>


                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="text-truncate font-size-15"><a class="text-dark">
                                        Footer section
                                    </a></h5>
                                <p class="text-muted mb-4">Lalo Dev Footer on home page </p>
                                <div class="avatar-group">
                                    <div class="avatar-group-item">
                                        <a href="{{ route('landing.config', $landing->id) }}" class="d-inline-block">
                                            @if ($landing->footer == 'on')
                                                <span class="badge badge-soft-success font-size-12">
                                                    {{ $landing->footer }}</span>
                                            @else
                                                <span class="badge badge-soft-danger font-size-12">
                                                    {{ $landing->footer }}</span>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Home Navigation</h4>

                    <ul class="nav nav-pills bg-light rounded">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Status</a>
                        </li>
                    </ul>

                    <div class="mt-4">
                        <div data-simplebar style="max-height: 250px;">

                            <div class="table-responsive">
                                <table class="table table-nowrap align-middle table-hover mb-0">
                                    <tbody>
                                        <tr>
                                            <td style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="tasklistCheck01">
                                                    <label class="form-check-label" for="tasklistCheck01"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);"
                                                        class="text-dark">Home page </a></h5>
                                                @if ($landing->home == 'on')
                                                    <span class="badge badge-soft-success font-size-12">
                                                        {{ $landing->home }}</span>
                                                @else
                                                    <span class="badge badge-soft-danger font-size-12">
                                                        {{ $landing->home }}</span>
                                                @endif
                                            </td>
                                            <td style="width: 90px;">
                                                <div>
                                                    <ul class="list-inline mb-0 font-size-16">
                                                        <li class="list-inline-item">
                                                            <a href="{{ route('landing.config', $landing->id) }}"
                                                                class="text-success p-1"><i
                                                                    class="bx bxs-edit-alt"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="tasklistCheck01">
                                                    <label class="form-check-label" for="tasklistCheck01"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);"
                                                        class="text-dark">About page </a></h5>
                                                @if ($landing->about == 'on')
                                                    <span class="badge badge-soft-success font-size-12">
                                                        {{ $landing->about }}</span>
                                                @else
                                                    <span class="badge badge-soft-danger font-size-12">
                                                        {{ $landing->about }}</span>
                                                @endif
                                            </td>
                                            <td style="width: 90px;">
                                                <div>
                                                    <ul class="list-inline mb-0 font-size-16">
                                                        <li class="list-inline-item">
                                                            <a href="{{ route('landing.config', $landing->id) }}"
                                                                class="text-success p-1"><i
                                                                    class="bx bxs-edit-alt"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="tasklistCheck01">
                                                    <label class="form-check-label" for="tasklistCheck01"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);"
                                                        class="text-dark">Service page </a></h5>
                                                @if ($landing->service == 'on')
                                                    <span class="badge badge-soft-success font-size-12">
                                                        {{ $landing->service }}</span>
                                                @else
                                                    <span class="badge badge-soft-danger font-size-12">
                                                        {{ $landing->service }}</span>
                                                @endif
                                            </td>
                                            <td style="width: 90px;">
                                                <div>
                                                    <ul class="list-inline mb-0 font-size-16">
                                                        <li class="list-inline-item">
                                                            <a href="{{ route('landing.config', $landing->id) }}"
                                                                class="text-success p-1"><i
                                                                    class="bx bxs-edit-alt"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="tasklistCheck01">
                                                    <label class="form-check-label" for="tasklistCheck01"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);"
                                                        class="text-dark">Quote page </a></h5>
                                                @if ($landing->quote == 'on')
                                                    <span class="badge badge-soft-success font-size-12">
                                                        {{ $landing->quote }}</span>
                                                @else
                                                    <span class="badge badge-soft-danger font-size-12">
                                                        {{ $landing->quote }}</span>
                                                @endif
                                            </td>
                                            <td style="width: 90px;">
                                                <div>
                                                    <ul class="list-inline mb-0 font-size-16">
                                                        <li class="list-inline-item">
                                                            <a href="{{ route('landing.config', $landing->id) }}"
                                                                class="text-success p-1"><i
                                                                    class="bx bxs-edit-alt"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="tasklistCheck01">
                                                    <label class="form-check-label" for="tasklistCheck01"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);"
                                                        class="text-dark">Blog page </a></h5>
                                                @if ($landing->blog == 'on')
                                                    <span class="badge badge-soft-success font-size-12">
                                                        {{ $landing->blog }}</span>
                                                @else
                                                    <span class="badge badge-soft-danger font-size-12">
                                                        {{ $landing->blog }}</span>
                                                @endif
                                            </td>
                                            <td style="width: 90px;">
                                                <div>
                                                    <ul class="list-inline mb-0 font-size-16">
                                                        <li class="list-inline-item">
                                                            <a href="{{ route('landing.config', $landing->id) }}"
                                                                class="text-success p-1"><i
                                                                    class="bx bxs-edit-alt"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="tasklistCheck01">
                                                    <label class="form-check-label" for="tasklistCheck01"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);"
                                                        class="text-dark">FAQ page </a></h5>
                                                @if ($landing->faq == 'on')
                                                    <span class="badge badge-soft-success font-size-12">
                                                        {{ $landing->faq }}</span>
                                                @else
                                                    <span class="badge badge-soft-danger font-size-12">
                                                        {{ $landing->faq }}</span>
                                                @endif
                                            </td>
                                            <td style="width: 90px;">
                                                <div>
                                                    <ul class="list-inline mb-0 font-size-16">
                                                        <li class="list-inline-item">
                                                            <a href="{{ route('landing.config', $landing->id) }}"
                                                                class="text-success p-1"><i
                                                                    class="bx bxs-edit-alt"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-transparent border-top">
                    <div class="text-center">
                        <a href="{{ route('landing.config', $landing->id) }}"
                            class="btn btn-primary waves-effect waves-light">Configure</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Social links</h4>

                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle mb-0">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text-info font-size-18">
                                                    <i class="mdi mdi-facebook"></i>
                                                </span>
                                            </div>
                                            <span>Facebook</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->facebook }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->facebook == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text-primary font-size-18">
                                                    <i class="mdi mdi-twitter"></i>
                                                </span>
                                            </div>
                                            <span>Twitter</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->twitter }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->twitter == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text-danger font-size-18">
                                                    <i class="mdi mdi-instagram"></i>
                                                </span>
                                            </div>
                                            <span>Instagram</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->instagram }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->instagram == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text- font-size-18">
                                                    <i class="mdi mdi-linkedin"></i>
                                                </span>
                                            </div>
                                            <span>Linkedin</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->linkedin }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->linkedin == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text-danger font-size-18">
                                                    <i class="mdi mdi-youtube"></i>
                                                </span>
                                            </div>
                                            <span>youtube</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->youtube }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->youtube == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text-  font-size-18">
                                                    <i class="mdi mdi-pinterest"></i>
                                                </span>
                                            </div>
                                            <span>Pinterest</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->pinterest }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->pinterest == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text-warning font-size-18">
                                                    <i class="mdi mdi-google"></i>
                                                </span>
                                            </div>
                                            <span>Google</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->google }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->google == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text-danger font-size-18">
                                                    <i class="bx bxl-dribbble "></i>
                                                </span>
                                            </div>
                                            <span>Dribbble</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->dribbble }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->dribbble == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text-info font-size-18">
                                                    <i class="mdi mdi-soundcloud"></i>
                                                </span>
                                            </div>
                                            <span>soundcloud</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->soundcloud }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->soundcloud == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text-warning font-size-18">
                                                    <i class="mdi mdi-skype"></i>
                                                </span>
                                            </div>
                                            <span>skype</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->skype }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->skype == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text-success font-size-18">
                                                    <i class="mdi mdi-whatsapp"></i>
                                                </span>
                                            </div>
                                            <span>WhatsApp</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->whatsapp }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->whatsapp == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text-info font-size-18">
                                                    <i class="mdi mdi-telegram"></i>
                                                </span>
                                            </div>
                                            <span>Telegram</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->telegram }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->telegram == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-dark-subtle text-success font-size-18">
                                                    <i class="mdi mdi-email"></i>
                                                </span>
                                            </div>
                                            <span>Email</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-muted">
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 mb-1">{{ $landing->whatsapp }}</h5>
                                    </td>
                                    <td>
                                        @if ($landing->whatsapp == 'none')
                                            <span class="badge badge-soft-danger font-size-12">
                                                Off</span>
                                        @else
                                            <span class="badge badge-soft-success font-size-12">
                                                On</span>
                                        @endif
                                    </td>
                                    <td style="width: 120px;">
                                        <a href="{{ route('landing.config', $landing->id) }}"
                                            class="btn btn-primary btn-sm w-xs">Edit</a>
                                    </td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Saas dashboard init -->
    <script src="{{ URL::asset('build/js/pages/saas-dashboard.init.js') }}"></script>
@endsection
  