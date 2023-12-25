<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommentReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $mailData;
    public $teamData;
    public function __construct($mailData, $teamData)
    {
        $this->mailData = $mailData;
        $this->teamData = $teamData;
    }
    public function build()
    {
        return $this->subject('Laravel-NBA - New comment on your team')->view('mails.comment-received');
    }
}
