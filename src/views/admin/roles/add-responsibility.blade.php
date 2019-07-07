@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Role"])
    @endcomponent
@endsection

@section("content")
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route('admin.store.responsibility') }}" method="post">
                    <header class="card-header">
                        <h2 class="card-title">Add Role</h2>
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
                                           placeholder="Role name" required />
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
                                    <select  multiple class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                            name="merchantTypes[]" id="merchant"  required>
                                        @foreach($merchantTypes as $type)
                                            <option value="{{ $type->id }}">{{ $type->title }}</option>
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
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="input-group pt-3">
                                    <button type="submit" class="btn btn-primary mt-3"> Add Role</button>
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