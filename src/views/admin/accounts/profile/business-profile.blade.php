@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Business profile"])
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="/">
                    <header class="card-header">
                        <h2 class="card-title">Business Profile</h2>
                    </header>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-4 offset-lg-4 form-group text-center">

                                <div class="sl-staff-image mb-2">
                                    <img src="{{ asset('img/profile-avatar.png') }}" class="img-fluid" alt="">
                                </div>

                            </div>
                            <div class="col-lg-3"></div>



                            <div class="col-lg-3 form-group">
                                <label class="control-label">Business Name</label>
                                <p><i class="fa fa-user"></i> {{ $merchant->name }}</p>
                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Phone No
                                </label>
                                <p><i class="fa fa-mobile"></i> {{ $merchant->mobile_no }}</p>
                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Contact Person

                                </label>

                                <p><i class="fa fa-user"></i> {{ $merchant->contact_person }}</p>

                            </div>


                            <div class="col-lg-3 form-group">
                                <label class="control-label">Designation</label>
                                <p><i class="fa fa-sitemap"></i> {{ $merchant->designation }}</p>
                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Website</label>
                                <p><i class="fa fa-globe"></i> {{ $merchant->website }}</p>
                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label"> Alternative Contact No</label>
                                <p><i class="fa fa-mobile"></i> {{ $merchant->alternative_contact_no }}</p>
                            </div>

                            <div class="col-lg-3">
                                <label class="control-label">Email</label>

                                <p><i class="fa fa-envelope"></i> {{ $merchant->email }}</p>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">Founded Date</label>

                                <p><i class="fa fa-calendar-plus-o"></i> {{ $merchant->founded_date }}</p>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label">About Us</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <p><i class="fa fa-file-text"></i> {{ $merchant->about }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection