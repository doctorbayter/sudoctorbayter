<?php

namespace App\Mail;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovedPurchaseReto extends Mailable
{
    use Queueable, SerializesModels;

    public $plan, $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Plan $plan, User $user)
    {
        $this->plan = $plan;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.approved-purchase-reto')
        ->subject('Bienvenido, Reto 5MER El Reto Del Ayuno');
    }
}
