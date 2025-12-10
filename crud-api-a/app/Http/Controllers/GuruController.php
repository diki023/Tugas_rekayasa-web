<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request)
    {
        $guru = Guru::create($request->all());
        return response()->json($guru, 201);
    }

    public function read()
    {
        return response()->json(Guru::all());
    }

    public function update($id, Request $request)
    {
        $guru = Guru::findOrFail($id);
        $guru->update($request->all());
        return response()->json($guru, 200);
    }

    public function delete($id)
    {
        Guru::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
