<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Owner;
use App\Services\ExcelImportService;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function index()
    {
       
        $records = collect()
            ->merge(Client::all())
            ->merge(Owner::all())
            ->merge(Admin::all());

        return view("excel.index", compact('records'));
    }
    public function import(Request $request, ExcelImportService $service)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        $service->import($request->file('file'));

        return back()->with('success', 'Excel Imported Successfully');
    }
}
