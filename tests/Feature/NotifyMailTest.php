<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Question;
use App\Answer;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class NotifyMailTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMailSent()
    {
	    Mail::fake();
	
	    // create user
	    $user  = factory(\App\User::class)->make();
	    $user->save();
	
	    // create question
	    $question = factory(\App\Question::class)->make();
	    $question->user()->associate($user);
	    $question->save();
	
	    // create answer
	    $answer = factory(\App\Answer::class)->make();
	    $answer->user()->associate($user);
	    $answer->question()->associate($question);
	    $this->assertTrue($answer->save());
	
	    // mail is sent to user
	    Mail::to($user->email)->send(new Mailable());
	
	    // Mail::assertSent(TestMail::class, function (TestMail $mail) {});
	    Mail::assertSent(Mailable::class);
	    
    }
    
}
