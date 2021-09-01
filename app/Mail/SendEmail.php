<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $perbaikan;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($perbaikan)
    {
        $this->perbaikan=$perbaikan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('s9257474@gmail.com', 'CV. SUMBER NIAGA')
        ->subject('Notifikasi Perbaikan Mesin Produksi CV. SUMBER NIAGA')
        ->view('admin.email')->with('perbaikan',$this->perbaikan);
    }
}
