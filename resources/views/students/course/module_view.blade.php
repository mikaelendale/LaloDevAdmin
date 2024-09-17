@extends('layouts.master')

@section('title')
    course
@endsection
@section('script')
    <script src="https://unpkg.com/monaco-editor@latest/min/vs/loader.js"></script>
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
                        <h4 class="card-title mb-4"> <a class="btn btn-success"
                                href="{{ route('subsection.moduleadd', $subsection->id) }}"><i
                                    class="bx bx-plus align-middle"></i>&nbsp; Add Subsection module</a>
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
                                                <!-- Delete Button -->
                                                <form action="http://localhost:8080/courses/subsection/3" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this subsection?');">
                                                    <input type="hidden" name="_token"
                                                        value="SwD7XhzR60g8Wu8Eqrln8vsD3R7paLApUvP179et" autocomplete="off">
                                                    <input type="hidden" name="_method" value="DELETE"> <button
                                                        type="submit" class="btn btn-soft-danger">
                                                        Delete
                                                    </button>
                                                </form>
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
