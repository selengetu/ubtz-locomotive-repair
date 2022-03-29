<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\FaultDetail;
use Carbon\Carbon;
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
   
    public function urtuu30()
    {
        $query = "";
        $startdate= Input::get('urtuu30_start');
        $enddate= Input::get('urtuu30_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {

            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
        $z=DB::select("select
                        g.depocode,
                        s.statfullname as fromstationname,
                            count(f.fromstation) as count,
                         sum(SUBSTR(d.stoptime, 1, 2)*60 + SUBSTR(d.stoptime, 4, 2)) as sum
                        from  ribbon t
                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                        inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                        inner join ZUTLENT.fault f on f.ribbon_id = t.ribbon_id
                        left join  ZUTLENT.fault_det d on d.fault_id=f.fault_id
                        inner join  ZUTLENT.V_STATION s on f.fromstation=s.statcode
                        inner join  ZUTLENT.V_STATION z on z.statcode=f.tostation
                        LEFT JOIN  ZUTLENT.V_Broketype b on b.broketype_id= d.broketype
                        where t.depo_id=g.depocode and e.depocode= t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and (SUBSTR(d.stoptime, 1, 2)*60 + SUBSTR(d.stoptime, 4, 2))>29 and  (SUBSTR(d.stoptime, 1, 2)*60 + SUBSTR(d.stoptime, 4, 2))<120 and  t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by s.statfullname, g.depocode");
        $zurchil=DB::select('select  * from ZURCHIL_30  t where t.depocode =  '.Auth::user()->depo_id. ' '.$query.'');

        return view('tailan.urtuu30')->with(['zurchil'=>$zurchil,'z'=>$z,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
    public function urtuu120()
    {
        $query = "";
        $startdate= Input::get('urtuu120_start');
        $enddate= Input::get('urtuu120_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {

            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }
        $z=DB::select("select
                        g.depocode,
                        s.statfullname as fromstationname,
                            count(f.fromstation) as count,
                         sum(SUBSTR(d.stoptime, 1, 2)*60 + SUBSTR(d.stoptime, 4, 2)) as sum
                        from  ribbon t
                        inner join ZUTGUUR.MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                        inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                        inner join  ZUTLENT.fault f on f.ribbon_id = t.ribbon_id
                        left join  ZUTLENT.fault_det d on d.fault_id=f.fault_id
                        inner join  ZUTLENT.V_STATION s on f.fromstation=s.statcode
                        inner join  ZUTLENT.V_STATION z on z.statcode=f.tostation
                        LEFT JOIN  ZUTLENT.V_Broketype b on b.broketype_id= d.broketype
                        where t.depo_id=g.depocode and e.depocode= t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=12 and (SUBSTR(d.stoptime, 1, 2)*60 + SUBSTR(d.stoptime, 4, 2))>119 and t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by s.statfullname, g.depocode");
        $zurchil=DB::select('select  * from ZURCHIL_120  t where t.depocode =  '.Auth::user()->depo_id. ' '.$query.'');

        return view('tailan.urtuu120')->with(['zurchil'=>$zurchil,'z'=>$z,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
    public function anhaaramj()
    {
        $query = "";
        $startdate= Input::get('anhaaramj_start');
        $enddate= Input::get('anhaaramj_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                 $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }

         $zurchil=DB::select('select  st1.statfullname as fromstat, st2.statfullname as tostat, t.*, b.*, r.* from  ZUTLENT.V_FAULT_DET t, ZUTGUUR.MARSHBRIG b ,  ZUTLENT.Ribbon r, zutguur.stations st1,zutguur.stations st2 where b.marshid=r.route_id and t.RIBBON_ID=r.ribbon_id and t.FAULT_NO=9 and st1.statcode= r.fromstation and st2.statcode= r.tostation and b.depocode = '.Auth::user()->depo_id. '  '.$query.' ');
           
        return view('tailan.anhaaramj')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
       public function attention()
    {
        $query = "";
        $startdate= Input::get('attention_start');
        $enddate= Input::get('attention_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                 $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }

         $zurchil=DB::select('select  * from V_ATTENTION_TAILAN t where t.depo_id = '.Auth::user()->depo_id. '  '.$query.' order by t.ARRTIME');
         $z=DB::select("select  sum(a.time) as time,
                        r.DEPO_ID, p.speed as speedname, count(p.speed) as count
                        from  ZUTLENT.Attention a,  ZUTLENT.ribbon t,  ZUTLENT.attention_speed p,  ZUTLENT.ribbon r, zutguur.marshbrig b
                        where a.ribbon_id=t.ribbon_id and p.attentionspeed_id=a.speed and r.ribbon_id= a.ribbon_id and b.marshid= t.route_id and t.depo_id= b.depocode and t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by p.speed, r.depo_id
                        order by p.speed");
        $z1=DB::select(" select  sum(a.time) as time,
                      t.DEPO_ID, s.statfullname as fromstat, s1.statfullname as tostat, count(a.attention_id) as count
                        from  ZUTLENT.Attention a, ribbon t,  ZUTLENT.V_STATION s,  ZUTLENT.attention_speed p,  ZUTLENT.V_STATION s1, zutguur.marshbrig b
                        where a.ribbon_id=t.ribbon_id and t.fromstation = s.statcode and p.attentionspeed_id=a.speed and t.tostation=s1.statcode and t.ribbon_id= a.ribbon_id and b.marshid= t.route_id and t.depo_id= b.depocode and t.depo_id = ".Auth::user()->depo_id. " " .$query."
                  group by s.statfullname, s1.statfullname, t.depo_id
                        order by s.statfullname");
        return view('tailan.attention')->with(['zurchil'=>$zurchil,'z'=>$z,'z1'=>$z1,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function hurdhemjigch()
    {
        $query = "";
        $startdate= Input::get('hurd_start');
        $enddate= Input::get('hurd_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
          $zurchil=DB::select('select  * from ZURCHIL_HURDHEMJIGCH t where t.depocode = '.Auth::user()->depo_id. '  '.$query.' ');
        
        return view('tailan.hurdhemjigch')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    } public function hurdhureegui()
    {
         $query = "";
        $startdate= Input::get('hurdhureegui_start');
        $enddate= Input::get('hurdhureegui_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
               $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
         
         $zurchil=DB::select('select  * from ZURCHIL_HURDHUREEGUI t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');
           
        return view('tailan.hurdhureegui')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function dooshorson()
    {
        $query = "";
        $startdate= Input::get('doosh_start');
        $enddate= Input::get('doosh_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                 $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
      $z=DB::select("select
                        g.depocode,
                        g.mashname,
                        count(g.mashcode) as count,
                        substr(numtodsinterval(sum(SUBSTR(d.stoptime, 1, 2)*3600 + SUBSTR(d.stoptime, 4, 2)*60 + SUBSTR(d.stoptime, 7, 2)), 'SECOND'),12,  5) as sum
                        from  ribbon t
                      inner join  ZUTLENT.V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                        inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                        inner join  ZUTLENT.fault f on f.ribbon_id = t.ribbon_id
                        left join  ZUTLENT.fault_det d on d.fault_id=f.fault_id
                        LEFT JOIN  ZUTLENT.V_Broketype b on b.broketype_id= d.broketype
                        where t.depo_id=g.depocode and e.depocode= t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=81 and  t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by g.mashname, g.depocode");
        $zurchil=DB::select('select  * from ZURCHIL_DOOSHORSON t where t.depocode = '.Auth::user()->depo_id. ' '.$query.' ');
       
        return view('tailan.dooshorson')->with(['zurchil'=>$zurchil,'z'=>$z,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function technoiluu()
    {
        $query = "";
        $startdate= Input::get('techno_start');
        $enddate= Input::get('techno_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
        $z=DB::select("select
                        g.depocode,
                        s.statfullname as fromstationname,
                        count(f.fromstation) as count,
                        sum(d.constkilo) as sum
                        from  ribbon t
                      inner join V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                        inner join ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                        inner join  ZUTLENT.fault f on f.ribbon_id = t.ribbon_id
                        left join  ZUTLENT.fault_det d on d.fault_id=f.fault_id
                        inner join  ZUTLENT.V_Station s on f.fromstation=s.statcode
                        inner join  ZUTLENT.V_Station z on z.statcode=f.tostation
                        LEFT JOIN  ZUTLENT.V_Broketype b on b.broketype_id= d.broketype
                        where t.depo_id=g.depocode and e.depocode= t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and f.fault_no=83 and  t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by s.statfullname, g.depocode");

         $zurchil=DB::select('select  * from ZURCHIL_TECHNO t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');
            
        return view('tailan.technoiluu')->with(['zurchil'=>$zurchil,'z'=>$z,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function orohdohio()
{
    $query = "";
    $startdate= Input::get('oroh_start');
    $enddate= Input::get('oroh_end');
    if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
        $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
    }
    else
    {
        $query.=" and arrtime between sysdate-10 and sysdate";
        $startdate= Carbon::today()->subDays(10)->toDateString();
        $enddate=  Carbon::today()->toDateString();

    }
    $zurchil=DB::select('select  * from ZURCHIL_OROHDOHIO t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');

    return view('tailan.orohdohio')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
}
    public function busad()
    {
        $query = "";
        $se= Input::get('busad_query');
        $startdate= Input::get('busad_start');
        $enddate= Input::get('busad_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }
        if ($se != NULL or $se != 0) {
            $query.=  " and reason like '%".$se."%' or train_no like '%".$se."%' or mashname like '%".$se."%'";
        }
        else {
            $query.="";
        }

        $zurchil=DB::select('select  * from  ZUTLENT.ZURCHIL_busad t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');
  
        return view('tailan.busad')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
    public function nagon()
    {
        $query = "";
        $startdate= Input::get('nagon_start');
        $enddate= Input::get('nagon_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }
        $achaa=DB::select('select  * from  ZUTLENT.V_NAGON t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');

        $train=DB::select('select distinct t.ROUTE_ID, t.TRAIN_NO from  ZUTLENT.V_Ribbon t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');
        return view('tailan.niilberanhaaramj')->with(['achaa'=>$achaa,'train'=>$train,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function hiiergesen()
    {
        $query = "";
        $startdate= Input::get('hii_start');
        $enddate= Input::get('hii_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and arrtime between '".$startdate."' and '".$enddate." 23:59:59'";
        }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
            
        $zurchil=DB::select('select  * from  ZUTLENT.ZURCHIL_HII t where t.depocode = '.Auth::user()->depo_id. ' '.$query.' ');
        return view('tailan.hiiergesen')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
    public function graph()
    {
        $query = "";
        $startdate= Input::get('graph_start');
        $enddate= Input::get('graph_end');
        $type= Input::get('graph_type');
        if ($type!=NULL && $type !=0) {
            $query.=" and t.fault_no = '".$type."'";
        }
        else
        {
            $query.=" ";
        }
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and arrtime between '".$startdate."' and '".$enddate." 23:59:59'";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }

        $zurchil=DB::select('select  * from  ZUTLENT.ZURCHIL_GRAPH t where t.depocode = '.Auth::user()->depo_id. ' '.$query.' ');
        return view('tailan.graph')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate,'type'=>$type]);
    }
      public function yaraltaitormoz()
    {
        $query = "";
        $startdate= Input::get('yaraltai_start');
        $enddate= Input::get('yaraltai_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
    }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
          $z=DB::select("select
                        g.depocode,
                        b.broketype_name, b.broketype_id,
                        d.is_stop,
                        count(b.broketype_id) as count,
                        substr(numtodsinterval(sum(SUBSTR(d.stoptime, 1, 2)*3600 + SUBSTR(d.stoptime, 4, 2)*60 + SUBSTR(d.stoptime, 7, 2)), 'SECOND'),12,  5) as sum
                        from   ZUTLENT.ribbon t
                      inner join  ZUTLENT.V_MARSHBRIG g on g.marshid=t.route_id and g.depocode=t.depo_id
                        inner join  ZUTLENT.ZUTGUUR.MARSHZUT e on e.marshid=t.route_id
                        inner join  ZUTLENT.fault f on f.ribbon_id = t.ribbon_id
                        left join  ZUTLENT.fault_det d on d.fault_id=f.fault_id
                        LEFT JOIN  ZUTLENT.V_Broketype b on b.broketype_id= d.broketype
                        where t.depo_id=g.depocode and e.depocode=t.depo_id and e.marshyear=g.marshyear and e.marshmonth=g.marshmonth and b.broketype_id is not null and f.fault_no=35 and  t.depo_id =  ".Auth::user()->depo_id. " " .$query."
                        group by d.is_stop, b.broketype_name, b.broketype_id, g.depocode
                        order by b.broketype_id");
          $zurchil=DB::select('select  * from ZURCHIL_YARALTAITORMOZ t where t.depocode = '.Auth::user()->depo_id. ' '.$query.' ');
             
        return view('tailan.yaraltaitormoz')->with(['zurchil'=>$zurchil,'z'=>$z,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
      public function uharsan()
    {
        $query = "";
        $startdate= Input::get('uharsan_start');
        $enddate= Input::get('uharsan_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }
            
        $zurchil=DB::select('select  * from  ZUTLENT.ZURCHIL_UHARSAN t where t.depocode = '.Auth::user()->depo_id. ' '.$query.' ');
        return view('tailan.uharsan')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
  
      public function niilberanhaaramj()
    {
        return view('tailan.niilberanhaaramj');
    }
       public function hoorondzamzogsolt()
    {
        $query = "";
        $startdate= Input::get('hoorond_start');
        $enddate= Input::get('hoorond_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
  
        }

        $zurchil=DB::select('select  * from  ZUTLENT.ZURCHIL_HOORONDZAM t where t.depocode = '.Auth::user()->depo_id. ' '.$query.' ');
            
        return view('tailan.hoorondzamzogsolt')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
       public function hajuugiinzam()
    {
        $query = "";
        $startdate= Input::get('hajuu_start');
        $enddate= Input::get('hajuu_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and arrtime between '".$startdate."' and '".$enddate." 23:59:59'";
        }
        else 
        {
                 $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
        }
        $zurchil=DB::select('select  * from  ZUTLENT.ZURCHIL_HAJUUGIINZAM t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');
        $z=DB::select('select  fromst, fromstat, tost, tostat ,count(route_id) as niit from  ZUTLENT.ZURCHIL_HAJUUGIINZAM t
        where t.depocode = '.Auth::user()->depo_id. ' '.$query.'
        group by fromst, fromstat, tost, tostat
        order by fromstat, tostat');
           
        return view('tailan.hajuugiinzam')->with(['z'=>$z,'zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
     public function buguiwch()
    {
        $query = "";
        $startdate= Input::get('buguiwch_start');
        $enddate= Input::get('buguiwch_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else 
        {
                 $query.=" and arrtime between sysdate-10 and sysdate";
                    $startdate= Carbon::today()->subDays(10)->toDateString();
                    $enddate=  Carbon::today()->toDateString();
        }
        $zurchil=DB::select('select  * from  ZUTLENT.ZURCHIL_BUGUIWCH t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');
            
        return view('tailan.buguiwch')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
    public function tuslamj()
    {
        $query = "";
        $startdate= Input::get('tuslamj_from');
        $enddate= Input::get('tuslamj_to');
        $type= Input::get('tuslamj_type');
        if ($type == 1) {
        $query.=" and fault_no = 3";
    }
        if ($type == 2) {
            $query.=" and fault_no = 5";
        }
        if ($type == 3) {
            $query.=" and fault_no = 4";
        }
        if ($type == 4) {
            $query.=" and fault_no = 6";
        }
        else
        {
            $query.=" ";
        }
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=  "and to_char(arrtime,'YYYY-MM-DD') between '".$startdate."' and '".$enddate."'";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();
        }
        $zurchil=DB::select('select  * from  ZUTLENT.ZURCHIL_TUSLAMJ t where t.depocode = '.Auth::user()->depo_id. ' '.$query.'');

        return view('tailan.tuslamj')->with(['zurchil'=>$zurchil,'type'=>$type,'startdate'=>$startdate,'enddate'=>$enddate]);
    }
    public function norm()
    {
        $query1 = "";
        $query = "";
        $date = "";
        $us= Input::get('user_id');
        $startdate= Input::get('norm_start');
        $enddate= Input::get('norm_end');
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
          $date.=  "and t.translate_date between '".$startdate." 00:00:00' and '".$enddate." 23:59:59'";
        }
        else
        {
          $date.=" and t.translate_date between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }
        if (Auth::user()->depo_id == 1) {
            $query.=  " and t.depo_id =1 ";
        }
        if (Auth::user()->depo_id == 13) {
            $query.=  " and t.depo_id =13 ";
        }
        if (Auth::user()->depo_id == 2) {
            $query.=  " and t.depo_id =2 ";
        }
        if (Auth::user()->depo_id == 3) {
            $query.=  " and t.depo_id in (13,3) ";
        }
        if (Auth::user()->depo_id == 5) {
            $query.=  " and t.depo_id in (1,5) ";
        }
        if ($us!=NULL && $us !=0) {
            $query1.=" and t.translator_id = ".$us."";
        }
        $zurchil=DB::select("
                select * from
                (select q.translator_id, q.depo_id, q.name, q.depdatetime, substr(wcode,1,1) as wk, 
                                      case when substr(wcode,1,1) in ('5') then (sum(worktime))*5 else sum(q.runkm) end as runkm from
                (select t.translator_id, t.depo_id, u.name,
                                        case when workcode in ('377') then 500 else workcode end as wcode, runkm, worktime,
                                            to_char(t.translate_date, 'YYYY/MM/DD') as depdatetime from
                                        (select distinct r.route_id, r.translator_id, r.depo_id,r.translate_date from Ribbon r
                                        ) t, 
                                        ZUTGUUR.Calcaddition c,  ZUTLENT.USERS u
                                        where t.route_id=c.marshid and u.id=t.translator_id and u.grand_type !=1  ".$query." ".$query1."   ".$date." ) q
                                        group by q.translator_id, q.depo_id, q.name,substr(wcode,1,1),depdatetime
                                      
                                        order by depdatetime)
                                         PIVOT
                                (
                                  sum(runkm)
                                  FOR wk IN (1 as ach ,2 as a,4 as b ,3 as c,5 as sel ,6 as d,9 as e)
                                )
                                order by depdatetime desc
              ");
        $user=DB::select("select * from Users t where 1=1 ".$query." and t.grand_type !=1 order by name");

        return view('tailan.normative')->with(['zurchil'=>$zurchil,'startdate'=>$startdate,'enddate'=>$enddate,'user'=>$user]);
    }
    public function machinistnagon()
    {
        $query = "";
        $startdate= Input::get('mach_start');
        $enddate= Input::get('mach_end');
  ;       if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=" and arrtime between TO_DATE( '".$startdate." 00:00:00' , 'yyyy/mm/dd HH24:MI:SS') and TO_DATE( '".$enddate." 23:59:59', 'yyyy/mm/dd HH24:MI:SS')";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }

        $machinist = DB::select("select t.DEPOCODE,t.MASHCODE, t.MASHNAME, sum(SUBSTR(t.patchmin, 1, 2)*60 + SUBSTR(t.patchmin, 4, 2)) as NUHULT
                              from  ZUTLENT.v_nagon t 
                              where t.patchmin !='00:00:00' and t.mashname is not null and t.depocode=".Auth::user()->depo_id."  ".$query."
                               group by t.DEPOCODE,t.MASHCODE, t.MASHNAME
                               order by nuhult desc");
        $tuslah = DB::select("  select t.DEPOCODE,t.TUSLCODE, t.TUSLNAME, sum(SUBSTR(t.patchmin, 1, 2)*60 + SUBSTR(t.patchmin, 4, 2)) as NUHULT
                              from  ZUTLENT.v_nagon t 
                              where t.patchmin !='00:00:00' and t.mashname is not null and  t.depocode=".Auth::user()->depo_id."  ".$query."
                               group by t.DEPOCODE,t.TUSLCODE, t.TUSLNAME
                               order by t.TUSLCODE");

        return view('tailan.machinistnagon')->with(['startdate' => $startdate, 'enddate' => $enddate, 'machinist' => $machinist, 'tuslah' => $tuslah]);
    }
}
