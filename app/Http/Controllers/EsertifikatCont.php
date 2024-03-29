<?php

namespace App\Http\Controllers;
use App\Models\Pelatihan;
use App\Models\Program;
use App\Models\Certificate;
use App\Models\Induksertifikat;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EsertifikatCont extends Controller
{
    public function fixing()
    {
        $diklat = Pelatihan::where('program_id',5)->count();
        return $diklat;
    }

    public function index()
    {
        $diklat = Induksertifikat::orderBy('tgl_awal','desc')->limit(6)->get();
        return view('e_sertifikat.index',compact('diklat'));
    }

    public function list($slug,$id)
    {
        $diklat     = Induksertifikat::where('slug',$slug)->where('id',$id)->first();
        if ($diklat->tgl_akhir !== null) {
            # code...
            $tgl = Carbon::parse($diklat->tgl_awal)->isoFormat('dddd, D MMMM Y').' - '.Carbon::parse($diklat->tgl_akhir)->isoFormat('dddd, D MMMM Y');
        }else{
            $tgl = Carbon::parse($diklat->tgl_awal)->isoFormat('dddd, D MMMM Y');
        }
        $tgl = Carbon::parse($diklat->tgl_awal)->isoFormat('dddd, D MMMM Y');
        $sertifikat = Certificate::where('Induksertifikat_id',$diklat->id)->count();
        return view('e_sertifikat.list',compact('diklat','sertifikat','tgl'));
    }

    public function semua()
    {
        // $program = Program::select('name','id')->get();
        // return view('e_sertifikat.semuadata',compact('program'));
        $diklat = Induksertifikat::orderBy('tgl_awal','desc')->get();
        return view('e_sertifikat.index2',compact('diklat'));
    }

    public function data($id)
    {
        
            $data   = Certificate::where('Induksertifikat_id',$id)->select('no','name','link')
            ->orderBy('no','asc');
                return DataTables::of($data)
                ->addColumn('download',function($data){
                    $ok = '<a href="'.$data->link.'" target="_blank" class="btn btn-sm btn-success text-white"><i class="fa fa-download"></i></a>';
                    return $ok;
                })
                ->rawColumns(['download'])
                ->make(true);
        
    }

    public function search(Reqest $request)
    {
        $data = Certificate::whereBetween('tanggal', array($request->dari, $request->sampai))->get();
        return view('');
    }
}
