<?php


namespace App\Http\Controllers;



use App\Filters\PostFilter;
use App\Models\Post;
use App\Sorts\Posts\PostSort;
use App\Requests\Posts\CreatePostRequest;
use App\Requests\Posts\UpdatePostRequest;
use App\Transformers\Posts\PostTransformer;
use App\Actions\Posts\CreatePostAction;
use App\Actions\Posts\UpdatePostAction;
use Illuminate\Http\Request;

class PostController extends ApiController
{

    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param PostFilter $postFilter
     * @param PostSort $postSort
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, PostFilter $postFilter, PostSort $postSort)
    {
        return $this->httpOK(Post::query()->filter($postFilter)->sortBy($postSort)->simplePaginate($request->query('per_page')), PostTransformer::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     * @param CreatePostAction $action
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function store(CreatePostRequest $request, CreatePostAction $action)
    {
        $post = $action->execute($request->validated());
        return $this->httpCreated($post, PostTransformer::class);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function show(Post $post)
    {
        return $this->httpOK($post, PostTransformer::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @param UpdatePostAction $action
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function update(UpdatePostRequest $request, Post $post, UpdatePostAction $action)
    {
        $action->execute($post, $request->validated());
        return $this->httpNoContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Post $post
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        return $this->httpNoContent();
    }
}
