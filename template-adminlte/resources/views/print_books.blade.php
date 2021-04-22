<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center">Data Buku</h1>
    <p class="text-center">Laporan Data Buku Tahun 2021 </p>
    <br/>
    <table id="table-data" class="table table-bordered">
    <thead>
    <tr>
    <th>No</th>
    <th>JUDUL</th>
    <th>PENULIS</th>
    <th>TAHUN</th>
    <th>PENERBIT</th>
    <th>COVER</th>
    </tr>
    </thead>
    <tbody>
    @php $no=1; @endphp
    @foreach($books as $book)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $book->judul }}</td>
        <td>{{ $book->penulis }}</td>
        <td>{{ $book->tahun }}</td>
        <td>{{ $book->penerbit }}</td>
        <td>
            @if($book->cover !== null)
                <img src="{{ public_path('storage/cover_buku/'.$book->cover) }}" width="80px"/>
            @else
                [Gambar tidak tersedia]
            @endif
            </td>
    </tr>    
    @endforeach
    </tbody>
    </table>
</body>
</html>    
