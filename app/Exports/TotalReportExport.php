<?php

namespace App\Exports;

use App\Models\BasicInfo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;

class TotalReportExport implements FromView
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $lastRow = count($this->data) + 1; // Add 1 to account for header row
                $range = 'A1:O' . $lastRow;

                $event->sheet->getStyle($range)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ])->getAlignment()->setHorizontal('center')->setVertical('center')->setWrapText(true);

                $event->sheet->getStyle('A1:F1')->getFont()->setBold(true);
                $event->sheet->getStyle('A' . $lastRow . ':F' . $lastRow)->getFont()->setBold(true);
            },
        ];
    }

    public function view(): View
    {
        // Define the table directly here
        return view('exports.total-report-export', [
            'data' => $this->data,
        ])->with('styles', '
            <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                th, td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: center;
                }
                th {
                    font-weight: bold;
                }
            </style>
        ');
    }
}
