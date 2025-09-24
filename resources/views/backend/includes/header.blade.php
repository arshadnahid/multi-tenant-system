<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="#">
                <img src="https://buzfi.nyc3.digitaloceanspaces.com/nahid/all/yZ8ILgVKa7r3mlRrYRMAlZGEq1sESqF4I7FBFTLE.png" alt="logo" class="logo-default"/> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        @php




        @endphp
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default"> {{0}} </span>
                    </a>
                    <ul class="dropdown-menu">


                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                @php

                                    @endphp
                                <li>
                                    <a href="">

                                            <span
                                                class="time">{{0}}</span>


                                    </a>
                                </li>




                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-user">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">

                        <img class="img-circle" src="{{ static_asset('admin/images/demo_image.png') }}" alt="demo_image"/>

                        <span class="username username-hide-on-mobile">  {{ Auth::user()->name }}
                            <span
                                style='color: #0deafd;'>({{ get_phrase(Auth::user()->role) }})
                            </span>
                        </span>
                        <i class="fa fa-angle-down"></i>
                    </a>


                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="#">
                                <i class="icon-user"></i> My Profile </a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="icon-user"></i>{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>

                        </li>
                    </ul>
                </li>


            </ul>
        </div>

    </div>
    <!-- END HEADER INNER -->
</div>
