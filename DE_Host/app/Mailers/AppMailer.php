<?php

    namespace DEVAPP\Mailers;

    use DEVAPP\User;
    use Illuminate\Contracts\Mail\Mailer;

    class AppMailer
    {
        protected $mailer;

        protected $form = 'decompany@devapp.com';

        protected $to;

        protected $view;

        protected $data = [];

        public function __construct(Mailer $mailer)
        {
            $this->mailer = $mailer;
        }


        public function sendEmailComfirmationTo(User $user)
        {
            $this->to = $user->email;
            $this->view = 'email.confirm';
            $this->data = compact('user');
            $this->deliver();
        }


        public function deliver()
        {
            $this->mailer->send($this->view, $this->data, function($message){

                $message->from($this->form, 'Administrator')
                        ->to($this->to);

            });
        }
    }