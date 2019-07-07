@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Add Merchant"])
    @endcomponent
@endsection
@section("content")
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route('admin.update.merchant',['id' => $merchant]) }}" method="post">
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

                                        @foreach($merchantType as $type)
                                            <option {{ $type->id == $merchant->mtype_id ? 'selected ': ''}}value="{{ $type->id }}">{{ $type->title }}</option>
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
                                    <input type="text" name="businessName" id="businessName" value="{{ $merchant->name }}" class="form-control"
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
                                    <input type="text" name="mobileNo" id="mobileNo" value="{{ $merchant->mobile_no }}" class="form-control"
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
                                    <input type="text" name="contactPerson" value="{{ $merchant->contact_person }}" id="contactPerson" class="form-control"
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
                                    <input type="text" name="designation" value="{{ $merchant->designation }}" id="designation" class="form-control"
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
                                    <input type="url" name="website" value="{{ $merchant->website }}" id="website" class="form-control"
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
                                    <input type="text" name="alternativeContactNo" value="{{ $merchant->alternative_contact_no }}" id="mobileNo" class="form-control"
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
                                    <input readonly type="email" name="email" id="email" value="{{ $merchant->email }}" class="form-control"
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
                                    <input type="text" name="refMobileNo" id="refMobileNo" value="{{ $merchant->referral_mobile_no }}" class="form-control"
                                           placeholder="" />
                                </div>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <h3>Primary Business Location</h3>
                            </div>

                            @php
                                if(isset($merchant)){
                                    $location = $merchant->location;
                                }

                            @endphp

                            <div class="col-lg-4 form-group">
                                <label class="control-label">Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="text" name="locationName" id="locationName" value="{{ isset($location->name) ? $location->name: "" }}" class="form-control"
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
                                        @foreach($locationTypes as $locationType)
                                                    @php
                                                        $selectOption = "";
                                                            if(isset($location)){
                                                                  $selectOption = $locationType->id == $location->location_type_id ? 'selected ': '';
                                                                }
                                                    @endphp
                                            <option {{ $selectOption }} value="{{$locationType->id}}">{{ $locationType->type_name }}</option>
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
                                    <input type="text" name="locationPhone" id="locationPhone" value="{{ isset($location)?$location->phone_no:"" }}" class="form-control"
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
                                            id="locationDistrict" required>

                                        @if(!empty($districts))
                                            @foreach($districts as $district)
                                                @php
                                                    $selectOption = "";
                                                        if(isset($location)){
                                                              $selectOption = $location->district_id == $district->id ? 'selected ': '';
                                                            }
                                                @endphp
                                                <option {{ $selectOption }} value="{{ $district->id }}">{{ $district->name }}</option>

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
                                            name="locationThana" id="locationThana" required>
                                        <option value="{{ isset($location)?$location->thana->id:"" }}">{{ isset($location)?$location->thana->thana_name:"" }}</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 form-group">
                                <label class="control-label">Postal Code</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="number" name="postalCode" id="postalCode" value="{{ isset($location)?$location->post_code: "" }}" class="form-control"
                                           placeholder="Enter postal code" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Latitude</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="text" name="latitude" id="streetAddress" value="{{ isset($location)?$location->latitude:"" }}" class="form-control"
                                           placeholder="Enter latitude" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Longitude</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="text" name="longitude" id="longitude" value="{{ isset($location)?$location->longitude:"" }}" class="form-control"
                                           placeholder="Enter longitude" />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="control-label">Street Address</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="text" name="streetAddress" id="streetAddress" value="{{ isset($location)?$location->street_address:"" }}" class="form-control"
                                           placeholder="Type your address here" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <footer class="card-footer text-right">
                        <button class="btn btn-primary">Update Merchant </button>
                    </footer>
                </form>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#locationDistrict").on("change", function(){
                var id = $(this).val();
                var requestedUrl = $(this).data('thana-url');
                console.log($(this).val());
                $.ajax({
                    type:'POST',
                    url: requestedUrl,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id : id
                    },
                    success:function(response){

                        if(response.status === 'success'){
                            $('#locationThana').children().remove();
                            var thana = response.data;
                            var selectOptions = "";
                            if(thana.length){
                                $.each(thana, function(key, value){
                                    console.log(value);
                                    selectOptions +="<option  value=" + value.id + ">"+value.thana_name+"</option>"

                                });
                                $("#locationThana").append(selectOptions);
                            }
                        }

                    }
                });
            });
        });
    </script>

@endsection