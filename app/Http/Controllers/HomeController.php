<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User\User;
use RealRashid\SweetAlert\Facades\Alert;
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
     * Realizado por @author Tarsicio Carrizales
     */
    public function index(){
        $confirmation_code = auth()->user()->confirmation_code;
        $confirmed_at = auth()->user()->confirmed_at;
        if(is_null($confirmation_code) && isset($confirmed_at)){            
            return redirect('/dashboard');
        }else{
            auth()->logout();
            return redirect('/check_your_mail');            
        }
    }

    /**
    * Realizado por @author Tarsicio Carrizales
    */
    public function dashboard(){
        $confirmation_code = auth()->user()->confirmation_code;
        $confirmed_at = auth()->user()->confirmed_at;         
        $user_deny_allow = auth()->user()->activo; 
        if($user_deny_allow == 'DENY'){
            auth()->logout();
            alert()->warning(trans('message.mensajes_alert.denegado'),trans('message.mensajes_alert.mensaje'));
            return redirect('/deny');            
        }else if(is_null($confirmation_code) && isset($confirmed_at)){
            $count_notification = (new User)->count_noficaciones_user();
            $user_total_activos = (new User)->userTotalActivo();
            $total_roles = (new User)->totalRoles();
            $user_total_Deny = (new User)->userTotalDeny();            
            return view('adminlte::home',compact('count_notification','user_total_activos',
                                                  'total_roles','user_total_Deny'));
        }else{
            auth()->logout();
            alert()->info(trans('message.mensajes_alert.view_mail'),trans('message.mensajes_alert.view_mail_02'));
            return redirect('/check_your_mail');
        }
    }
}
