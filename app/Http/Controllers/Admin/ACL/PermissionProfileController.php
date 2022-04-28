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


    public function permissions(Request $request, $idProfile)
    {
        $filters = $request->filter;
        $profile = $this->profile->find($idProfile);
        if (!$profile) {
            return redirect()->back()->with('error', 'Perfil não encontrado');
        }

        $permissions = $profile->permissions()->where('name', 'LIKE', "%{$filters}%")->paginate();
        return view('admin.pages.profiles.permissions.permissions', compact('profile','permissions', 'filters'));
    }


    /**
     * 
     */
    public function permissionAvailable(Request $request, $idProfile)
    {
        $filters = $request->filter;
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back()->with('error', 'Perfil não encontrado');
        }

        $permissions = $profile->permissionsAvailable($filters);
        
        return view('admin.pages.profiles.permissions.permissionAvailable', compact('profile','permissions', 'filters'));
    }


    /**
     * 
     */
    public function attachPermissionProfile(Request $request, $idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back()->with('error', 'Perfil não encontrado');
        }

        if(!$request->permissions || count($request->permissions) == 0) {
            return redirect()->back()->with('error', 'Selecione alguma permissão');
        }

        $profile->permissions()->attach($request->permissions);
        return redirect()->route('profiles.permissions', $profile->id)->with('success', "Permissão vinculada com sucesso");
    }


    public function deattachPermissionProfile(Request $request, $profileId, $permissionId)
    {
        $profile = $this->profile->find($profileId);
        $permission = $this->permission->find($permissionId);
        if(!$permission || !$profile) {
            return redirect()->back()->with('error', 'Perfil ou permissão não existe');
        }
        $profile->permissions()->detach($permission);
        return redirect()->route('profiles.permissions', $profile->id)->with('success', "{$permission->name} desvinculada com sucesso");
    }
}
