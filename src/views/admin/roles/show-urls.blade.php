@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Url"])
    @endcomponent
@endsection

@section("content")
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route('admin.store.url') }}" method="post">
                    <header class="card-header">
                        <h2 class="card-title">Add Url</h2>
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
                                <label class="control-label">Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                    <input type="text" name="name" id="name" class="form-control"
                                           placeholder="Url name" required />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="control-label">Url
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                    <input type="text" name="url" id="url" class="form-control"
                                           placeholder="Url" required />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="control-label">Route Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                    <input type="text" name="routeName" id="routeName" class="form-control"
                                           placeholder="Route Name" />
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
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
                                        <option value="{{ $urlGroup->name }}">{{ $urlGroup->name }}</option>
                                       @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <div class="input-group pt-3">
                                    <button type="submit" class="btn btn-primary mt-3"> Add Url</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Urls</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        @if(count($urls))
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Url Group</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($urls as $url)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $url->name }}</td>
                                    <td>{{ $url->url }}</td>
                                    <td>{{ $url->roles[0]->name }}</td>
                                    <td>
                                        <span class="badge badge-{{ $url->active_status ? 'success':'danger' }}">{{ $url->active_status ? 'Active':'Inactive' }}</span>
                                    </td>
                                    <td>{{ $url->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit.url',['id' => $url->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="#modalDelete"
                                           data-id="{{$url->id}}"
                                           data-url="{{ route('admin.delete.url') }}"
                                           class="default-delete-option btn btn-danger btn-sm mb-1 mt-1 mr-1 modal-basic"
                                        ><i class="fa fa-trash"></i> Delete</a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        @else
                            <p>No available roles</p>
                        @endif
                    </table>
                </div>
            </section>
        </div>
    </div>
@include('laraplusadmin::admin.layouts.modals.delete')
@endsection

@section('script')

    <script type="application/javascript">

    </script>

@endsection