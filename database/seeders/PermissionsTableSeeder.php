<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('permissions')->delete();

        \DB::table('permissions')->insert(array (
            0 =>
            array (
                'id' => 1,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => '',
                'controller' => '',
                'action' => '',
                'title' => 'مجموعات المستخدمين',
                'name' => 'admin.roles.index',
                'description' => NULL,
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 0,
                'sort' => 1,
                'show_in_menu' => 1,
                'has_link' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => 'roles',
                'controller' => 'App\\Http\\Controllers\\Admin\\RolesController::class',
                'action' => 'getIndex',
                'title' => 'المجموعات',
                'name' => 'admin.roles.view',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 1,
                'sort' => 1,
                'show_in_menu' => 1,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => 'roles/list',
                'controller' => 'App\\Http\\Controllers\\Admin\\RolesController::class',
                'action' => 'getList',
                'title' => 'عرض المجموعات',
                'name' => 'admin.roles.list',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 1,
                'sort' => 2,
                'show_in_menu' => 0,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => 'roles/add',
                'controller' => 'App\\Http\\Controllers\\Admin\\RolesController::class',
                'action' => 'getAdd',
                'title' => 'إضافة مجموعة',
                'name' => 'admin.roles.add',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 1,
                'sort' => 3,
                'show_in_menu' => 1,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'group_id' => 1,
                'request_type' => 'post',
                'url' => 'roles/add',
                'controller' => 'App\\Http\\Controllers\\Admin\\RolesController::class',
                'action' => 'postAdd',
                'title' => 'إضافة مجموعة',
                'name' => 'admin.roles.post.add',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 1,
                'sort' => 3,
                'show_in_menu' => 0,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => 'roles/edit/{id}',
                'controller' => 'App\\Http\\Controllers\\Admin\\RolesController::class',
                'action' => 'getEdit',
                'title' => 'تعديل مجموعة',
                'name' => 'admin.roles.edit',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 1,
                'sort' => 4,
                'show_in_menu' => 0,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'group_id' => 1,
                'request_type' => 'post',
                'url' => 'roles/edit/{id}',
                'controller' => 'App\\Http\\Controllers\\Admin\\RolesController::class',
                'action' => 'postEdit',
                'title' => 'تعديل مجموعة',
                'name' => 'admin.roles.post.edit',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 1,
                'sort' => 3,
                'show_in_menu' => 0,
                'has_link' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => 'roles/delete/{id}',
                'controller' => 'App\\Http\\Controllers\\Admin\\RolesController::class',
                'action' => 'getDelete',
                'title' => 'حذف مجموعة',
                'name' => 'admin.roles.delete',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 1,
                'sort' => 5,
                'show_in_menu' => 0,
                'has_link' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'group_id' => 1,
                'request_type' => 'post',
                'url' => 'roles/status',
                'controller' => 'App\\Http\\Controllers\\Admin\\RolesController::class',
                'action' => 'postStatus',
                'title' => 'تعديل حالة مجموعة',
                'name' => 'admin.roles.status',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 1,
                'sort' => 3,
                'show_in_menu' => 0,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => 'roles/permissions/{id}',
                'controller' => 'App\\Http\\Controllers\\Admin\\RolesController::class',
                'action' => 'getPermissions',
                'title' => 'تعديل صلاحيات المجموعات',
                'name' => 'admin.roles.permissions',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 1,
                'sort' => 3,
                'show_in_menu' => 0,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'group_id' => 1,
                'request_type' => 'post',
                'url' => 'roles/permissions/{id}',
                'controller' => 'App\\Http\\Controllers\\Admin\\RolesController::class',
                'action' => 'postPermissions',
                'title' => 'تعديل صلاحيات المجموعات',
                'name' => 'admin.roles.post.permissions',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 1,
                'sort' => 3,
                'show_in_menu' => 0,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 =>
            array (
                'id' => 12,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => '',
                'controller' => '',
                'action' => '',
                'title' => 'المستخدمون',
                'name' => 'admin.users.view',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 0,
                'sort' => 2,
                'show_in_menu' => 1,
                'has_link' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 =>
            array (
                'id' => 13,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => 'users',
                'controller' => 'App\\Http\\Controllers\\Admin\\UsersController::class',
                'action' => 'getIndex',
                'title' => 'المستخدمون',
                'name' => 'admin.users.view',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 12,
                'sort' => 1,
                'show_in_menu' => 1,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 =>
            array (
                'id' => 14,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => 'users/list',
                'controller' => 'App\\Http\\Controllers\\Admin\\UsersController::class',
                'action' => 'getList',
                'title' => 'عرض المستخدمين',
                'name' => 'admin.users.list',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 12,
                'sort' => 2,
                'show_in_menu' => 0,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 =>
            array (
                'id' => 15,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => 'users/add',
                'controller' => 'App\\Http\\Controllers\\Admin\\UsersController::class',
                'action' => 'getAdd',
                'title' => 'إضافة مستخدم',
                'name' => 'admin.users.add',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 12,
                'sort' => 3,
                'show_in_menu' => 1,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 =>
            array (
                'id' => 16,
                'group_id' => 1,
                'request_type' => 'post',
                'url' => 'users/add',
                'controller' => 'App\\Http\\Controllers\\Admin\\UsersController::class',
                'action' => 'postAdd',
                'title' => 'إضافة مستخدم',
                'name' => 'admin.users.store',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 12,
                'sort' => 3,
                'show_in_menu' => 0,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 =>
            array (
                'id' => 17,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => 'users/edit/{id}',
                'controller' => 'App\\Http\\Controllers\\Admin\\UsersController::class',
                'action' => 'getEdit',
                'title' => 'تعديل مستخدم',
                'name' => 'admin.users.edit',
                'description' => NULL,
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 12,
                'sort' => 1,
                'show_in_menu' => 0,
                'has_link' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 =>
            array (
                'id' => 18,
                'group_id' => 1,
                'request_type' => 'post',
                'url' => 'users/edit/{id}',
                'controller' => 'App\\Http\\Controllers\\Admin\\UsersController::class',
                'action' => 'postEdit',
                'title' => 'تعديل مستخدم',
                'name' => 'admin.users.update',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 1,
                'sort' => 3,
                'show_in_menu' => 0,
                'has_link' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),

            18 =>
            array (
                'id' => 19,
                'group_id' => 1,
                'request_type' => 'get',
                'url' => 'users/delete/{id}',
                'controller' => 'App\\Http\\Controllers\\Admin\\UsersController::class',
                'action' => 'getDelete',
                'title' => 'حذف مستخدم',
                'name' => 'admin.users.delete',
                'description' => '',
                'guard_name' => 'admin',
                'icon' => 'icon-briefcase',
                'parent_id' => 1,
                'sort' => 3,
                'show_in_menu' => 0,
                'has_link' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
