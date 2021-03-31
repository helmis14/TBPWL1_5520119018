@extends('adminlte::page')

@section('title', 'Pengelolaan Buku')

@section('content_header')
    <h1 class="m-0 text-dark">Pengelolaan Buku</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Pengelolaan Buku') }}</div>
                <div class="card-body">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal"><i class="fa fa-plus mr-2"></i>Tambah Data</button>
                    {{-- Table --}}
                    <table id="table-data" class="table table-borderer">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>JUDUL</th>
                                <th>PENULIS</th>
                                <th>TAHUN</th>
                                <th>PENULIS</th>
                                <th>COVER</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $key => $book)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $book->judul }}</td>
                                    <td>{{ $book->penulis }}</td>
                                    <td>{{ $book->tahun }}</td>
                                    <td>{{ $book->penerbit }}</td>
                                    <td>
                                        @if ($book->cover !== null)
                                            <img src="{{ asset('storage/cover_buku/'.$book->cover) }}" alt="{{ $book->judul }}" width="100px">
                                        @else
                                            [Gambar tidak tersedia]
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- end Table --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="tambahBukuLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.book.submit') }}">
                    @method('POST')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahBukuLabel">{{ _('Tambah Data Buku') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputJudul">Judul Buku</label>
                            <input type="text" class="form-control" id="inputJudul">
                        </div>
                        <div class="form-group">
                            <label for="inputPenulis">Penulis</label>
                            <input type="text" class="form-control" id="inputPenulis">
                        </div>
                        <div class="form-group">
                            <label for="inputTahun">Tahun</label>
                            <input type="number" class="form-control" id="inputTahun">
                        </div>
                        <div class="form-group">
                            <label for="inputPenerbit">Penerbit</label>
                            <input type="text" class="form-control" id="inputPenerbit">
                        </div>
                        <div class="form-group">
                            <label for="inputCover">Cover</label>
                            <input type="file" class="form-control-file" id="inputCover">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end Modal --}}
@stop
