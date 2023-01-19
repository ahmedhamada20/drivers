<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header"><span>Dashboard Menu</span><i class=" ft-minus" data-toggle="tooltip"
                                                                        data-placement="right"
                                                                        data-original-title="Dashboard"></i>
            </li>
            <!-- list 1 -->
            <!-- <li class=" nav-item"><a href="#"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">Templates</span></a>
        <ul class="menu-content">
          <li><a class="menu-item" href="#">Vertical</a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{route('users.index')}}">Users</a>
              </li>
              <li><a class="menu-item" href="">Semi Light</a>
              </li>
              <li><a class="menu-item" href="">Semi Dark</a>
              </li>
              <li><a class="menu-item" href="">Nav Dark</a>
              </li>
              <li><a class="menu-item" href="">Light</a>
              </li>
              <li><a class="menu-item" href="">Overlay Menu</a>
              </li>
            </ul>
          </li>
          <li><a class="menu-item" href="#">Horizontal</a>
            <ul class="menu-content">
              <li><a class="menu-item" href="">Classic</a>
              </li>
              <li><a class="menu-item" href="">Nav Dark</a>
              </li>
            </ul>
          </li>
        </ul>
      </li> -->
            <!-- list 2 -->
            @can('user-list')
                <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title"
                                                                                data-i18n="">users</span></a>
                    <ul class="menu-content">
                        <li @if( Request::is('admin/users/index') || (Request::is('admin/users/create')) || (Request::is('admin/users/view/*'))) class="active" @endif>
                            <a class="menu-item" href="{{route('users.index')}}"><i class="ft-chevrons-right"></i>Users
                            </a>
                        </li>
                        <!-- <li>
            <a class="menu-item" href="{{route('users.index')}}">Users List</a>
          </li> -->
                    </ul>
                </li>
            @endcan


            <!-- list 3 -->

            @can('Company-list')
                <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title" data-i18n="">Companies</span></a>
                    <ul class="menu-content">
                        <li @if( Request::is('admin/companies/index') || (Request::is('admin/companies/view/*')) ) class="active" @endif>
                            <a class="menu-item" href="{{route('companies.index')}}">Companies List</a>
                        </li>
                        <li @if( Request::is('admin/companies/create') || (Request::is('admin/companies/edit/*')) ) class="active" @endif>
                            <a class="menu-item" href="{{route('companies.create')}}">Add Companies</a>
                        </li>
                    </ul>
                </li>
            @endcan


            @can('Drivers-list')
                <!-- list 4 -->
                <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title"
                                                                                data-i18n="">Drivers</span></a>
                    <ul class="menu-content">
                        <li @if( Request::is('admin/drivers/index') || (Request::is('admin/drivers/view/*')) ) class="active" @endif>
                            <a class="menu-item" href="{{route('drivers.index')}}">Drivers List</a>
                        </li>
                        <li @if( Request::is('admin/drivers/create') || (Request::is('admin/drivers/edit/*')) ) class="active" @endif>
                            <a class="menu-item" href="{{route('drivers.create')}}">Add Drivers</a>
                        </li>
                    </ul>
                </li>
            @endcan


            @can('package-list')
                <!-- list 5 -->
                <li class=" nav-item"><a href="#"><i class="ft-server"></i><span class="menu-title" data-i18n="">Packages</span></a>
                    <ul class="menu-content">
                        <li @if( Request::is('admin/package/index') || (Request::is('admin/package/create')) ) class="active" @endif>
                            <a class="menu-item" href="{{route('packages.view')}}">List</a>
                        </li>
                    </ul>
                </li>
            @endcan


            <!-- list 6 -->
            <li class=" nav-item"><a href="#"><i class="ft-life-buoy"></i><span class="menu-title" data-i18n="">Enquiries</span></a>
                <ul class="menu-content">
                    <li @if( Request::is('admin/contact/index') || (Request::is('admin/contact')) ) class="active" @endif>
                        <a class="menu-item" href="{{route('contact.view')}}">List</a>
                    </li>
                </ul>
            </li>

            <!-- list 7 -->
            <li class=" nav-item"><a href="#"><i class="ft-life-buoy"></i><span class="menu-title"
                                                                                data-i18n="">Banner</span></a>
                <ul class="menu-content">
                    <li @if( Request::is('admin/banner/create') ) class="active" @endif>
                        <a class="menu-item" href="{{route('banner.create')}}">Manage</a>
                    </li>
                    <!-- <li @if( Request::is('admin/banner/index') )
                        class="active"



                    @endif>
            <a class="menu-item" href="{{route('banner.index')}}">List</a>
          </li> -->
                </ul>
            </li>
            <!-- list 7 -->

            @can('Notifications-list')
                <li class=" nav-item"><a href="#"><i class="ft-life-buoy"></i><span class="menu-title" data-i18n="">Notifications</span></a>
                    <ul class="menu-content">
                        <li @if( Request::is('admin/notifications') ) class="active" @endif>
                            <a class="menu-item" href="{{route('notification.index')}}">Manage</a>
                        </li>
                        <!-- <li @if( Request::is('admin/banner/index') )
                            class="active"



                        @endif>
            <a class="menu-item" href="{{route('banner.index')}}">List</a>
          </li> -->
                    </ul>
                </li>
            @endcan



            <!-- list 9 -->
            @can('PromoCode-list')
                <li class=" nav-item"><a href="#"><i class="ft-life-buoy"></i><span class="menu-title" data-i18n="">Promo Code</span></a>
                    <ul class="menu-content">
                        <li @if( Request::is('admin/promocode/create') ) class="active" @endif>
                            <a class="menu-item" href="{{route('promocode.create')}}">Manage</a>
                        </li>
                    </ul>
                </li>
            @endcan



            @can('Company-list')
                <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title" data-i18n="">company Offres</span></a>
                    <ul class="menu-content">
                        <li @if( Request::is('admin/companyOffres/index') || (Request::is('admin/companyOffres/view/*')) ) class="active" @endif>
                            <a class="menu-item" href="{{route('companyOffres.index')}}">companyOffres List</a>
                        </li>
                    </ul>
                </li>
            @endcan
            <!-- list 4 -->


            @can('user-list')
                <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title"
                                                                                data-i18n="">Admins</span></a>
                    <ul class="menu-content">
                        <li @if( Request::is('admin/admins/index')  || (Request::is('admin/admins/view/*'))) class="active" @endif>
                            <a class="menu-item" href="{{route('admins.index')}}"><i class="ft-chevrons-right"></i>Admins
                            </a>

                        </li>
                        <li @if( Request::is('admin/users/create') || (Request::is('admin/users/create')) || (Request::is('admin/users/view/*'))) class="active" @endif>

                            <a class="menu-item" href="{{route('users.create')}}"><i class="ft-chevrons-right"></i>Add
                                Admins </a>
                        </li>
                        <!-- <li>
            <a class="menu-item" href="{{route('users.index')}}">Users List</a>
          </li> -->
                    </ul>
                </li>
            @endcan


            @can('role-list')
                <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title"
                                                                                data-i18n="">Roles</span></a>
                    <ul class="menu-content">
                        <li @if( Request::is('admin/roles/index')  || (Request::is('admin/roles/view/*'))) class="active" @endif>
                            <a class="menu-item" href="{{route('roles.index')}}"><i class="ft-chevrons-right"></i>Roles
                            </a>

                        </li>
                        <li @if( Request::is('admin/roles/create') || (Request::is('admin/roles/create')) || (Request::is('admin/roles/view/*'))) class="active" @endif>

                            <a class="menu-item" href="{{route('roles.create')}}"><i class="ft-chevrons-right"></i>Add
                                Roles </a>
                        </li>
                        <!-- <li>
            <a class="menu-item" href="{{route('users.index')}}">Users List</a>
          </li> -->
                    </ul>
                </li>
            @endcan


            <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title" data-i18n="">Reports</span></a>
                <ul class="menu-content">
                    @can('Drivers-report')
                        <li>
                            <a class="menu-item" href="{{route('get-drivers-report')}}"><i class="ft-chevrons-right"></i>Reports drivers </a>

                        </li>
                    @endcan

                    @can('Orders-report')
                        <li>
                            <a class="menu-item" href="{{route('get-orders-report')}}"><i class="ft-chevrons-right"></i>Reports Orders </a>

                        </li>
                    @endcan


                </ul>
            </li>

            @can('Map-driver')
                <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title"
                                                                                data-i18n="">Map driver </span></a>
                    {{--            <ul class="menu-content">--}}
                    {{--                <li @if( Request::is('admin/roles/index')  || (Request::is('admin/roles/view/*'))) class="active" @endif>--}}
                    {{--                    <a class="menu-item" href="{{route('roles.index')}}"><i class="ft-chevrons-right"></i>Roles </a>--}}

                    {{--                </li> <li @if( Request::is('admin/roles/create') || (Request::is('admin/roles/create')) || (Request::is('admin/roles/view/*'))) class="active" @endif>--}}

                    {{--                    <a class="menu-item" href="{{route('roles.create')}}"><i class="ft-chevrons-right"></i>Add Roles </a>--}}
                    {{--                </li>--}}
                    {{--            --}}
                    {{--            </ul>--}}
                </li>
            @endcan

            @can('Settings')

                <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title"
                                                                                data-i18n="">Settings</span></a>
                    {{--            <ul class="menu-content">--}}
                    {{--                <li @if( Request::is('admin/roles/index')  || (Request::is('admin/roles/view/*'))) class="active" @endif>--}}
                    {{--                    <a class="menu-item" href="{{route('roles.index')}}"><i class="ft-chevrons-right"></i>Roles </a>--}}

                    {{--                </li> <li @if( Request::is('admin/roles/create') || (Request::is('admin/roles/create')) || (Request::is('admin/roles/view/*'))) class="active" @endif>--}}

                    {{--                    <a class="menu-item" href="{{route('roles.create')}}"><i class="ft-chevrons-right"></i>Add Roles </a>--}}
                    {{--                </li>--}}
                    {{--            --}}
                    {{--            </ul>--}}
                </li>

            @endcan

            @can('currency')
                <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title"
                                                                                data-i18n="">currency</span></a>
                    {{--            <ul class="menu-content">--}}
                    {{--                <li @if( Request::is('admin/roles/index')  || (Request::is('admin/roles/view/*'))) class="active" @endif>--}}
                    {{--                    <a class="menu-item" href="{{route('roles.index')}}"><i class="ft-chevrons-right"></i>Roles </a>--}}

                    {{--                </li> <li @if( Request::is('admin/roles/create') || (Request::is('admin/roles/create')) || (Request::is('admin/roles/view/*'))) class="active" @endif>--}}

                    {{--                    <a class="menu-item" href="{{route('roles.create')}}"><i class="ft-chevrons-right"></i>Add Roles </a>--}}
                    {{--                </li>--}}
                    {{--            --}}
                    {{--            </ul>--}}
                </li>


                </li>

            @endcan





        </ul>
    </div>
</div>
