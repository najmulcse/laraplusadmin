<header class="page-header">
    <h2>{{ isset($title)? $title: "Bestweby" }}</h2>
    <div class="right-wrapper text-right">
        <ol class="breadcrumbs">
            <li>
                <a href="{{ route("admin.index") }}">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li>
                <span>Home</span>
            </li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"></a>

    </div>
</header>