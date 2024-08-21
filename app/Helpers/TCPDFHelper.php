<?php

namespace App\Helpers;

use PDF;
use PDF417;

class TCPDFHelper extends PDF
{

    public static function pdf_header()
    {

        PDF::setHeaderCallback(function ($pdf) {
            if ($pdf->pageNo() == 1) {
                $pdf->setY(5);
                $pdf->setFont('helvetica', 'B', 11);
                $pdf->MultiCell(0, 1, 'LIBRARY SYSTEM');
            }
        });
    }

    public static function pdf_footer()
    {

        PDF::setFooterCallback(function ($pdf) {
            $pgWdith = $pdf->getPageWidth();
            $pdf->SetY(-10);
            $y = $pdf->GetY();
            $pdf->line(10, $y, $pgWdith - 15, $y);
            $pdf->SetFont('helvetica', '', 8);
            $pdf->Cell(40, 5, date('d-m-Y  H:i:s a'), 0, false, 'L', 0, '', 0, false, 'T', 'M');
            $pdf->Cell(0, 5, 'Page ' . $pdf->getAliasNumPage(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
            $count = $pdf->PageNo();
        });
    }

//     public static function HaveMorePages($pdf, $rowcount, $SetTMg = 6)
//     {
//         $dimensions = $pdf->getPageDimensions();
//         $startY = $pdf->GetY();
//         if ((($startY + $rowcount) + $dimensions['bm']) > ($dimensions['hk']) - 10) {
//             $pdf->Ln();
//             $pdf->SetTopMargin($SetTMg + 10);
//             $pdf->AddPage();
//         }
//     }
// }
