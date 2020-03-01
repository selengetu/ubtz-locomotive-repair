<?php

namespace App\Http\Controllers;

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
        $niit=DB::select('select t.zastype_name, count(repairid) as niit from V_ZASPLAN t
        group by t.zastype_name');
            
        $seri=DB::select('select t.seriname, sum(stopsum) as stopclean, count(repairid)  as niit from V_ZASPLAN t
        group by t.seriname');

        $tsahilgaan=DB::select('select t.gemtel_name, sum(stopsum) as stopclean, count(repairid)  as niit from V_ZASPLAN t
        where t.gemtel_type=29 
        group by t.gemtel_name');

        $group=DB::select('select t.locgroupname, sum(stopsum) as stopclean, count(repairid)  as niit from V_ZASPLAN t
        where t.locgroup is not null
        group by t.locgroupname');

        return view('devter.home')->with(['niit'=>$niit,'seri'=>$seri,'tsahilgaan'=>$tsahilgaan,'group'=>$group]);
    }
}
