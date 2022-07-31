@extends('layouts.admin')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Pengaduan</h2>
            <p class="dashboard-subtitle">
                Daftar Pengaduan
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('pengaduan.create') }}" class="btn btn-primary mb-3">Input Pengaduan</a>
                            <div>
                                <table
                                    class="table table-hover scroll-horizontal-vertical w-100 table-bordered table-striped"
                                    id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                            <th>Rating</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pengaduans as $pengaduan)
                                            <tr>
                                                <td>{{ $pengaduan->nama }}</td>
                                                <td>{{ $pengaduan->created_at->format('d F Y - H:i:s') }}</td>
                                                <td> 
                                                    <img src="{{ Storage::url($pengaduan->foto) }}"  width="50" height="50" class="rounded-square">
                                                </td>
                                                <td>{{$pengaduan->status}}</td>
                                                <td>{{$pengaduan->penilaian->rating}}</td> 
                                                <td>
                                                    <div class="btn-group">
                                                        <div class="dropdown">
                                                            <button class="btn btn-primay dropdown-toggle mr-1 mb-1"
                                                                type="button" data-toggle="dropdown">
                                                                Lihat
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a href="{{ route('pengaduan.detail', $pengaduan->id) }}"
                                                                    class="dropdown-item">
                                                                    Lihat
                                                                </a>
                                                                <form
                                                                    action="{{ route('pengaduan.destroy', $pengaduan->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        class="dropdown-item text-danger">
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak Ada Pengaduan</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-scripts')
    <script>
        $(document).ready( function () {
            $('#table1').DataTable({
                "order": [
                    [3,"desc"]
                ]
            });
        } );
    </script>
@endpush