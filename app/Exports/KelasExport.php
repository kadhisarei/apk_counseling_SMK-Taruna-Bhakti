<?php

namespace App\Exports;

use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KelasExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Kelas::with('wali_kelas','guru')->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'Kelas',
            'Wali Kelas',
            'Guru BK',
        ];
    }

    public function map($siswa): array
    {
        return [
            $siswa->id,
            $siswa->nama,
            $siswa->wali_kelas->nama,
            $siswa->guru->nama,      
   ];
}


}