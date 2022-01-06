<?php

namespace App\Http\Controllers;
use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke()
    {
        request()->validate(['email' => 'required|email']);

        try {

            (new Newsletter())->subscribe(request('email'));

        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.',
            ]);
        }

        return redirect('/')->with('success', 'You are now signed up with our newsletter.');

    }
}
