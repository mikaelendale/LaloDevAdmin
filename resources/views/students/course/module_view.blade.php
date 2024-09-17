@extends('layouts.master')

@section('title')
    course
@endsection
@section('script')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Subsection
        @endslot
        @slot('title')
            Edit
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="card-title mb-4"> 
                            <a class="btn btn-success" href="{{ route('subsection.addModule', ['subsectionId' => $subsection->id]) }}">
                                <i class="bx bx-plus align-middle"></i>&nbsp; Add Subsection module</a>
                        </h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">ID</th>
                                    <th class="align-middle">Name of module</th>
                                    <th class="align-middle">Action</th>
                                    <th class="align-middle"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($module->isEmpty())
                                    <p>No modules available for this subsection.</p>
                                @else
                                    @foreach ($module as $mod)
                                        <tr>
                                            <td>
                                                {{ $mod->id }}
                                            </td>
                                            <td>
                                                <a href="javascript: void(0);"
                                                    class="text-body fw-bold">{{ $mod->name }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('subsection.module', ['subsectionId' => $subsection->id, 'moduleId' => $mod->id]) }}"
                                                    class="btn btn-soft-primary">
                                                    Edit Module
                                                </a>

                                            </td>
                                            <td>
                                               <a href="{{route('module.delete', ['subsectionId' => $subsection->id, 'moduleId' => $mod->id] )}}" class="btn btn-soft-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
@endsection
