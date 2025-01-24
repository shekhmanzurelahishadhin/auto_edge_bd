<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('root') }}" target="_blank" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/car.png') }}" alt="" height="100" width="150">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('root') }}" target="_blank" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/car.png') }}" alt="" height="100" width="150">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span>@lang('translation.dashboards')</span>
                    </a>
                </li>
                {{-- Administration nav end --}}


                @if (Request::is('admin/journal*')||
                    Request::is('admin/book-volume*')||
                    Request::is('admin/volume-journal*')||
                    Request::is('admin/volume-issue*'))
                    @php($journalNav = true)
                @endif
                @canany(['journal.index','volume-issue.index','volume-journal.index'])
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ isset($journalNav) ? 'active' : '' }}" href="#sidebarJournal"
                           data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarJournal">
                            <i class="ri-article-fill"></i> <span>Journal</span>
                        </a>
                        <div class="collapse menu-dropdown {{ isset($journalNav) ? 'show' : '' }}"
                             id="sidebarJournal">
                            <ul class="nav nav-sm flex-column">
                                @can('journal.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.journal.index') }}"
                                           class="nav-link {{ Request::is('admin/journal*') ? 'active' : '' }}">
                                            Journal
                                        </a>
                                    </li>
                                @endcan
                                @can('volume-issue.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.volume-issue.index') }}"
                                           class="nav-link {{ Request::is('admin/volume-issue*') ? 'active' : '' }}">
                                            Issue
                                        </a>
                                    </li>
                                @endcan
                                @can('volume-journal.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.volume-journal.index') }}"
                                           class="nav-link {{ Request::is('admin/volume-journal*') ? 'active' : '' }}">
                                            Books
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany

                @if (auth()->guard('admin')->user()->can('roles.index') ||
                        auth()->guard('admin')->user()->can('users.index'))
                    <li class="menu-title"><i class="ri-more-fill"></i> <span>User Management</span></li>

                    {{-- access control route end --}}


                    @if (Request::is('admin/roles*') || Request::is('admin/users*'))
                        @php($userRolesNav = true)
                    @endif

                    <li class="nav-item">
                        <a class="nav-link menu-link {{ isset($userRolesNav) ? 'active' : '' }}"
                           href="#sidebarUserManagement" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarUserManagement">
                            <i class="ri-user-settings-line"></i> <span>Access Control</span>
                        </a>
                        <div class="collapse menu-dropdown {{ isset($userRolesNav) ? 'show' : '' }}"
                             id="sidebarUserManagement">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}"
                                       class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}">
                                        Roles
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}"
                                       class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                                        Admin Users
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                {{-- access control route end --}}

                @if (auth()->guard('admin')->user()->can('backup.index'))
                    @if (Request::is('admin/backup*') || Request::is('admin/user-log*'))
                        @php($systemSettingNav = true)
                    @endif

                    <li class="nav-item">
                        <a class="nav-link menu-link {{ isset($systemSettingNav) ? 'active' : '' }}"
                           href="#systemSettingNav" data-bs-toggle="collapse" role="button" aria-expanded="false"
                           aria-controls="systemSettingNav">
                            <i class="ri-settings-3-line"></i> <span>System Setting</span>
                        </a>
                        <div class="collapse menu-dropdown {{ isset($systemSettingNav) ? 'show' : '' }}"
                             id="systemSettingNav">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.backup.index') }}"
                                       class="nav-link {{ Request::is('admin/backup*') ? 'active' : '' }}"
                                       data-key="t-basic-tables">Backups</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.show.log') }}"
                                       class="nav-link {{ Request::is('admin/user-log*') ? 'active' : '' }}"
                                       data-key="t-grid-js">Logs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link" data-key="t-grid-js">Setting</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ri-logout-box-r-line"></i> <span data-key="t-widgets">{{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @if (auth()->guard('admin')->user()->can('slider.index') ||
                               auth()->guard('admin')->user()->can('gallery.index') ||
                               auth()->guard('admin')->user()->can('resource.index') ||
                               auth()->guard('admin')->user()->can('settings.index') )

                    <li class="menu-title"><i class="ri-more-fill"></i> <span>Site Management</span></li>

                    @if (Request::is('admin/slider*')||
                         Request::is('admin/gallery-category/*')||
                         Request::is('admin/gallery*')||
                         Request::is('admin/brand*')||
                         Request::is('admin/about*')||
                         Request::is('admin/logo*')||
                         Request::is('admin/news*')||
                         Request::is('admin/page-title*')||
                         Request::is('admin/act-rule*')||
                         Request::is('admin/map-details*')||
                         Request::is('admin/resource*'))
                        @php($siteNav = true)
                    @endif

                    <li class="nav-item">
                        <a class="nav-link menu-link {{ isset($siteNav)?'active':'' }}" href="#siteMgt"
                           data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarAdministration">
                            <i class='bx bx-sitemap'></i> <span>Site Content</span>
                        </a>

                        <div class="collapse menu-dropdown {{ isset($siteNav)?'show':'' }}" id="siteMgt">
                            <ul class="nav nav-sm flex-column">
                                @can('slider.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.slider.index') }}"
                                           class="nav-link {{ Request::is('admin/slider*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">Sliders</a>
                                    </li>
                                @endcan
                                @can('gallery-category.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.gallery-category.index') }}"
                                           class="nav-link {{ Request::is('admin/gallery-category*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">Gallery Category</a>
                                    </li>
                                @endcan
                                @can('gallery.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.gallery.index') }}"
                                           class="nav-link {{ Request::is('admin/gallery*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">Gallery</a>
                                    </li>
                                @endcan
                                @can('brand.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.brand.index') }}"
                                           class="nav-link {{ Request::is('admin/brand*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">Brand</a>
                                    </li>
                                @endcan
                                @can('about.create')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.about.create') }}"
                                           class="nav-link {{ Request::is('admin/about*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">About Us</a>
                                    </li>
                                @endcan
                                @can('settings.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.logo.create') }}"
                                           class="nav-link {{ Request::is('admin/logo*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">Site Logo</a>
                                    </li>
                                @endcan
                                @can('news.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.news.index') }}"
                                           class="nav-link {{ Request::is('admin/news*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">News</a>
                                    </li>
                                @endcan
                                    @can('page-title.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.page-title.index') }}"
                                               class="nav-link {{ Request::is('admin/page-title*') ? 'active' : '' }}"
                                               data-key="t-basic-tables">Page Title</a>
                                        </li>
                                    @endcan
                                @can('settings.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.act-rule.create') }}"
                                           class="nav-link {{ Request::is('admin/act-rule*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">Act and Rules</a>
                                    </li>
                                @endcan
                                @can('settings.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.map-details.create') }}"
                                           class="nav-link {{ Request::is('admin/map-details*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">Map Details</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Request::is('admin/website-contact*')||
                Request::is('admin/report*')||
                Request::is('admin/special-event*')||
                Request::is('admin/subscribe*')||
                Request::is('admin/message*')||
                Request::is('admin/website-links*'))
                    @php($settingsNav = true)
                @endif
                @can('settings.index')
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ isset($settingsNav)?'active':'' }}" href="#settings"
                           data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="settings">
                            <i class="ri-settings-3-line"></i> <span>Settings</span>
                        </a>
                        <div class="collapse menu-dropdown {{ isset($settingsNav)?'show':'' }}" id="settings">
                            <ul class="nav nav-sm flex-column">
                                @can('settings.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.website-contact.create') }}"
                                           class="nav-link {{ Request::is('admin/website-contact*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">Contact Info</a>
                                    </li>
                                @endcan
                                @can('settings.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.website-links.create') }}"
                                           class="nav-link {{ Request::is('admin/website-links*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">Social Links</a>
                                    </li>
                                @endcan
                                @can('subscribe.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.subscribe.index') }}"
                                           class="nav-link {{ Request::is('admin/subscribe*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">Subscribers</a>
                                    </li>
                                @endcan
                                    @can('message.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.message.index') }}"
                                           class="nav-link {{ Request::is('admin/message*') ? 'active' : '' }}"
                                           data-key="t-basic-tables">Messages</a>
                                    </li>
                                @endcan
                                @can('report.index')
                                    <li class="nav-item">
                                        <a href=""
                                           class="nav-link"
                                           data-key="t-basic-tables">Reports</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
