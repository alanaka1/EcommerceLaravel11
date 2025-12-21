<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class FrontendController extends Controller
{
    public function home()
    {
        // https://spatie.be/docs/laravel-permission/v6/installation-laravel
        // $role = Role::create(['name' => 'user']);
        // $permission = Permission::create(['name' => 'user']);
        return View('Ecommerce.Web.Template.index');
    }
}
