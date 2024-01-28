<?php

namespace App\Services;

class UtilService
{

    /**
     * Upload file and return file name.
     *
     * @param $file
     * @param string $folder
     * @return string
     */
    public function uploadFile($file, string $folder = 'images'): string
    {
        $fileName = rand() . '' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $fileName);
        return $fileName;
    }

    /**
     * Remove empty objects from array.
     *
     * @param $array
     * @return array
     */
    public function removeEmptyObjectsFromArray($array): array
    {
        return array_filter($array, function ($value) {
            return !empty($value);
        });
    }

    public static function getAllUserRoles(): array
    {
        return ['ADMIN'];
    }
}
