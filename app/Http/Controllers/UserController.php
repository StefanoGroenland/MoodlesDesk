<?php
/**
 * Created by PhpStorm.
 * User: Stefano
 * Date: 20-11-2015
 * Time: 10:04
 */

namespace App\Http\Controllers;
use App\User as User;
use App\Project as Project;
use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Route, View;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Support\Facades\Auth;
use App\Bug as Bug;
class UserController extends Controller
{
    public function showWelcome()
    {
        if (Auth::user()->id > 0) {
            return $this->showDashboard();
        } else {
            return View::make('auth/welcome');
        }
    }
    public function showDashboard()
    {
        $klant_id = Auth::user()->id;
        $bugs = Bug::all();
        $bugs_send = Bug::where('klant_id' , '=', $klant_id)->get();
        $projects = Project::all();
        $projects_send = Project::where('gebruiker_id', '=', $klant_id)->get();
        if(\Auth::guest()){
            return redirect('/');
        }
        else if(\Auth::user()->bedrijf == 'moodles'){
            return View::make('/admindashboard', compact('bugs','projects'));
        }else{
            return View::make('/dashboard', compact('bugs_send','projects_send'));
        }
    }
    public function showMwMuteren($id){
        $medewerker = User::find($id);
        return View::make('medewerkermuteren', compact('medewerker'));
    }
    public function showKlantMuteren($id){
        $klant = User::find($id);
        return View::make('klantmuteren', compact('klant'));
    }
    public function showNewMedewerker(){
        $medewerkers = User::all();
        return View::make('newmedewerker', compact('medewerkers'));
    }
    public function showNewKlant(){
        return View::make('newklant');
    }
    public function showProfiel(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return View::make('profiel',compact('user'));
    }
    public function updateProfiel(Request $request){
        $id = $request['id'];

            $data = array(
                'id'                    => $request['id'],
                'username'              => $request['username'],
                'email'                 => $request['email'],
                'password'              => $request['password'],
                'password_confirmation' => $request['password_confirmation'],
                'voornaam'              => $request['voornaam'],
                'tussenvoegsel'         => $request['tussenvoegsel'],
                'achternaam'            => $request['achternaam'],
                'geslacht'              => $request['geslacht'],
                'telefoonnummer'        => $request['telefoonnummer'],
                'bedrijf'               => $request['bedrijf'],
            );

        if(empty($data['password']) || empty($data['password_confirmation'])){
            array_forget($data, 'password');
            array_forget($data, 'password_confirmation');
        }

        $rules = array(
            'telefoonnummer' => 'numeric',
            'password' => 'min:4|confirmed',
            'password_confirmation' => 'min:4',
        );

        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            return redirect('/profiel')->withErrors($validator);
        }

