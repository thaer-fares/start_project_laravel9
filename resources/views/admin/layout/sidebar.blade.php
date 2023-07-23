<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
         data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item  kt-menu__item--{{ $active_menu == 'dashboard' ? 'active' : '' }}"
                aria-haspopup="true">
                <a href="{{ route('admin.dashboard.view') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon id="Bound" points="0 0 24 0 24 24 0 24"/>
                                <path
                                    d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                    id="Shape" fill="#000000" fill-rule="nonzero"/>
                                <path
                                    d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                    id="Path" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                    </span>
                    <span class="kt-menu__link-text">
                        الرئيسية
                    </span>
                </a>
            </li>
            @if(false)
            <li class="kt-menu__item  kt-menu__item--{{ $active_menu == 'applications' ? 'active' : '' }}"
                aria-haspopup="true">
                <a href="{{ route('admin.applications.view') }}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon">
                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                  width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect opacity="0.200000003" x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M4.5,7 L9.5,7 C10.3284271,7 11,7.67157288 11,8.5 C11,9.32842712 10.3284271,10 9.5,10 L4.5,10 C3.67157288,10 3,9.32842712 3,8.5 C3,7.67157288 3.67157288,7 4.5,7 Z M13.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L13.5,18 C12.6715729,18 12,17.3284271 12,16.5 C12,15.6715729 12.6715729,15 13.5,15 Z"
                                        fill="#000000" opacity="0.3"/>
                                    <path
                                        d="M17,11 C15.3431458,11 14,9.65685425 14,8 C14,6.34314575 15.3431458,5 17,5 C18.6568542,5 20,6.34314575 20,8 C20,9.65685425 18.6568542,11 17,11 Z M6,19 C4.34314575,19 3,17.6568542 3,16 C3,14.3431458 4.34314575,13 6,13 C7.65685425,13 9,14.3431458 9,16 C9,17.6568542 7.65685425,19 6,19 Z"
                                        fill="#000000"/>
                                </g>
                            </svg>
                        </span>
                    <span class="kt-menu__link-text">طلبات التسجيل</span>
                </a>
            </li>
            @endif
            @foreach($user_permissions as $permission)
                @if(true)
                @php
                    $has_children = count($permission->children) > 0;
                @endphp
                @if($has_children)
                    <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                        data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <i class="kt-menu__link-icon flaticon-graphic"></i>
                            <span class="kt-menu__link-text">{{ $permission->title }}</span>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                            <ul class="kt-menu__subnav">
                                @foreach($permission->children as $sub_permission)
                                    @if($sub_permission->show_in_menu)
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{ route($sub_permission->name) }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">{{ $sub_permission->title }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @else
                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route($permission->name) }}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon flaticon-graphic"></i>
                            <span class="kt-menu__link-text">{{ $permission->title }}</span>
                        </a>
                    </li>
                @endif
                @endif
            @endforeach
            <li class="kt-menu__item" aria-haspopup="true">
                <a href="{{ route('admin.dashboard.logout') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect id="bound" x="0" y="0" width="24" height="24"/>
                                <path
                                    d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z"
                                    id="Path-103" fill="#000000" fill-rule="nonzero" opacity="0.3"
                                    transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) "/>
                                <rect id="Rectangle" fill="#000000" opacity="0.3"
                                      transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) "
                                      x="13" y="6" width="2" height="12" rx="1"/>
                                <path
                                    d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z"
                                    id="Path-104" fill="#000000" fill-rule="nonzero"
                                    transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) "/>
                            </g>
                        </svg>
                    </span>
                    <span class="kt-menu__link-text">تسجيل الخروج</span>
                </a>
            </li>
            <li class="kt-menu__section "></li>
        </ul>
    </div>
</div>
