<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = [
        'name', 'group_id', 'guard_name',
    ];
    protected $hidden = [
        '',
    ];
    public function children()
    {
        return $this->hasMany('App\Models\Permission', 'parent_id', 'id');
    }
    ////////////////////////////////////
    public function permission_group()
    {
        return $this->belongsTo('App\Models\PermissionGroup', 'group_id');
    }
    ////////////////////////////////////
    function addPermission($name, $group_id, $guard_name)
    {
        $this->name = $name;
        $this->group_id = $group_id;
        $this->guard_name = $guard_name;

        $this->save();
        return $this;
    }
    ////////////////////////////////////
    function updatePermission($obj, $name, $group_id, $guard_name)
    {
        $obj->name = $name;
        $obj->group_id = $group_id;
        $obj->guard_name = $guard_name;

        $obj->save();
        return $obj;
    }
    ////////////////////////////////////
    function deletePermission($obj)
    {
        return $obj->delete();
    }
    ////////////////////////////////////
    function getPermission($id)
    {
        return $this->find($id);
    }
    ////////////////////////////////////
    function getAllPermissions($name = null)
    {
        return $this->where(function($query) use ($name) {
            if($name != "")
            {
                $query->where('name','LIKE','%'.$name.'%');
            }
        })->get();
    }
}
