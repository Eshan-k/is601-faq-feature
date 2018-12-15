<?php
	
	namespace App\Mail;
	use Illuminate\Mail\Mailable;
	
	
	class NotifyMail extends Mailable
	{
		
		/**
		 * Build the message.
		 *
		 * @return $this
		 */
		public function build()
		{
			return $this
				->from('sender@mail.com')
				->to('client@mail.com')
				->replyTo('replyto@mail.com')
				->cc('cc@mail.com')
				->bcc('bcc@mail.com');
				
		}
	}