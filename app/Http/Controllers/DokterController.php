<?php

namespace App\Http\Controllers;

use App\Imports\DokterImport;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DokterController extends Controller
{
    public function index()
    {
        $data = Dokter::select('*');
        if (request()->has('query')) {
            $q = request()->get('query');
            $data->where('nama', 'LIKE', '%' . $q . '%');
        }
        $data = $data->orderBy('nama', 'ASC')->get();

        return view('dokter.index_0310')->with('data', $data);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file_upload' => ['required', 'file', 'mimes:xls,xlsx,csv', 'max:3000']
        ]);

        Excel::import(new DokterImport(), $request->file('file_upload'));

        return redirect()->back();
    }
}
