<?php

namespace App\Http\Controllers;

use App\Imports\PasienImport;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PasienController extends Controller
{
    public function index()
    {
        $data = Pasien::select('*');
        if (request()->has('query')) {
            $q = request()->get('query');
            $data->where('nama', 'LIKE', '%' . $q . '%');
        }
        $data = $data->orderBy('nama', 'ASC')->get();

        return view('pasien.index_0310')->with('data', $data);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file_upload' => ['required', 'file', 'mimes:xls,xlsx,csv', 'max:3000']
        ]);

        Excel::import(new PasienImport(), $request->file('file_upload'));


        return redirect()->back();
    }
}
