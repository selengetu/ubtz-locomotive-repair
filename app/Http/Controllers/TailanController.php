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
use App\LocSerial;
use App\Zasadd;
use App\Zasbaig;
use App\Zasmat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
class TailanController extends Controller
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
    public function index()
    {

       
        if(Route::getFacadeRoot()->current()->uri()== 'reportplan'){
            $zastype=1;
        }

        if(Route::getFacadeRoot()->current()->uri()== 'reportunplan'){
            $zastype=2;
        }
        $part=Part::orderby('part_name')->get();
        $rep=Rep::all();
        $depo=DB::select("select * from set_depo order by depocode");
        $addbase=DB::select("select * from zutguur.zasaddbase");
        $zasbaig=DB::select("select * from zutguur.zasbaig");
        $damage=DB::select("select * from V_SET_GEMTEL");
        $locserial=LocSerial::orderBy('sericode', 'ASC')->get();
        $startdate=Input::get('zas_start'); 
        $enddate= Input::get('zas_end'); 
        $unit=DB::select("select * from set_unit");
        $machinist= Input::get('machinist'); 
        $z= Input::get('zurch_type'); 
        $sericode= Input::get('zas_sericode'); 
        $query = "";
    
           if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
             $query.=" and repindate between TO_DATE( '".$startdate."' , 'yyyy/mm/dd') and TO_DATE( '".$enddate."', 'yyyy/mm/dd')";
         }
         else 
         {
            
                $startdate= Carbon::today()->subDays(2)->toDateString();
                $enddate=  Carbon::today()->toDateString();
                $query.=" and repindate between TO_DATE( '".$startdate."' , 'yyyy/mm/dd') and TO_DATE( '".$enddate."', 'yyyy/mm/dd')";
  
         }
         if ($sericode !=0 && $sericode!=NULL) {
            $query.=" and sericode= '".$sericode."'";
        }
        else 
        {
            $query.=" ";
        }
        if ($zastype!=NULL && $zastype !=0) {
            $query.=" and zastype = '".$zastype."'";
        }
        else
        {
            $query.=" ";
        }
         $zasplan=DB::select('select * from V_ZASPLAN where 1=1 '.$query.'');
        return view('tailan.zasplan')->with(['unit'=>$unit,'part'=>$part, 'locserial' => $locserial, 'startdate' =>$startdate,
                                             'enddate' => $enddate, 'zasplan' => $zasplan,'rep' => $rep,'addbase' => $addbase,
                                             'zasbaig' => $zasbaig,'zastype' => $zastype,'damage' => $damage,'depo' => $depo]);
    }
   
}
