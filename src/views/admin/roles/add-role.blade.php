@extends('laraplusadmin::admin.layouts.master')

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Add Role"])
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route('admin.store.role') }}" method="post">
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
                            <div class="col-lg-3 form-group">
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
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary mt-3"> Add Role</button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>

@endsection