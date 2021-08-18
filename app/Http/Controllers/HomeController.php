<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User\User;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index(){
        $confirmation_code = auth()->user()->confirmation_code;
        $confirmed_at = auth()->user()->confirmed_at;
        if(is_null($confirmation_code) && isset($confirmed_at)){
            //return view('adminlte::home');
            return redirect('/dashboard');
        }else{
            auth()->logout();
            return redirect('/check_your_mail');            
        }
    }

    public function dashboard(){
        $confirmation_code = auth()->user()->confirmation_code;
        $confirmed_at = auth()->user()->confirmed_at; 
        $count_notification = (new User)->count_noficaciones_user();
        $user_deny_allow = auth()->user()->activo; 
        if($user_deny_allow == 'DENY'){
            auth()->logout();            
            return redirect('/deny');            
        }else if(is_null($confirmation_code) && isset($confirmed_at)){
            return view('adminlte::home',compact('count_notification'));
        }else{
            auth()->logout();
            return redirect('/check_your_mail');
        }
    }
}
