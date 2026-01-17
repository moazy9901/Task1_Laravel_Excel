<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use App\Imports\DynamicExcelImport;
use App\Services\ClientService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    public function __construct(private ClientService $clientService) {}

    public function index(Request $request)
    {
        $clients = $this->clientService->getAll();

        return view('clients.index', compact('clients'));
    }

    public function import(Request $request)
    {
        DynamicExcelImport::importFile($request->file('file'));
        return back();
    }
}
