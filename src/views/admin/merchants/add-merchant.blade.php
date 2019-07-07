@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Add Merchant"])
    @endcomponent
@endsection
@section("content")
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route('admin.store.merchant') }}" method="post">
                    <header class="card-header">
                        <h2 class="card-title">Add Merchant</h2>
                    </header>
                    {{ csrf_field() }}
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="alert {{ Session::get('alertClass') }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>{{ Session::get('message') }}</strong>.
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label class="control-label">Merchant Type</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                    <select class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                            name="mtype_id" id="merchant_type_id">
                                        <option>-- Select Merchant Type--</option>
                                        @foreach($merchantType as $type)
                                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <h3>Business Information</h3>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Business Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                    <input type="text" name="businessName" id="businessName" class="form-control"
                                           placeholder="" required />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Mobile No
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-mobile"></i>
                                                </span>
                                    <input type="text" name="mobileNo" id="mobileNo" class="form-control"
                                           placeholder="" required />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Contact Person
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                    <input type="text" name="contactPerson" id="contactPerson" class="form-control"
                                           placeholder="" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Designation
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                    <input type="text" name="designation" id="designation" class="form-control"
                                           placeholder="" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Website
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-globe"></i>
                                                </span>
                                    <input type="url" name="website" id="website" class="form-control"
                                           placeholder="https://www.abc.com" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Alternative Contact No

                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-mobile"></i>
                                                </span>
                                    <input type="text" name="alternativeContactNo" id="mobileNo" class="form-control"
                                           placeholder="" />
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
                                    <input type="email" name="email" id="email" class="form-control"
                                           placeholder="" required />
                                </div>
                            </div>

                            <div class="col-lg-3 form-group">
                                <label class="control-label">Referral Mobile No

                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-mobile"></i>
                                                </span>
                                    <input type="text" name="refMobileNo" id="refMobileNo" class="form-control"
                                           placeholder="" />
                                </div>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <h3>Primary Business Location</h3>
                            </div>


                            <div class="col-lg-4 form-group">
                                <label class="control-label">Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="text" name="locationName" id="locationName" class="form-control"
                                           placeholder="Enter name" required />
                                </div>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label class="control-label">Location Type</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <select class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                            name="locationType" id="locationType" required>
                                        <option>-- Select Location Type--</option>
                                        @foreach($locationTypes as $locationType)
                                            <option value="{{$locationType->id}}">{{ $locationType->type_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-lg-4 form-group">
                                <label class="control-label">Phone</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-mobile"></i>
                                                </span>
                                    <input type="text" name="locationPhone" id="locationPhone" class="form-control"
                                           placeholder="i.e. 0123456987" />
                                </div>
                            </div>

                            <div class="col-lg-4 form-group">
                                <label class="control-label">District</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <select class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                            data-thana-url="{{ route('admin.all.thana.by_district') }}"
                                            name="locationDistrict"
                                            id="locationDistrict">
                                        <option>-- Select District--</option>
                                        @if(!empty($districts))
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>

                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 form-group">
                                <label class="control-label">Thana</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <select class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                            name="locationThana" id="locationThana">
                                        <option>-- Select Thana --</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 form-group">
                                <label class="control-label">Postal Code</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="number" name="postalCode" id="postalCode" class="form-control"
                                           placeholder="Enter postal code" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Latitude</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="text" name="latitude" id="streetAddress" class="form-control"
                                           placeholder="Enter latitude" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Longitude</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="text" name="longitude" id="longitude" class="form-control"
                                           placeholder="Enter longitude" />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="control-label">Street Address</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="text" name="streetAddress" id="streetAddress" class="form-control"
                                           placeholder="Type your address here" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <footer class="card-footer text-right">
                         <button class="btn btn-primary">Add Merchant </button>
                    </footer>
                </form>
            </section>
        </div>
    </div>
@endsection

@section('script')


@endsection