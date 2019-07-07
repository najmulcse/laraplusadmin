@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Roles"])
    @endcomponent
@endsection

@section("content")
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">All Roles</h2>
                </header>
                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert {{ Session::get('alertClass') }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>{{ Session::get('message') }}</strong>.
                        </div>
                    @endif
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">

                        @if(count($responsibilities))
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Allowed Merchant Types</th>
                                <th>Allowed Url Groups</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp

                            @foreach($responsibilities as $responsibility)

                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $responsibility->name }}</td>
                                    <td>
                                        @foreach($responsibility->mTypes as $type)
                                            {{ $type->title }} ,
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($responsibility->roles as $type)
                                            {{ $type->name }} ,
                                        @endforeach
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $responsibility->active_status ? 'success':'danger' }}">{{ $responsibility->active_status ? 'Active':'Inactive' }}</span>
                                    </td>
                                    <td>{{ $responsibility->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit.responsibility',['id' => $responsibility->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="#modalDelete"
                                           data-id="{{$responsibility->id}}"
                                           data-url="{{ route('admin.delete.responsibility') }}"
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

@endsection