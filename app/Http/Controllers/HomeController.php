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
        $winner_teams = DB::table('clubs')->join("countries","clubs.country_id","=","countries.country_id")->select('countries.country_name','clubs.club_name')->where('clubs.previous_winner','1')->get();
        $other_teams = DB::table('clubs')->join("countries","clubs.country_id","=","countries.country_id")->select('countries.country_name','clubs.club_name')->where('clubs.previous_winner','0')->get();
        $winner_teams =  json_decode(json_encode($winner_teams));
        $other_teams =  json_decode(json_encode($other_teams));
        $table = [[]];
        shuffle($winner_teams);
        shuffle($other_teams);
        $flag = 0;
        for ($j=0; $j < count($winner_teams) ; $j++) { 
            $table[$j][$flag] = $winner_teams[$j];
        }
        $flag++;
        while($flag != 4)
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
                if(HomeController::check($table,$count,$flag,$other_teams,$i))
                {
                    $table[$count][$flag] = $other_teams[$i];
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
            $flag++;
        }
        
        return json_encode($table);
    }
    public static function check($table,$count,$table_position,$other_teams,$other_teams_position)
    {
        for ($i=0; $i <$table_position ; $i++) { 
            
            if($table[$count][$i]->country_name == $other_teams[$other_teams_position]->country_name)
            {
                return false;
            }
        }
        return true;
    }
}
