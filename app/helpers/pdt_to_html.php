<?php

function convert_to_html($file_name)
{
    $source_pdf = APPROOT . "\archive\\" . $file_name;
    $output_folder = APPROOT . "\pdf_html\\" . $file_name;

    if (!file_exists($output_folder)) {
        mkdir($output_folder, 0777, true);
    }
    $a = passthru("pdftohtml $source_pdf $output_folder/new_file_name", $b);
    var_dump($a);
}