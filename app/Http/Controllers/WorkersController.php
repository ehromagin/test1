<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workers;

class WorkersController extends Controller
{
    public function submit(Request $request)
    {
        $validation = $request->validate([
            'first' => 'required|min:1',
            'last' => 'required|min:1'
        ]);
        $id = $request->input('id');
        if ($id) {
            $worker = Workers::query()->find($id);
        } else {
            $worker = new Workers();
        }
        $worker->first = $request->input('first');
        $worker->last = $request->input('last');
        $worker->function = $request->input('function');
        $worker->save();

        return view('workers-table', ['datas' => Workers::all()]);
    }

    public function getWorker(Request $request)
    {
        $worker = Workers::query()->find($request->input('id'));

        return response()->json([
            'id' => $worker->id,
            'first' => $worker->first,
            'last' => $worker->last,
            'function' => $worker->function,
        ]);

    }

    public function delete(Request $request)
    {
        $worker = Workers::query()->find($request->input('id'));
        $worker->delete();

        return view('workers-table', ['datas' => Workers::all()]);
    }

    public function allData()
    {
        return view('workers', ['datas' => Workers::all()]);
    }
}
