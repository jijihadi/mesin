<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use App\Mail\MailPemeliharaan;
use Illuminate\Support\Facades\Mail;

class SendLateEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $to = Carbon::createFromFormat('Y-m-d H:s:i', $this->details['to']);
        // $from = Carbon::createFromFormat('Y-m-d H:s:i', date('Y-m-d H:s:i'));
        // $diff = $to->diffInMinutes($from);
        $when = $to;

        return \Mail::to($this->details['email'])->send(new MailPemeliharaan($this->details['isi']));
        
    }
}
