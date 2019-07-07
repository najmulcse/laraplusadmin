@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Add Location Type"])
    @endcomponent
@endsection
@section("content")
    <!-- main page content start here -->
    <div class="row">
        <div class="col-lg-6">
            <section class="card">
                <form action="{{ route('admin.store.location.type') }}" method="POST">
                    <header class="card-header">
                        <h2 class="card-title">Add Location Type</h2>
                    </header>
                    <div class="card-body">
                        {{ csrf_field() }}
                        @if(Session::has('message'))
                            <div class="alert {{ Session::get('alertClass') }}">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <strong>{{ Session::get('message') }}</strong>.
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label class="control-label">Location Type Name
                                </label>
                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-sitemap"></i>
                                            </span>
                                    <input type="text" name="locationTypeName" id="locationTypeName" class="form-control" placeholder="" required/>
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                            </div>


                        </div>
                    </div>
                    <footer class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </footer>
                </form>
            </section>
        </div>

        <div class="col-lg-6">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Location Type List</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                      @if(count($locationTypes))
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Location Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $count = 1
                        @endphp
                        @foreach($locationTypes as $locationType)
                        <tr>

                            <td>{{ $count++ }}</td>
                            <td>{{ $locationType->type_name }}</td>
                            <td>
                                <a href="#modalDelete"
                                   data-id="{{$locationType->id}}"
                                   data-url="{{ route('admin.delete.location.type') }}"
                                   class="default-delete-option btn btn-danger btn-sm mb-1 mt-1 mr-1 modal-basic"
                                ><i class="fa fa-trash"></i> Delete</a>

                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                          @else
                          <p>No location type available</p>
                         @endif
                    </table>
                </div>
            </section>
        </div>
    </div>
    @include('laraplusadmin::admin.layouts.modals.delete')
@endsection

@section('script')

@endsection