<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public static function show_home(Request $request) {
        $table = HomeController::get_league_table($request);
        return view('home')->with('table',json_decode($table));
    }
    public static function get_league_table(Request $request) {
        $winner_teams = DB::table('clubs')->join("countries","clubs.country_id","=","countries.country_id")->where('clubs.previous_winner','1')->get();
        $other_teams = DB::table('clubs')->join("countries","clubs.country_id","=","countries.country_id")->where('clubs.previous_winner','0')->get();
        $winner_teams =  json_decode(json_encode($winner_teams));
        $other_teams =  json_decode(json_encode($other_teams));
        $table = [[]];
        shuffle($winner_teams);
        shuffle($other_teams);
        $a = 0;
        for ($j=0; $j < count($winner_teams) ; $j++) { 
            $table[$j][$a] = $winner_teams[$j];
        }
        $a++;
        while($a != 4)
        {
            $count = 0;
            $i = 0;
            while($count != 8)
            {    
                if($i >= count($other_teams))
                {
                    $other_teams = array_merge($other_teams);
                    $i = 0;
                }
                if(HomeController::check($table,$count,$a,$other_teams,$i))
                {
                    $table[$count][$a] = $other_teams[$i];
                    $count++;
                    unset($other_teams[$i]);
                }
                $i++;
                if($i == count($other_teams))
                {
                    $i = 0;
                    $other_teams = array_merge($other_teams);
                }
            }
            $other_teams = array_merge($other_teams);
            $a++;
        }
        
        return json_encode($table);
    }
    public static function check($a,$b,$c,$d,$e)
    {
        for ($i=0; $i <$c ; $i++) { 
            
            if($a[$b][$i]->country_name == $d[$e]->country_name)
            {
                return false;
            }
        }
        return true;
    }
}
