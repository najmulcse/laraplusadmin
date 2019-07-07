<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li>
                        <a class="nav-link" href="{{ route("admin.index") }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Home</span>
                        </a>

                    </li>

                    @foreach($menus as $menuItem)

                            @if(count($menuItem->childs))

                                @if(Auth::user()->hasPermission($menuItem->permission_id))

                                        <li class="nav-parent {{ $menuItem->parent_id? 'nav-expanded': '' }}">
                                            <a class="nav-link" href="#">
                                                <i class="fa fa-columns" aria-hidden="true"></i>
                                                <span>{{ $menuItem->title }}</span>
                                            </a>

                                                @include('laraplusadmin::admin.layouts.components.manage-child',['childs' => $menuItem->childs])
                                        </li>
                                    @endif
                            @else

                                @if(Auth::user()->hasPermission($menuItem->permission_id))

                                        <li class="nav {{ Route::currentRouteName()==$menuItem->permission->route? 'nav-active': '' }}">
                                            <a class="nav-link" href="{{ url('admin/'.$menuItem->permission->url) }}">
                                                <i class="fa fa-columns" aria-hidden="true"></i>
                                                <span>{{ $menuItem->title }}</span>
                                            </a>
                                        </li>

                                @endif
                            @endif
                    @endforeach

                </ul>
            </nav>
        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>


    </div>

</aside>