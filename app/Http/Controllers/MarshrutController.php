<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\Station;
use App\Zastype;
use App\Zasplan;
use App\Part;
use App\Rep;
use App\Zasaddbase;
use App\Zasadd;
use App\Zasbaig;
use App\Zasmat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class MarshrutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function report01()
    {
 
        $startdate=2; 
        $enddate= 3; 
        $query = "";
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=" and repouteddate is null";
         }
         else 
         {
            
            $startdate=2; 
            $enddate= 3; 
                $query.=" and repouteddate is null";
            }
            $bindings = [
                'varType'  =>  1,
                'varYear'  => 2022,
                'begMonth'  => 1,
                'endMonth'  => 3,
                'varDepo'  =>  1,
                'varDepo1'  => 5
                ];
         
            $report = DB::executeProcedureWithCursor('zutguur.procSelenge', $bindings);
        
        return view('marshrut.report01')->with(['report'=>$report, 'startdate' =>$startdate,'enddate' => $enddate]);
    }
    public function report02()
    {
 
        $startdate=2; 
        $enddate= 3; 
        $query = "";
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            
         }
         else 
         {
            $startdate=2; 
            $enddate= 3; 
            }
            $bindings = [
                'varType'  =>  2,
                'varYear'  => 2022,
                'begMonth'  => 2,
                'endMonth'  => 3,
                'varDepo'  =>  2,
                'varDepo1'  => 2
                ];
         
            $report = DB::executeProcedureWithCursor('zutguur.procSelenge', $bindings);
        
        return view('marshrut.report02')->with(['report'=>$report, 'startdate' =>$startdate,'enddate' => $enddate]);
    }
    public function report03()
    {
 
        $startdate=2; 
        $enddate= 3; 
        $query = "";
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=" and repouteddate is null";
         }
         else 
         {
            
            $startdate=2; 
            $enddate= 3; 
                $query.=" and repouteddate is null";
            }
            $bindings = [
                'varType'  =>  3,
                'varYear'  => 2022,
                'begMonth'  => 1,
                'endMonth'  => 3,
                'varDepo'  =>  1,
                'varDepo1'  => 5
                ];
         
            $report = DB::executeProcedureWithCursor('zutguur.procSelenge', $bindings);
        
        return view('marshrut.report03')->with(['report'=>$report, 'startdate' =>$startdate,'enddate' => $enddate]);
    }
}
