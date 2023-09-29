<?php
namespace App\Exports;

use App\Models\Rental;
use App\Models\AdditionalRental;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
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
            'Zusatzmiete',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], 
        ];
    }

    protected function transformData()
{
    return $this->rentals->map(function ($rental) {
        $additionalRentals = AdditionalRental::where('rental_uuid', $rental->uuid)->get();

        $additionalRentalData = $additionalRentals->map(function ($additionalRental) {
            return [
                'GEBUCHT BIS' => $additionalRental->end_time,
                'PREIS' => $additionalRental->price,
                'Buchungszeit' => $additionalRental->datetime,
            ];
        });

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
            $additionalRentalData, 
        ];
    });
}

    
    
}
