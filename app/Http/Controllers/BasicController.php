<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;

use Dompdf\Options;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Notifications\RentalEnd;
use App\Jobs\NotifyExpiringRentals;
use Illuminate\Support\Facades\Auth;

class BasicController extends Controller
{
    //
    public function __construct()
{
    $this->middleware(['auth', 'role:basic']);
}



    public function dashboard()
    {
      return view('basic.dashboard');
    }

    public function index()
    {
        $user = auth()->user();
        $rentals = Rental::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
   
        return view ('basic.rental' ,compact('rentals'));
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
        $filename = 'Rechnung_' . $rental->id . '.pdf';
    
        // Save the PDF file to the desired location
       // Stream the PDF as a response for download
    return $pdf->stream($filename);
    
        // You can perform any additional actions like sending the invoice via email here
    
        return redirect()->back()->with('message', 'Rechnung erfolgreich erstellt.');
    }
}
