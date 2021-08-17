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
        $diklat = Pelatihan::orderBy('tanggal','desc')->limit(6)->get();
        return view('e_sertifikat.index',compact('diklat'));
    }

    public function list($slug)
    {
        $diklat     = Pelatihan::where('slug',$slug)->first();
        $sertifikat = Certificate::where('pelatihan_id',$diklat->id)->count();
        return view('e_sertifikat.list',compact('diklat','sertifikat'));
    }

    public function data($id)
    {
        
            $data   = Certificate::where('pelatihan_id',$id)->select('no','name','link')
            ->orderBy('no','asc');
                return DataTables::of($data)
                ->addColumn('download',function($data){
                    $ok = '<a href="'.$data->link.'" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-download"></i></a>';
                    return $ok;
                })
                ->rawColumns(['download'])
                ->make(true);
        
    }

    public function tes()
    {
        return 'TES TES TES';
    }
}
