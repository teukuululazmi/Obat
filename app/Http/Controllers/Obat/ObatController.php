<?php

namespace App\Http\Controllers\Obat;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        return view('Controllers.Obat.obat', compact('obat'));
    }

    public function obatPost(Request $request)
    {
        Obat::create($request->all());
        return redirect()->back()->with('success', 'menambahkan');
    }

    public function obatUpdate(Request $request, $id)
    {
        Obat::find($id)->update($request->all());
        return redirect()->back()->with('success', 'menambahkan');
    }

    public function obatDelete($id)
    {
        Obat::find($id)->delete($id);
        return redirect()->back()->with('success', 'dihapuskan');
    }
}
