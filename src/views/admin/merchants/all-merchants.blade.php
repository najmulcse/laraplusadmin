@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "All Merchants"])
    @endcomponent
@endsection

@section("content")
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Merchants List</h2>
                </header>
                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert {{ Session::get('alertClass') }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>{{ Session::get('message') }}</strong>.
                        </div>
                    @endif
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        @if(count($merchants))
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Joining Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @foreach($merchants as $merchant)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $merchant->email }}</td>
                            <td>{{ $merchant->name }}</td>
                            <td>{{ $merchant->mobile_no }}</td>

                            <td>{{ $merchant->created_at }}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a>
                                <a href="{{ route('admin.edit.merchant',['id' => $merchant->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                <a href="#modalDelete"
                                   data-id="{{$merchant->id}}"
                                   data-url="{{ route('admin.delete.merchant') }}"
                                   class="default-delete-option btn btn-danger btn-sm mb-1 mt-1 mr-1 modal-basic"
                                ><i class="fa fa-trash"></i> Delete</a>

                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                        @else
                            <p>No available merchants</p>
                        @endif
                    </table>
                </div>
            </section>
        </div>
    </div>
@include('laraplusadmin::admin.layouts.modals.delete')
@endsection