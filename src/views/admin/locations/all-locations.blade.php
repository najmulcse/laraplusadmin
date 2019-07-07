@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "All Locations"])
    @endcomponent
@endsection
@section("content")
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Location List</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                      @if(count($locations))
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Thana</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($locations as $key => $location)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $location->name }}</td>
                                <td>{{ $location->lType->type_name }}</td>
                                <td>{{ $location->thana->thana_name }}</td>
                                <td>{{ $location->phone_no }}</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a>
                                    <a href="{{ route('admin.edit.location',['id' => $location->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="#modalDelete"
                                       data-id="{{ $location->id }}"
                                       data-url="{{ route('admin.delete.location') }}"
                                       class="default-delete-option btn btn-danger btn-sm mb-1 mt-1 mr-1 modal-basic"
                                    ><i class="fa fa-trash"></i> Delete</a>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        @else
                          <p>No available location. </p>
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