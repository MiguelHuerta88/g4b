<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class RequestToManage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * User model instance
     *
     * @var User model
     */
    public $user;

    /**
     * User model instance
     *
     * @var User model
     */
    public $manager;

    /**
     * Hash string for current user to manager
     *
     * @var string
     */
    public $hash;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, User $manager, $hash)
    {
        $this->user = $user;
        $this->manager = $manager;
        $this->hash = $hash;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.request-manage')
            ->with([
                'siteUrl' => env('APP_URL')
            ]);
    }
}
