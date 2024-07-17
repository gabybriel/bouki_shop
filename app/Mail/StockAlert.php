<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StockAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $article;
    public $requestedQuantity;


    /**
     * Create a new message instance.
     */
    public function __construct($article, $requestedQuantity)
    {
        $this->article = $article;
        $this->requestedQuantity = $requestedQuantity;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.stock_alert')
            ->with([
                'articleName' => $this->article->name,
                'articleQuantity' => $this->article->quantity,
                'requestedQuantity' => $this->requestedQuantity,
            ]);
    }
}
