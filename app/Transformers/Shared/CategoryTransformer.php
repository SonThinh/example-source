<?php


namespace App\Transformers\Shared;

use App\Models\Category;
use Flugg\Responder\Transformers\Transformer;

class CategoryTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * A list of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param Category $category
     * @return array
     */
    public function transform(Category $category): array
    {
        return [
            'id' => (string)$category->id,
            'category_type' => (string)$category->category_type,
            'display_name' => (string)$category->display_name,
            'display_order' => (int)$category->display_order,
        ];
    }
}
