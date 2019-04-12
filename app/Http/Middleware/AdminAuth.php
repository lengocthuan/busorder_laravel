<?php

namespace App\Http\Middleware;

use App\RoleUser;
use App\User;
use Closure;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        // if (Auth::check()) {
        //     $email = Auth::user()->email;
        //     $password = Auth::user()->password;
        //     $tuan = User::where('email' => $email, 'password' => $password)->get();
        //     $tuan1 = RoleUser::all();
        //     foreach ($tuan as $user) {
        //         foreach($tuan1 as $role) {
        //             if($user->id == $role ->user_id){
        //                 if($role ->role_id == 1){
        //                     return $next($request);
        //                 }
        //                 else {
        //                     return redirect('admin/login')->with('error','You are not logged in as admin');
        //                 }
        //             }
        //         }
        //     }
            // $credentials = [
            //     'email' => $email,
            //     'password' => $password,
            // ];
            // $user_info = RoleUsers::table('users')->where('email', $email)->get();
    //         if ($user_info[0]->admin == 1) {
    //             return $next($request);
    //         }

    //     }
    //     throw new \Exception('You are not logged in as admin');
    //     }
    // }
}
