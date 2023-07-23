@if(auth()->user()->can('admin.users.edit') || auth()->user()->can('admin.users.password') || auth()->user()->can('admin.users.delete'))
    @can('admin.users.edit')
        <a href="{{ route('admin.users.edit', ['id' => $id]) }}" class="btn btn-outline-success btn-elevate-hover btn-circle btn-icon btn-sm" title="تعديل">
            <i class="la la-edit"></i>
        </a>
    @endcan
    &nbsp;
    @can('admin.users.password')
        <a href="{{ route('admin.users.password', ['id' => $id]) }}" class="btn btn-outline-warning btn-elevate-hover btn-circle btn-icon btn-sm" title="كلمة المرور">
            <i class="la la-unlock"></i>
        </a>
    @endcan
    &nbsp;
{{--    @can('admin.users.permissions')--}}
{{--        <a href="{{ route('admin.users.permissions',[ 'id' => $id]) }}" class="btn btn-outline-info btn-elevate-hover btn-circle btn-icon btn-sm" title="الصلاحيات">--}}
{{--            <i class="fa fa-lock"></i>--}}
{{--        </a>--}}
{{--    @endcan--}}

    @can('admin.users.delete')
        <a href="javascript:;" data-url="{{ route('admin.users.delete', ['id' => $id]) }}" class="btn btn-outline-danger btn-elevate-hover btn-circle btn-icon btn-sm delete_btn" title="حذف">
            <i class="la la-trash"></i>
        </a>
    @endcan
@endif
