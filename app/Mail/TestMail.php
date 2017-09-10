<?php
declare(strict_types = 1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class TestMail
 *
 * @author D3lph1 <d3lph1.contact@gmail.com>
 * @package App\Mail
 */
class TestMail extends Mailable
{
    use SerializesModels;

    /**
     * @var string
     */
    public $subject;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        $this->subject = __('mail.test.subject');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.test', ['site' => config('app.url')]);
    }
}
