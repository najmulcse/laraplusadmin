@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Edit Url"])
    @endcomponent
@endsection

@section("content")
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route('admin.update.url',['id'=> $url]) }}" method="post">
                    <header class="card-header">
                        <h2 class="card-title">Edit Url</h2>
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
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                    <input type="text" name="name" id="name" class="form-control"
                                           placeholder="Url name" required value="{{ $url->name }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Url
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                    <input type="text" name="url" id="url" class="form-control"
                                           placeholder="Url" value="{{ $url->url }}" required />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Route Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                    <input type="text" name="routeName" id="routeName" class="form-control"
                                           placeholder="Route Name" value="{{ $url->route }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Url Group
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user-circle"></i>
                                                </span>
                                    <select multiple class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                            name="urlGroup[]" id="urlGroup" required>
                                        <option value="">-- Select Url Group--</option>
                                        @foreach($urlGroups as $urlGroup)
                                            <option value="{{$urlGroup->id}}" @foreach($url->roles as $u) @if($urlGroup->id == $u->id)selected="selected"@endif @endforeach>{{$urlGroup->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <div class="input-group pt-3">
                                    <button type="submit" class="btn btn-primary mt-3"> Update Url</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection

@section('script')

    <script type="application/javascript">

    </script>

@endsection