<?php


namespace App\Domain\Shared\Controllers;

use App\Domain\Shared\Filters\ContactFilter;
use App\Domain\Shared\Models\Contact;
use App\Domain\Shared\Transformers\ContactTransformer;
use App\Domain\Support\ApiController;
use Illuminate\Http\Request;

class ContactController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param ContactFilter $contactFilter
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, ContactFilter $contactFilter)
    {
        return $this->httpOK(Contact::query()->filter($contactFilter)->paginate(), ContactTransformer::class);
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
