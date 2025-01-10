<ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
    <li class="nav-item">
        <a class="nav-link fw-semibold {{ Request::is('admin/office/'.request()->slug.'*')?'bg-soft-primary active':'' }}" href="{{ route('admin.office.show',$office->slug) }}"
           role="tab">
            Overview
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link fw-semibold {{ Request::is('admin/office/staff/manage/'.request()->slug.'*')?'bg-soft-primary active':'' }}" href="{{ route('admin.office.staff.manage',$office->slug) }}" role="tab">
            Officer & Staffs
        </a>
    </li>
    @if(Request::is('admin/staff/edit/'.request()->id.'*'))
        <li class="nav-item">
            <a class="nav-link fw-semibold {{ Request::is('admin/staff/edit/'.request()->id.'*')?'bg-soft-primary active':'' }}"
               href="{{ route('admin.office.staff.edit',$office->id) }}" role="tab">
                Office Staff Edit
            </a>
        </li>
    @endif
</ul>
