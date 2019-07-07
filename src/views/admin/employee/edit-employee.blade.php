@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Edit Employee"])
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route("admin.update.employee",['id' => $employee->id]) }}" method="post" enctype="multipart/form-data">
                    <header class="card-header">
                        <h2 class="card-title">Edit Employee</h2>
                    </header>
                    @csrf
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert {{ Session::get('alertClass') }}">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <strong>{{ Session::get('message') }}</strong>.
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-4 offset-lg-4 form-group text-center">
                                <label class="control-label">Update Profile Photo
                                </label>
                                <div class="profile-pic-upload-container">
                                    <input type="image" class="sl-profile-image-avatar" src="{{ $employee->profile_photo? asset('img/employees').'/'.$employee->profile_photo: asset('img/profile-avatar.png') }}" />
                                    <input type="file" name="staffImage" id="staffImage" class="form-control d-none file-upload" />
                                    <i class="fa fa-camera"></i>
                                </div>
                            </div>
                            <div class="col-lg-3">
                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Employee ID
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                    <input type="text" name="staffId" id="staffId" class="form-control" value="{{ $employee->employee_id }}" placeholder=" i.e. ABCD1234" required/>
                                </div>
                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Employee Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                    <input type="text" name="staffName" value="{{ $employee->name }}" id="staffName" class="form-control" placeholder="John Doe" required/>
                                </div>
                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Phone No
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-mobile"></i>
                                                </span>
                                    <input type="text" name="staffPhone" value="{{ $employee->mobile_no }}" id="staffPhone" class="form-control" placeholder="01712345678" required/>
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Email
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                    <input type="email" disabled="true" name="staffEmail" value="{{ $employee->email }}" id="staffEmail" class="form-control" placeholder="john@gmail.com" />
                                </div>
                            </div>


                            <div class="col-lg-3">
                                <label class="control-label">Gender</label>
                                <div class="staff-gender-radio d-flex">
                                    <div class="radio-custom mr-4">
                                        <input type="radio" id="genderMale" {{ $employee->gender =='Male'? 'checked': '' }} value="Male" name="staffGender" required>
                                        <label for="genderMale">
                                            <i class="fa fa-male"></i> Male</label>
                                    </div>
                                    <div class="radio-custom">
                                        <input type="radio" id="genderFemale"  {{ $employee->gender =='Female'? 'checked': '' }} value="Female" name="staffGender" required>
                                        <label for="genderFemale">
                                            <i class="fa fa-female"></i> Female</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <label class="control-label">Date of birth</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                    <input type="text" autocomplete="off" data-plugin-datepicker data-plugin-options='{ "orientation": "bottom auto"}' value="{{ Carbon\Carbon::parse($employee->date_of_birth)->format('d/m/Y') }}" name="staffDob" id="staffDob" class="form-control"  placeholder="Click to choose">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <label class="control-label">Joining Date
                                    <span class="required">*</span>
                                </label>

                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar-plus-o"></i>
                                                </span>
                                    <input type="text" autocomplete="off" data-plugin-datepicker data-plugin-options='{ "orientation": "bottom auto"}' value="{{ Carbon\Carbon::parse($employee->joining_date)->format('d/m/Y') }}" name="staffJoinDate" id="staffJoinDate"  class="form-control" placeholder="Click to choose">
                                </div>
                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Salary
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-money"></i>
                                                </span>
                                    <input type="number" name="staffSalary" id="staffSalary" value="{{ $employee->salary }}" class="form-control" placeholder="i.e. 20000"/>
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Designation
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-sitemap"></i>
                                                </span>
                                    <select class="form-control" data-plugin-selectTwo  data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}' required name="staffDes" id="staffDes">

                                        <option {{ $employee->designation == 'Proprietor' ? 'selected ': '' }} value="Proprietor">Proprietor</option>
                                        <option {{ $employee->designation == 'Manager' ? 'selected ': '' }} value="Manager">Manager</option>
                                        <option {{ $employee->designation == 'Salesman' ? 'selected ': '' }} value="Salesman">Salesman</option>

                                    </select>
                                    <span class="input-group-addon">
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </span>
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Department
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-sitemap"></i>
                                                </span>
                                    <select class="form-control"  data-plugin-selectTwo  data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}' required  name="staffDept" id="staffDept">
                                        <option {{ $employee->department == 'Management' ? 'selected ': '' }} value="Management">Management</option>
                                        <option {{ $employee->department == 'Sale' ? 'selected ': '' }} value="Sale">Sale</option>
                                        <option {{ $employee->department == 'Customer Support' ? 'selected ': '' }} value="Customer Support">Customer Support</option>
                                    </select>
                                    <span class="input-group-addon">
                                                    <a href="#">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </span>
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Posting
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-clipboard"></i>
                                                </span>
                                    <select class="form-control" required  data-plugin-selectTwo  data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'  name="staffPosting" id="staffPosting">
                                        @foreach($locations as $location)
                                            <option {{ $location->id == $employee->location_id? 'selected ': '' }} value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-addon">
                                                    <a href="#">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">Web Role
                                    <span class="required">*</span>
                                    <a href="#" data-toggle="popover"
                                       data-trigger="hover" data-placement="top"
                                       title=""
                                       data-content="Get dashboard access accordingly"><i
                                                class="fa fa-info-circle"></i></a>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                    <select class="form-control"  required data-plugin-selectTwo  data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'  name="staffWebRole" id="staffWebRole">
                                        @foreach($responsibilities as $responsibility)
                                            <option {{ $responsibility->id == $employee->responsibilities[0]->id ? 'selected ': ''}} value="{{ $responsibility->id }}">{{ $responsibility->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">Employment Status

                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                    <select class="form-control"  data-plugin-selectTwo  data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'  name="staffEmploymentStatus" id="staffEmploymentStatus">
                                        <option value="1" {{ $employee->active_status == 1? 'selected ': '' }}>Active</option>
                                        <option value="0" {{ $employee->active_status == 0? 'selected ': '' }}>Deactive</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Emergency Contact Name
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user-plus"></i>
                                                </span>
                                    <input type="text" value="{{ $employee->emergency_contact_name }}" name="staffEmgContactName" id="staffEmgContactName" class="form-control" placeholder="i.e. Jonathon Doe"/>
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Relation
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </span>
                                    <input type="text" value="{{ $employee->emergency_contact_relation }}" name="staffEmgContactRelation" id="staffEmgContactRelation" class="form-control" placeholder="i.e. Father" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Contact No
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                    <input type="text" value="{{ $employee->emergency_contact_no }}" name="staffEmgContactNo" id="staffEmgContactNo" class="form-control" placeholder="i.e. 1245784587"/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <footer class="card-footer text-right">
                        <button  type="submit" class="btn btn-primary">Update Employee </button>
                    </footer>
                </form>
            </section>
        </div>
    </div>
@endsection