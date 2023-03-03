<?php

namespace App\Http\Controllers;

use App\Services\MailchimpService;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(MailchimpService $mailchimp)
    {
        $attributes = request()->validate([
            'email' => 'required|email'
        ]);

        try {
            $mailchimp->subscribe($attributes['email']);
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter'
            ]);
        }

        return redirect()->route('posts')->with('success', 'You are now signed up for our newsletter!');
    }
}
