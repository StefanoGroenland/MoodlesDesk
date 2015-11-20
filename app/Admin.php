<?php
/**
 * Created by PhpStorm.
 * User: Stefano
 * Date: 20-11-2015
 * Time: 10:05
 */

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Session;
use DB;

class Admin extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;


    public function showAdminDashboard(){
        if(\Auth::guest()){
            return redirect('/');
        }
        else if(\Auth::user()->bedrijf == 'moodles'){
            return view('admindashboard');
        }else{
            return redirect('/dashboard');
        }
    }
    public function showMedewerkerMuteren(){
        if(\Auth::guest()){
            return redirect('/');
        }
        else if(\Auth::user()->bedrijf == 'moodles'){
            return view('medewerkermuteren');
        }else{
            return redirect('/dashboard');
        }
    }

    public function getMedewerkers(){
      $admins = DB::table('gebruikers')
          ->select(DB::raw('voornaam,achternaam,email,bedrijf'))
          ->where('bedrijf', 'moodles')
          ->get();
              foreach ($admins as $adm) {
                  echo "<tr>";
                  echo "<td>". ucfirst($adm->voornaam) ." ". ucfirst($adm->achternaam) . "</td>";
                  echo "<td>". $adm->email . "</td>";
                  echo "<td><a href='#'> <button type='submit' class='btn btn-success btn-xs'> <i class='fa fa-check'> </i> </button> </a>";
                  echo "<button class='btn btn-danger btn-xs'> <i class='fa fa-remove'></i></button></td>";
                  echo "</tr>";
        }
    }
}
