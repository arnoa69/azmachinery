<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Devio\Pipedrive\Pipedrive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Lang;
use App\Mail\ClientRequest;
use App\Mail\InquiryResponse;
use Carbon\Carbon;
use Exception;
use Inertia\Inertia;
use Illuminate\Support\Facades\App;

class ContactController extends Controller
{
    public function submit(Request $request) {

        try {
            $token = config('services.pipedrive.token');
            $pipedrive = new Pipedrive($token);

            $name = $request->name ?: "Trouver le nom du prospect";
            $email = $request->email ?: "...que le numero de telephone";
            $phone = $request->phone_number ?: "000 000 000";
            $company = $request->company_name;
            $message = $request->message ? config('app.url'). ':' . $request->message : "origin formulaire min. sans message";
            $locale = $request->locale;
            $source = $request->source;

            $contact = new Contact();

            //save to db
            $contact->name = $name;
            $contact->email = $email;
            $contact->phone_number = $phone;
            $contact->company_name = $company;
            $contact->message = $message;
            $contact->locale = $locale;
            $contact->source = $source;
            $contact->save();


            $organization = $pipedrive->organizations()->add([
                'name'=> $company,
                'label'=> 8
            ]);

            $org_id = $organization->getData()->id;
            $person = $pipedrive->persons()->add([
                'name'=> $name,
                'email'=> $email,
                'phone'=> $phone,
                'org_id'=> $org_id
            ]);

            $person_id = $person->getData()->id;
            $deal = $pipedrive->deals()->add([
                'title'=> 'CALL BACK - '.$name,
                'person_id'=> $person_id,
                // 'status'=> 1,
                // 'channel'=> 41,
                'visible_to'=> 3,
                'org_id'=> $org_id
            ]);

            // $deal_id = $deal->getData()->id;
            // $note = $pipedrive->notes()->add([
            //     'content'=> $message,
            //     'deal_id'=> $deal_id,
            //     'org_id'=> $org_id
            // ]);

            //Mail::send(new ClientRequest($contact));

            return redirect()->back()->with('success','');

        } catch (Exception $e) {
            Log::error('Pipedrive API error: ' . $e->getMessage());
        }

        // Lang::setLocale($contact->locale);

        // try {
        //     Mail::send(new ClientRequest($contact));
        //     if ($contact->source == 'layout1.contact.form') {
        //         Mail::send(new InquiryResponse($contact));
        //     }
        // } catch (Exception $e) {
        //     Log::error('Contact form failure, mail was not sent', ['error_message' => $e->getMessage()]);
        // }
        // return ['message' => 'success'];
        // return response()->json(['message' => 'success']);
    }

    public function contactFormShow()
    {
        return Inertia::render('ContactForm');
    }
    public function getQuoteFormShow()
    {
        return Inertia::render('GetQuoteForm');
    }
}
