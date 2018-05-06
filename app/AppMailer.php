<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContactMessage;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer extends Model{
    protected $mailer; 
    protected $fromAddress = 'norepley@mirceanegoita.com';
    protected $fromName = 'Blog';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendContact(ContactMessage $contact)
    {
        $this->to = 'mircea.negoita13@gmail.com';
        $this->subject = $contact->subject;
        $this->view = 'emails.contact';
        $this->data = compact('contact');

        return $this->deliver();
    }

    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function($message) {
            $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);
        });
    }
}
