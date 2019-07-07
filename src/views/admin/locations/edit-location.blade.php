@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Add Location"])
    @endcomponent
@endsection
@section("content")
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route('admin.update.location',['id' => $location->id]) }}" method="post">
                    <header class="card-header">
                        <h2 class="card-title">Add Location</h2>
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
                            <div class="col-lg-4 form-group">
                                <label class="control-label">Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="text" name="locationName" value="{{ $location->name }}" id="locationName" class="form-control"
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
                                            <option {{ $locationType->id == $location->location_type_id ? 'selected ': '' }} value="{{$locationType->id}}">{{ $locationType->type_name }}</option>
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
                                    <input type="text" name="locationPhone" id="locationPhone" value="{{ $location->phone_no }}" class="form-control"
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
                                                <option {{ $location->district_id == $district->id ? 'selected ': '' }} value="{{ $district->id }}">{{ $district->name }}</option>

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
                                        <option value="{{ $location->thana->id }}">{{ $location->thana->thana_name }}</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 form-group">
                                <label class="control-label">Postal Code</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="number" name="postalCode" value="{{ $location->post_code }}" id="postalCode" class="form-control"
                                           placeholder="Enter postal code" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Latitude</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="text" name="latitude" value="{{ $location->latitude }}" id="streetAddress" class="form-control"
                                           placeholder="Enter latitude" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Longitude</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="text" name="longitude" value="{{ $location->longitude }}" id="longitude" class="form-control"
                                           placeholder="Enter longitude" />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="control-label">Street Address</label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                    <input type="text" name="streetAddress" value="{{ $location->street_address }}" id="streetAddress" class="form-control"
                                           placeholder="Type your address here" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <footer class="card-footer text-right">
                        <button class="btn btn-primary">update Location </button>
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