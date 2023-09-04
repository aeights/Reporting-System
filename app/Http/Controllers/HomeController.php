<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Report;
use App\Models\Reporter;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    public function pengaduan()
    {
        $data = Category::all();
        return view('pengaduan', [
            'category' => $data,
        ]);
    }

    public function status()
    {
        return view('cek-status');
    }

    public function cekStatus(Request $request)
    {
        $report = Report::where('ticket_id', $request->ticket_id)->first();
        $reporter = Reporter::where('id', $report->reporter_id)->first();
        return view('detail-pengaduan', [
            'report' => $report,
            'reporter' => $reporter,
        ]);
    }

    public function generateTicketId()
    {
        $year = date('Y');
        $month = date('m');
        $day = date('d');

        $latestTicket = Report::latest('ticket_id')->first();

        if ($latestTicket) {
            $latestTicketNumber = intval(substr($latestTicket->id, -5));
            $newTicketNumber = str_pad($latestTicketNumber + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newTicketNumber = '00001';
        }

        $ticketId = $year . $month . $day . $newTicketNumber;

        return $ticketId;
    }

    public function storePengaduan(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'identity_type' => 'required',
            'identity_number' => 'required',
            'pob' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validated) {
            $reporter = Reporter::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'identity_type' => $request->identity_type,
                'identity_number' => $request->identity_number,
                'pob' => $request->pob,
                'dob' => $request->dob,
                'address' => $request->address,
            ]);

            $report = Report::create([
                'reporter_id' => $reporter->id,
                'category_id' => $request->category_id,
                'ticket_id' => self::generateTicketId(),
                'title' => $request->title,
                'description' => $request->description,
                'status' => 'Pending',
            ]);
            $report->addMediaFromRequest('image')->toMediaCollection('envidence');
            return view('detail-pengaduan', [
                'report' => $report,
                'reporter' => $reporter,
            ]);
        }
    }
}
