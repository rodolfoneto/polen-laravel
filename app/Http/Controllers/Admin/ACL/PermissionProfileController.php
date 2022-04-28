<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $permission;
    protected $profile;

    public function __construct(Permission $permission, Profile $profile)
    {
        $this->permission = $permission;
        $this->profile = $profile;
    }


    public function permissions($idProfile)
    {
        $profile = $this->profile->find($idProfile);
        if (!$profile) {
            return redirect()->back()->with('error', 'Perfil não encontrado');
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.permissions', compact('profile','permissions'));
    }

    public function permissionAvailable($idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back()->with('error', 'Perfil não encontrado');
        }

        $permissions = $this->permission->paginate();
        
        return view('admin.pages.profiles.permissions.permissionAvailable', compact('profile','permissions'));
    }


    public function attachPermissionProfile(Request $request, $idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back()->with('error', 'Perfil não encontrado');
        }

        if(!$request->permissions || count($request->permissions) == 0) {
            return redirect()->back()->with('error', 'Selecione alguma permissão');
        }

        $profile->permissions()->attach($request->permissions);
        return redirect()->route('profiles.permissions', $profile->id);
    }
}
