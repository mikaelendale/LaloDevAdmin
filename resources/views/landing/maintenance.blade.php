 @extends('layouts.master')

 @section('title')
     Landing
 @endsection

 @section('content')
     @component('components.breadcrumb')
         @slot('li_1')
             Landing
         @endslot
         @slot('title')
             Maintenance
         @endslot
     @endcomponent
     @if (session('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
     @endif
     <div class="row">
         <div class="col-lg-6">
             <div class="card">
                 <div class="card-body">
                     <div class="d-flex">
                         <div>
                            @if ($maintenance->title == null )
                                <h4 class="card-title mb-3">maintenance is not on or set cuttently</h4>
                             <p class="text-muted"></p>
                             <div>
                                 <a href="{{ route('landing.maintain', $maintenance->id) }}" class="btn btn-primary btn-sm"><i
                                         class="bx bx-user-plus align-middle"></i> config</a>
                             </div>
                             @else
                              <h4 class="card-title mb-3">{{$maintenance->title}}</h4>
                             <p class="text-muted">{{$maintenance->description}}</p>
                             <div>
                                 <a href="{{ route('landing.maintain', $maintenance->id) }}" class="btn btn-primary btn-sm"><i
                                         class="bx bx-user-plus align-middle"></i> config</a>
                             </div>   
                            @endif
                             
                         </div> 
                     </div>
                 </div>
             </div>
             <!--end card-->
         </div>
         @if ($maintenance->title == null && $maintenance->time_line_status !== 'onf')
         @else
             <div class="col-xl-6">
             <div class="card">
                 <div class="card-body"> 
                     <div data-simplebar="init" class="mt-2 simplebar-scrollable-y" style="max-height: 280px;">
                         <div class="simplebar-wrapper" style="margin: 0px;">
                             <div class="simplebar-height-auto-observer-wrapper">
                                 <div class="simplebar-height-auto-observer"></div>
                             </div>
                             <div class="simplebar-mask">
                                 <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                     <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                         aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                                         <div class="simplebar-content" style="padding: 0px;">
                                             <ul class="verti-timeline list-unstyled">
                                                 <li class="event-list active">
                                                     <div class="event-timeline-dot">
                                                         <i
                                                             class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i>
                                                     </div>
                                                     <div class="d-flex">
                                                         <div class="flex-shrink-0 me-3">
                                                             <h5 class="font-size-14">10 Nov <i
                                                                     class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                                             </h5>
                                                         </div>
                                                         <div class="flex-grow-1">
                                                             <div>
                                                                 Posted <span class="fw-semibold">Beautiful Day with
                                                                     Friends</span> blog... <a
                                                                     href="javascript: void(0);">View</a>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </li>
                                                 <li class="event-list">
                                                     <div class="event-timeline-dot">
                                                         <i class="bx bx-right-arrow-circle font-size-18"></i>
                                                     </div>
                                                     <div class="d-flex">
                                                         <div class="flex-shrink-0 me-3">
                                                             <h5 class="font-size-14">08 Nov <i
                                                                     class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                                             </h5>
                                                         </div>
                                                         <div class="flex-grow-1">
                                                             <div>
                                                                 If several languages coalesce, the grammar of the
                                                                 resulting... <a href="javascript: void(0);">Read</a>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </li>
                                                 <li class="event-list">
                                                     <div class="event-timeline-dot">
                                                         <i class="bx bx-right-arrow-circle font-size-18"></i>
                                                     </div>
                                                     <div class="d-flex">
                                                         <div class="flex-shrink-0 me-3">
                                                             <h5 class="font-size-14">02 Nov <i
                                                                     class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                                             </h5>
                                                         </div>
                                                         <div class="flex-grow-1">
                                                             <div>
                                                                 Create <span class="fw-semibold">Drawing a sketch
                                                                     blog</span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </li>
                                                 <li class="event-list">
                                                     <div class="event-timeline-dot">
                                                         <i class="bx bx-right-arrow-circle font-size-18"></i>
                                                     </div>
                                                     <div class="d-flex">
                                                         <div class="flex-shrink-0 me-3">
                                                             <h5 class="font-size-14">24 Oct <i
                                                                     class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                                             </h5>
                                                         </div>
                                                         <div class="flex-grow-1">
                                                             <div>
                                                                 In enim justo, rhoncus ut, imperdiet a venenatis vitae
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </li>
                                                 <li class="event-list">
                                                     <div class="event-timeline-dot">
                                                         <i class="bx bx-right-arrow-circle font-size-18"></i>
                                                     </div>
                                                     <div class="d-flex">
                                                         <div class="flex-shrink-0 me-3">
                                                             <h5 class="font-size-14">21 Oct <i
                                                                     class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                                             </h5>
                                                         </div>
                                                         <div class="flex-grow-1">
                                                             <div>
                                                                 Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </li>
                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="simplebar-placeholder" style="width: 854px; height: 285px;"></div>
                         </div>
                         <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                             <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                         </div>
                         <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                             <div class="simplebar-scrollbar"
                                 style="height: 275px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                         </div>
                     </div>

                     <div class="text-center mt-4"><a href="javascript: void(0);"
                             class="btn btn-primary waves-effect waves-light btn-sm">View More <i
                                 class="mdi mdi-arrow-right ms-1"></i></a></div>
                 </div>
             </div>
             <!-- end card -->
         </div>
         @endif
         
     </div>
 @endsection