        if(array_key_exists('password', $data)){
            Hash::make($data['password']);
        }else{
            $request->session()->flash('alert-warning', 'Uw account is gewijziged, er zijn geen wijzigingen aan het wachtwoord doorgevoerd.');
            return redirect('/profiel');
        }
        array_forget($data, 'password_confirmation');
        User::where('id', '=', $id)->update($data);
        $request->session()->flash('alert-success', 'Uw account is succesvol gewijigd.');
        return redirect('/profiel');
    }

    public function upload(Request $request){
        $id = $request['id'];
        $file = array('profielfoto' => $request->file('profielfoto'));

        $rules = array('profielfoto' => 'required|mimes:jpeg,bmp,png,jpg',);

        $validator = Validator::make($file,$rules);
        if($validator->fails()){
            if($file){
                $request->session()->flash('alert-danger', 'U heeft geen bestand / geen geldig bestand gekozen om te uploaden, voeg een foto toe.');
            }
            return redirect('/profiel');
        }
        else{
            if($request->file('profielfoto')->isValid()){

                $destinationPath = 'assets/uploads';
                $extension = $request->file('profielfoto')->getClientOriginalExtension();
                $fileName = rand(1111,9999).'.'.$extension;

                $request->file('profielfoto')->move($destinationPath,$fileName);
                $ava = $destinationPath .'/'. $fileName;
                User::uploadPicture($id,$ava);

                $request->session()->flash('alert-success', 'Uw profiel foto is veranderd.');
                return redirect('/profiel');
            }
            else{
                $request->session()->flash('alert-danger', 'Er is een fout opgetreden tijdens het uploaden van uw bestand.');
                return redirect('/profiel');
            }
        }
    }

    public function showKlantenOverzicht(){
        $klanten = User::where('bedrijf','!=', 'moodles')->get();
        return View::make('klanten' , compact('klanten'));
    }
    public function showMedewerkersOverzicht(){
        $medewerkers = User::getMedewerkers();
        return View::make('medewerkers' , compact('medewerkers'));
    }
    public function updateMedewerker(Request $request){
        $id = $request['id'];
        $data = array(
            'id'                    => $request['id'],
            'username'              => $request['username'],
            'email'                 => $request['email'],
            'password'              => bcrypt($request['password']),
            'voornaam'              => $request['voornaam'],
            'tussenvoegsel'         => $request['tussenvoegsel'],
            'achternaam'            => $request['achternaam'],
            'geslacht'              => $request['geslacht'],
            'telefoonnummer'        => $request['telefoonnummer'],
        );

        $rules = array(
            'telefoonnummer' => 'numeric',
        );
        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            return redirect('/medewerkermuteren/'.$id)->withErrors($validator);
        }
            User::where('id', '=', $id)->update($data);
            $request->session()->flash('alert-success', 'Gebruiker '. $request['username']. ' veranderd.');
            return redirect('/medewerkers');
    }
    public function updateKlant(Request $request){
        $id = $request['id'];
        if($request['bedrijf'] == 'moodles'){
            $request->session()->flash('alert-danger', 'Er mogen geen klanten met \'moodles\' als bedrijf worden aangemaakt.');
            return redirect('/klanten');
        }
        $data = array(
            'id'                    => $request['id'],
            'username'              => $request['username'],
            'email'                 => $request['email'],
            'voornaam'              => $request['voornaam'],
            'tussenvoegsel'         => $request['tussenvoegsel'],
            'achternaam'            => $request['achternaam'],
            'geslacht'              => $request['geslacht'],
            'telefoonnummer'        => $request['telefoonnummer'],
            'bedrijf'               => $request['bedrijf'],
        );
        $rules = array(
            'telefoonnummer' => 'numeric',
        );
        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            return redirect('/klantmuteren/'.$id)->withErrors($validator);
        }
        User::where('id', '=', $id)->update($data);
        $request->session()->flash('alert-success', 'Klant '. $request['username']. ' veranderd.');
        return redirect('/klanten');
    }
    public function getUpdateData(){
        $input = $_POST['input'];
        $inputdata = User::getMedewerker($input);
        return $inputdata;
    }
    public function getKlantData(){
        $input = $_POST['input'];
        $inputdata = User::getKlant($input);
        return $inputdata;
    }
    public function addMedewerker(Request $request){

        $data = array(
            'username'                  => $request['username'],
            'email'                     => $request['email'],
            'password'                  => $request['password'],
            'password_confirmation'     => $request['password_confirmation'],
            'bedrijf'                   => 'moodles',
            'voornaam'                  => $request['voornaam'],
            'tussenvoegsel'             => $request['tussenvoegsel'],
            'achternaam'                => $request['achternaam'],
            'telefoonnummer'            => $request['telefoonnummer'],
            'geslacht'                  => $request['geslacht'],
            'profielfoto'               => 'assets/images/avatar.png',
        );

        $rules = array(
            'telefoonnummer' => 'numeric',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4',
        );

        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            return redirect('/newmedewerker')->withErrors($validator);
        }

            $data['password'] = Hash::make($data['password']);
            array_forget($data, 'password_confirmation');
            User::create($data);
            $request->session()->flash('alert-success', 'Gebruiker '. $request['username']. ' toegevoegd.');
            return redirect('/newmedewerker');
}
    public function addUser(Request $request){

        if($request['bedrijf'] == 'moodles'){
            $request->session()->flash('alert-danger', 'Er mogen geen klanten met \'moodles\' als bedrijf worden aangemaakt.');
            return redirect('/newklant');
        }
        $data = array(
            'username'              => $request['username'],
            'email'                 => $request['email'],
            'password'              => $request['password'],
            'password_confirmation' => $request['password_confirmation'],
            'bedrijf'               => $request['bedrijf'],
            'voornaam'              => $request['voornaam'],
            'tussenvoegsel'         => $request['tussenvoegsel'],
            'achternaam'            => $request['achternaam'],
            'telefoonnummer'        => $request['telefoonnummer'],
            'geslacht'              => $request['geslacht'],
            'profielfoto'           => 'assets/images/avatar.png',
        );
        $rules = array(
            'telefoonnummer' => 'numeric',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4',
        );

        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            return redirect('/newklant')->withErrors($validator);
        }
        $data['password'] = Hash::make($data['password']);
        array_forget($data, 'password_confirmation');
        User::create($data);
        $request->session()->flash('alert-success', 'Gebruiker '. $request['username']. ' toegevoegd.');
        return redirect('/newklant');
    }
    public function verwijderGebruiker(){
            $sid = Route::current()->getParameter('id');
            session()->flash('alert-danger', 'Gebruiker met id : ' . $sid . ' verwijderd.');
            return User::verwijderGebruiker($sid);
    }
    public function resetUserPassword(Request $request){
        $email = $request->input('email');
        $data = array(
            'email'   => $request['email'],
            'password'   => bcrypt($request['password']),
        );
        User::where('email', '=', $email)->update($data);
        $request->session()->flash('alert-success',  $request['email']. ' veranderd.');
        return redirect('/admindashboard');
    }
}