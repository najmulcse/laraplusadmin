@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Url Groups"])
    @endcomponent
@endsection

@section("content")
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route('admin.store.role') }}" method="post">
                    <header class="card-header">
                        <h2 class="card-title">Add Url-Group</h2>
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
                                    <input type="text" name="name" id="urlGroupName" class="form-control"
                                           placeholder="Url group name" required />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <div class="input-group pt-3">
                                  <button type="submit" class="btn btn-primary mt-3"> Add Url Group</button>
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
                    <h2 class="card-title">Url Groups</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        @if(count($roles))
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <span class="badge badge-{{ $role->active_status ? 'success':'danger' }}">{{ $role->active_status ? 'Active':'Inactive' }}</span>
                                    </td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>
                                        <a href="#modalEditUrlGroup"
                                           data-id="{{$role->id}}"
                                           data-name="{{$role->name}}"
                                           data-url="{{ route('admin.update.url_group') }}"
                                           class="url-group-edit btn btn-info btn-sm mb-1 mt-1 mr-1 modal-basic"
                                        ><i class="fa fa-edit"></i> Edit</a>
                                        <a href="#modalDelete"
                                           data-id="{{$role->id}}"
                                           data-url="{{ route('admin.delete.role') }}"
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
@include('laraplusadmin::admin.layouts.modals.edit-url-group')
@endsection

@section('script')
    <script>
        $('.url-group-edit').on("click", function(){
            var urlGroupId = $(this).data('id');

            var requestedUrl = $(this).data('url');
            $("#edit-url-group-name").val($(this).data('name'));
            $('.modal-confirm').on('click', function(e){
                console.log("okk");
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url: requestedUrl,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id : urlGroupId,
                        name: $("#edit-url-group-name").val()
                    },
                    success:function(data){
                        //console.log(data);
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endsection