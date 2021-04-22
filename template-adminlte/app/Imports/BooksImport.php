<?php

namespace App\Imports;

use App\Models\Book;
use App\Models\Book as ModelsBook;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ModelsBook([

            'judul' => $row['0'],
            'penulis' => $row['1'],
            'tahun' => $row['2'],
            'penerbit' => $row['3'],

        ]);
    }
}
