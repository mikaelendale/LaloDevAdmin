   @extends('layouts.master')

  @section('title')
      maintenANCE
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
      <form id="createproject-form" autocomplete="off" class="needs-validation" novalidate="">

          <div class="row">
              <div class="col-lg-4">
                  <div class="card">
                      <div class="card-body">
                          <div class="mb-3">
                              <label for="projectname-input" class="form-label">Title</label>

                              <input id="projectname-input" name="projectname-input" type="text" class="form-control"
                                  placeholder="Enter project name..." required="">
                              <div class="invalid-feedback">Please enter a Title.</div>
                          </div>
                          <div class="mb-3">
                              <label for="projectdesc-input" class="form-label">Description</label>
                              <textarea class="form-control" id="projectdesc-input" rows="3" placeholder="Enter project description..."
                                  required=""></textarea>
                              <div class="invalid-feedback">Please enter a description.</div>
                          </div>
                          <div class="mb-3">
                              <label for="projectname-input" class="form-label">Status</label>

                              <select name="time_line_status" id="time-select" class="form-control">
                                  <option value="on">on</option>
                                  <option value="off">off</option>
                              </select>
                          </div>
                      </div>
                      <!-- end card body -->
                  </div>
                  <!-- end card -->

              </div>
              <!-- end col -->

              <div class="col-lg-8">
                  <div class="time-fields">
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title mb-3">Time line</h5>

                              <div class="mb-3">
                                  <label class="form-label" for="project-status-input">Status</label>
                                  <select class="form-select" id="project-status-input">
                                      <option value="Completed">Completed</option>
                                      <option value="Inprogress" selected="">Inprogress</option>
                                      <option value="Delay">Delay</option>
                                  </select>
                                  <div class="invalid-feedback">Please select project status.</div>
                              </div>

                              <div>
                                  <label class="form-label" for="project-visibility-input">Visibility</label>
                                  <select class="form-select" id="project-visibility-input">
                                      <option value="Private">Private</option>
                                      <option value="Public">Public</option>
                                      <option value="Team">Team</option>
                                  </select>
                              </div>
                          </div>
                          <!-- end card body -->
                      </div>
                      <!-- end card -->

                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title mb-3">Due Date</h5>

                              <input type="text" id="duedate-input" class="form-control" placeholder="Select due date"
                                  name="due date" data-date-format="dd M, yyyy" data-provide="datepicker"
                                  data-date-autoclose="true" required="">
                              <div class="invalid-feedback">Please select due date.</div>
                          </div>
                          <!-- end card body -->
                      </div>
                      <!-- end card -->
                  </div>
              </div>
              <!-- end col -->


              <div class="col-lg-12">
                  <div class="text-end mb-4">
                      <button type="submit" class="btn btn-primary">Create Project</button>
                  </div>
              </div>
          </div>
      </form>
  @endsection
