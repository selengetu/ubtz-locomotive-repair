<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\AttentionSpeed;
use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
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
        $zaswar = DB::select('select t.zastype, count(repairid) as niit, sum(stopsum) as tsag from ZASPLAN t 
        where t.zasyear= '.Carbon::now()->year.'
        group by t.zastype');
        $tsag = DB::select('select sum(stopsum) as tsag from ZASPLAN t 
        where t.zasyear= '.Carbon::now()->year.'');
        $tul = DB::select('select sum(plantoo) as plantoo from ZUTGUUR.ZASTUL t where t.zasyear= '.Carbon::now()->year.'');
        $plan = DB::select('select sum(stopsum) as tsag from ZASPLAN t 
        where t.zasyear= '.Carbon::now()->year.' and t.zastype=1');
        $niit=DB::select('select t.zastype_name, sum(stopsum) as niit from V_ZASPLAN t
        group by t.zastype_name');
            
        $seri=DB::select('select t.seriname, sum(stopsum) as stopclean, count(repairid)  as niit from V_ZASPLAN t
        group by t.seriname');

        $tsahilgaan=DB::select('select t.gemtel_name, sum(stopsum) as stopclean, count(repairid)  as niit from V_ZASPLAN t
        where t.gemtel_type=29 
        group by t.gemtel_name');

        $group=DB::select('select t.locgroupname, sum(stopsum) as stopclean, count(repairid)  as niit from V_ZASPLAN t
        where t.locgroup is not null
        group by t.locgroupname');

        return view('devter.home')->with(['tul'=>$tul,'plan'=>$plan,'niit'=>$niit,'seri'=>$seri,'tsahilgaan'=>$tsahilgaan,'group'=>$group,'zaswar'=>$zaswar,'tsag'=>$tsag]);
    }

    public function main()
    {
        $zaswar = DB::select('select t.zastype, count(repairid) as niit, sum(stopsum) as tsag from ZASPLAN t 
        where t.zasyear= '.Carbon::now()->year.'
        group by t.zastype');
        $tsag = DB::select('select sum(stopsum) as tsag from ZASPLAN t 
        where t.zasyear= '.Carbon::now()->year.'');
        $tul = DB::select('select sum(plantoo) as plantoo from ZUTGUUR.ZASTUL t where t.zasyear= '.Carbon::now()->year.'');
        $plan = DB::select('select sum(stopsum) as tsag from ZASPLAN t 
        where t.zasyear= '.Carbon::now()->year.' and t.zastype=1');
        $niit=DB::select('select t.zastype_name, sum(stopsum) as niit from V_ZASPLAN t
        group by t.zastype_name');
            
        $seri=DB::select('select t.seriname, sum(stopsum) as stopclean, count(repairid)  as niit from V_ZASPLAN t
        group by t.seriname');

        $tsahilgaan=DB::select('select t.gemtel_name, sum(stopsum) as stopclean, count(repairid)  as niit from V_ZASPLAN t
        where t.gemtel_type=29 
        group by t.gemtel_name');

        $group=DB::select('select t.locgroupname, sum(stopsum) as stopclean, count(repairid)  as niit from V_ZASPLAN t
        where t.locgroup is not null
        group by t.locgroupname');

        return view('devter.mainhome')->with(['tul'=>$tul,'plan'=>$plan,'niit'=>$niit,'seri'=>$seri,'tsahilgaan'=>$tsahilgaan,'group'=>$group,'zaswar'=>$zaswar,'tsag'=>$tsag]);
    }
}
