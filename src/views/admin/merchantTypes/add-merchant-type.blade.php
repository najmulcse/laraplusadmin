@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Merchant Type"])
    @endcomponent
@endsection

@section("content")
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route('admin.store.merchant.type') }}" method="post">
                    <header class="card-header">
                        <h2 class="card-title">Add Merchant Type</h2>
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
                                <label class="control-label"> Merchant Type Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                    <input type="text" name="title" id="merchantType" class="form-control"
                                           placeholder="Merchant Type name" required />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <div class="input-group pt-3">
                                    <button type="submit" class="btn btn-primary mt-3"> Add Merchant Type</button>
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
                    <h2 class="card-title">All Merchant Types</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        @if(count($merchantTypes))
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
                            @foreach($merchantTypes as $type)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $type->title }}</td>
                                    <td>
                                        <span class="badge badge-{{ $type->active_status ? 'success':'danger' }}">{{ $type->active_status ? 'Active':'Inactive' }}</span>
                                    </td>
                                    <td>{{ $type->created_at }}</td>
                                    <td>
                                        <a href="#modalEditMerchantType"
                                           data-id="{{$type->id}}"
                                           data-name="{{$type->title}}"
                                           data-url="{{ route('admin.update.merchant.type') }}"
                                           class="merchant-type-edit-button btn btn-info btn-sm mb-1 mt-1 mr-1 modal-basic"
                                        ><i class="fa fa-edit"></i> Edit</a>
                                        <a href="#modalDelete"
                                           data-id="{{$type->id}}"
                                           data-url="{{ route('admin.delete.merchant.type') }}"
                                           class="default-delete-option btn btn-danger btn-sm mb-1 mt-1 mr-1 modal-basic"
                                        ><i class="fa fa-trash"></i> Delete</a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        @else
                            <p>No available merchant types</p>
                        @endif
                    </table>
                </div>
            </section>
        </div>
    </div>

    @include('laraplusadmin::admin.layouts.modals.delete')
    @include('laraplusadmin::admin.layouts.modals.edit-merchant-type')
@endsection

@section('script')
    <script>
        $('.merchant-type-edit-button').on("click", function(e){
            e.preventDefault();
            var merchantTypeId = $(this).data('id');
            var requestedUrl = $(this).data('url');
            $("#edit-merchant-type").val($(this).data('name'));
            $('.modal-confirm').on('click', function(e){

                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url: requestedUrl,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id : merchantTypeId,
                        title: $("#edit-merchant-type").val()
                    },
                    success:function(data){
                       // console.log(data);
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endsection