<?php

namespace App\Http\Controllers;

use App\Permissions;
use App\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminRolesController extends Controller
{
    private $roles;
    private $permission;
    public function __construct(Roles $roles, Permissions $permission){
        $this->roles = $roles;
        $this->permission = $permission;
    }
    public function index(Request $request){
        if ($request->search != null){
            $role = $this->roles::where('name','like', '%'.$request->search.'%')->latest()->paginate(10);
        }else{
            $role = $this->roles->latest()->paginate(10);
        }
        return view('admin.Roles.index', compact('role'));
    }

    public function create(){
        $PermissonsParent = $this->permission::where('parent_id', '0')->get();
        return view('admin.Roles.add', compact('PermissonsParent'));
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $role = $this->roles::create([
                'name'=>$request->name,
                'display_name'=>$request->display_name
            ]);
            $role->permission()->attach($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index')->with('toast_success','Roles Created Successfully!');;
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return redirect()->route('roles.index')->with('toast_error','Roles Created Error !');
        }
    }

    public function edit($id){
        $roleCheckd = $this->roles::find($id);
        $PermissonsParent = $this->permission::where('parent_id', '0')->get();
        $permissionChecked = $roleCheckd->permission;
        return view('admin.Roles.edit', compact('PermissonsParent','roleCheckd','permissionChecked'));
    }

    public function update($id, Request $request){
        try {
            DB::beginTransaction();
            $role = $this->roles::find($id);
            $role->update([
                'name'=> $request->name,
                'display_name'=> $request->display_name
            ]);
            $role->permission()->sync($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index')->with('toast_success','Roles Updated Successfully!');;
        }catch (\Exception $exception){
            DB::rollBack();
             Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return redirect()->route('roles.index')->with('toast_error','Roles Updated Error !');
        }
    }

    public function delete($id, Request $request){
        try {
            DB::beginTransaction();
            $this->roles::find($id)->delete();
            DB::commit();
            return redirect()->route('roles.index')->with('toast_success', 'The roles deleted Successfully!');;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::channel('daily')->error('Message: ' . $exception->getMessage() . ' Line :' . $exception->getLine());
            return redirect()->route('roles.index')->with('toast_error', 'The roles deleted error');
        }
    }
}
