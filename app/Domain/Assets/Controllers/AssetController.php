<?php


namespace App\Domain\Assets\Controllers;


use App\Domain\Assets\Actions\UploadFileAction;
use App\Domain\Assets\Models\Asset;
use App\Domain\Assets\Requests\UploadAssetRequest;
use App\Domain\Assets\Transformers\AssetTransformer;
use App\Domain\Support\ApiController;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AssetController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->httpOK(Asset::paginate(), AssetTransformer::class);
    }

    /**
     * @param  string  $path
     * @return mixed
     */
    public function show(string $path)
    {
        $asset = Asset::wherePath($path)->firstOrFail();
        return Image::make(Storage::disk($asset->disk)->path($asset->path))->response();
    }

    /**
     * Upload a asset to server
     *
     * @param  UploadAssetRequest  $request
     * @param  UploadFileAction  $action
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \App\Domain\Assets\Exceptions\ErrorUploadException
     */
    public function upload(UploadAssetRequest $request, UploadFileAction $action)
    {
        $assets = $action->execute($request->file('assets'));
        return $this->httpOK($assets, AssetTransformer::class);
    }
}
