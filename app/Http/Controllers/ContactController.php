<?php


namespace App\Http\Controllers;

use App\Filters\ContactFilter;
use App\Models\Contact;
use App\Sorts\Shared\ContactSort;
use App\Transformers\Shared\ContactTransformer;
use Illuminate\Http\Request;

class ContactController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param ContactFilter $contactFilter
     * @param ContactSort $contactSort
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, ContactFilter $contactFilter, ContactSort $contactSort)
    {
        return $this->httpOK(Contact::query()->filter($contactFilter)->sortBy($contactSort)->paginate(), ContactTransformer::class);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Contact $contact
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Contact $contact)
    {
        return $this->httpOK($contact, ContactTransformer::class);
    }
}
