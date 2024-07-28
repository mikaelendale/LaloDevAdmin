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
            Detail
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="pt-3">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div>
                                    <div class="text-center">
                                        <div class="mb-4">
                                            @if ($events->status == 'published')
                                                <a href="" class="badge bg-success font-size-12">
                                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                                    {{ $events->status }}
                                                </a>
                                            @elseif ($events->status == 'pending')
                                                <a href="" class="badge bg-warning font-size-12">
                                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                                    {{ $events->status }}
                                                </a>
                                            @elseif ($events->status == 'draft')
                                                <a href="" class="badge bg-secondary font-size-12">
                                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                                    {{ $events->status }}
                                                </a>
                                            @endif

                                        </div>
                                        <h4>{{ $events->title }}</h4>
                                        <p class="text-muted mb-4"><i class="mdi mdi-calendar me-1"></i>
                                            {{ $events->published_at ? $events->published_at->format('M d, Y') : 'N/A' }}</p>
                                    </div>

                                    <hr>
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mt-4 mt-sm-0">
                                                    <p class="text-muted mb-2">Date</p>
                                                    <h5 class="font-size-15">
                                                        {{ $events->published_at ? $events->published_at->format('M d, Y') : 'N/A' }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mt-4 mt-sm-0">
                                                    <p class="text-muted mb-2">Post by</p>
                                                    <h5 class="font-size-15">{{ ucfirst(Auth::user()->name) }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="my-5">
                                        @if ($events->featured_image)
                                            <img src="{{ asset('event_images/' . $events->featured_image) }}"
                                                class="img-thumbnail mx-auto d-block" alt="Featured Image">
                                        @else
                                            N/A
                                        @endif
                                    </div>

                                    <hr>

                                    <div class="mt-4">
                                        <div class="text-muted font-size-14">
                                            <p>{{ $events->content }}</p>
                                            {{-- <blockquote class="p-4 border-light border rounded mb-4">
                                            <div class="d-flex">
                                                <div class="me-3">
                                                    <i class="bx bxs-quote-alt-left text-dark font-size-24"></i>
                                                </div>
                                                <div>
                                                    <p class="mb-0"> At vero eos et accusamus et iusto odio dignissimos
                                                        ducimus qui blanditiis praesentium deleniti atque corrupti quos
                                                        dolores et quas molestias excepturi sint quidem rerum facilis
                                                        est</p>
                                                </div>
                                            </div>

                                        </blockquote> --}}
                                            <div class="mt-4">
                                                <h5 class="mb-3">Excerpt: </h5>

                                                <div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <ul class="ps-4">
                                                                    <li class="py-1">{{ $events->excerpt }}</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> 
                                        <a href="{{route('events.index')}}" class="btn btn-success">back</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
