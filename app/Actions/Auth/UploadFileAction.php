<?php


namespace App\Actions\Auth;

use App\Models\Asset;
use App\Exceptions\Assets\ErrorUploadException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadFileAction
{

    /**
     * @var \Illuminate\Contracts\Filesystem\Filesystem|\Illuminate\Filesystem\FilesystemAdapter
     */
    protected $storage;

    /**
     * @param  array  $uploadedFile
     * @param  string  $disk
     * @return null|Asset|\Illuminate\Support\Collection
     * @throws ErrorUploadException
     */
    public function execute($uploadedFile, string $disk = null)
    {
        if (is_array($uploadedFile)) {
            return collect($uploadedFile)
                ->filter(function ($file) {
                    return $file instanceof UploadedFile;
                })
                ->map(function ($file) use ($disk) {
                    return $this->upload($file, $disk);
                });
        }
        if ($uploadedFile instanceof UploadedFile) {
            return $this->upload($uploadedFile, $disk);
        }

        return null;
    }

    /**
     * @param  UploadedFile  $uploadedFile
     * @param  string  $disk
     * @return Asset
     * @throws ErrorUploadException
     */
    private function upload(UploadedFile $uploadedFile, string $disk = null)
    {
        $attributes = [
            'name' => $uploadedFile->getClientOriginalName(),
            'disk' => $disk ? $disk : config('filesystems.default')
        ];
        $values = [
            'mime_type' => $uploadedFile->getClientMimeType(),
            'size' => $uploadedFile->getSize(),
        ];
        $asset = Asset::firstOrNew($attributes, $values);
        $this->storage = Storage::disk($asset->disk);

        if ($asset->exists) {
            $asset = $asset->replicate();
            $timestamp = now()->timestamp;
            $pathinfo = pathinfo($uploadedFile->getClientOriginalName());
            $asset->name = sprintf('%s_%s.%s', $pathinfo['filename'], $timestamp, $pathinfo['extension']);
        }

        // Handle file upload
        $path = $this->storage->putFileAs($this->getPathUpload(), $uploadedFile, $asset->name);
        if (!$path) {
            throw ErrorUploadException::create($uploadedFile);
        }
        $asset->path = $path;
        $asset->save();
        return $asset;
    }

    protected function getAssetInstance(UploadedFile $uploadedFile)
    {

    }

    private function getPathUpload(): string
    {
        return 'uploads/'.now()->format('Y/m/d');
    }
}
