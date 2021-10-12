<?php

namespace App\Exports;

use App\Models\Devices;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;

class exportAll implements FromCollection, ShouldAutoSize,WithMapping,WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    //  fetch devices to excel with their relationships
    public function collection()
    {
        // return Devices::with('getCartegory','getOwner')->where('status','active')->orderBy('cartegoryID')->get();
        return Devices::where('status','New')->orderBy('cartegoryID')->get();
    }

    // aping specific coluns
    public function map($device):array{
        return [
            $device->ifmCode,
            $device->serialNo,
            $device->getCartegory->cartegory,
            ucwords($device->getOwner->firstname." ".$device->getOwner->middlename." ".$device->getOwner->surname),
            $device->location,
            $device->dateBought,
            $device->hasMemory,
        ];
    }

    // printing with headings
    public function headings():array{
        return [
            'IFM-CODE',
            'SERIAL-NUMBER',
            'CARTEGORY',
            'CURRENT-OWNERES',
            'LOCATION',
            'DATE-BOUGHT',
            'HAS-MEMORY',
        ];
    }

    // Bbolding the excel headings
    public function registerEvents(): array
     {
        return [
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'font'=>[
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
