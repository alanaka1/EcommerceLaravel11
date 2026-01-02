<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Role};
use Spatie\Permission\Models\{Permission};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, Hash};
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function home()
    {
        // https://spatie.be/docs/laravel-permission/v6/installation-laravel
        // $role = Role::create(['name' => 'user']);
        // $permission = Permission::create(['name' => 'user']);

        // https://www.youtube.com/watch?v=rylizrEJRvE&list=PLeRGxvo-jizOuyWj9NN7Xp1WR6OrdpKtq&index=8 (2:59)
        // $user = new User;
        // $user->name     = 'الإدارة';
        // $user->email = 'user@admin.com';
        // $user->password = Hash::make('123456');
        // $user->created_at = Carbon::now();
        // $user->save();

        // $user->assignRole('user');
        // return $user;
        
        return View('Ecommerce.Web.Template.index');
    }

    public function user_login(Request $request)
    {
        // $methon = $request->method();
        
        if ($request->isMethod('post')) {

            $check = $request->all();

            if(Auth::guard('web')->attempt(['email' => $check['email'], 'password' => $check['password']])) {

                // $user = User::where('email', '=', $check['email'])->first();

                if (Auth::user()->hasRole('admin')) {

                    // Auth::login($user);
                    
                    return response()->json(['data' => 1]);

                }else{

                    // Auth::login($user);
                    
                    return response()->json(['data' => 2]);

                }
                
            }else{
                    return response()->json(['data' => 0]);
                }
            
            return response()->json($request->all());
        
        }else{
            return redirect()->route('home');
        }
    }

    // حل تشات جي بي تي

    //     public function user_login(Request $request)
    // {
    // if ($request->isMethod('post')) {

    //     $check = $request->only('email', 'password');

    //     if (Auth::attempt($check)) {

    //         $user = Auth::user(); // المستخدم الحالي

    //         if ($user->hasRole('admin')) {
    //             return response()->json(1);
    //         } else {
    //             return response()->json(2);
    //         }

    //     } else {
    //         return response()->json(0); // بيانات خطأ
    //     }
    // }

    // return redirect()->route('home');
    // }
}
