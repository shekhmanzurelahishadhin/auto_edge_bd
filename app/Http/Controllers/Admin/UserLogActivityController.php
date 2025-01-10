<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use OwenIt\Auditing\Models\Audit;

class UserLogActivityController extends Controller
{
    /*-----------------------------------------------------------------
     This method use to Show user logs data
  -------------------------------------------------------------------*/
    public function logActivity()
    {
        Gate::authorize('logs.show');
        $data['audits'] = Audit::latest()->with('user')->limit(500)->get();

        return view('backend.user_log.index', $data);
    }

    /*-----------------------------------------------------------------
       This method use to delete user logs data by log id
    -------------------------------------------------------------------*/
    public function logDelete($id)
    {
        Gate::authorize('logs.delete');
        $audit = Audit::findorFail($id);
        $audit->delete();
        flash()->addSuccess('The log delete successfully.');

        return redirect()->back();
    }

    /*-----------------------------------------------------------------
       This method use to generate user logs pdf file
    -------------------------------------------------------------------*/
    public function logPDF()
    {
        Gate::authorize('logs.download');
        $data['audits'] = Audit::latest()->take(250)->get();
        $pdf = Pdf::loadView('backend.user_log.log_pdf', $data);

        return $pdf->stream('user_logs.pdf');
        //        $pdf    = PDF::loadView('backend.user_log.log_pdf', compact('audits'));
        //        return $pdf->stream('user-log'.'.'.'pdf');

    }

    /*-----------------------------------------------------------------
       This method use to delete single user logs  file
    -------------------------------------------------------------------*/

    public function deleteAllLog(Request $request)
    {
        Gate::authorize('logs.destroy');
        $logs = $request->logs;
        $assign_user = $request->assign_user;
        if (! $logs) {
            flash()->addWarning('No Item Selected');

            return redirect()->back();
        }
        if ($logs) {
            foreach ($logs as $log) {
                Audit::where('id', $log)->delete();
            }
        }
        flash()->addSuccess('Your requested logs are deleted successfully');

        return redirect()->back();
    }
}
