<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestController extends Controller
{
    public function index()
    {
        //instantiate authenticated user
        $user = auth()->user();

        //get available permissions
        $availablePermissions = Permission::get();
        //dd($availablePermissions);

        //get list of all available roles
        $availableRoles = Role::get();
        //dd($availableRoles);

        foreach ($availableRoles as $candidateRole) {
            $rolesAndPermissions = [];
            foreach ($availablePermissions as $currentPermission) {
                if ($candidateRole->hasPermissionTo($currentPermission)){
                    $rolesAndPermissions[]=$currentPermission->toArray()['name'];
                } 
            }
            $roles[$candidateRole->toArray()['id']] = array('name'=>$candidateRole->toArray()['name'],'permissions'=>$rolesAndPermissions);
        }
        //dd($roles);

        //assign role by Id
        //$roleToAssign = Role::findById(1);
        //$user->assignRole($roleToAssign);

        //assign role by name
        $user->assignRole('writer');

        //remove role by id
        //$roleToRemove = Role::findById(1);
        //$user->removeRole($roleToRemove);

        //remove role by name
        //$user->removeRole('writer');

        //get current User roles
        $userRoles = $user->roles()->get(['id', 'name'])->toArray();
        //dd($userRoles);
        
        return view('test', compact([
            'userRoles',
            'roles'
        ]));
    }
}
