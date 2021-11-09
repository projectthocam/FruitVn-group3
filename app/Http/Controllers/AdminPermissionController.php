<?php

namespace App\Http\Controllers;

use App\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminPermissionController extends Controller
{
    private $permission;
    public function __construct(Permissions $permission){
        $this->permission = $permission;
    }
    public function CreatePermission(){
        return view('admin.permission.add');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $permission = $this->permission::create([
                'name' => $request->module_parent,
                'display_name' => $request->module_parent,
                'parent_id' => 0
            ]);
            foreach ($request->module_childrent as $value) {
                $this->permission::create([
                    'name' => $value,
                    'display_name' => $value,
                    'parent_id' => $permission->id,
                    'key_code' => $request->module_parent . '_' . $value
                ]);
            }
            DB::commit();
            return redirect()->route('permission.create')->with('toast_success', 'Permission Created Successfully!');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return redirect()->route('permission.create')->with('toast_error', 'Permission Created Error !');
        }
    }
}
