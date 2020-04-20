<?php


namespace App\Domain\Shared\Controllers;

use App\Domain\Shared\Filters\CategoryFilter;
use App\Domain\Shared\Models\Category;
use App\Domain\Shared\Requests\CreateCategoryRequest;
use App\Domain\Shared\Requests\UpdateCategoryRequest;
use App\Domain\Shared\Sorts\CategorySort;
use App\Domain\Shared\Transformers\CategoryTransformer;
use App\Domain\Support\ApiController;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    public function __construct()
    {
        $this->authorizeResource(Category::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param CategoryFilter $categoryFilter
     * @param CategorySort $categorySort
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, CategoryFilter $categoryFilter, CategorySort $categorySort )
    {
        return $this->httpOK(Category::query()->filter($categoryFilter)->sortBy($categorySort)->paginate(), CategoryTransformer::class);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Category $category
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Category $category)
    {
        return $this->httpOK($category, CategoryTransformer::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategoryRequest $request
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function store(CreateCategoryRequest $request)
    {
        $admin = Category::create($request->validated());
        return $this->httpCreated($admin, CategoryTransformer::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return $this->httpNoContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Category $category
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Category $category)
    {
        $category->delete();
        return $this->httpNoContent();
    }
}
