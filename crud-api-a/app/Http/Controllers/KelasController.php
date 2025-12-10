<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request)
    {
        $kelas = Kelas::create($request->all());
        return response()->json($kelas, 201);
    }

    public function read()
    {
        return response()->json(Kelas::all());
    }

    public function update($id, Request $request)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());
        return response()->json($kelas, 200);
    }

    public function delete($id)
    {
        Kelas::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
