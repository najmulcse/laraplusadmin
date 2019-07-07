@extends('laraplusadmin::admin.layouts.master')

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "All Employee"])
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Employee List</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                    @if(count($employees))
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Joining Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $key => $employee)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $employee->employee_id }}</td>
                            <td>
                                <img height="100px" width="100px" src="{{ $employee->profile_photo? asset('img/employees').'/'.$employee->profile_photo: "http://www.placehold.it/100x100"}}" class="img-responsive" alt="">
                            </td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->mobile_no }}</td>

                            <td>{{ $employee->joining_date }}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a>
                                <a href="{{ route('admin.edit.employee',['id' => $employee->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                <a href="#modalDelete"
                                   data-id="{{$employee->id}}"
                                   data-url="{{ route('admin.delete.employee') }}"
                                   class="default-delete-option btn btn-danger btn-sm mb-1 mt-1 mr-1 modal-basic"
                                ><i class="fa fa-trash"></i> Delete</a>

                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                        @endif
                    </table>
                </div>
            </section>
        </div>
    </div>
    @include('laraplusadmin::admin.layouts.modals.delete')
@endsection