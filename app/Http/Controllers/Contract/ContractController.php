<?php

namespace App\Http\Controllers\contract;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
class ContractController extends Controller
{
    function Render()
    {
        $outputFile = 'template/output_' . time() . '.docx';
        $templateProcessor = new TemplateProcessor('template/Po_Contract.docx');
        $templateProcessor->setValue('Date', Carbon::now());
        $templateProcessor->setValue('Company', 'Công ty của tui');
        $templateProcessor->setValue('sellerName', 'Nguyen đẹp trai');
        $templateProcessor->saveAs($outputFile);

        // After sending the download response...
        dispatch(function () use ($outputFile) {
            // Wait 5 minutes...
            sleep(300);

            // Then delete the file.
            if (file_exists($outputFile)) {
                unlink($outputFile);
            }
        })->afterResponse();

        return response()->download($outputFile);
    }
}
