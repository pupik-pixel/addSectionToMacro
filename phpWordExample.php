<?php

require_once('vendor/autoload.php');
require_once ('CustomContainer/CustomContainer.php');

$newDocumentWithSection = new \PhpOffice\PhpWord\PhpWord();

$newSection = $newDocumentWithSection->addSection();

$newTitle = $newSection->addTitle('someTitle');

$newTable = $newSection->addTable([
    'borderSize' => 12,
    'borderColor' => 'green',
    'width' => 6000,
    'unit' => PhpOffice\PhpWord\SimpleType\TblWidth::TWIP
]);

$newTable->addRow();
$newTable->addCell(150)->addText('Cell A1');
$newTable->addCell(150)->addText('Cell A2');
$newTable->addCell(150)->addText('Cell A3');
$newTable->addRow();
$newTable->addCell(150)->addText('Cell B1');
$newTable->addCell(150)->addText('Cell B2');
$newTable->addCell(150)->addText('Cell B3');

$newCustomContainerWithSection = new \CustomContainer\Container($newSection);

$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('templateWithGeneratedSection.docx');

$templateProcessor->setComplexBlock('macro', $newCustomContainerWithSection);

$templateProcessor->saveAs('DocumentWithGeneratedSection.docx');
