<?php

namespace App\Http\Controllers;
use App\Haluun;
use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class HaluunZogsoltController extends Controller
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

    public function tailan()
    {
        $query = "";
        $query1 = "";
        $startdate= Input::get('haluun_start');
        $enddate= Input::get('haluun_end');
        $type= Input::get('haluun_type');
        if ($type!=NULL && $type !=0) {
            $query1.=" and t.hotstand_type = '".$type."'";
        }
        else
        {
            $query1.=" and t.hotstand_type = '1'  ";
        }
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=" and arrtime between TO_DATE( '".$startdate." 00:00:00' , 'yyyy/mm/dd HH24:MI:SS') and TO_DATE( '".$enddate." 23:59:59', 'yyyy/mm/dd HH24:MI:SS')";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }

        $haluun = DB::select("select q3.* ,   CONCAT(LPAD(TRUNC(q3.haluun/60), 2,0)|| ':' || LPAD((q3.haluun - TRUNC(q3.haluun/60)*60), 2,0), ':00') as HALUUNTSAG, CONCAT(LPAD(TRUNC(q3.niitajil/60), 2,0)|| ':' || LPAD((q3.niitajil - TRUNC(q3.niitajil/60)*60), 2,0), ':00') as NIITTSAG ,(q3.niitajil - q3.haluun) as YALGAWAR from
(SELECT sum(q2.haluuntsag) as HALUUN , count(q2.RIBBON_ID) as niit,q2.DEPO_ID,q2.LOCSERIAL,q2.locno,q2.STATION_ID,q2.STATFULLNAME, q2.ZUTNUMBER, sum(q2.diff) as niitajil FROM (
select
distinct
   (SUBSTR(t.endtime, 1, 2)*60 + SUBSTR(t.endtime, 4, 2) + SUBSTR(t.endtime, 7, 2)) as HALUUNTSAG ,               
       r.depo_id,
       r.zutnumber,
       r.locserial,
       r.locno,
      t.STATION_ID,
      t.diff,
      r.ribbon_id,
      s.statfullname
from ZUTLENT.ribbon r, ZUTLENT.v_hotstand t, ZUTLENT.v_station s
where t.ribbon_id=r.ribbon_id and s.statcode=t.STATION_ID  ".$query1." and  t.depo_id = ".Auth::user()->depo_id."  ".$query."
) q2
group by q2.DEPO_ID,q2.LOCSERIAL,q2.locno,q2.STATION_ID,q2.STATFULLNAME, q2.ZUTNUMBER order by q2.STATION_ID)q3");

        $del = DB::select("select q1.* ,   CONCAT(LPAD(TRUNC(q1.haluuntsag/60), 2,0)|| ':' || LPAD((q1.haluuntsag - TRUNC(q1.haluuntsag/60)*60), 2,0), ':00') as HALUUNTSAG ,   CONCAT(LPAD(TRUNC(q1.diff/60), 2,0)|| ':' || LPAD((q1.diff - TRUNC(q1.diff/60)*60), 2,0), ':00') as Ajillasantsag from
(select
      (SUBSTR(t.endtime, 1, 2)*60 + SUBSTR(t.endtime, 4, 2) + SUBSTR(t.endtime, 7, 2)) as HALUUNTSAG ,              
       r.depo_id,
       r.zutnumber,
       r.locserial,
       r.fromstation,
      r.ribbon_id,
      r.route_id,
      t.arrtime,
     t.deptime,
      t.diff,
      t.endtime,
      r.train_gol,
      r.train_dirtyweight,
    r.train_no,
     t.STATION_ID,
     s.statfullname
from ZUTLENT.ribbon r, ZUTLENT.v_hotstand t, ZUTLENT.v_station s
where t.ribbon_id=r.ribbon_id and s.statcode= t.STATION_ID  ".$query1." and t.depo_id = ".Auth::user()->depo_id."  ".$query."
group by r.depo_id,
       r.zutnumber,
       r.locserial,
       r.fromstation,
      r.ribbon_id,
      r.route_id,
      t.arrtime,
     t.deptime,
       t.diff,
       t.endtime,
      r.train_gol,
      r.train_dirtyweight,
    r.train_no,
     t.STATION_ID,
    s.statfullname
    order by statfullname,r.locserial,r.zutnumber,t.arrtime ) q1");

        return view('tuuz.haluunzogsolttailan')->with(['startdate' => $startdate, 'enddate' => $enddate, 'haluun' => $haluun, 'del' => $del]);
    }

    public function seri()
    {
        $query = "";
        $query1 = "";
        $startdate= Input::get('haluun_start');
        $enddate= Input::get('haluun_end');
        $type= Input::get('haluun_type');
        if ($type!=NULL && $type !=0) {
            $query1.=" and t.hotstand_type = '".$type."'";
        }
        else
        {
            $query1.=" and t.hotstand_type = '1'  ";
        }
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.=" and arrtime between TO_DATE( '".$startdate." 00:00:00' , 'yyyy/mm/dd HH24:MI:SS') and TO_DATE( '".$enddate." 23:59:59', 'yyyy/mm/dd HH24:MI:SS')";
        }
        else
        {
            $query.=" and arrtime between sysdate-10 and sysdate";
            $startdate= Carbon::today()->subDays(10)->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }


        $haluun = DB::select("select q3.* ,   CONCAT(LPAD(TRUNC(q3.haluun/60), 2,0)|| ':' || LPAD((q3.haluun - TRUNC(q3.haluun/60)*60), 2,0), ':00') as HALUUNTSAG, CONCAT(LPAD(TRUNC(q3.niitajil/60), 2,0)|| ':' || LPAD((q3.niitajil - TRUNC(q3.niitajil/60)*60), 2,0), ':00') as NIITTSAG ,(q3.niitajil - q3.haluun) as YALGAWAR from
(SELECT sum(q2.haluuntsag) as HALUUN , count(q2.RIBBON_ID) as niit,q2.DEPO_ID,q2.LOCSERIAL,q2.locno,q2.STATION_ID,q2.STATFULLNAME, q2.ZUTNUMBER, sum(q2.diff) as niitajil FROM (
select
distinct
   (SUBSTR(t.endtime, 1, 2)*60 + SUBSTR(t.endtime, 4, 2) + SUBSTR(t.endtime, 7, 2)) as HALUUNTSAG ,               
       r.depo_id,
       r.zutnumber,
       r.locserial,
       r.locno,
      t.STATION_ID,
      t.diff,
      r.ribbon_id,
      s.statfullname
from ZUTLENT.ribbon r, ZUTLENT.v_hotstand t, ZUTLENT.v_station s
where t.ribbon_id=r.ribbon_id and s.statcode=t.STATION_ID  ".$query1." and  t.depo_id = ".Auth::user()->depo_id."  ".$query."
) q2
group by q2.DEPO_ID,q2.LOCSERIAL,q2.locno,q2.STATION_ID,q2.STATFULLNAME, q2.ZUTNUMBER order by q2.STATION_ID)q3");

        $del = DB::select("select q1.* ,   CONCAT(LPAD(TRUNC(q1.haluuntsag/60), 2,0)|| ':' || LPAD((q1.haluuntsag - TRUNC(q1.haluuntsag/60)*60), 2,0), ':00') as HALUUNTSAG ,   CONCAT(LPAD(TRUNC(q1.diff/60), 2,0)|| ':' || LPAD((q1.diff - TRUNC(q1.diff/60)*60), 2,0), ':00') as Ajillasantsag from
(select
      (SUBSTR(t.endtime, 1, 2)*60 + SUBSTR(t.endtime, 4, 2) + SUBSTR(t.endtime, 7, 2)) as HALUUNTSAG ,              
       r.depo_id,
       r.zutnumber,
       r.locserial,
       r.fromstation,
      r.ribbon_id,
      r.route_id,
      t.arrtime,
     t.deptime,
      t.diff,
      t.endtime,
      r.train_gol,
      r.train_dirtyweight,
    r.train_no,
     t.STATION_ID,
     s.statfullname
from ZUTLENT.ribbon r, ZUTLENT.v_hotstand t, ZUTLENT.v_station s
where t.ribbon_id=r.ribbon_id and s.statcode= t.STATION_ID  ".$query1." and t.depo_id = ".Auth::user()->depo_id."  ".$query."
group by r.depo_id,
       r.zutnumber,
       r.locserial,
       r.fromstation,
      r.ribbon_id,
      r.route_id,
      t.arrtime,
     t.deptime,
       t.diff,
       t.endtime,
      r.train_gol,
      r.train_dirtyweight,
    r.train_no,
     t.STATION_ID,
    s.statfullname
    order by statfullname,r.locserial,r.zutnumber,t.arrtime ) q1");

        return view('tuuz.haluunzogsoltseri')->with(['startdate' => $startdate, 'enddate' => $enddate, 'haluun' => $haluun, 'del' => $del]);
    }

    public function addhaluun()
    {
        $haluun = new Haluun;
        $haluun->ribbon_id = Request::input('haluun_id');
        $haluun->station_id = Request::input('haluun_stat');
        $haluun->starttime = date("H:i:s", strtotime(Request::input('haluun_time')));
        $haluun->endtime = date("H:i:s", strtotime(Request::input('haluun_stoptime')));
        $haluun->hotstand_type = Request::input('haluun_type');
        $haluun->save();

        activity()->performedOn($haluun)->log('Graph bus added');
    }

    public function destroyhaluun($id)
    {


        Haluun::where('hotstand_id', '=', $id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
        activity()->log('Haluunzogsolt deleted');

    }

    public function updatehaluun()
    {

            $department = DB::table('Hotstand')
                ->where('hotstand_id', Request::input('haluun_fault'))->update(['starttime' => date("H:i:s", strtotime(Request::input('haluun_timemodal'))), 'endtime' => date("H:i:s", strtotime(Request::input('haluun_stoptimemodal'))),'hotstand_type' =>Request::input('hotstand_typemodal'),'hotstand_stat' =>Request::input('hotstand_statmodal'), 'updated_at' => Carbon::now()]);

        return response()->json([
            'success' => 'Record has been updated successfully!'
        ]);
        activity()->log('Haluun zogsolt updated');

    }



}
