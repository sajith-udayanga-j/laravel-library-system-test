<?php

use TCPDF;

// Create new PDF document
$pdf = new TCPDF();
$pdf->AddPage('L', 'A4');
$pdf->SetFont('helvetica', 'B', 20);
$pdf->SetY(25);
$pdf->SetX(10);
$pdf->Ln();
$pdf->SetFont('helvetica', 'BU', 14);
$pdf->SetX(10);
$pdf->Cell(0, 10, $report_name, 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 6, 'From: ' . $from_date . ' To: ' . $to_date, 0, 0, 'C');
$pdf->Ln();

$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetX(10);
$pdf->MultiCell(22, 9.5, "BC", 'TB', 'C', false, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(45, 9, "Book Title", 'TB', 'C', false, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(30, 9, "Author", 'TB', 'C', false, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(30, 9, "Date", 'TB', 'C', false, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->Ln();

foreach ($report_data as $rown) {
    // Calculate the height for each row
    $height = 5; // Adjust as needed
    
    foreach ($rown as $author) {
        // Check if the content will fit on the current page
        if ($pdf->GetY() + $height > $pdf->getPageHeight() - $pdf->getFooterMargin()) {
            $pdf->AddPage();
        }
        
        $pdf->SetFont('helvetica', '', 10);
        $pdf->MultiCell(22, $height, $rown->title, 0, 'L', false, 0, '', '', true, 0, false, true, $height, 'M');
        $pdf->MultiCell(45, $height, $author->name, 0, 'L', false, 0, '', '', true, 0, false, true, $height, 'M');
        $pdf->MultiCell(30, $height, $rown->created_at->format('Y-m-d'), 0, 'L', false, 0, '', '', true, 0, false, true, $height, 'M');
    }
}

$pdf->Output('PDF-Report.pdf', 'I');
?>
<?php /**PATH C:\Users\Administrator\Documents\Laravel\library app\resources\views/Reports/library-report.blade.php ENDPATH**/ ?>