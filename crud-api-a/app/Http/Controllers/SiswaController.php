<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request)
    {
        $siswa = Siswa::create($request->all());
        return response()->json($siswa, 201);
    }

    public function read()
    {
        return response()->json(Siswa::all());
    }

    public function update($id, Request $request)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        return response()->json($siswa, 200);
    }

    public function delete($id)
    {
        Siswa::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
