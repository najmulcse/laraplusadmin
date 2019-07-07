@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Menu Template"])
    @endcomponent
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('vendor/nestable/nestable.css') }}">
@endsection
@section('script')
    <script src="{{ asset("vendor/nestable/jquery.nestable.js") }}"></script>

    <script type="text/javascript">
        $(function() {
            $('.dd').nestable({
                dropCallback: function(details) {

                    var order = new Array();
                    $("li[data-id='"+details.destId +"']").find('ol:first').children().each(function(index,elem) {
                        order[index] = $(elem).attr('data-id');
                    });

                    if (order.length === 0){
                        var rootOrder = new Array();
                        $("#nestable > ol > li").each(function(index,elem) {
                            rootOrder[index] = $(elem).attr('data-id');
                        });
                    }

                    $.post('{{route("admin.store.order.menu")}}',
                        { source : details.sourceId,
                            destination: details.destId,
                            order:JSON.stringify(order),
                            rootOrder:JSON.stringify(rootOrder),
                            _token: '{{csrf_token()}}'
                        },
                        function(data) {
                             //console.log('data '+data);
                        })
                        .done(function() {
                            $( "#success-indicator" ).fadeIn(100).delay(1000).fadeOut();
                            window.location.reload();
                        })
                        .fail(function() {  })
                        .always(function() {  });
                }
            });

            $('.delete_toggle').each(function(index,elem) {

                $(elem).click(function(e){
                    e.preventDefault();
                    var id = $(this).attr('rel');

                    var requestedUrl = $(this).data('url');

                    $('.modal-confirm').on('click', function(e){
                        e.preventDefault();
                        $.ajax({
                            type:'POST',
                            url: requestedUrl,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                delete_id : id
                            },
                            success:function(data){
                                //console.log(data);
                                window.location.reload();
                            }
                        });
                    });
                });
            });
            $('.menu-item-edit').each(function(index,elem) {

                $(elem).click(function(e){
                    e.preventDefault();

                    var itemId = $(this).data('item-id');
                    var itemTitle = $(this).data('item-title');
                    var requestedUrl = $(this).data('url');
                    var iconClass = $(this).data('icon');
                    var permissionId = $(this).data('permission-id');
                    var permissionUrlName = $(this).data('menu-item-url-name');
                    $("#menu-item-title").val(itemTitle);
                    $("#menu-item-icon").val(iconClass);
                    // Add options
                    $('#item-permission_url').append('<option selected value=' + permissionId + '>' + permissionUrlName + '</option>');

                    if($('#item-permission_url').find('option:selected')){

                        $('#item-permission_url').find('option:selected [value='+permissionId+']').remove()
                            .append('<option selected value=' + permissionId + '>' + permissionUrlName + '</option>');
                    }
                    $('#item-permission_url').on('change', function(e){
                        permissionId = $(this).val();
                    });

                    $('.modal-confirm').on('click', function(e){
                        e.preventDefault();
                        $.ajax({
                            type:'POST',
                            url: requestedUrl,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                permission_id : permissionId,
                                icon_class:  $("#menu-item-icon").val(),
                                title: $("#menu-item-title").val(),
                                item_id: itemId

                            },
                            success:function(data){
                                console.log(data);
                                window.location.reload();
                            }
                        });
                    });
                    $(".modal-dismiss").on('click', function(e){
                        e.preventDefault();

                    });
                });
            });
            $("#admin-menu-name").on("change", function(){
                var id = $(this).val();
                var requestedUrl = $(this).data('url');

                window.location = requestedUrl + '?id='+id;
            });
        });
    </script>
@endsection
@section("content")
    <div class="row">
        <div class="col-lg-6 form-group">
            <label class="control-label">Menu Select
                <span class="required"></span>
            </label>
            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user-circle"></i>
                                </span>
                <select data-url="{{ route("admin.order.menu") }}" class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                         name="menuName" id="admin-menu-name">
                    @foreach($menuNames as $menuN)
                        <option {{ $selectedMenu->id == $menuN->id? ' selected': '' }}  value="{{ $menuN->id }}">{{ $menuN->title }}</option>
                    @endforeach
                </select>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="well">

                <p class="lead"> {{ $selectedMenu->title }}:</p>

                <div class="dd" id="nestable">
                    <?=$menu?>
                </div>


            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <p>Drag items to move them in a different order</p>
                <p id="success-indicator" style="display:none; margin-right: 10px;color:green;font-size: 16px;">
                    <span class="glyphicon glyphicon-ok"></span> Menu order has been saved
                </p>
            </div>
        </div>
    </div>

    <!-- Create new item Modal -->

    <!--edit menu item-->
    <div id="modalEdit" class="modal-block modal-block-primary mfp-hide">
        <section class="card">
            <form action="" id="menu-item-edit-form">
            <header class="card-header">
                <h2 class="card-title">Edit menu item</h2>
            </header>
            <div class="card-body">
                <div class="modal-wrapper">

                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <input type="text" class="form-control" id="menu-item-title" placeholder="Title" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="label" class="col-lg-2 control-label">Icon</label>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <input type="text" class="form-control" id="menu-item-icon" placeholder="Icon class" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="url" class="col-lg-2 control-label">URL</label>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <select  class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                         name="url" id="item-permission_url"  required>
                                    <option value="">Select Url</option>
                                    @foreach($urls as $url)

                                        <option  value="{{ $url->id }}">{{ $url->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary modal-confirm">Confirm</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
            </form>
        </section>
    </div>
    <!-- Delete item Modal -->
    <div id="modalDelete" class="modal-block modal-block-primary mfp-hide">
        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Are you sure?</h2>
            </header>
            <div class="card-body">
                <div class="modal-wrapper">
                    <div class="modal-icon">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="modal-text">
                        <p class="mb-0">Are you sure that you want to delete?</p>
                    </div>
                </div>
            </div>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary modal-confirm">Confirm</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </section>
    </div>
@endsection

