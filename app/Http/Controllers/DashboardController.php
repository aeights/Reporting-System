<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Reporter;
use App\Models\ReportTracker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        return view('operator.dashboard');
    }

    public function report()
    {
        if (request()->ajax()) {
            $report = Report::query();
            return DataTables::of($report)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    $button =   '<div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="'.url('/dashboard/report/'.$item->ticket_id).'">Detail</a></li>
                                        <li><a class="dropdown-item" href="'.url('/dashboard/report/tracker/'.$item->id).'">Report</a></li>
                                    </ul>
                                </div> ';
                    return $button;
                })
                ->make();
        }
        return view('operator.report');
    }

    public function reportDetail($id)
    {
        $report = Report::where('ticket_id',$id)->first();
        $reporter = Reporter::where('id',$report->reporter_id)->first();
        return view('detail-pengaduan',[
            'report' => $report,
            'reporter' => $reporter,
        ]);
    }

    public function reportEdit(Request $request)
    {
        $report = Report::find($request->id);
        $report->update(['status' => $request->status]);
        $tracker = ReportTracker::create([
            'user_id' => '1',
            'report_id' => $request->id,
            'status' => $request->status,
            'note' => "Status has changed to {$request->status}"
        ]);
        return back();
    }

    public function reportTracker($id)
    {
        $report = ReportTracker::where('report_id',$id)->get();
        dd($report);
        return view('operator.report-tracker',[
            'report' => $report,
        ]);
    }

    public function log()
    {
        return view('operator.activity-log', [
            'logs' => Activity::where('subject_type', Report::class)->latest()->get()
        ]);
    }

}
