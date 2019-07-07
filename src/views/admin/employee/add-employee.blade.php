@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Add Employee"])
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route("admin.store.employee") }}" method="post" enctype="multipart/form-data">
                    <header class="card-header">
                        <h2 class="card-title">Add New Employee</h2>
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
                                <label class="control-label">Upload Profile Photo
                                </label>
                                <div class="profile-pic-upload-container">
                                    <input type="image" class="sl-profile-image-avatar" src="{{ asset('img/profile-avatar.png') }}" />
                                    <input type="file" name="staffImage" id="staffImage" class="form-control d-none file-upload" />
                                    <i class="fa fa-camera"></i>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Employee ID
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                    <input type="text" name="staffId" id="staffId" class="form-control" placeholder=" i.e. ABCD1234" required/>
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
                                    <input type="text" name="staffName" id="staffName" class="form-control" placeholder="John Doe" required/>
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
                                    <input type="text" name="staffPhone" id="staffPhone" class="form-control" placeholder="01712345678" required/>
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Email
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                    <input type="email" name="staffEmail" id="staffEmail" class="form-control" required placeholder="john@gmail.com" />
                                </div>
                            </div>


                            <div class="col-lg-3">
                                <label class="control-label">Gender</label>
                                <div class="staff-gender-radio d-flex">
                                    <div class="radio-custom mr-4">
                                        <input type="radio" id="genderMale" value="Male" name="staffGender" required>
                                        <label for="genderMale">
                                            <i class="fa fa-male"></i> Male</label>
                                    </div>
                                    <div class="radio-custom">
                                        <input type="radio" id="genderFemale" value="Female" name="staffGender" required>
                                        <label for="genderFemale">
                                            <i class="fa fa-female"></i> Female</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <label class="control-label">Date of birth
                                    <span class="required">*</span></label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                    <input type="text" data-plugin-datepicker data-plugin-options='{ "orientation": "bottom auto"}' name="staffDob" id="staffDob" class="form-control"  required placeholder="Click to choose">
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
                                    <input type="text" data-plugin-datepicker data-plugin-options='{ "orientation": "bottom auto"}' name="staffJoinDate" id="staffJoinDate"  class="form-control" placeholder="Click to choose">
                                </div>
                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Salary
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-money"></i>
                                                </span>
                                    <input type="number" name="staffSalary" id="staffSalary" class="form-control" placeholder="i.e. 20000"/>
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
                                    <select class="form-control" data-plugin-selectTwo  data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}' name="staffDes" id="staffDes">

                                        <option value="">-- Select --</option>
                                        <option value="Proprietor">Proprietor</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Salesman">Salesman</option>

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
                                    <select class="form-control"  data-plugin-selectTwo  data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'  name="staffDept" id="staffDept">
                                        <option value="">-- Select --</option>
                                        <option value="Management">Management</option>
                                        <option value="Sale">Sale</option>
                                        <option value="Customer Support">Customer Support</option>
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
                                        <option value="">-- Select --</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
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

                                    <select class="form-control" required data-plugin-selectTwo  data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'  name="staffWebRole" id="staffWebRole">
                                        <option value="">-- Select --</option>
                                        @foreach($responsibilities as $responsibility)
                                            <option value="{{ $responsibility->id }}">{{ $responsibility->name }}</option>
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
                                    <select class="form-control"  data-plugin-selectTwo  data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'  name="staffEmploymentStatus" id="staffEmploymentStatus" disabled="true">
                                        <option>Active</option>
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
                                    <input type="text" name="staffEmgContactName" id="staffEmgContactName" class="form-control" placeholder="i.e. Jonathon Doe"/>
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Relation
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </span>
                                    <input type="text" name="staffEmgContactRelation" id="staffEmgContactRelation" class="form-control" placeholder="i.e. Father" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Contact No
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                    <input type="text" name="staffEmgContactNo" id="staffEmgContactNo" class="form-control" placeholder="i.e. 1245784587"/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <footer class="card-footer text-right">
                        <button type="reset" class="btn btn-default">Reset</button>
                        <button  type="submit" class="btn btn-primary">Add Employee </button>
                    </footer>
                </form>
            </section>
        </div>
    </div>
@endsection