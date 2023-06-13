<?php

namespace App\Exports;

use App\Models\WaliKelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class WakelExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return WaliKelas::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'nama',
            'nipd',
            'jenis_kelamin',
        ];
    }

    public function map($siswa): array
    {
        return [
            $siswa->id,
            $siswa->nama,
            $siswa->nipd,
            $siswa->jenis_kelamin,
   ];
}


}