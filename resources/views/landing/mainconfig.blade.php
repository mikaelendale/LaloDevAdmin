  @extends('layouts.master')

 @section('title')
     Landing
 @endsection

 @section('content')
     @component('components.breadcrumb')
         @slot('li_1')
             maintenance
         @endslot
         @slot('title')
             config
         @endslot
     @endcomponent
      
     @endsection