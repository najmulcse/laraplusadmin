@extends("laraplusadmin::admin.layouts.master")

@section("content.title")
    @component("laraplusadmin::admin.layouts.components.header", ["title" => "Dashboard"])
    @endcomponent
@endsection

@section("content")
    <!-- start: page -->
    <section class="call-to-action call-to-action-primary call-to-action-top mb-4">
        <div class="container container-with-sidebar">
            <div class="row">
                <div class="col-xl-8">
                    <div class="call-to-action-content">
                        <h2 class="text-color-light mb-0 mt-4">Welcome to Dashboard</h2>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="call-to-action-btn float-right-xl mt-1 pt-1 mt-xl-4 pt-xl-4">

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection