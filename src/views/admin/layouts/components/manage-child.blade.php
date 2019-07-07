<ul class="nav nav-children">
    @foreach($childs as $child)
             @if(count($child->childs))
                @if(Auth::user()->hasPermission($child->permission_id))
                        <li class="nav-parent {{ Route::currentRouteName()== $child->permission->route? 'nav-expanded': '' }}">
                            <a class="nav-link" href="#">
                                <i class="fa fa-columns" aria-hidden="true"></i>
                                <span>{{ $child->title }}</span>
                            </a>
                             @include('laraplusadmin::admin.layouts.components.manage-child',['childs' => $child->childs])
                        </li>
                @endif
            @else
                @if(Auth::user()->hasPermission($child->permission_id))
                    <li class="nav{{ Route::currentRouteName()== $child->permission->route? '-active': '' }}">
                        <a class="nav-link" href="{{ url('admin/'.$child->permission->url) }}">
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>{{ $child->title }}</span>
                        </a>
                    </li>
                @endif
            @endif

    @endforeach
</ul>
