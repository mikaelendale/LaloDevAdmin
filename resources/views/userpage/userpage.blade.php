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
             Status
         @endslot
     @endcomponent
     @if (session('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
     @endif
     @if ($userpages->page_status === 'on')
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             <i class="mdi mdi-check-all me-2"></i>
             User page online 
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     @elseif ($userpages->page_status === 'off')
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <i class="mdi mdi-block-helper me-2"></i>
             Danger the user page is down turn it on
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     @endif
     <div class="row">
         <div class="col-xl-3">
             <div class="card">
                 <div class="card-body">
                     <h5 class="fw-semibold">Overview</h5>

                     <div class="table-responsive">
                         <table class="table">
                             <tbody>
                                 <tr>
                                     <th scope="col">Website status</th>
                                     <td scope="col">{{ $userpages->page_status }}</td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Intro:</th>
                                     <td>{{ $userpages->info }}</td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Last update</th>
                                     <td>{{ $userpages->updated_at ? $userpages->updated_at->format('M d, Y') : 'N/A' }}
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                     <div class="hstack">
                         <a href="{{ route('userpages.edit', $userpages->id) }}"><button
                                 class="btn btn-warning w-100">edit</button></a>
                     </div>
                 </div>
             </div>


         </div>
         <!--end col-->
         <div class="col-xl-3">
             <div class="card">
                 <div class="card-body">
                     <div class="text-center">
                         <img src="{{ URL::asset('build/images/icon.png') }}" alt="" height="50"
                             class="mx-auto d-block">
                         <h5 class="mt-3 mb-1">Lalo Dev</h5>
                         <p class="text-muted mb-0">Since {{ $userpages->started_at }}</p>
                     </div>

                     <ul class="list-unstyled mt-4">
                         <li>
                             <div class="d-flex">
                                 <i class="bx bx-phone text-primary fs-4"></i>
                                 <div class="ms-3">
                                     <h6 class="fs-14 mb-2">Phone</h6>
                                     <p class="text-muted fs-14 mb-0">{{ $userpages->phone_no }}</p>
                                 </div>
                             </div>
                         </li>
                         <li class="mt-3">
                             <div class="d-flex">
                                 <i class="bx bx-mail-send text-primary fs-4"></i>
                                 <div class="ms-3">
                                     <h6 class="fs-14 mb-2">Email</h6>
                                     <p class="text-muted fs-14 mb-0">{{ $userpages->email }}</p>
                                 </div>
                             </div>
                         </li>
                         <li class="mt-3">
                             <div class="d-flex">
                                 <i class="bx bx-map text-primary fs-4"></i>
                                 <div class="ms-3">
                                     <h6 class="fs-14 mb-2">Location</h6>
                                     <p class="text-muted fs-14 mb-0">{{ $userpages->location }}</p>
                                 </div>
                             </div>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
         <div class="col-xl-6">
             <div class="card">
                 <div class="card-body border-bottom">
                     <div class="d-flex">
                         <img src="{{ URL::asset('build/images/companies/wechat.svg') }}" alt="" height="50">
                         <div class="flex-grow-1 ms-3">
                             <h5 class="fw-semibold">Lalo Dev</h5>
                             <ul class="list-unstyled hstack gap-2 mb-0">
                                 <li>
                                     <i class="bx bx-building-house"></i> <span class="text-muted">Lalo Dev</span>
                                 </li>
                                 <li>
                                     <i class="bx bx-map"></i> <span class="text-muted">{{ $userpages->location }}</span>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="card-body">
                     <h5 class="fw-semibold mb-3">Description</h5>
                     <p class="text-muted">{{ $userpages->description }}</p>
                 </div>
             </div>
         </div>
         <!--end col-->
     </div>
     <!--end row-->
 @endsection
 @section('script')
     <script src="{{ URL::asset('build/js/app.js') }}"></script>
 @endsection
