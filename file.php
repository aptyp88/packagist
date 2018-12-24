<?php

require_once __DIR__ . '/vendor/autoload.php';

$title = 'Название';
$data = [
    ['name' => 'Product1', 'price' => 100, 'img' => 'pic1.jpg'],
    ['name' => 'Product2', 'price' => 200, 'img' => 'pic2.jpg'],
];

$mpdf = new \Mpdf\Mpdf();
$stylesheet = file_get_contents('styles/main.css');
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf ->WriteHTML('<table border="1">
                    <caption>Каталог товаров</caption>
                    <tr>
                        <td><img src="img/1.jpg" alt=""></td>
                        <td>'.$data[0]['name'].'</td>
                        <td>'.$data[0]['price'].'</td>                        
                    </tr>
                    <tr>
                        <td><img src="img/2.jpg" alt=""></td>
                        <td>'.$data[1]['name'].'</td>
                        <td>'.$data[1]['price'].'</td>                        
                    </tr>
                    </table>');
$mpdf ->Output('test.pdf', \Mpdf\Output\Destination::DOWNLOAD);