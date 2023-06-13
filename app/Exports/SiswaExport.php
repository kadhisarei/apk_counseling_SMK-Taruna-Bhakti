<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Siswa::with('kelas')->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'nama',
            'nisn',
            'tanggal_lahir',
            'jenis_kelamin',
            'Kelas',
        ];
    }

    public function map($siswa): array
    {
        return [
            $siswa->id,
            $siswa->nama,
            $siswa->nisn,
            $siswa->tanggal_lahir,
            $siswa->jenis_kelamin,
            $siswa->kelas->nama,
   ];
}


}