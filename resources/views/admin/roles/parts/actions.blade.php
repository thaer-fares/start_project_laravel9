@if(auth()->user()->can('admin.roles.edit') || auth()->user()->can('admin.roles.password') || auth()->user()->can('admin.roles.delete'))
    @can('admin.roles.edit')
        <a href="{{ route('admin.roles.edit', ['id' => $id_hash]) }}" class="btn btn-outline-success btn-elevate-hover btn-circle btn-icon btn-sm" title="تعديل">
            <i class="la la-edit"></i>
        </a>
    @endcan
    @can('admin.roles.permissions')
        <a href="{{ route('admin.roles.permissions',[ 'id' => $id_hash]) }}" class="btn btn-outline-info btn-elevate-hover btn-circle btn-icon btn-sm" title="الصلاحيات">
            <i class="fa fa-lock"></i>
        </a>
    @endcan
    @can('admin.roles.delete')
        <a href="javascript:;" data-url="{{ route('admin.roles.delete', ['id' => $id_hash]) }}" class="btn btn-outline-danger btn-elevate-hover btn-circle btn-icon btn-sm delete_btn" title="حذف">
            <i class="la la-trash"></i>
        </a>
    @endcan
@endif
