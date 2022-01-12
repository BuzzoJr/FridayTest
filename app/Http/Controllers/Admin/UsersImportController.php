<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Gate;

class UsersImportController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('file');

        $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv'
        ],
        [
            'file.required' => 'É necessário selecionar matriz.',
            'file.mimes' => 'O arquivo deve ser do tipo: xls, xlsx, csv.'
        ]
        );

        Excel::import(new UsersImport, $file);
        
        return redirect('/admin')->with('success', 'All good!');
    }
}
