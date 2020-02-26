<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\LocSerial;
use App\Rep;
use App\Part;
use App\Gemtel;
use App\Zaspart;
use App\ZasZut;
use App\Solilt;
use App\Zasunplan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ZasunplanController extends Controller
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
        $part=Part::orderby('part_name')->get();
        $rep=Rep::all();
        $addbase=DB::select("select * from zutguur.zasaddbase");
        $zasbaig=DB::select("select * from zutguur.zasbaig");
        $locserial=LocSerial::orderBy('sericode', 'ASC')->get();
        $startdate=Input::get('zas_start'); 
        $enddate= Input::get('zas_end'); 
       
        $machinist= Input::get('machinist'); 
        $z= Input::get('zurch_type'); 
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
         $zasunplan=DB::select('select * from ZUTGUUR.ZASUNPLAN where 1=1 '.$query.'');
        return view('devter.zasunplan')->with(['part'=>$part, 'locserial' => $locserial, 'startdate' =>$startdate,
                                             'enddate' => $enddate, 'zasunplan' => $zasunplan,'rep' => $rep,'addbase' => $addbase,'zasbaig' => $zasbaig]);
    }
    public function store()
    {
        $locserial=LocSerial::where('sericode' ,Request::input('zas_seri') )->value('seriname');
        $rep=Zastype::where('repid' ,Request::input('repid') )->where('sericode' ,Request::input('zas_seri') )->value('repshname');
        $zasplan = new Zasplan;
        $zasplan->depocode = Auth::user()->id;
        $zasplan->zasyear = Carbon::now()->year;
        $zasplan->zasmonth = Carbon::now()->month;
        $zasplan->sericode = Request::input('zas_seri');
        $zasplan->seriname =  $locserial;
        $zasplan->zutnumber = Request::input('zas_zutnumber');
        $zasplan->repid = Request::input('repid');
        $zasplan->repshname= $rep;
        $zasplan->repindate = Request::input('repindate');
        $zasplan->repoutdate = Request::input('repoutdate');
        $zasplan->stopsum = Request::input('stopsum');
        $zasplan->stopto4 = Request::input('stopto4');  
        $zasplan->stopadd = Request::input('stopadd');
        $zasplan->stopclean = Request::input('stoprep');
        $zasplan->runkm = Request::input('zasrun');
        $zasplan->recievman = Request::input('reciever');
        $zasplan->save();

         return Redirect('zasunplan');
    }
}
