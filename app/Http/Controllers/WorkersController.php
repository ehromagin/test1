<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workers;

class WorkersController extends Controller
{
    public function submit(Request $request) {
        $validation = $request->validate([
            'first' => 'required|min:1',
            'last' => 'required|min:1'
        ]);

        $worker = new Workers();
        $worker->first = $request->input('first');
        $worker->last = $request->input('last');
        $worker->function = $request->input('function');

        $worker->save();
        return view('workers-table', ['datas' => Workers::all()]);
    }

    public function allData() {
        return view('workers', ['datas' => Workers::all()]);
    }
}
