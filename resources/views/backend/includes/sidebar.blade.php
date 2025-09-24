@if(isset($menu))
    @php $menu=$menu @endphp
@else
    @php $menu="" @endphp
@endif
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false"
            data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="sidebar-search-wrapper">
            </li>
            <li class="nav-item {{ areActiveRoutes(['dashboard'])}}">
                <a href="{{route('dashboard')}}" class="nav-link">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>

            </li>
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="title">{{'User'}}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="" class="nav-link ">{{get_phrase("User")}}</a>
                    </li>
                    <li class="nav-item ">
                        <a href="" class="nav-link ">{{get_phrase("Roles")}}</a>
                    </li>
                    <li class="nav-item ">
                        <a href=""
                           class="nav-link ">{{get_phrase("permissions")}}</a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</div>
