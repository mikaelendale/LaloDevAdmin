@extends('layouts.master')

@section('title')
    Landing
@endsection
@section('css')
    <!-- select2 css -->
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Landing
        @endslot
        @slot('title')
            Config
        @endslot
    @endcomponent
    <div class="checkout-tabs">
        <div class="row">
            <div class="col-xl-2 col-sm-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-Navigation-tab" data-bs-toggle="pill" href="#v-pills-Navigation"
                        role="tab" aria-controls="v-pills-shipping" aria-selected="true">
                        <i class="bx   bx-navigation d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Web Navigation</p>
                    </a>
                    <a class="nav-link" id="v-pills-auth-tab" data-bs-toggle="pill" href="#v-pills-auth" role="tab"
                        aria-controls="v-pills-auth" aria-selected="false">
                        <i class="bx bx-log-in d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Authentication</p>
                    </a>
                    <a class="nav-link" id="v-pills-sections-tab" data-bs-toggle="pill" href="#v-pills-sections"
                        role="tab" aria-controls="v-pills-sections" aria-selected="false">
                        <i class="bx bx-collection d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Web sections</p>
                    </a>
                    <a class="nav-link" id="v-pills-footer-tab" data-bs-toggle="pill" href="#v-pills-footer" role="tab"
                        aria-controls="v-pills-footer" aria-selected="false">
                        <i class="bx bx-grid-horizontal d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Footer</p>
                    </a>
                    <a class="nav-link" id="v-pills-links-tab" data-bs-toggle="pill" href="#v-pills-links" role="tab"
                        aria-controls="v-pills-links" aria-selected="false">
                        <i class="bx bx-link d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Social links</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-sm-9">
                <form action="{{ route('landing.update', $landing->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-Navigation" role="tabpanel"
                                    aria-labelledby="v-pills-shipping-tab">
                                    <div>
                                        <div class="mt-4 mt-lg-0">
                                            <h5 class="font-size-14 mb-3">Web status</h5>
                                            <div class="d-flex">
                                                <div class="square-switch">
                                                    <select name="status" class="form-control">
                                                        <option value="on"
                                                            {{ old('status', $landing->status) == 'on' ? 'selected' : '' }}>
                                                            on
                                                        </option>
                                                        <option value="off"
                                                            {{ old('status', $landing->status) == 'off' ? 'selected' : '' }}>
                                                            off
                                                        </option>
                                                    </select>
                                                    <label for="square-switch3" data-on-label="Yes"
                                                        data-off-label="No"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-email-input" class="form-label">Home</label>
                                                    <select name="home" class="form-control">
                                                        <option value="on"
                                                            {{ old('home', $landing->home) == 'on' ? 'selected' : '' }}>
                                                            on
                                                        </option>
                                                        <option value="off"
                                                            {{ old('home', $landing->home) == 'off' ? 'selected' : '' }}>
                                                            off
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-password-input" class="form-label">Home link</label>
                                                    <input type="text" name="home_link" class="form-control"
                                                        id="formrow-password-input"
                                                        value="{{ old('slug', $landing->home_link) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-email-input" class="form-label">About</label>
                                                    <select name="about" class="form-control">
                                                        <option value="on"
                                                            {{ old('home', $landing->about) == 'on' ? 'selected' : '' }}>
                                                            on
                                                        </option>
                                                        <option value="off"
                                                            {{ old('home', $landing->about) == 'off' ? 'selected' : '' }}>
                                                            off
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-password-input" class="form-label">About
                                                        link</label>
                                                    <input type="text" name="about_link" class="form-control"
                                                        id="formrow-password-input"
                                                        value="{{ old('slug', $landing->about_link) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-email-input" class="form-label">Service</label>
                                                    <select name="service" class="form-control">
                                                        <option value="on"
                                                            {{ old('home', $landing->service) == 'on' ? 'selected' : '' }}>
                                                            on
                                                        </option>
                                                        <option value="off"
                                                            {{ old('home', $landing->service) == 'off' ? 'selected' : '' }}>
                                                            off
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-password-input" class="form-label">Service
                                                        link</label>
                                                    <input type="text" name="service_link" class="form-control"
                                                        id="formrow-password-input"
                                                        value="{{ old('slug', $landing->service_link) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-email-input" class="form-label">Quote</label>
                                                    <select name="quote" class="form-control">
                                                        <option value="on"
                                                            {{ old('home', $landing->quote) == 'on' ? 'selected' : '' }}>
                                                            on
                                                        </option>
                                                        <option value="off"
                                                            {{ old('home', $landing->quote) == 'off' ? 'selected' : '' }}>
                                                            off
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-password-input" class="form-label">Quote
                                                        link</label>
                                                    <input type="text" name="quote_link" class="form-control"
                                                        id="formrow-password-input"
                                                        value="{{ old('slug', $landing->quote_link) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-email-input" class="form-label">Blog</label>
                                                    <select name="blog" class="form-control">
                                                        <option value="on"
                                                            {{ old('home', $landing->blog) == 'on' ? 'selected' : '' }}>
                                                            on
                                                        </option>
                                                        <option value="off"
                                                            {{ old('home', $landing->blog) == 'off' ? 'selected' : '' }}>
                                                            off
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-password-input" class="form-label">Blog
                                                        link</label>
                                                    <input type="text" name="blog_link" class="form-control"
                                                        id="formrow-password-input"
                                                        value="{{ old('slug', $landing->blog_link) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-email-input" class="form-label">FAQ</label>
                                                    <select name="faq" class="form-control">
                                                        <option value="on"
                                                            {{ old('home', $landing->faq) == 'on' ? 'selected' : '' }}>
                                                            on
                                                        </option>
                                                        <option value="off"
                                                            {{ old('home', $landing->faq) == 'off' ? 'selected' : '' }}>
                                                            off
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-password-input" class="form-label">FAQ
                                                        link</label>
                                                    <input type="text" name="faq_link" class="form-control"
                                                        id="formrow-password-input"
                                                        value="{{ old('slug', $landing->faq_link) }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-auth" role="tabpanel"
                                    aria-labelledby="v-pills-payment-tab">
                                    <div>
                                        <h5 class="mt-5 mb-3 font-size-15">User Auth access buttons</h5>
                                        <div class="p-4  ">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="formrow-email-input" class="form-label">Register</label>
                                                    <select name="register" class="form-control">
                                                        <option value="on"
                                                            {{ old('register', $landing->register) == 'on' ? 'selected' : '' }}>
                                                            on
                                                        </option>
                                                        <option value="off"
                                                            {{ old('register', $landing->register) == 'off' ? 'selected' : '' }}>
                                                            off
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="formrow-email-input" class="form-label">login</label>
                                                    <select name="login" class="form-control">
                                                        <option value="on"
                                                            {{ old('login', $landing->login) == 'on' ? 'selected' : '' }}>
                                                            on
                                                        </option>
                                                        <option value="off"
                                                            {{ old('login', $landing->login) == 'off' ? 'selected' : '' }}>
                                                            off
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-sections" role="tabpanel"
                                    aria-labelledby="v-pills-confir-tab">
                                    <div class="card shadow-none   mb-0">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Sections in the landing home page</h4>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">About
                                                            section</label>
                                                        <select name="about_section" class="form-control">
                                                            <option value="on"
                                                                {{ old('about_section', $landing->about_section) == 'on' ? 'selected' : '' }}>
                                                                on
                                                            </option>
                                                            <option value="off"
                                                                {{ old('about_section', $landing->about_section) == 'off' ? 'selected' : '' }}>
                                                                off
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Explore
                                                            section</label>
                                                        <select name="explore_section" class="form-control">
                                                            <option value="on"
                                                                {{ old('explore_section', $landing->explore_section) == 'on' ? 'selected' : '' }}>
                                                                on
                                                            </option>
                                                            <option value="off"
                                                                {{ old('explore_section', $landing->explore_section) == 'off' ? 'selected' : '' }}>
                                                                off
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">CTA
                                                            section</label>
                                                        <select name="cta_section" class="form-control">
                                                            <option value="on"
                                                                {{ old('cta_section', $landing->cta_section) == 'on' ? 'selected' : '' }}>
                                                                on
                                                            </option>
                                                            <option value="off"
                                                                {{ old('cta_section', $landing->cta_section) == 'off' ? 'selected' : '' }}>
                                                                off
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">footer
                                                            section</label>
                                                        <select name="footer" class="form-control">
                                                            <option value="on"
                                                                {{ old('footer', $landing->footer) == 'on' ? 'selected' : '' }}>
                                                                on
                                                            </option>
                                                            <option value="off"
                                                                {{ old('footer', $landing->footer) == 'off' ? 'selected' : '' }}>
                                                                off
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-footer" role="tabpanel"
                                    aria-labelledby="v-pills-confir-tab">
                                    <div class="card shadow-none  mb-0">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Sections in the landing footer</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Service
                                                            Section</label>
                                                        <select name="service_footer" id="service-select"
                                                            class="form-control">
                                                            <option value="on"
                                                                {{ old('service_footer', $landing->service_footer) == 'on' ? 'selected' : '' }}>
                                                                On</option>
                                                            <option value="off"
                                                                {{ old('service_footer', $landing->service_footer) == 'off' ? 'selected' : '' }}>
                                                                Off</option>
                                                        </select>
                                                    </div>
                                                    <div class="service-fields">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="input-date1">service 1</label>
                                                                    <input name="service_1" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->service_1) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="input-date1">service 1 link</label>
                                                                    <input name="service_1_link" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->service_1_link) }}">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="input-date1">service 2</label>
                                                                    <input name="service_2" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->service_2) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="input-date1">service 2 link</label>
                                                                    <input name="service_2_link" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->service_2_link) }}">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="input-date1">service 3</label>
                                                                    <input name="service_3" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->service_3) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="input-date1">service 3 link</label>
                                                                    <input name="service_3_link" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->service_3_link) }}">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="input-date1">service 4</label>
                                                                    <input name="service_4" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->service_4) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="input-date1">service 4 link</label>
                                                                    <input name="service_4_link" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->service_4_link) }}">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="input-date1">service 5</label>
                                                                    <input name="service_5" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->service_5) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="input-date1">service 5 link</label>
                                                                    <input name="service_5_link" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->service_5_link) }}">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Add more service rows as needed -->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Company
                                                            section</label>
                                                        <select name="company_footer" id="company-select"
                                                            class="form-control">
                                                            <option value="on"
                                                                {{ old('company_footer', $landing->company_footer) == 'on' ? 'selected' : '' }}>
                                                                on
                                                            </option>
                                                            <option value="off"
                                                                {{ old('company_footer', $landing->company_footer) == 'off' ? 'selected' : '' }}>
                                                                off
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="company-fields">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="input-date1">Company 1</label>
                                                                    <input name="company_1" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->company_1) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="input-date1">Company 1 link</label>
                                                                    <input name="company_1_link" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->company_1_link) }}">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="input-date1">Company 2</label>
                                                                    <input name="company_2" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->company_2) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="input-date1">Company 2 link</label>
                                                                    <input name="company_2_link" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->company_2_link) }}">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="input-date1">Company 3</label>
                                                                    <input name="company_3" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->company_3) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="input-date1">Company 3 link</label>
                                                                    <input name="company_3_link" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->company_3_link) }}">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="input-date1">Company 4</label>
                                                                    <input name="company_4" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->company_4) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="input-date1">Company 4 link</label>
                                                                    <input name="company_4_link" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->company_4_link) }}">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="input-date1">Company 5</label>
                                                                    <input name="company_5" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->company_5) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="input-date1">Company 5 link</label>
                                                                    <input name="company_5_link" id="input-date1"
                                                                        class="form-control input-mask"
                                                                        value="{{ old('slug', $landing->company_5_link) }}">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="f"> <b>Common
                                                                    section</b></label>
                                                            <select name="common_footer" id="common-select"
                                                                class="form-control">
                                                                <option value="on"
                                                                    {{ old('common_footer', $landing->common_footer) == 'on' ? 'selected' : '' }}>
                                                                    on
                                                                </option>
                                                                <option value="off"
                                                                    {{ old('common_footer', $landing->common_footer) == 'off' ? 'selected' : '' }}>
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
                                                                            value="{{ old('slug', $landing->common_1) }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="input-date1">Common 1 link</label>
                                                                        <input name="common_1_link" id="input-date1"
                                                                            class="form-control input-mask"
                                                                            value="{{ old('slug', $landing->common_1_link) }}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="input-date1">Common 2</label>
                                                                        <input name="common_2" id="input-date1"
                                                                            class="form-control input-mask"
                                                                            value="{{ old('slug', $landing->common_2) }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="input-date1">Common 2 link</label>
                                                                        <input name="common_2_link" id="input-date1"
                                                                            class="form-control input-mask"
                                                                            value="{{ old('slug', $landing->common_2_link) }}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="input-date1">Common 3</label>
                                                                        <input name="common_3" id="input-date1"
                                                                            class="form-control input-mask"
                                                                            value="{{ old('slug', $landing->common_3) }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="input-date1">Common 3 link</label>
                                                                        <input name="common_3_link" id="input-date1"
                                                                            class="form-control input-mask"
                                                                            value="{{ old('slug', $landing->common_3_link) }}">

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
                                                                    {{ old('legal_footer', $landing->legal_footer) == 'on' ? 'selected' : '' }}>
                                                                    on
                                                                </option>
                                                                <option value="off"
                                                                    {{ old('legal_footer', $landing->legal_footer) == 'off' ? 'selected' : '' }}>
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
                                                                            class="form-control input-mask"value="{{ old('slug', $landing->legal_1) }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="input-date1">Legal 1 link</label>
                                                                        <input name="legal_1_link" id="input-date1"
                                                                            class="form-control input-mask"value="{{ old('slug', $landing->legal_1_link) }}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="input-date1">Legal 2</label>
                                                                        <input name="legal_2" id="input-date1"
                                                                            class="form-control input-mask"value="{{ old('slug', $landing->legal_2) }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="input-date1">Legal 2 link</label>
                                                                        <input name="legal_2_link" id="input-date1"
                                                                            class="form-control input-mask"value="{{ old('slug', $landing->legal_2_link) }}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3">
                                                                        <label for="input-date1">Legal 3</label>
                                                                        <input name="legal_3" id="input-date1"
                                                                            class="form-control input-mask"value="{{ old('slug', $landing->legal_3) }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="input-date1">Legal 3 link</label>
                                                                        <input name="legal_3_link" id="input-date1"
                                                                            class="form-control input-mask"value="{{ old('slug', $landing->legal_3_link) }}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-links" role="tabpanel"
                                    aria-labelledby="v-pills-confir-tab">
                                    <div class="card shadow-none   mb-0">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Social Links</h4>
                                            <div class="mt-4 mt-xl-0">
                                                <div class="docs-options">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="option-endDate">Facebook</span>
                                                        <input type="text" class="form-control" name="facebook"
                                                            value="{{ old('slug', $landing->facebook) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="option-endDate">Twitter</span>
                                                        <input type="text" class="form-control" name="twitter"
                                                            value="{{ old('slug', $landing->twitter) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"
                                                            id="option-endDate">Instagram</span>
                                                        <input type="text" class="form-control" name="instagram"
                                                            value="{{ old('slug', $landing->instagram) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="option-endDate">Linkedin</span>
                                                        <input type="text" class="form-control" name="linkedin"
                                                            value="{{ old('slug', $landing->linkedin) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="option-endDate">Youtube</span>
                                                        <input type="text" class="form-control" name="youtube"
                                                            value="{{ old('slug', $landing->youtube) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"
                                                            id="option-endDate">Pinterest</span>
                                                        <input type="text" class="form-control" name="pinterest"
                                                            value="{{ old('slug', $landing->pinterest) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="option-endDate">Google</span>
                                                        <input type="text" class="form-control" name="google"
                                                            value="{{ old('slug', $landing->google) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="option-endDate">Dribbble</span>
                                                        <input type="text" class="form-control" name="dribbble"
                                                            value="{{ old('slug', $landing->dribbble) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"
                                                            id="option-endDate">Soundcloud</span>
                                                        <input type="text" class="form-control" name="soundcloud"
                                                            value="{{ old('slug', $landing->soundcloud) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="option-endDate">Spotify</span>
                                                        <input type="text" class="form-control" name="spotify"
                                                            value="{{ old('slug', $landing->spotify) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="option-endDate">Skype</span>
                                                        <input type="text" class="form-control" name="skype"
                                                            value="{{ old('slug', $landing->skype) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="option-endDate">Whatsapp</span>
                                                        <input type="text" class="form-control" name="whatsapp"
                                                            value="{{ old('slug', $landing->whatsapp) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="option-endDate">Telegram</span>
                                                        <input type="text" class="form-control" name="telegram"
                                                            value="{{ old('slug', $landing->telegram) }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="option-endDate">email</span>
                                                        <input type="text" class="form-control" name="email"
                                                            value="{{ old('slug', $landing->email) }}">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <a href="/landing" class="btn text-muted d-none d-sm-inline-block btn-link">
                                <i class="mdi mdi-arrow-left me-1"></i> Back to Landing </a>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="mdi mdi-truck-fast me-1"></i> Update changes </button>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
