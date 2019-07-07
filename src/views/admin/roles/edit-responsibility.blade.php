@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Edit Role"])
    @endcomponent
@endsection

@section("content")
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route('admin.update.responsibility',['id' => $responsibility->id]) }}" method="post">
                    <header class="card-header">
                        <h2 class="card-title">Edit Role</h2>
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
                            <div class="col-lg-12 form-group">
                                <label class="control-label">Role Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                    <input type="text" name="roleName" id="roleName" class="form-control"
                                          value="{{ $responsibility->name }}" placeholder="Role name" required />
                                </div>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label class="control-label">Merchants Type
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user-circle"></i>
                                                </span>
                                    <select  multiple="multiple" class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                             name="merchantTypes[]" id="merchant"  required>
                                        @foreach($merchantTypes as $type)
                                            <option value="{{$type->id}}" @foreach($responsibility->mTypes as $t) @if($type->id == $t->id)selected="selected"@endif @endforeach>{{$type->title}}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label class="control-label">Url Group
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user-circle"></i>
                                                </span>
                                    <select multiple class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                            name="urlGroup[]" id="urlGroup" required>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" @foreach($responsibility->roles as $u) @if($role->id == $u->id)selected="selected"@endif @endforeach>{{$role->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="input-group pt-3">
                                    <button type="submit" class="btn btn-primary mt-3"> Update Role</button>
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

@endsection