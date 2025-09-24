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
            @auth
                @if(auth()->user()->role === 'admin')

                    <li class="nav-item {{ areActiveRoutes(['admin.owners.index','admin.owners.edit','admin.owners.show','admin.owners.create','admin.tenants.index','admin.tenants.edit','admin.tenants.show','admin.tenants.create'])}}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            <span class="title">Administration</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item
                             {{ areActiveRoutes(['admin.owners.index','admin.owners.edit','admin.owners.show','admin.owners.create'])}}">
                                <a href="{{ route('admin.owners.index') }}" class="nav-link ">House Owners</a></li>
                            <li class="nav-item
                            {{ areActiveRoutes(['admin.tenants.index','admin.tenants.edit','admin.tenants.show','admin.tenants.create'])}}">
                                <a href="{{ route('admin.tenants.index') }}" class="nav-link ">Tenants</a></li>
                        </ul>
                    </li>
                @endif
                @if(auth()->user()->role === 'owner')
                    <li class="nav-item {{ areActiveRoutes(['owner.flats.index'])}}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-building" aria-hidden="true"></i>
                            <span class="title">My Property</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item "><a href="{{ route('owner.flats.index') }}" class="nav-link ">Flats</a></li>
                            <li class="nav-item "><a href="{{ route('owner.bill_categories.index') }}" class="nav-link ">Bill Categories</a></li>
                            <li class="nav-item "><a href="{{ route('owner.bills.index') }}" class="nav-link ">Bills</a></li>
                        </ul>
                    </li>
                @endif
            @endauth

        </ul>
    </div>
</div>
