<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Rental;
use Illuminate\Http\Request;

class DownloadData extends Controller
{
    //

    public function generateData()
    {
        $user = auth()->user();
        $rentals = Rental::where('user_id', $user->id)->get();

    
        // Create Dompdf instance
        $pdf = new Dompdf();
    
        // Set options for the PDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        // You can customize the options as per your requirements
    
        // Instantiate Dompdf with the options
        $pdf->setOptions($options);
    
        // Load the invoice view HTML content
        $html = view('data.data', compact('rentals', 'user'))->render();
    
        // Load HTML content into Dompdf
        $pdf->loadHtml($html);
    
        // Render the PDF
        $pdf->render();
    
        // Generate a unique filename for the PDF
        $filename = 'Data_'  . '.pdf';
    
        // Save the PDF file to the desired location
       // Stream the PDF as a response for download
    return $pdf->stream($filename);
    
        // You can perform any additional actions like sending the invoice via email here
    
        return redirect()->back()->with('message', 'Rechnung erfolgreich erstellt.');
    }
    
}
