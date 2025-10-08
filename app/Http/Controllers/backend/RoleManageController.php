<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Module;

class RoleManageController extends Controller
{
      public function index()
    {
        $Roles = Role::all();
        $Modules = Module::all();
        return view('backend.moduleAssign', compact('Roles', 'Modules'));
    }
}
