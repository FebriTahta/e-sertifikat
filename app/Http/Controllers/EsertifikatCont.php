<?php

namespace App\Http\Controllers;
use App\Models\Pelatihan;
use App\Models\Certificate;
use DataTables;
use Illuminate\Http\Request;

class EsertifikatCont extends Controller
{
    public function index()
    {
        $diklat = Pelatihan::orderBy('id','desc')->limit(6)->get();
        return view('e_sertifikat.index',compact('diklat'));
    }

    public function list(Request $request, $slug_diklat)
    {
        $diklat = Pelatihan::where('slug',$slug_diklat)->first();
        return view('e_sertifikat.list',compact('diklat'));
    }

    public function data(Request $request,$diklat_id)
    {
        if(request()->ajax())
        {
            $data   = Certificate::where('pelatihan_id',$diklat_id)->orderBy('no','asc');
                return DataTables::of($data)
                ->addColumn('download',function($data){
                    $ok = '<a href="'.$data->link.'" target="_blank" class="btn btn-sm btn-success text-white">unduh</a>';
                    return $ok;
                })
                ->rawColumns(['download'])
                ->make(true);
        }
    }
}
