<?php

namespace App\Http\Controllers;

use DB;  
use Illuminate\Support\Facades\Input;
use Request;
use Spatie\Activitylog\Models\Activity;
use \Cache;
use App\Seri;
use App\Gemtel;
use App\Part;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GemteltypeController extends Controller
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
        $gemtel=DB::select('select * from V_SET_GEMTEL');
        $part=Part::orderby('part_name')->get();
        return view('set.gemteltype')->with(['gemtel' => $gemtel,'part' => $part]);
    }
 public function store()
    {
        $gemtel = new Gemtel;
        $gemtel->gemtel_type = Request::input('gemtel_type');
        $gemtel->gemtel_name = Request::input('gemtel_name');
        $gemtel->save();

         return Redirect('gemteltype');
    }

}
