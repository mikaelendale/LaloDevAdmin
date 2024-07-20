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
            Customers
        @endslot
    @endcomponent
    <div class="row">
        <div class="row mb-3">
            <div class="col-xl-4 col-sm-6">

            </div>
            <div class="col-lg-8 col-sm-6">
                <form class="mt-4 mt-sm-0 float-sm-end d-sm-flex align-items-center">

                    <ul class="nav nav-pills product-view-nav justify-content-end mt-3 mt-sm-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('users.create') }}"><i
                                    class="bx bx-plus align-middle"></i></a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        @foreach ($user as $user)
            <div class="col-xl-3 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar-sm mx-auto mb-4">
                            <span class="avatar-title rounded-circle bg-primary-subtle text-primary font-size-16">
                                D
                            </span>
                        </div>
                        <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">{{ $user->name }}</a></h5>
                        <p class="text-muted">{{ $user->email }}</p>

                        <div>
                            <a href="#" class="badge bg-primary font-size-11 m-1">{{ $user->phone_no }}</a>
                            <a href="#" class="badge bg-primary font-size-11 m-1">{{ $user->typeofuser }}</a>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                        <div class="contact-links d-flex font-size-20">
                            <div class="flex-fill">
                                <a href="{{ url('/customer_detail', $user->id) }}" title="customer_detail"><i
                                        class="mdi mdi-eye"></i></a>
                            </div>
                            <div class="flex-fill">
                                <a href="{{ url('/customer_edit', $user->id) }}" title="customer_edit"><i
                                        class="bx bx-pencil"></i></a>
                            </div>
                            {{-- <div class="flex-fill">
                                <span>
                                    <form action="{{ url('customer_delete', $user->id) }}"class="btn  btn-sm edit"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="customer_delete"><i
                                                class="bx bx-user-circle"></i></button>
                                    </form>

                                </span>

                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/table-editsbuild/table-edits.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/table-editable.int.js') }}"></script>
@endsection
