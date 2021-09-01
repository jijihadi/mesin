<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailPemeliharaan extends Mailable
{
    use Queueable, SerializesModels;
    public $pemeliharaan;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pemeliharaan)
    {
        $this->pemeliharaan=$pemeliharaan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('s9257474@gmail.com', 'CV. SUMBER NIAGA')
        ->subject('Notifikasi Jadwal Pemeliharaan Mesin Produksi CV. SUMBER NIAGA')
        ->view('admin.emailPemeliharaan')->with('pemeliharaan',$this->pemeliharaan);
    }
}
