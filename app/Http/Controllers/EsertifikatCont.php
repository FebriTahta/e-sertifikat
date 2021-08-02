<?php

namespace App\Http\Controllers;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class EsertifikatCont extends Controller
{
    public function index()
    {
        $diklat = Pelatihan::limit(6)->get();
        return view('e_sertifikat.index',compact('diklat'));
    }

    public function list(Request $request, $slug_diklat)
    {
        $diklat = Pelatihan::where('slug',$slug_diklat)->first();
        return view('e_sertifikat.list',compact('diklat'));
    }
}
