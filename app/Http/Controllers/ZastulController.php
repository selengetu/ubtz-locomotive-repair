<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\Zastul;
use App\Zastype;
use App\Rep;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ZastulController extends Controller
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
        $rep=Rep::all();

        $zastul=Zastul::all();
        $locserial=DB::select("select * from V_ZUTGUURSERI");
        $start_year= Carbon::now()->format('Y');
        $start_month= Carbon::now()->format('m');;
        $zastul=DB::select('select * from V_ZASTUL t where  zasyear = '.$start_year.'and zasmonth ='.$start_month.' order by depocode, sericode ');
        return view('devter.zastul')->with(['start_year' =>$start_year, 'start_month' => $start_month,'locserial' => $locserial, 'zastul' => $zastul,'rep' => $rep]);
    }

    public function search()
    {
        $rep=Rep::all();

        $locserial=DB::select("select * from V_ZUTGUURSERI");
        $start_year= Request::input('start_year');
        $start_month=  Request::input('start_month');
        $loc_seri=  Request::input('loc_seri');
        $loc_depo=  Auth::user()->depo_id;
        $query = "";

        if ($start_year!=NULL &&  $start_year!=0) {
            $query.=" and zasyear = '".$start_year."'";
        }
        else {
            $query .= " and zasyear = ";
        }
        if ($start_month!=NULL &&  $start_month!=0) {
            $query.=" and zasmonth = '".$start_month."'";
        }
        else {
            $query .= " ";
        }
        if ($loc_seri!=NULL &&  $loc_seri!=0) {
            $query.=" and sericode = '".$loc_seri."'";
        }
        else {
            $query .= " ";
        }
        if ($loc_depo!=NULL &&  $loc_depo!=0) {
            $query.=" and depocode = '".$loc_depo."'";
        }
        else {
            $query .= " ";
        }
        $zastul=DB::select("select * from V_ZASTUL t where t.depocode = ".Auth::user()->depo_id. " ".$query."");
        return view('devter.zastul')->with(['locserial' => $locserial, 'start_year' =>$start_year, 'start_month' => $start_month, 'zastul' => $zastul,'rep' => $rep]);
    }

    public function store()
    {
        $locserial=DB::select("select * from V_ZUTGUURSERI");
        $rep=Zastype::where('repid' ,Request::input('repid') )->where('sericode' ,Request::input('sericode') )->value('repshname');
        $zastul = new Zastul;
        $zastul->zasyear = Request::input('zasyear');
        $zastul->zasmonth = Request::input('zasmonth');
        $zastul->depocode = Auth::user()->depo_id;
        $zastul->sericode = Request::input('sericode');
        $zastul->seriname = $locserial;
        $zastul->repid = Request::input('repid');
        $zastul->repshname =  $rep;
        $zastul->plantoo = Request::input('plantoo');
        $zastul->save();
        return back();
    }
    public function updatezastul()
    {
        $department = DB::table('ZUTGUUR.ZASTUL')
            ->where('zasyear', Request::input('zasyear'),'zasmonth', Request::input('zasmonth'),'sericode', Request::input('sericode'),'depocode', Request::input('depocode'))
            ->update(['plantoo' =>Request::input('plantoo')]);
        return back();

    }
}
