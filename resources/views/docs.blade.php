@extends('layouts.master')

@section('title') Docs @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Lalo Learn @endslot
@slot('title') Docs @endslot
@endcomponent


@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection