@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Add Menu"])
    @endcomponent
@endsection

@section("content")

    <div class="row">
        <div class="col">
            <section class="card">
                <form action="{{ route('admin.store.menu') }}" method="post">
                    <header class="card-header">
                        <h2 class="card-title">Add Menu</h2>
                    </header>
                    {{ csrf_field() }}
                    <div class="card-body">
                        @if(Session::has('message') && Session::has('menu'))
                            <div class="alert {{ Session::get('alertClass') }}">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <strong>{{ Session::get('message') }}</strong>.
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-3 form-group">
                                <label class="control-label">Menu Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                    <input type="text" name="name" id="menu_title" class="form-control"
                                           placeholder="Menu Title" required />
                                </div>
                            </div>
                            <div class="col-lg-3 form-group">
                                <div class="input-group pt-3">
                                    <button type="submit" class="btn btn-primary mt-3"> Add Menu</button>
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
                <form action="{{ route('admin.store.menu.item') }}" method="post">
                    <header class="card-header">
                        <h2 class="card-title">Add Menu Item</h2>
                    </header>
                    {{ csrf_field() }}
                    <div class="card-body">
                        @if(Session::has('message') && Session::has('menu_item'))
                            <div class="alert {{ Session::get('alertClass') }}">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <strong>{{ Session::get('message') }}</strong>.
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label class="control-label">Menu Name
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user-circle"></i>
                                </span>
                                    <select  class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                             name="menu" id="menu"  required>
                                        @foreach($menuList as $menu)
                                            <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label class="control-label">Menu Item Title
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-briefcase"></i>
                                </span>
                                    <input type="text" name="menuItemTitle" id="roleName" class="form-control"
                                           placeholder="Menu item title" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label class="control-label">Menu Icon
                                    <span class="required"></span>
                                </label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-briefcase"></i>
                                </span>
                                    <input type="text" name="menuIcon" id="menuIcon" class="form-control"
                                           placeholder="Menu icon"/>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label class="control-label">Url(Except base url*)
                                        <span class="required">*</span>
                                    </label>
                                    <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user-circle"></i>
                                </span>
                                        <select  class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                                 name="url" id="permission_url"  required>
                                            <option value="">Select Url</option>
                                            @foreach($urls as $url)
                                                <option value="{{ $url->id }}">{{ $url->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                        <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label class="control-label">Parent Item
                                        <span class="required"></span>
                                    </label>
                                    <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user-circle"></i>
                                </span>
                                        <select  class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                                 name="parent" id="parent">
                                            <option value="">Select Parent item</option>
                                            @foreach($menuItems as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <div class="input-group pt-3">
                                    <button type="submit" class="btn btn-primary"> Add Menu Item</button>
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
                    <h2 class="card-title">All Menus</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        @if(count($menuList))
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($menuList as $key => $menu)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $menu->title }}</td>
                                    <td>{{ $menu->created_at }}</td>
                                    <td>
                                        <a href="#modalDelete"
                                           data-id="{{$menu->id}}"
                                           data-url="{{ route('admin.delete.menu') }}"
                                           class="default-delete-option btn btn-danger btn-sm mb-1 mt-1 mr-1 modal-basic"
                                        ><i class="fa fa-trash"></i> Delete</a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        @else
                            <p>No available menu</p>
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