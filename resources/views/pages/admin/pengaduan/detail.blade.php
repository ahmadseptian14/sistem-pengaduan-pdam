@extends('layouts.admin')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Detail Pengaduan</h2>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    @forelse ($pengaduans->details as $pengaduan)
                    <div class="card mb-5">
                        <div class="card-body">
                            <div>
                                <h4>Nama : {{$pengaduan->nama}}</h4>
                                <h4>No.Telepon : {{$pengaduan->user->phone}}</h4>
                                <h4>Tanggal : {{ $pengaduan->created_at->format('l, d F Y - H:i:s') }}</h4>
                                <h4>Status : 
                                    @if($pengaduan->status =='Belum di Proses')
                                    <span class="badge badge-pill badge-danger">{{$pengaduan->status}}</span>

                                    @elseif ($pengaduan->status =='Sedang di Proses')
                                    <span class="badge badge-pill badge-primary">{{$pengaduan->status}}</span>
                                    @else

                                    <span class="badge badge-pill badge-success">{{$pengaduan->status}}</span>
                                    @endif
                                </h4>
                                <h4>Rating : {{$penilaian->rating}}</h4>

                            </div>
                          
                        </div>
                    </div>
                    <h4 class="text-center" style="font-weight: bold">Foto Pengaduan</h4>
                    <div class="card" style="width: 18rem;">
                        <img src="{{Storage::url($pengaduan->foto)}}" class="card-img-top" alt="...">
                    </div>

                    <h4 class="text-center" style="font-weight: bold">Keterangan</h4>
                    <div class="card mb-5">
                        <div class="card-body">
                            <div>
                                <p>{{$pengaduan->deskripsi}}</p>
                            </div>
                        </div>
                    </div>  

                    <h4 class="text-center" style="font-weight: bold">Foto Tanggapan</h4>
                    @if (empty($tanggapan->foto_tanggapan))
                        Belum ada foto tanggapan
                        
                    @else
                        <div class="card" style="width: 18rem;">
                            <img src="{{Storage::url($tanggapan->foto_tanggapan)}}" class="card-img-top" alt="...">
                        </div>
                    @endif
                   

                    <h4 class="text-center" style="font-weight: bold">Tanggapan</h4>
                    <div class="card mb-5">
                        <div class="card-body">
                            <div>
                               
                                @if (empty($tanggapan->tanggapan))
                                Belum ada tanggapan
                                @else
                                {{ $tanggapan   ->tanggapan}}
                                @endif
                            </div>
                            @empty
                            <h2>Tidak Ada Pengaduan</h2>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            @if (Auth::user()->roles == 'TEKNISI')
                <a href="{{route('tanggapan.show', $pengaduan->id)}}" class="btn btn-primary btn-lg active">Berikan Tanggapan</a>
            @endif
            
        </div>
    </div>
</div>
@endsection

