@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Change Password"])
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route('admin.password.update') }}" method="post" >
                    <header class="card-header">
                        <h2 class="card-title">Change Password</h2>
                    </header>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert {{ Session::get('alertClass') }}">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <strong>{{ Session::get('message') }}</strong>.
                            </div>
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Old Password
                                    <span class="required">*</span>
                                </label>
                                <input type="password" name="oldPassword" id="oldPassword" class="form-control" placeholder="Enter Old Password" required/>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">New Password
                                    <span class="required">*</span>
                                </label>
                                <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="Enter New Password" required/>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Confirm Password
                                    <span class="required">*</span>
                                </label>
                                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm New Password" required/>
                            </div>
                            <div class="col-lg-3 form-group mt-4">
                                <button class="btn btn-primary">Change Password </button>
                            </div>
                        </div>


                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection