@extends('layouts.master')

@section('title')
    course
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
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <h4 class="card-title">{{ $subsection->name }} Course Module preview</h4>
                        <p>{{ $subsection->detail }}</p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Example</h4>
                                    <p class="card-title-desc">This is an experimental awesome solution for responsive
                                        tables with complex
                                        data.</p>

                                    <div class="table-rep-plugin">
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Module</th>
                                                        <th data-priority="1">order</th>
                                                        <th data-priority="3">Trade Time</th>
                                                        <th data-priority="1">Change</th>
                                                        <th data-priority="3">Prev Close</th>
                                                        <th data-priority="3">Open</th>
                                                        <th data-priority="6">Bid</th>
                                                        <th data-priority="6">Ask</th>
                                                        <th data-priority="6">1y Target Est</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>GOOG <span class="co-name">Google Inc.</span></th>
                                                        <td>597.74</td>
                                                        <td>12:12PM</td>
                                                        <td>14.81 (2.54%)</td>
                                                        <td>582.93</td>
                                                        <td>597.95</td>
                                                        <td>597.73 x 100</td>
                                                        <td>597.91 x 300</td>
                                                        <td>731.10</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div> 
                    </div>
                    <!-- Scrollable modal button -->
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                        data-bs-target="#exampleModalScrollable">Add New Module</button>

                    <!-- Scrollable modal -->
                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add New Module</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form for adding a new module -->
                                    <form action="{{ route('module.store', $subsection->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="subsection_id" value="{{ $subsection->id }}">

                                        <div class="mb-3">
                                            <label for="moduleName" class="form-label">Module Name</label>
                                            <input type="text" class="form-control" id="moduleName" name="name"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="moduleDescription" class="form-label">Module
                                                Description</label>
                                            <textarea class="form-control" id="moduleDescription" name="description" rows="3" required></textarea>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Module</button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>
        </div>
    </div>
@endsection
