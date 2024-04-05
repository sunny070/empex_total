<?php
namespace App\Exports;

use App\Models\District;
use App\Models\BasicInfo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BasicInfoExport implements FromView, ShouldAutoSize, WithEvents, WithTitle
{
    protected $name;
    protected $users;
    protected $district;
    

    public function __construct($users, $district)
    {
        $this->users = $users;
        $this->district = $district;
    }

    public function view(): View
    {
       
        $districtName = $this->district ? District::find($this->district)->name : 'AllDistricts';

        return view('exports.basic_info_view', [
            'users' => $this->users,
            'district' => $districtName,
           
            
        ]);
    }

    public function title(): string
    {
        return 'BasicInfoReport';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Apply styling or other modifications to the Excel sheet if needed
            $event->sheet
            ->getStyle($event->sheet->calculateWorksheetDimension())
            ->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ])
            ->getAlignment()
            ->setHorizontal('center')
            ->setVertical('center')
            ->setWrapText(true);
    
        // Set font to bold for individual cells (A1, A2, H1, H2)
        $event->sheet
            ->getStyle('A1')
            ->getFont()
            ->setBold(true);
    
        $event->sheet
            ->getStyle('A2')
            ->getFont()
            ->setBold(true);
        $event->sheet
            ->getStyle('B2')
            ->getFont()
            ->setBold(true);
        $event->sheet
            ->getStyle('C2')
            ->getFont()
            ->setBold(true);
        $event->sheet
            ->getStyle('D2')
            ->getFont()
            ->setBold(true);
        $event->sheet
            ->getStyle('E2')
            ->getFont()
            ->setBold(true);
        $event->sheet
            ->getStyle('F2')
            ->getFont()
            ->setBold(true);
        $event->sheet
            ->getStyle('G2')
            ->getFont()
            ->setBold(true);
    
        $event->sheet
            ->getStyle('H1')
            ->getFont()
            ->setBold(true);
    
        $event->sheet
            ->getStyle('H2')
            ->getFont()
            ->setBold(true);
            },
        ];
    }
}