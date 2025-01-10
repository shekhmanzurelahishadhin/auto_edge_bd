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
                <img src="{{ asset('build/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('root') }}" target="_blank" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('build/images/logo-light.png') }}" alt="" height="17">
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
                @if(Auth::guard('admin')->user()->type =='department_admin')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('admin.department.dashboard') }}">
                            <i class="ri-dashboard-2-line"></i> <span>@lang('translation.dashboards')</span>
                        </a>
                    </li>
                @endif
                @if(Auth::guard('admin')->user()->type =='institute_admin')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('admin.institute.dashboard') }}">
                            <i class="ri-dashboard-2-line"></i> <span>@lang('translation.dashboards')</span>
                        </a>
                    </li>
                @endif

                @if(Auth::guard('admin')->user()->type =='office_admin')
                    <li class="nav-item {{ Request::is('admin/office-dashboard')?'active':'' }}">
                        <a class="nav-link menu-link {{ Request::is('admin/office-dashboard')?'active':'' }}" href="{{ route('admin.office.dashboard') }}">
                            <i class="ri-dashboard-2-line"></i> <span>@lang('translation.dashboards')</span>
                        </a>
                    </li>
                @endif

                    <li class="menu-title"><span>ADMINISTRATION</span></li>

                    @if(
                    Request::is('admin/department*') ||
                    Request::is('admin/office') ||
                    Request::is('admin/office/*') ||
                    Request::is('admin/head-office*') ||
                    Request::is('admin/academic-calender*') ||
                    Request::is('admin/scholarship*')||
                    Request::is('admin/alumni*'))
                        @php($facultyNav = true)
                    @endif
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ isset($facultyNav)?'active':'' }}" href="#sidebarFaculty"
                           data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarFaculty">
                            <i class="bx bx-sitemap"></i> <span data-key="t-apps">Academic</span>
                        </a>
                        <div class="collapse menu-dropdown {{ isset($facultyNav)?'show':'' }}" id="sidebarFaculty">
                            <ul class="nav nav-sm flex-column">
                                @if(Auth::guard('admin')->user()->department_id != null)
                                    @can('department.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.department.index') }}"
                                               class="nav-link {{ Request::is('admin/department') || Request::is('admin/department/*')?'active':'' }}"
                                               data-key="t-calendar">
                                                Departments
                                            </a>
                                        </li>
                                    @endcan
                                    @can('department-chairman.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.department-chairman.index') }}"
                                               class="nav-link {{ Request::is('admin/department-chairman*')?'active':'' }}"
                                               data-key="t-calendar">
                                                Department Head
                                            </a>
                                        </li>
                                    @endcan
                                @elseif(Auth::guard('admin')->user()->institute_id != null)
                                    @can('institute.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.institute.index') }}"
                                               class="nav-link {{ Request::is('admin/institute') || Request::is('admin/institute/*')?'active':'' }}"
                                               data-key="t-calendar">
                                                Institutes
                                            </a>
                                        </li>
                                    @endcan
                                    @can('institute-director.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.institute-director.index') }}"
                                               class="nav-link {{ Request::is('admin/institute-director*')?'active':'' }}"
                                               data-key="t-calendar">
                                                Institute Directors
                                            </a>
                                        </li>
                                    @endcan
                                @elseif(Auth::guard('admin')->user()->office_id != null)
                                    @can('office.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.office.index') }}"
                                               class="nav-link {{ Request::is('admin/office*')?'active':'' }}"
                                               data-key="t-calendar">
                                                Offices
                                            </a>
                                        </li>
                                    @endcan
                                    @can('head-office.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.head-office.index') }}"
                                               class="nav-link {{ Request::is('admin/head-office*') ? 'active' : '' }}"
                                               data-key="t-basic-tables">Office Head</a>
                                        </li>
                                    @endcan
                                @else
                                @endif

                                @can('academic-calender.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.academic-calender.index') }}"
                                           class="nav-link {{ Request::is('admin/academic-calender*')?'active':'' }}"
                                           data-key="t-calendar">
                                            Academic Calender
                                        </a>
                                    </li>
                                @endcan
                                @can('scholarship.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.scholarship.index') }}"
                                           class="nav-link {{ Request::is('admin/scholarship*')?'active':'' }}"
                                           data-key="t-calendar">
                                            Scholarship
                                        </a>
                                    </li>
                                @endcan
                                @can('alumni.index')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.alumni.index') }}"
                                           class="nav-link {{ Request::is('admin/alumni*')?'active':'' }}"
                                           data-key="t-calendar">
                                            Alumni
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>



                    {{-- publish nav start --}}
                    @if (auth()->guard('admin')->user()->can('notice.index')||
                        auth()->guard('admin')->user()->can('seminar.index')||
                        auth()->guard('admin')->user()->can('news.index')||
                        auth()->guard('admin')->user()->can('research.index')||
                        auth()->guard('admin')->user()->can('program.index')||
                        auth()->guard('admin')->user()->can('publication.index')
                        )

                        @if (Request::is('admin/notice*') ||
                            Request::is('admin/seminar*')||
                            Request::is('admin/news*')||
                            Request::is('admin/event*')||
                            Request::is('admin/research*')||
                            Request::is('admin/publication*')||
                            Request::is('admin/form*')||
                            Request::is('admin/citizen-charter*')||
                            Request::is('admin/program*'))
                            @php($publishedNav = true)
                        @endif
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ isset($publishedNav) ? 'active' : '' }}" href="#sidebarPublish" data-bs-toggle="collapse" role="button"
                               aria-expanded="false" aria-controls="sidebarPublish">
                                <i class="ri-article-line"></i> <span>Publishing</span>
                            </a>
                            <div class="collapse menu-dropdown {{ isset($publishedNav) ? 'show' : '' }}" id="sidebarPublish">
                                <ul class="nav nav-sm flex-column">
                                    @can('notice.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.notice.index') }}"
                                               class="nav-link {{ Request::is('admin/notice*') ? 'active' : '' }}">
                                                Notice
                                            </a>
                                        </li>
                                    @endcan
                                        @can('news.index')
                                            <li class="nav-item">
                                                <a href="{{ route('admin.news.index') }}"
                                                   class="nav-link {{ Request::is('admin/news*') ? 'active' : '' }}">
                                                    News
                                                </a>
                                            </li>
                                        @endcan
                                    @can('seminar.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.seminar.index') }}"
                                               class="nav-link {{ Request::is('admin/seminar*') ? 'active' : '' }}">
                                                Seminar
                                            </a>
                                        </li>
                                    @endcan

                                        @can('event.index')
                                            <li class="nav-item">
                                                <a href="{{ route('admin.event.index') }}"
                                                   class="nav-link {{ Request::is('admin/event*') ? 'active' : '' }}">
                                                    Event
                                                </a>
                                            </li>
                                        @endcan

                                    @can('program.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.program.index') }}"
                                               class="nav-link {{ Request::is('admin/program*') ? 'active' : '' }}">
                                                Academic Program
                                            </a>
                                        </li>
                                    @endcan

                                    @can('research.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.research.index') }}"
                                               class="nav-link {{ Request::is('admin/research*') ? 'active' : '' }}">
                                                Research
                                            </a>
                                        </li>
                                    @endcan

                                    @can('publication.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.publication.index') }}"
                                               class="nav-link {{ Request::is('admin/publication*') ? 'active' : '' }}">
                                                Publication
                                            </a>
                                        </li>
                                    @endcan
                                        @can('form.index')
                                            <li class="nav-item">
                                                <a href="{{ route('admin.form.index') }}"
                                                   class="nav-link {{ Request::is('admin/form*') ? 'active' : '' }}">
                                                    Form
                                                </a>
                                            </li>
                                        @endcan
                                        @can('citizen-charter.index')
                                            <li class="nav-item">
                                                <a href="{{ route('admin.citizen-charter.index') }}"
                                                   class="nav-link {{ Request::is('admin/citizen-charter*') ? 'active' : '' }}">
                                                    Citizen Charter
                                                </a>
                                            </li>
                                        @endcan
                                </ul>
                            </div>
                        </li>
                        {{-- publish nav end --}}
                    @endif


                    <li class="menu-title"><i class="ri-more-fill"></i> <span>Site Management</span></li>

                    @if (Request::is('admin/slider*'))
                        @php($siteNav = true)
                    @endif
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ isset($siteNav)?'active':'' }}" href="#siteMgt" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarAdministration">
                            <i class='bx bx-sitemap'></i> <span>Site Content</span>
                        </a>
                        <div class="collapse menu-dropdown {{ isset($siteNav)?'show':'' }}" id="siteMgt">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.slider.index') }}"
                                       class="nav-link {{ Request::is('admin/slider*') ? 'active' : '' }}"
                                       data-key="t-basic-tables">Sliders</a>
                                </li>
                            </ul>
                        </div>
                    </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
