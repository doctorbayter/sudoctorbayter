<?php

namespace App\Mail;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovedPurchaseNoChat extends Mailable
{
    use Queueable, SerializesModels;

    public $plan, $user, $time, $library;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Plan $plan, User $user)
    {
        $this->plan = $plan;
        $this->user = $user;

        switch ($plan->id) {
            case 1:
            case 9:
            case 15:
            case 31:
            case 54:
                $time = '12 meses';
                $library = true;
                break;
            case 2:
                $time = '3 meses';
                $library = true;
                break;
            case 7:
                $time = '45 días';
                $library = false;
                break;
            default:
                $time = '30 días'; 
                $library = false;
                break;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.approved-purchase-nochat')
        ->subject('Bienvenido, tu compra ha sido aprobada');
    }
}
