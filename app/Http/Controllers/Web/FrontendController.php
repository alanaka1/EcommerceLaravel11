<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use Spatie\Permission\Models\{Role, Permission};
use Illuminate\Support\Facades\{Auth, Hash, Session, Mail};
use Illuminate\Mail\Mailables\{Address, Envelope};

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

    public function newAccount(Request $request)
    {
        if ($request->isMethod('post')) {

            $check = User::where('email', '=', $request->email)->first();

            if (isset($check)) {
                
                return response()->json(['data' => 0]);

            }else{
                
                $user = new User;
                $user->name = strip_tags($request->name);
                $user->password = Hash::make($request->password);
                $user->email = strip_tags($request->email);
                $user->created_at = Carbon::now();
                $user->save();
        
                $user->assignRole('user');
                // return response()->json(['data' => $request->all()]);
                return response()->json(['data' => 1]);

            }


        }else{

            return redirect()->route('home');
        }

    }

    public function user_forget_password()
    {
        return view('Ecommerce.Web.Auth.forget_password');
    }

    public function user_reset_password(Request $request)
    {
        if ($request->isMethod('post')) {

            $check = User::where('email', '=', $request->email)->first();

            if (isset($check)) {
                
                Mail::to ($check->email)->send(new ForgetPassword(route('user.update.password', ['id' => $check->id])));

            }else{

                return response()->json(['data' => 0]);

            }

                // return response()->json(['data' => $request->all()]);
        }else{

            return redirect()->route('home');
        }
    }

    public function user_updated_password(Request $request)
    {
        $updated = User::where('id', $request->userID)->update([
            'password' => Hash::make($request->password),
        ]);

        if ($updated) {
            return response()->json(['data' => 1]);
        } else {
            return response()->json(['data' => 0]);
        }
    }

    public function user_logout()
    {
        Auth::logout();
        Session::flush();

        return redirect(route('home'));
    }

    public function user_update_password($id)
    {
        // $userID = $id;
        $user = User::findOrFail($id);
        return view('Ecommerce.Web.Auth.update_password', compact('user'));
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
