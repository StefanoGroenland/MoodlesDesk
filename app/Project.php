<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Project extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projecten';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titel',
        'status',
        'prioriteit',
        'soort',
        'projectnaam',
        'projecturl',
        'gebruikersnaam',
        'wachtwoord',
        'telefoonnummer',
        'omschrijvingproject',
        'gebruiker_id',
    ];
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App\User', 'id');
    }

    public static function getUsers(){
        $users = User::where('bedrijf','!=', 'moodles' )->get();
        return $users;
    }

    public static function verwijderProject($id){
        DB::table('projecten')->where('id', '=',$id)->delete();
        return redirect('/projectmuteren');
    }
    public static function getProjectOnSearch($inp){
        return DB::table('projecten')
            ->select(DB::raw('titel,status,prioriteit,soort,projectnaam,projecturl
            ,gebruikersnaam,wachtwoord
            ,gebruiker_id,omschrijvingproject'))
            ->where('projectnaam', 'LIKE', '%'.$inp.'%')
            ->get();
    }
}