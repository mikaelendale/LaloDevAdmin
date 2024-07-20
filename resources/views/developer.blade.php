@extends('layouts.master')

@section('title')
    Developer
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Developer
        @endslot
        @slot('title')
            Developer
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">List of Developers under Lalo Dev</h4>
                    <p class="card-title-desc">
                    </p>

                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>User type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $devs)
                                    @csrf
                                    <tr data-id="1">
                                        <td data-field="id" style="width: 80px">{{ $devs->id }}</td>
                                        <td data-field="name">{{ $devs->name }}</td>
                                        <td data-field="email">{{ $devs->email }}</td>
                                        <td data-field="phone_no">{{ $devs->phone_no }}</td>
                                        <td data-field="phone_no">{{ $devs->typeofuser }}</td>
                                        <td style="width: 100px">
                                            <a href="{{ url('/developer_detail', $devs->id) }}"
                                                class="btn btn-outline-primary btn-sm edit" title="developer_detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/developer_edit', $devs->id) }}"
                                                class="btn btn-outline-secondary btn-sm edit" title="developer_edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <span>
                                                <form
                                                    action="{{ url('developer_delete', $devs->id) }}"class="btn  btn-sm edit"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm edit"
                                                        title="developer_delete"><i class="fas fa-trash"></i></button>
                                                </form>

                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection
