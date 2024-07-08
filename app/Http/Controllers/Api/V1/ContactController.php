<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientRequest;
use App\Mail\InquiryResponse;
use Exception;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContactResource::collection(Contact::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $contactData = $request->validated();
        $contact = new Contact();
        $contact->fill($contactData);
        $contact->save();

        if ( $contact->source == 'layout1.flowform' ) {
            $messageArray = json_decode($contact->message, true);
            unset ($contact->message);
            $contact->message = $messageArray;
        }

        try {
            Mail::send(new ClientRequest($contact));
            if ($contact->source == 'layout1.contact.form' || $contact->source == 'layout1.flowform') {
                Mail::send(new InquiryResponse($contact));
            }
        } catch (Exception $e) {
            Log::error('Contact form failure, mail was not sent', ['error_message' => $e->getMessage()]);
        }

        return response()->json(['ok' => $contact], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $Contact)
    {
        return ContactResource::make($Contact);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $Contact)
    {
        //
    }
}
