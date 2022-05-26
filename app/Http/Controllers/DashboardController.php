<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Reviews\Review;

class DashboardController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('dashboard', [
            'appoinment' => Form::whereAppointment()->orderBy('id', 'desc')->take(7)->get(),
            'reviews' => Review::orderBy('id', 'desc')->take(5)->get(),
        ]);
    }

}
