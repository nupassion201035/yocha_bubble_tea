<?php

error_reporting(0);
ob_start();
session_start();
require('../fpdf/fpdf.php'); // Ensure the path to fpdf.php is correct

if (!isset($_SESSION['receipt_data'])) {
    // Redirect back to the first page or handle the error as appropriate
    header('Location: first_page.php');
    exit();
}

$receipt_data = $_SESSION['receipt_data'];

// Create instance of FPDF class
$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('garuda', '', 'Garuda.php');
$pdf->SetFont('Arial', 'B', 16);

// Add a header
$pdf->Cell(190, 10, 'Receipt', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);

// Add a table header
$pdf->Cell(150, 10, 'Product Name', 1, 0, 'L');
$pdf->Cell(40, 10, 'Price', 1, 1, 'C');

// Output the receipt data
$pdf->SetFont('garuda', '', 12);
foreach ($receipt_data as $item) {
    if (is_array($item)) { // Ensure it's an item entry, not the totals
        $utf8_text = $item['pro_name'];
        $cp874_text = iconv('UTF-8', 'windows-874', $utf8_text);
        $pdf->Cell(150, 10, $cp874_text, 1, 0, 'L');
        $pdf->Cell(40, 10, number_format($item['price'], 2), 1, 1, 'C');
    }
}
$pdf->SetFont('Arial', '', 12);
// Add the totals
$pdf->Cell(150, 10, 'Total Price', 1, 0, 'L');
$pdf->Cell(40, 10, number_format($receipt_data['totalPrice'], 2), 1, 1, 'C');

$pdf->Cell(150, 10, "Customer's Money", 1, 0, 'L');
$pdf->Cell(40, 10, number_format($receipt_data['customerMoney'], 2), 1, 1, 'C');

$pdf->Cell(150, 10, 'Withdrawal (Change)', 1, 0, 'L');
$pdf->Cell(40, 10, number_format($receipt_data['withdrawal'], 2), 1, 1, 'C');

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('D', 'receipt.pdf');

// Optionally, unset the receipt data if it's no longer needed after this point
unset($_SESSION['receipt_data']);
?>
