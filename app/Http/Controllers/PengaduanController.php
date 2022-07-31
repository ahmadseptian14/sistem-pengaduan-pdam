<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Penilaian;
use App\Models\Tanggapan;
// use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pengaduans = Pengaduan::with(['penilaian'])
                                ->orderBy('created_at', 'desc')
                                ->get();

        return view('pages.admin.pengaduan.index', [
            'pengaduans' => $pengaduans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


   


    public function create()
    {
        return view('pages.pelanggan.pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required'
        ]);

        $users_id= Auth::user()->id;
        $nama = Auth::user()->name;

        $data = $request->all();
        $data['users_id'] = $users_id;
        $data['nama'] = $nama;
        $data['foto'] =  $request->file('foto')->store('assets/pengaduan', 'public');

        Alert::success('Berhasil', 'Pengaduan terkirim');

        Pengaduan::create($data);

        return redirect()->route('pengaduan.pelanggan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduans = Pengaduan::with([
            'details', 'user' 
        ])->findOrFail($id);

        $tanggapan = Tanggapan::where('pengaduan_id',$id)->first();

        $penilaian = Penilaian::where('pengaduan_id', $id)->first();

        return view('pages.admin.pengaduan.detail',[
        'pengaduans' => $pengaduans,
        'tanggapan' => $tanggapan,
        'penilaian' => $penilaian
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cetakForm()
    {
        return view('pages.admin.pengaduan.export');
    }



    public function cetakLaporan (Request $request) 
    {
      
        if(isset($_GET['cari'])) {
            $pengaduans = Pengaduan::whereBetween('created_at', [$request->start_date, $request->end_date])->get();
            
            $pdf = PDF::loadview('pages.admin.pengaduan.exportAll',compact('pengaduans'));
            return $pdf->download('laporan-semua-pengaduan.pdf');

        }
    }


    // Pelanggan
    public function pengaduan_pelanggan()
    {   
        // $pengaduans = Pengaduan::orderBy('created_at', 'desc')->get();
        $pengaduans = Pengaduan::with(['penilaian'])
                                ->where('users_id',Auth::user()->id)
                                ->orderBy('created_at', 'DESC')
                                ->get();
        // $pengaduans = Auth::user()->pengaduan()->penilaian()->orderBy('created_at', 'DESC')->get();

        // $penilaian = Penilaian::where('pengaduan_id',$id)->first();


        return view('pages.pelanggan.pengaduan.index', [
            'pengaduans' => $pengaduans,
            // 'penilaian' => $penilaian
        ]);
    }


    public function detail_pengaduan($id)
    {
        $pengaduans = Pengaduan::with([
            'details', 'user' 
        ])->findOrFail($id);

        $tanggapan = Tanggapan::where('pengaduan_id',$id)->first();

        return view('pages.pelanggan.pengaduan.detail',[
        'pengaduans' => $pengaduans,
        'tanggapan' => $tanggapan
        ]);
    }


}
