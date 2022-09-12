<?php

namespace App\Http\Controllers;

use App\Models\Measurand;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $results = DB::connection('smp_conn')->select('select * from id_descr');

        foreach ($results as $result) {
            // dd($result->IDTEXT);
            $measurand = Measurand::where('name', $result->IDTEXT)->first();

            if (!is_null($measurand)) {
                // dd($measurand);

                $measurand->readings()->create([
                    'value' => $result->value,
                    'unit'  => $result->UNIT,
                ]);
            }
        }

        // dd($results);
        return view('home');
    }

    public function dashboard() {
        return view('dashboard');
    }
}
