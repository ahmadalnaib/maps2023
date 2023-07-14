<?php
namespace App\Exports;

use App\Models\Rental;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RentalsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $rentals;

    public function __construct($rentals)
    {
        $this->rentals = $rentals;
    }

    public function collection()
    {
        return $this->transformData();
    }

    public function headings(): array
    {
        return [
            'Name',
            'E-Mail',
            'ANLAGEN',
            'FACH',
            'BUCHUNGS-PERIODE',
            'GEBUCHT AB',
            'GEBUCHT BIS',
            'PREIS',
            'PINCODE',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // Apply bold font style to the header row
        ];
    }

    protected function transformData()
    {
        return $this->rentals->map(function ($rental) {
            return [
                $rental->user->name ?? 'ANONYME PERSON',
                $rental->user->email ?? 'ANONYME PERSON',
                $rental->system->system_name ?? 'Error',
                $rental->box->number ?? 'Error',
                $rental->duration,
                $rental->start_time,
                $rental->end_time,
                $rental->price,
                $rental->pincode,
            ];
        });
    }
}
