<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Question;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use App\Answer;

use Illuminate\Http\Request;



class UpdateAnswer extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //dd(Request::capture());
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
    	//dd($notifiable);
	    $request = Request::capture();
	    //dd($request);
	    $path = $request->path();
	    $string_path = explode("/", $path);
	    return (new MailMessage)
		    ->line('Someone answered your Question.')
		    ->action('See Answer', \route('questions.show', $string_path[1]))
		    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
