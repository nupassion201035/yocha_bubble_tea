<?php

error_reporting(0);
ob_start();
session_start();
$qid = $_GET['id'];
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
$cp874_text_q = iconv('UTF-8', 'windows-874', 'คิวของคุณ');
$pdf->Cell(190, 10, 'Yocha Bubble Tea', 0, 1, 'C');
$pdf->SetFont('garuda', '', 20);
$pdf->Cell(190, 10, $cp874_text_q, 0, 1, 'C');
$pdf->Cell(190, 10, 'A0' .$qid, 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

// Add a table header
$pdf->SetFont('garuda', '', 12);
$cp874_text_Productname = iconv('UTF-8', 'windows-874', 'เมนู');
$cp874_text_Producprice = iconv('UTF-8', 'windows-874', 'ราคา');
$pdf->Cell(150, 10, $cp874_text_Productname, 1, 0, 'L');
$pdf->Cell(40, 10, $cp874_text_Producprice, 1, 1, 'C');

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
$pdf->SetFont('garuda', '', 12);
// Add the totals
$cp874_text_price_all = iconv('UTF-8', 'windows-874', 'ราคารวม');
$pdf->Cell(150, 10, $cp874_text_price_all, 1, 0, 'L');
$pdf->Cell(40, 10, number_format($receipt_data['totalPrice'], 2), 1, 1, 'C');

$cp874_text_money_get = iconv('UTF-8', 'windows-874', 'เงินที่รับ');
$pdf->Cell(150, 10, $cp874_text_money_get, 1, 0, 'L');
$pdf->Cell(40, 10, number_format($receipt_data['customerMoney'], 2), 1, 1, 'C');

$cp874_text_change = iconv('UTF-8', 'windows-874', 'เงินทอน');
$pdf->Cell(150, 10, $cp874_text_change, 1, 0, 'L');
$pdf->Cell(40, 10, number_format($receipt_data['withdrawal'], 2), 1, 1, 'C');

$cp874_text_employee = iconv('UTF-8', 'windows-874', 'พนักงาน');
$pdf->Cell(150, 10, $cp874_text_employee, 0, 0, 'L');
$pdf->Cell(40, 10, $receipt_data['em_name'], 0, 1, 'C');

$cp874_text_datetime = iconv('UTF-8', 'windows-874', 'วันที่');
$pdf->Cell(150, 10, $cp874_text_datetime, 0, 0, 'L');
$pdf->Cell(40, 10, $receipt_data['o_datetime'], 0, 1, 'C');
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('D', 'receipt.pdf');

// Optionally, unset the receipt data if it's no longer needed after this point
unset($_SESSION['receipt_data']);

?>
