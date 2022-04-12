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

class MachinistController extends Controller
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
         if (!Cache::has('Machinist')) 
        {
        $v = Cache::remember('Machinist', 2, function() {
          $a = Carbon::now()->year;
                 return DB::select('select distinct mashcode, mashname from V_MASHINCH t where t.tushcode=1 and t.depocode = '.Auth::user()->depo_id. ' and t.mashyear='.$a.'');
            });
    }
      $zurch= FaultDetail::where('fault_type',2)->orderby('fault_detail_name')->get();
         $startdate= Carbon::today()->subDays(7)->toDateString();
        $enddate=  Carbon::today()->toDateString();
        $machinist= Input::get('machinist'); 
        $z= Input::get('zurch_type'); 
        $query = "";
        if ($machinist!=NULL && $machinist !=0) {
             $query.=" and mashcode = '".$machinist."'";
         }
         else 
         {
             $query.=" ";
         }
         if ($z!=NULL && $z!=0) {
             $query.=" and fault_no = '".$z."'";
         }
         else 
         {
             $query.=" ";
         }
           if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
             $query.=" and arrtime between TO_DATE( '".$startdate."' , 'yyyy/mm/dd') and TO_DATE( '".$enddate."', 'yyyy/mm/dd')";
         }
         else 
         {
                $query.=" ";
  
         }
         $zurchil=DB::select('select  * from ZUTLENT.ZURCHILDEVTER t where t.depocode = '.Auth::user()->depo_id.  ' '.$query. 'and rownum<=1000');

        return view('devter.machinist')->with(['zurchil'=>$zurchil,'zurch'=>$zurch,'machinist' => $machinist, 'startdate' =>$startdate, 'enddate' => $enddate]);
    }
     public function search()
    {
       if (!Cache::has('Machinist')) 
        {
        $v = Cache::remember('Machinist', 2, function() {
          $a = Carbon::now()->year;
                 return DB::select('select distinct mashcode, mashname from ZUTLENT.V_MASHINCH t where t.tushcode=1 and t.depocode = '.Auth::user()->depo_id. ' and t.mashyear='.$a.'');
            });
    }
      $zurch= FaultDetail::where('fault_type',2)->orderby('fault_detail_name')->get();
        $startdate= Input::get('mach_start');
        $enddate= Input::get('mach_end');
        $machinist= Input::get('machinist'); 
        $z= Input::get('zurch_type'); 
        $query = "";
        if ($machinist!=NULL && $machinist !=0) {
             $query.=" and mashcode = '".$machinist."'";
         }
         else 
         {
             $query.=" ";
         }
         if ($z!=NULL && $z!=0) {
             $query.=" and fault_no = '".$z."'";
         }
         else 
         {
             $query.=" ";
         }
           if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
             $query.=" and arrtime between TO_DATE( '".$startdate."' , 'yyyy/mm/dd') and TO_DATE( '".$enddate."', 'yyyy/mm/dd')";
         }
         else 
         {
                $query.=" ";
  
         }
   
         $zurchil=DB::select('select  * from ZUTLENT.ZURCHILDEVTER t where t.depocode = '.Auth::user()->depo_id.  ' '.$query. 'and rownum<=1000');
        return view('tuuz.machinist')->with(['zurchil'=>$zurchil,'zurch'=>$zurch,'machinist' => $machinist, 'startdate' =>$startdate, 'enddate' => $enddate]);
    }
      public function indexzurchil()
    {
         if (!Cache::has('Machinist')) 
        {
        $v = Cache::remember('Machinist', 2, function() {
          $a = Carbon::now()->year;
                 return DB::select('select distinct mashcode, mashname from ZUTLENT.V_MASHINCH t where t.tushcode=1 and t.depocode = '.Auth::user()->depo_id. ' and t.mashyear='.$a.'');
            });
    }
        $zurch= FaultDetail::where('fault_type',2)->orderby('fault_detail_name')->get();
        $startdate= Carbon::today()->subDays(7)->toDateString();
        $enddate=  Carbon::today()->toDateString();
        $machinist= Input::get('machinist'); 
        $z= Input::get('zurch_type'); 
        $query = "";
        if ($machinist!=NULL && $machinist !=0) {
             $query.=" and mashcode = '".$machinist."'";
         }
         else 
         {
             $query.=" ";
         }
         if ($z!=NULL && $z!=0) {
             $query.=" and fault_no = '".$z."'";
         }
         else 
         {
             $query.=" ";
         }
           if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
             $query.=" and arrtime between TO_DATE( '".$startdate."' , 'yyyy/mm/dd') and TO_DATE( '".$enddate."', 'yyyy/mm/dd')";
         }
         else 
         {
                $query.=" ";
  
         }
         $zurchil=DB::select('select  * from ZUTLENT.ZURCHILDEVTER t where t.depocode = '.Auth::user()->depo_id.  ' '.$query. 'and rownum<=1000');
      
        return view('tuuz.mashzurchil')->with(['zurchil'=>$zurchil,'zurch'=>$zurch,'machinist' => $machinist, 'startdate' =>$startdate, 'enddate' => $enddate]);
    }
     public function searchzurchil()
    {
       if (!Cache::has('Machinist')) 
        {
        $v = Cache::remember('Machinist', 2, function() {
          $a = Carbon::now()->year;
                 return DB::select('select distinct mashcode, mashname from ZUTLENT.V_MASHINCH t where t.tushcode=1 and t.depocode = '.Auth::user()->depo_id. ' and t.mashyear='.$a.'');
            });
    }
      $zurch= FaultDetail::where('fault_type',2)->orderby('fault_detail_name')->get();
        $startdate= Input::get('mach_start');
        $enddate= Input::get('mach_end');
        $machinist= Input::get('machinist'); 
        $z= Input::get('zurch_type'); 
        $query = "";
        if ($machinist!=NULL && $machinist !=0) {
             $query.=" and mashcode = '".$machinist."'";
         }
         else 
         {
             $query.=" ";
         }
         if ($z!=NULL && $z!=0) {
             $query.=" and fault_no = '".$z."'";
         }
         else 
         {
             $query.=" ";
         }
           if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
             $query.=" and arrtime between TO_DATE( '".$startdate."' , 'yyyy/mm/dd') and TO_DATE( '".$enddate."', 'yyyy/mm/dd')";
         }
         else 
         {
                $query.=" ";
  
         }
         $zurchil=DB::select('select  * from ZUTLENT.ZURCHILDEVTER t where t.depocode = '.Auth::user()->depo_id.  ' '.$query. 'and rownum<=1000');
        
        return view('tuuz.mashzurchil')->with(['zurchil'=>$zurchil,'zurch'=>$zurch,'machinist' => $machinist, 'startdate' =>$startdate, 'enddate' => $enddate]);
    }
         public function searchzurchiltailan()
    {
       if (!Cache::has('Machinist')) 
        {
        $v = Cache::remember('Machinist', 2, function() {
          $a = Carbon::now()->year;
                 return DB::select('select distinct mashcode, mashname from ZUTLENT.V_MASHINCH t where t.tushcode=1 and t.depocode = '.Auth::user()->depo_id. ' and t.mashyear='.$a.'');
            });
    }
      $zurch= FaultDetail::where('fault_type',2)->orderby('fault_detail_name')->get();
        $startdate= Input::get('mach_start');
        $enddate= Input::get('mach_end');
        $machinist= Input::get('machinist'); 
        $z= Input::get('zurch_type'); 
        $query = "";
        if ($machinist!=NULL && $machinist !=0) {
             $query.=" and mashcode = '".$machinist."'";
         }
         else 
         {
             $query.=" ";
         }
         if ($z!=NULL && $z!=0) {
             $query.=" and fault_no = '".$z."'";
         }
         else 
         {
             $query.=" ";
         }
           if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
             $query.=" and arrtime between TO_DATE( '".$startdate."' , 'yyyy/mm/dd') and TO_DATE( '".$enddate."', 'yyyy/mm/dd')";
         }
         else 
         {
                $query.=" ";
  
         }
         $zurchil=DB::select('select  * from ZUTLENT.ZURCHILDEVTER t where t.depocode = '.Auth::user()->depo_id.  ' '.$query. 'and rownum<=1000');
        
        return view('tuuz.mashzurchil')->with(['zurchil'=>$zurchil,'zurch'=>$zurch,'machinist' => $machinist, 'startdate' =>$startdate, 'enddate' => $enddate]);
    }
 
     public function zurchil()
    {
         if (!Cache::has('Machinist')) 
        {
        $v = Cache::remember('Machinist', 2, function() {
          $a = Carbon::now()->year;
                 return DB::select('select distinct mashcode, mashname from ZUTLENT.V_MASHINCH t where t.tushcode=1 and t.depocode = '.Auth::user()->depo_id. ' and t.mashyear='.$a.'');
            });
    }
      $zurch= FaultDetail::where('fault_type',2)->orderby('fault_detail_name')->get();
        $startdate= Input::get('mach_start');
        $enddate= Input::get('mach_end');
        $machinist= Input::get('machinist'); 
        $z= Input::get('zurch_type'); 
        $query = "";
        if ($machinist!=NULL && $machinist !=0) {
             $query.=" and mashcode = '".$machinist."'";
         }
         else 
         {
             $query.=" ";
         }
         if ($z!=NULL && $z!=0) {
             $query.=" and fault_no = '".$z."'";
         }
         else 
         {
             $query.=" ";
         }
           if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
             $query.=" and arrtime between TO_DATE( '".$startdate."' , 'yyyy/mm/dd') and TO_DATE( '".$enddate."', 'yyyy/mm/dd')";
         }
         else 
         {
                $query.=" ";
  
         }
         $zurchil=DB::select('select  * from ZUTLENT.ZURCHILDEVTER t where t.depocode = '.Auth::user()->depo_id.  ' '.$query. 'and rownum<=1000');
          \Cache::put('startDate'.Auth::id(),Request::input('mach_start'),60); 
         \Cache::put('endDate'.Auth::id(),Request::input('mach_end'),60); 
         \Cache::put('endDate'.Auth::id(),Request::input('machinist'),60); 
        return view('tuuz.mashzurchil')->with(['zurchil'=>$zurchil,'zurch'=>$zurch,'machinist' => $machinist, 'startdate' =>$startdate, 'enddate' => $enddate]);
    }
}
