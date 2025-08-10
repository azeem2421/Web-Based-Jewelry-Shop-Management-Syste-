<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function build()
    {
        $pdf = PDF::loadView('emails.invoice', ['order' => $this->order]);

        return $this->subject('Your Invoice from Azii Jewelers')
                    ->view('emails.invoice')
                    ->attachData($pdf->output(), 'Invoice_Order_#' . $this->order->id . '.pdf');
    }
}

