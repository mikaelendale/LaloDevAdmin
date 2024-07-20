 @extends('layouts.master')

 @section('title')
     User
 @endsection

 @section('content')
     @component('components.breadcrumb')
         @slot('li_1')
             Userpage
         @endslot
         @slot('title')
             Modify
         @endslot
     @endcomponent
     @if (session('error'))
         <p style="color: red;">{{ session('error') }}</p>
     @endif

     @if (session('success'))
         <p style="color: green;">{{ session('success') }}</p>
     @endif
     @if (session('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
     @endif
     @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif
     <div class="row">
         <div class="col-xl-6">
             <div class="card">
                 <div class="card-body">
                     <h4 class="card-title mb-4">User page Edit</h4>
                     <form action="{{ route('userpages.update', $userpage->id) }}" method="POST">
                         @csrf
                         @method('PUT')
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="mb-3">
                                     <label for="status-select" class="form-label">Website page status</label>
                                     <select name="page_status" class="form-control" id="status-select">
                                         <option value="on" {{ $userpage->page_status == 'on' ? 'selected' : '' }}>
                                             Active</option>
                                         <option value="off" {{ $userpage->page_status == 'off' ? 'selected' : '' }}>
                                             Inactive</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="mb-3">
                                     <label for="availability-status" class="form-label">Intro|Info Status</label>
                                     <select name="info" class="form-control" id="availability-status">
                                         <option value="on" {{ $userpage->info == 'on' ? 'selected' : '' }}>Online
                                         </option>
                                         <option value="off" {{ $userpage->info == 'off' ? 'selected' : '' }}>Offline
                                         </option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <div class="row" id="description-field">
                             <div class="col-md-12">
                                 <div class="mb-3">
                                     <label for="description-input" class="form-label">Description</label>
                                     <textarea name="description" id="description-input" class="form-control">{{ $userpage->description }}</textarea>
                                 </div>
                             </div>
                         </div>
                         <div class="row" id="reason-field">
                             <div class="col-lg-6">
                                 <div class="mb-3">
                                     <label for="reason-input" class="form-label">Reason</label>
                                     <input type="text" name="reason" id="reason-input" value="{{ $userpage->reason }}"
                                         class="form-control">
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
     <script>
         function toggleFields(status) {
             const descriptionField = document.getElementById('description-field');
             const reasonField = document.getElementById('reason-field');
             const descriptionInput = document.getElementById('description-input');
             const reasonInput = document.getElementById('reason-input');

             if (status === 'on') {
                 descriptionField.style.display = 'none';
                 reasonField.style.display = 'none';
                 descriptionInput.value = 'none';
                 reasonInput.value = 'none';
             } else {
                 descriptionField.style.display = 'block';
                 reasonField.style.display = 'block';
                 descriptionInput.value = '';
                 reasonInput.value = '';
             }
         }

         document.addEventListener('DOMContentLoaded', function() {
             const statusSelect = document.getElementById('status-select');
             toggleFields(statusSelect.value);

             statusSelect.addEventListener('change', function() {
                 toggleFields(this.value);
             });
         });
     </script>
 @endsection
