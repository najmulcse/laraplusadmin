@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "My profile"])
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="/">
                    <header class="card-header">
                        <h2 class="card-title">My Profile</h2>
                    </header>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-4 offset-lg-4 form-group text-center">
                                <label class="control-label">Profile Photo
                                </label>
                                <div class="sl-staff-image mb-2">
                                    <img src="{{ $employee->profile_photo? asset('img/employees').'/'.$employee->profile_photo: asset('img/profile-avatar.png') }}" class="img-fluid" alt="">
                                </div>

                            </div>
                            <div class="col-lg-3"></div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Employee ID</label>

                                <p><i class="fa fa-user"></i> {{ $employee->employee_id }}</p>

                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Employee Name

                                </label>

                                <p><i class="fa fa-user"></i> {{ $employee->name }}</p>

                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Phone No

                                </label>


                                <p><i class="fa fa-mobile"></i> {{ $employee->mobile_no }}</p>


                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Email
                                </label>

                                <p><i class="fa fa-envelope"></i> {{ $employee->email }}</p>

                            </div>


                            <div class="col-lg-3">
                                <label class="control-label">Gender</label>
                                <p><i class="fa fa-male"></i> {{ $employee->gender }}</p>
                            </div>

                            <div class="col-lg-3">
                                <label class="control-label">Date of birth</label>
                                <p><i class="fa fa-calendar"></i> {{ $employee->date_of_birth }}</p>
                            </div>

                            <div class="col-lg-3">
                                <label class="control-label">Joining Date</label>

                                <p><i class="fa fa-calendar-plus-o"></i> {{ $employee->joining_date }}</p>
                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Salary</label>
                                <p><i class="fa fa-money"></i> {{ $employee->salary }}</p>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Designation</label>
                                <p><i class="fa fa-sitemap"></i> {{ $employee->designation }}</p>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Department</label>
                                <p><i class="fa fa-sitemap"></i> {{ $employee->department }}</p>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Posting</label>
                                <p><i class="fa fa-clipboard"></i> {{ $employee->location->name }}</p>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">Web Role</label>
                                <p><i class="fa fa-id-card"></i> {{ $employee->responsibility }}</p>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">Employment Status</label>
                                <p><i class="fa fa-id-card"></i>
                                    <span class="badge-{{ $employee->active_status? 'success':'danger'}}">
                                        {{ $employee->active_status? 'Active': 'Inactive' }}
                                    </span>
                                </p>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Emergency Contact Name
                                </label>
                                <p><i class="fa fa-user-plus"></i> {{ ucfirst($employee->emergency_contact_name) }}</p>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Relation</label>
                                <p><i class="fa fa-users"></i> {{ $employee->emergency_contact_relation }}</p>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Contact No</label>
                                <p><i class="fa fa-phone"></i> {{ $employee->emergency_contact_no }}</p>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection