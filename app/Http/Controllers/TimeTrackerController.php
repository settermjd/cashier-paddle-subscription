<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTracker;

class TimeTrackerController extends Controller
{
    public $basicMonthly;
    public $basicYearly;
    public $proMonthly;
    public $proYearly;

    public function __construct(){
        $this->basicMonthly = env('PADDLE_BASIC_MONTHLY');
        $this->basicYearly = env('PADDLE_BASIC_YEARLY');
        $this->proMonthly = env('PADDLE_PRO_MONTHLY');
        $this->proYearly = env('PADDLE_PRO_YEARLY');
    }

    public function index(Request $request) {
        if (auth()->user()->subscribed()) {
            $entries = TimeTracker::all();
            return view('time-tracker', ['entries' => $entries]);
        } else {
            $basicMonthly = $this->paymentInit($this->basicMonthly);
            $basicYearly = $this->paymentInit($this->basicYearly);
            $proMonthly = $this->paymentInit($this->proMonthly);
            $proYearly = $this->paymentInit($this->proYearly);

            return view('dashboard', [
                'basicMonthly' => $basicMonthly,
                'basicYearly' => $basicYearly,
                'proMonthly' => $proMonthly,
                'proYearly' => $proYearly,
            ]);
        }
    }

    public function paymentInit($paymentPlan)
    {
        return $checkout = auth()->user()->checkout($paymentPlan)->returnTo(route('dashboard'));
    }

    public function start()
    {
        $entry = TimeTracker::create(['start_time' => now()]);
        return redirect()->back();
    }

    public function stop(TimeTracker $entry)
    {
        $entry->update(['end_time' => now()]);
        return redirect()->back();
    }
}