@section('script')
    <!-- select 2 plugin -->
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('build/js/pages/ecommerce-select2.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            function toggleServiceFields() {
                if ($('#service-select').val() == 'on') {
                    $('.service-fields').show();
                } else {
                    $('.service-fields').hide();
                }
            }

            // Initial check
            toggleServiceFields();

            // Check on change
            $('#service-select').change(function() {
                toggleServiceFields();
            });
        });
        $(document).ready(function() {
            function toggleCompanyFields() {
                if ($('#company-select').val() == 'on') {
                    $('.company-fields').show();
                } else {
                    $('.company-fields').hide();
                }
            }

            // Initial check
            toggleCompanyFields();

            // Check on change
            $('#company-select').change(function() {
                toggleCompanyFields();
            });
        });
        $(document).ready(function() {
            function toggleCommonFields() {
                if ($('#common-select').val() == 'on') {
                    $('.common-fields').show();
                } else {
                    $('.common-fields').hide();
                }
            }

            // Initial check
            toggleCommonFields();

            // Check on change
            $('#common-select').change(function() {
                toggleCommonFields();
            });
        });
        $(document).ready(function() {
            function toggleLegalFields() {
                if ($('#legal-select').val() == 'on') {
                    $('.legal-fields').show();
                } else {
                    $('.legal-fields').hide();
                }
            }

            // Initial check
            toggleLegalFields();

            // Check on change
            $('#legal-select').change(function() {
                toggleLegalFields();
            });
        });
    </script>
@endsection
