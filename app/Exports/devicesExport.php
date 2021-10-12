<?php

namespace App\Exports;

use App\Models\Devices;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;

class devicesExport implements FromQuery, ShouldAutoSize,WithMapping,WithHeadings,WithEvents
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $filter2;
    // constructor to filter the export cartegory here
    public function __construct($filter2){
        $this->filter2 = $filter2;
    }

    // export by filtering here
    public function query()
    {
        return Devices::where('cartegoryID',$this->filter2)->where('status','New');
        
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
