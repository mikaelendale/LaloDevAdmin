@extends('layouts.master')

@section('title') Students Dash @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Lalo Learn @endslot
@slot('title') Students Dash @endslot
@endcomponent


@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection