<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use Illuminate\Support\Facades\Storage;

class CareerApplicationController extends Controller
{
    public function index()
    {
        $applications = CareerApplication::latest()->paginate(10);
        return view('admin.careers.index', compact('applications'));
    }

    public function download($id)
    {
        $application = CareerApplication::findOrFail($id);
        return Storage::disk('public')->download($application->cv_path);
    }

    public function markChecked($id)
    {
        $application = CareerApplication::findOrFail($id);
        $application->checked = true;
        $application->save();

        return back()->with('success', 'Application marked as checked.');
    }

    public function destroy($id)
    {
        $application = CareerApplication::findOrFail($id);

        if (Storage::disk('public')->exists($application->cv_path)) {
            Storage::disk('public')->delete($application->cv_path);
        }

        $application->delete();

        return back()->with('success', 'Application deleted successfully.');
    }
}

