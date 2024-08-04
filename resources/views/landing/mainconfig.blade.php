  @extends('layouts.master')

  @section('title')
      maintenance
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
          <!-- end row -->
          <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="f"> <b>Common
                                                                    section</b></label>
                                                            <select name="common_footer" id="common-select"
                                                                class="form-control">
                                                                <option value="on"
                                                                    {{ old('common_footer', $maintenance->common_footer) == 'on' ? 'selected' : '' }}>
                                                                    on
                                                                </option>
                                                                <option value="off"
                                                                    {{ old('common_footer', $maintenance->common_footer) == 'off' ? 'selected' : '' }}>
                                                                    off
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="common-fields">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="input-date1">Common 1</label>
                                                                        <input name="common_1" id="input-date1"
                                                                            class="form-control input-mask"
                                                                            value="{{ old('slug', $maintenance->common_1) }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="input-date1">Common 1 link</label>
                                                                        <input name="common_1_link" id="input-date1"
                                                                            class="form-control input-mask"
                                                                            value="{{ old('slug', $maintenance->common_1_link) }}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="input-date1">Common 2</label>
                                                                        <input name="common_2" id="input-date1"
                                                                            class="form-control input-mask"
                                                                            value="{{ old('slug', $maintenance->common_2) }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="input-date1">Common 2 link</label>
                                                                        <input name="common_2_link" id="input-date1"
                                                                            class="form-control input-mask"
                                                                            value="{{ old('slug', $maintenance->common_2_link) }}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="input-date1">Common 3</label>
                                                                        <input name="common_3" id="input-date1"
                                                                            class="form-control input-mask"
                                                                            value="{{ old('slug', $maintenance->common_3) }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="input-date1">Common 3 link</label>
                                                                        <input name="common_3_link" id="input-date1"
                                                                            class="form-control input-mask"
                                                                            value="{{ old('slug', $maintenance->common_3_link) }}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="form-label">Legal
                                                                section</label>
                                                            <select name="legal_footer" id="legal-select"
                                                                class="form-control">
                                                                <option value="on"
                                                                    {{ old('legal_footer', $maintenance->legal_footer) == 'on' ? 'selected' : '' }}>
                                                                    on
                                                                </option>
                                                                <option value="off"
                                                                    {{ old('legal_footer', $maintenance->legal_footer) == 'off' ? 'selected' : '' }}>
                                                                    off
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="legal-fields">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="input-date1">Legal 1</label>
                                                                        <input name="legal_1" id="input-date1"
                                                                            class="form-control input-mask"value="{{ old('slug', $maintenance->legal_1) }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="input-date1">Legal 1 link</label>
                                                                        <input name="legal_1_link" id="input-date1"
                                                                            class="form-control input-mask"value="{{ old('slug', $maintenance->legal_1_link) }}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="input-date1">Legal 2</label>
                                                                        <input name="legal_2" id="input-date1"
                                                                            class="form-control input-mask"value="{{ old('slug', $maintenance->legal_2) }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="input-date1">Legal 2 link</label>
                                                                        <input name="legal_2_link" id="input-date1"
                                                                            class="form-control input-mask"value="{{ old('slug', $maintenance->legal_2_link) }}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="input-date1">Legal 3</label>
                                                                        <input name="legal_3" id="input-date1"
                                                                            class="form-control input-mask"value="{{ old('slug', $maintenance->legal_3) }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="input-date1">Legal 3 link</label>
                                                                        <input name="legal_3_link" id="input-date1"
                                                                            class="form-control input-mask"value="{{ old('slug', $maintenance->legal_3_link) }}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
      </form> 
       @endsection
