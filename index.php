<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="file.php">download</a>
</body>
</html>

<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$data = [
    ['name' => 'Product1', 'price' => 100, 'img' => 'pic1.jpg'],
    ['name' => 'Product2', 'price' => 200, 'img' => 'pic2.jpg'],
];

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', '№');
$sheet->setCellValue('B1', 'Название');
$sheet->setCellValue('C1', 'Цена');
$sheet->setCellValue('D1', 'Изображение');

for($i = 0; $i < count($data); $i++)
{
    $sheet->setCellValue('A'.($i+2), ($i+1));
    $sheet->setCellValue('B'.($i+2), $data[$i]['name']);
    $sheet->setCellValue('C'.($i+2), $data[$i]['price']);
    $sheet->setCellValue('D'.($i+2), 'img/'.$data[$i]['img']);
}

$writer = new Xlsx($spreadsheet);
$writer->save('test.xlsx');