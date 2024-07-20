@extends('layouts.master')

@section('title')
    Blog
@endsection
@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
            Blogs
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
                                        @if ($blog->status == 'published')
                                                <a href="" class="badge bg-success font-size-12">
                                            <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> {{ $blog->status }}
                                        </a>
                                            @elseif ($blog->status == 'pending')
                                                <a href="" class="badge bg-warning font-size-12">
                                            <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> {{ $blog->status }}
                                        </a>
                                            @elseif ($blog->status == 'draft')
                                                <a href="" class="badge bg-secondary font-size-12">
                                            <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> {{ $blog->status }}
                                        </a>
                                            @endif
                                        
                                    </div>
                                    <h4>{{ $blog->title }}</h4>
                                    <p class="text-muted mb-4"><i class="mdi mdi-calendar me-1"></i> {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'N/A' }}</p>
                                </div>

                                <hr>
                                <div class="text-center">
                                    <div class="row"> 
                                        <div class="col-sm-6">
                                            <div class="mt-4 mt-sm-0">
                                                <p class="text-muted mb-2">Date</p>
                                                <h5 class="font-size-15">{{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'N/A' }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-4 mt-sm-0">
                                                <p class="text-muted mb-2">Post by</p>
                                                <h5 class="font-size-15">{{ucfirst(Auth::user()->name)}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="my-5">
                                    @if ($blog->featured_image)
                                                    <img src="{{ asset('blog_images/' . $blog->featured_image) }}" class="img-thumbnail mx-auto d-block"
                                                        alt="Featured Image">
                                                @else
                                                    N/A
                                                @endif
                                </div>

                                <hr>

                                <div class="mt-4">
                                    <div class="text-muted font-size-14">
                                        <p>{{$blog->content}}</p>
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
                                                                <li class="py-1">{{$blog->excerpt}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="mt-5">
                                        <h5 class="font-size-15"><i class="bx bx-message-dots text-muted align-middle me-1"></i> Comments :</h5>

                                        <div>
                                            <div class="d-flex py-3">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title rounded-circle bg-light text-primary">
                                                            <i class="bx bxs-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 mb-1">Delores Williams <small class="text-muted float-end">1 hr Ago</small></h5>
                                                    <p class="text-muted">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual</p>
                                                </div>
                                            </div> 

                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <h5 class="font-size-16 mb-3">Leave a Message</h5>

                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="commentname-input" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="commentname-input" placeholder="Enter name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="commentemail-input" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="commentemail-input" placeholder="Enter email">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="commentmessage-input" class="form-label">Message</label>
                                                <textarea class="form-control" id="commentmessage-input" placeholder="Your message..." rows="3"></textarea>
                                            </div>

                                            <div class="text-end">
                                                <a href="{{ route('blogs.index')}}" class="btn btn-success w-sm">Back</a>
                                            </div>
                                        </form>
                                    </div>
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
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection
