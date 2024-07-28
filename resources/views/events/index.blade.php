@extends('layouts.master')

@section('title')
    Events
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Events
        @endslot
        @slot('title')
            Dashboard
        @endslot
    @endcomponent
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="float-end dropdown ms-2">
                        <a class="text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>

                    <div>
                        <div class="mb-4 me-3">
                            <i class="bx bxs-cake  text-primary h1"></i>
                        </div>

                        <div>
                            <h5 class="">Events | Lalo Dev</h51>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom">
                    <div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <p class="text-muted mb-2">Available Events</p>
                                    <h5>{{ $count }}</h5>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end mt-4 mt-sm-0">
                                    <p class="text-muted mb-2">Since last month</p>
                                    <h5><span class="badge bg-success ms-1 align-bottom">{{ $monthlyCount }}</span></h5>

                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('events.create') }}" class="btn btn-warning btn-sm w-md">+ Add </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Timeline</h4>
                    <div>
                        <ul class="verti-timeline list-unstyled">
                            @foreach ($events as $event)
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle"></i>
                                    </div>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            {{-- <i class="{{ $event->icon_class }} h2 text-primary"></i> --}}
                                        </div>
                                        <div class="flex-grow-1">
                                            <div>
                                                <h5 class="font-size-14">{{ $event->title }}</h5>
                                                <p class="text-muted">{{ $event->published_at ? $event->published_at->format('M d, Y') : 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Events</h4>

                    <div class="row">
                        @foreach ($events as $events)
                            <div class="col-lg-4">

                                <div class="border rounded mt-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mt-0">{{ $events->title }}</h4>
                                            <h6 class="card-subtitle font-14 text-muted">{{ $events->status }} </h6><br>
                                            <h6 class="card-subtitle font-14 text-muted">Created at
                                                {{ $events->published_at ? $events->published_at->format('M d, Y') : 'N/A' }}
                                            </h6>
                                        </div>
                                        <img class="img-fluid" src="{{ asset('event_images/' . $events->featured_image) }}"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-text">Some quick example text to build on the card title and make
                                                up the bulk of the card's content.</p>
                                            <a href="{{ route('events.detail', $events->id) }}"
                                                class="card-link">Detail</a>
                                            <a href="{{ route('events.edit', $events->id) }}" class="card-link">edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
