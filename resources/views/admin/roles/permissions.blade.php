@extends('admin.layout.master')

@section('title')
    صلاحيات المجموعات
@stop

@section('css')
    <style>
        a {
            text-decoration: underline !important;
        }
    </style>
@stop

@section('subheader')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    وزارة الأوقاف والشؤون الدينية </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{ route('admin.dashboard.view') }}" class="kt-subheader__breadcrumbs-home"><i
                            class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('admin.dashboard.view') }}" class="kt-subheader__breadcrumbs-link">
                        الرئيسية
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('admin.roles.view') }}" class="kt-subheader__breadcrumbs-link">
                        المجموعات
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('admin.roles.add') }}" class="kt-subheader__breadcrumbs-link">
                        صلاحيات المجموعات
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <!-- begin:: Content -->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            صلاحيات المجموعة : {{ $info->name }}
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form role="form" method="post" id="frmPermissions" action="" class="form-horizontal">
                    <div class="kt-portlet__body">
                        <div class="row">
                            @foreach($permissions as $row)
                                <div class="col-md-12">
                                    <div>
                                        <h3 class="font-blue d-inline-block form-section">{{ $row->title }}</h3> &nbsp;
                                        &nbsp; <a href="#" class="select-all">تحديد الكل</a> &nbsp; &nbsp; <a href="#"
                                                                                                              class="unselect-all">إلغاء
                                            التحديد</a></div>
                                    <div class="icheck-list form-group">
                                        @foreach($row->children as $item)
                                            <label class="col-md-3">
                                                <input id="permissions[]" name="permissions[]" type="checkbox"
                                                       {{ in_array($item->id,array_column ($role_permissions,'permission_id')) ? 'checked' : '' }}
                                                       value="{{ $item->id }}" class="icheck"
                                                       data-checkbox="icheckbox_flat-blue">
                                                {{ $item->title }} &nbsp; ({{ $item->request_type }})
                                            </label>
                                        @endforeach
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-6 kt-align-right">
                                    <button type="submit" class="btn btn-brand save">حفظ</button>
                                    <a href="{{ route('admin.roles.view') }}" class="btn btn-secondary">الغاء</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    <!-- End:: Content -->
@stop

@section('js')
    <script src="assets/admin/general/js/scripts/roles.js" type="text/javascript"></script>
    <script>
        $('.select-all').on('click', function (e) {
            e.preventDefault();
            $(this).parent().next().find('label:not(.main) input').prop('checked', true);
        });
        $('.unselect-all').on('click', function (e) {
            e.preventDefault();
            $(this).parent().next().find('label:not(.main) input').prop('checked', false);
        });

    </script>
@stop
