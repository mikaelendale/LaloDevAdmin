@extends('layouts.master')

@section('title')
    Customer
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mx-n4 mt-n4 bg-info-subtle">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ URL::asset('build/images/users/' . $user->avatar) }}" alt=""
                            class="avatar-md rounded-circle mx-auto d-block" />
                        <h5 class="mt-3 mb-1">{{ $user->name }}</h5>
                        <p class="text-muted mb-3">{{ $user->bio }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled vstack gap-3 mb-0">
                        <li>
                            <div class="d-flex">
                                <i class='mdi mdi-email font-size-18 text-primary'></i>
                                <div class="ms-3">
                                    <h6 class="mb-1 fw-semibold">Email:</h6>
                                    <span class="text-muted">{{ $user->email }}</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <i class='bx bx-user-check font-size-18 text-primary'></i>
                                <div class="ms-3">
                                    <h6 class="mb-1 fw-semibold">User Type:</h6>
                                    <span class="text-muted">{{ $user->typeofuser }}</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <i class='mdi mdi-book-education font-size-18 text-primary'></i>
                                <div class="ms-3">
                                    <h6 class="mb-1 fw-semibold">Skills:</h6>
                                    <span class="text-muted">0</span>
                                </div>
                            </div>
                        </li>

                        <li class="hstack gap-2 mt-3">
                                <form action="{{ url('customer_delete', $user->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-soft-danger ">Delete</button>
                                </form>

                            <a href="/developer" class="btn btn-soft-success w-100">Go back</a>
                    </ul>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="mb-3">Joined services </h5>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <div class="avatar-md">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="{{ URL::asset('build/images/companies/lalo-logos/lalo-learn-logo.png') }}"
                                                alt="" height="30">
                                        </span>
                                    </div>
                                </div>


                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="javascript: void(0);"
                                            class="text-dark">Lalo Learn</a></h5>
                                    <p class="text-muted mb-4"> User {{ $user->name }} has joined lalo learn</p>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('build/images/users/avatar-5.jpg') }}"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span
                                                        class="avatar-title rounded-circle bg-success text-white font-size-16">
                                                        A
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <div class="avatar-md">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="{{ URL::asset('build/images/companies/lalo-logos/lalo-community-logo.png') }}"
                                                alt="" height="30">
                                        </span>
                                    </div>
                                </div>


                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="javascript: void(0);"
                                            class="text-dark">Lalo Community</a></h5>
                                    <p class="text-muted mb-4"> User {{ $user->name }} has joined lalo Community</p>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('build/images/users/avatar-5.jpg') }}"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span
                                                        class="avatar-title rounded-circle bg-success text-white font-size-16">
                                                        A
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <div class="avatar-md">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="{{ URL::asset('build/images/companies/lalo-logos/lalo-blog-logo.png') }}"
                                                alt="" height="30">
                                        </span>
                                    </div>
                                </div>


                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="javascript: void(0);"
                                            class="text-dark">Lalo Blog</a></h5>
                                    <p class="text-muted mb-4"> User {{ $user->name }} has joined lalo Blog</p>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('build/images/users/avatar-5.jpg') }}"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span
                                                        class="avatar-title rounded-circle bg-success text-white font-size-16">
                                                        A
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h5 class="mb-3">Social Media</h5>
                            <div class="hstack gap-2">
                                <?php 
                                if ($user->telegram_link == "none"){
                                ?>
                                <button disabled class="btn btn-soft-primary"><a href="{{ $user->telegram_link }}"><i
                                            class="bx bxl-telegram align-middle me-1"></i> </a></button>
                                <?php
                                }else{
                                     ?>
                                <a href="{{ $user->telegram_link }}" class="btn btn-soft-primary"><i
                                        class="bx bxl-telegram align-middle me-1"></i> </a>
                                <?php
                                }
                                ?>
                                <?php 
                                if ($user->instagram_link == "none"){
                                ?>
                                <button disabled class="btn btn-soft-danger"><a href="{{ $user->instagram_link }}"><i
                                            class="bx bxl-instagram align-middle me-1"></i> </a></button>
                                <?php
                                }else{
                                     ?>
                                <a href="{{ $user->instagram_link }}" class="btn btn-soft-danger"><i
                                        class="bx bxl-instagram align-middle me-1"></i> </a>
                                <?php
                                }
                                ?>
                                <?php 
                                if ($user->twitter_link == "none"){
                                ?>
                                <button disabled class="btn btn-soft-info"><a href="{{ $user->twitter_link }}"><i
                                            class="bx bxl-twitter align-middle me-1"></i> </a></button>
                                <?php
                                }else{
                                     ?>
                                <a href="{{ $user->twitter_link }}" class="btn btn-soft-primary"><i
                                        class="bx bxl-twitter align-middle me-1"></i> </a>
                                <?php
                                }
                                ?>
                                <?php 
                                if ($user->whatsapp_link == "none"){
                                ?>
                                <button disabled class="btn btn-soft-success"><a href="{{ $user->whatsapp_link }}"><i
                                            class="bx bxl-whatsapp align-middle me-1"></i> </a></button>
                                <?php
                                }else{
                                     ?>
                                <a href="{{ $user->whatsapp_link }}" class="btn btn-soft-success"><i
                                        class="bx bxl-whatsapp align-middle me-1"></i> </a>
                                <?php
                                }
                                ?>
                                <?php 
                                if ($user->facebook_link == "none"){
                                ?>
                                <button disabled class="btn btn-soft-info"><a href="{{ $user->facebook_link }}"><i
                                            class="bx bxl-facebook align-middle me-1"></i> </a></button>
                                <?php
                                }else{
                                     ?>
                                <a href="{{ $user->facebook_link }}" class="btn btn-soft-primary"><i
                                        class="bx bxl-facebook align-middle me-1"></i> </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection
