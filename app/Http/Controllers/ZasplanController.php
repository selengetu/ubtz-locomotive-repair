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

class ZasplanController extends Controller
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
        $depo=DB::select("select * from set_depo order by deponame");
        $addbase=DB::select("select * from zutguur.zasaddbase");
        $zasbaig=DB::select("select * from zutguur.zasbaig");
        $damage=DB::select("select * from V_SET_GEMTEL");
        $locserial=DB::select("select * from V_ZUTGUURSERI");
        $startdate=Input::get('zas_start'); 
        $enddate= Input::get('zas_end'); 
        $unit=DB::select("select * from set_unit");
        $machinist= Input::get('machinist'); 
        $z= Input::get('zurch_type'); 
        $sericode= Input::get('zas_sericode'); 
        $zastype= Input::get('zas_type'); 
        $query = "";
    
           if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=" and repouteddate is null";
         }
         else 
         {
            
                $startdate= Carbon::today()->subDays(7)->toDateString();
                $enddate=  Carbon::today()->toDateString();
                $query.=" and repouteddate is null";
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
        return view('devter.zasplan')->with(['unit'=>$unit,'part'=>$part, 'locserial' => $locserial, 'startdate' =>$startdate,
                                             'enddate' => $enddate, 'zasplan' => $zasplan,'rep' => $rep,'addbase' => $addbase,
                                             'zasbaig' => $zasbaig,'zastype' => $zastype,'damage' => $damage,'depo' => $depo]);
    }
    public function store()
    {
        if(Request::input('type') == 0){
            $zasplan = new Zasplan;
            $zasplan->depocode =Request::input('depocode');
            $zasplan->zasyear = Carbon::now()->year;
            $zasplan->zasmonth = Carbon::now()->month;
            $zasplan->sericode = Request::input('zas_seri');
            $zasplan->zutnumber = Request::input('zas_zutnumber');
            $zasplan->repid = Request::input('repid');
            $zasplan->repindate = Request::input('repindate');
            $zasplan->repoutdate = Request::input('repoutdate');
            $zasplan->repplandate = Request::input('repplandate');
            $zasplan->repouteddate = Request::input('repouteddate');
            $zasplan->stopsum = Request::input('stopsum');
            $zasplan->stopclean = Request::input('stoprep');
            $zasplan->runkm = Request::input('zasrun');
            $zasplan->do = Request::input('do');
            $zasplan->done = Request::input('done');
            if(Request::input('repid')== 999){
            $zasplan->zastype = 2;
            }
            else{
            $zasplan->zastype = 1;
            }
            $zasplan->save();
            $p=DB::getPdo()->lastInsertId();
            DB::table('activity_log')->insert(
                array(
                       'log_name'     =>   'Add zasplan', 
                       'description'     =>  $p, 
                       'causer_id'   =>   Auth::user()->id,
                       'created_at'     =>   Carbon::now(), 
                )
           );

        }
        else{

            $department = DB::table('ZASPLAN')
            ->where('repairid', Request::input('zasid'))
            ->update(['sericode' =>  Request::input('zas_seri1'),'zutnumber' =>  Request::input('zas_zutnumber'),'repid' =>  Request::input('repid'),'repindate' =>  Request::input('repindate'),
            'repoutdate' =>  Request::input('repoutdate'),'repplandate' =>  Request::input('repplandate'),'repouteddate' =>  Request::input('repouteddate'),'stopsum' =>  Request::input('stopsum'),'do' =>  Request::input('do'),'done' => Request::input('done')]);
        
        }
        return back();
       
    }
    public function storeadd()
    {
        $zasadd = new Zasadd;
        $zasadd->repairid = Request::input('repaid');
        $zasadd->addtype = Request::input('addtype');
        $zasadd->addid = Request::input('addid');
        $zasadd->addhour = Request::input('addhour');
        $zasadd->addval = Request::input('addval');    
        $zasadd->save();
       
    }
   
    public function storebaig()
    {
        $zasbaig = new Zasbaig;
        $zasbaig->repairid = Request::input('repaidbaig');
        $zasbaig->baigcode = Request::input('baigcode');
        $zasbaig->baigtime = Request::input('baigtime');
        $zasbaig->save();
       
    }
    public function storemat()
    {
        $zasmat = new Zasmat;
        $zasmat->repairid = Request::input('repaidmat');
        $zasmat->matcode = Request::input('matcode');
        $zasmat->matunit = Request::input('matunit');
        $zasmat->mattoo = Request::input('mattoo');
        $zasmat->matprice = Request::input('matprice');
        $zasmat->save();
        $p=DB::getPdo()->lastInsertId();
        DB::table('activity_log')->insert(
            array(
                   'log_name'     =>   'Add zasmat', 
                   'description'     =>  $p, 
                   'causer_id'   =>   Auth::user()->id,
                   'created_at'     =>   Carbon::now(), 
            )
       );
    }
    public function getzasplanbase($id)
    {
        if($id > 0){
            $dt=DB::table('ZUTGUUR.ZASPLANBASE')->where('sericode','=',$id)->get();
        }
        else{
            $dt=DB::table('ZUTGUUR.ZASPLANBASE')->get();
        }
      
        return $dt;
    }
    public function getzut($id)
    {
        if($id > 0){
            
                $dt=DB::table('ZUTGUUR.ZUTGUUR')->where('sericode','=',$id)->orderby('zutnumber')->get();
                return $dt;
        
        }
        else{
            $dt=DB::table('ZUTGUUR.ZUTGUUR')->get();
        }
      
        return $dt;
    }
}
