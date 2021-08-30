<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/

namespace App\Models\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rols_id',
        'name',        
        'foto',
        'email',
        'password',
        'activo',
        'init_day',
        'end_day',
        'confirmation_code',
        'confirmed_at',  
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */    
    public function rol(){
        return $this->belongsTo('App\Models\Security\Rol');
    }

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function count_noficaciones_user(){
        $user_id = auth()->user()->id;        
        $sql_count_notifications = DB::table('notifications')->where('notifiable_id', $user_id)->count();        
        return $sql_count_notifications;
    }

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function getUsersList_DataTable(){        
        return DB::table('users')->select('id','name','avatar','email','activo','confirmed_at')->get();
    }

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function count_User_Rol(){        
        return DB::table('users')
            ->join('rols', 'users.rols_id', '=', 'rols.id')
            ->select('users.rols_id AS ID_ROLS',
                    'rols.name AS NAME_ROLS',DB::raw('COUNT(users.rols_id) AS TOTAL_USERS'))
            ->where('rols.activo','ALLOW')                    
            ->groupBy('users.rols_id')
            ->orderByDesc('TOTAL_USERS')->limit(10)->get();
    }

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function count_User_notifications(){        
        return DB::table('users')
            ->join('notifications', 'users.id', '=', 'notifications.notifiable_id')
            ->select('users.name AS USER_NAME',
                DB::raw('COUNT(notifications.notifiable_id) AS TOTAL_NOTIFICATIONS'))
            ->where('users.activo','ALLOW')                    
            ->groupBy('notifications.notifiable_id')
            ->orderByDesc('TOTAL_NOTIFICATIONS')->limit(10)->get();
    }

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function userTotalActivo(){
        $countActivos = DB::table('users')            
                            ->select(DB::raw('COUNT(users.activo) AS TOTAL_ALLOW'))
                            ->where('users.activo','ALLOW')                    
                            ->groupBy('users.activo')->get();
            if(!$countActivos->isEmpty()){
                foreach($countActivos as $countActivo){
                   $total = $countActivo->TOTAL_ALLOW;
                }
            }else{
                $total = 0;
                return $total;
            }
        return $total;
    }
    

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function totalRoles(){
        $totalRoles = DB::table('rols')            
                            ->select(DB::raw('COUNT(rols.id) AS TOTAL_ALLOW'))
                            ->where('rols.activo','ALLOW')                    
                            ->groupBy('rols.activo')->get();
            if(!$totalRoles->isEmpty()){
                foreach($totalRoles as $totalRole){
                   $total = $totalRole->TOTAL_ALLOW;
                }
            }else{
                $total = 0;
                return $total;
            }
        return $total;
    }

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function userTotalDeny(){
        $countActivos = DB::table('users')            
                            ->select(DB::raw('COUNT(users.activo) AS TOTAL_DENY'))
                            ->where('users.activo','DENY')                    
                            ->groupBy('users.activo')->get();
            if(!$countActivos->isEmpty()){
                foreach($countActivos as $countActivo){
                   $total = $countActivo->TOTAL_DENY;
                }
            }else{
                $total = 0;
                return $total;
            }
        return $total;
    }

    /**
    * Realizado por @author Tarsicio Carrizales 
    * Correo: telecom.com.ve@gmail.com
    */
    public function getNotificationsList_DataTable(){
        $user = Auth::user();       
        return DB::table('notifications')
                    ->where('notifiable_id',$user->id)
                    ->select('id','data','read_at','created_at')
                    ->orderByDesc('created_at')->get();
    }

}// Fin del Modelo User
