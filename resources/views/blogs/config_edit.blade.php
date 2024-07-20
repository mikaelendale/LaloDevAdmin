@extends('layouts.master')

@section('title')
    Blog
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Config
        @endslot
        @slot('title')
            Edit
        @endslot
    @endcomponent
<div class="row">
         <div class="col-xl-6">
             <div class="card">
                 <div class="card-body">
                     <h4 class="card-title mb-4">Blog site config</h4>
                     <form action=" " method="POST">
                         @csrf
                         @method('PUT')
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="mb-3">
                                     <label for="status-select" class="form-label">Blog website page status</label>
                                     <select name="blog_site_status" class="form-control" id="status-select">
                                         <option value="on" {{ $sites->blog_site_status == 'on' ? 'selected' : '' }}>
                                             Active</option>
                                         <option value="off" {{ $sites->blog_site_status == 'off' ? 'selected' : '' }}>
                                             Inactive</option>
                                     </select>
                                 </div>
                             </div> 
                         </div>  
                         <div>
                             <button type="submit" class="btn btn-primary w-md">Submit</button>
                         </div>
                     </form>
                 </div>
                 <!-- end card body -->
             </div>
             <!-- end card -->
         </div>
         
     </div>
     @endsection