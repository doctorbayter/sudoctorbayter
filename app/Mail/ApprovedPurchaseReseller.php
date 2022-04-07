<?php

namespace App\Mail;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovedPurchaseReseller extends Mailable
{
    use Queueable, SerializesModels;

    public $plan, $user, $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Plan $plan, User $user)
    {
        $this->plan = $plan;
        $this->user = $user;

        $email_parts = explode('@', $user->email);
        $this->password = $email_parts[0];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.approved-purchase-reseller')
        ->subject('Bienvenido al Plan Total Fitness Dr. Bayter');
    }
}
