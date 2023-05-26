<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;

use App\Models\Rental;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    //

    public function dashboard()
    {
        $user = auth()->user();
        $rentals = Rental::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

      
        return view ('basic.dashboard' ,compact('rentals'));
    }

    public function generateInvoice(Rental $rental)
    {
        $user = auth()->user();
    
        // Create Dompdf instance
        $pdf = new Dompdf();
    
        // Set options for the PDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        // You can customize the options as per your requirements
    
        // Instantiate Dompdf with the options
        $pdf->setOptions($options);
    
        // Load the invoice view HTML content
        $html = view('invoices.rental_invoice', compact('rental', 'user'))->render();
    
        // Load HTML content into Dompdf
        $pdf->loadHtml($html);
    
        // Render the PDF
        $pdf->render();
    
        // Generate a unique filename for the PDF
        $filename = 'invoice_' . $rental->id . '.pdf';
    
        // Save the PDF file to the desired location
       // Stream the PDF as a response for download
    return $pdf->stream($filename);
    
        // You can perform any additional actions like sending the invoice via email here
    
        return redirect()->back()->with('success', 'Invoice generated successfully.');
    }
}
