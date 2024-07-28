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
            All
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create New events Post</a>
                    <h4 class="card-title">Avaliable events posts</h4>
                    </p>

                    <div class="table-responsive">
                        @if ($events->isEmpty())
                            <p>No events posts found.</p>
                        @else
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Excerpt</th>
                                        <th>Status</th>
                                        <th>Publication Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $events)
                                        <tr>
                                            <td>{{ $events->title }}</td>
                                            <td>{{ $events->excerpt }}</td>
                                            @if ($events->status == 'published')
                                                <td data-field="status">
                                                    <button disabled type="button" class="btn btn-success"
                                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                        {{ ucfirst($events->status) }}
                                                    </button>
                                                </td>
                                            @elseif ($events->status == 'pending')
                                                <td data-field="status">
                                                    <button disabled type="button" class="btn btn-warning"
                                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                        {{ ucfirst($events->status) }}
                                                    </button>
                                                </td>
                                            @elseif ($events->status == 'draft')
                                                <td data-field="status">
                                                    <button disabled type="button" class="btn btn-secondary"
                                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                                        {{ ucfirst($events->status) }}
                                                    </button>
                                                </td>
                                            @endif
                                            <td>{{ $events->published_at ? $events->published_at->format('M d, Y') : 'N/A' }}
                                            </td>
                                            <td>
                                                @if ($events->featured_image)
                                                    <img src="{{ asset('event_images/' . $events->featured_image) }}"
                                                        alt="Featured Image" width="100">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('events.edit', $events->id) }}"
                                                    class="btn btn-secondary btn-sm">Edit</a>
                                                    <a href="{{ route('events.detail', $events->id) }}"
                                                    class="btn btn-ptimary btn-sm">Detail</a>
                                                <form action="{{ route('events.destroy', $events->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection
