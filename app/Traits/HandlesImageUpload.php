<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait HandlesImageUpload
{
    /**
     * Upload an image to public/uploads directory.
     *
     * @param UploadedFile $file
     * @param string|null $oldPath
     * @param string $folder
     * @return string Relative path from public folder
     */
    public function uploadImage(UploadedFile $file, ?string $oldPath = null, string $folder = 'uploads'): string
    {
        $destinationPath = public_path($folder);
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Delete old file if it is in uploads directory
        if ($oldPath && str_starts_with($oldPath, 'uploads/') && file_exists(public_path($oldPath))) {
            @unlink(public_path($oldPath));
        }

        $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        return $folder . '/' . $filename;
    }
}

