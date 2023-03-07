<?php

if (!function_exists('includeRouteFiles')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

/**
 * @param $str
 * @return null|string|string[]
 */
function convertToEnglish($str)
{
    // lowercase
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);

    // uppercase
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    return $str;
}

/**
 * Get Extension of Filename
 * @param $filename
 * @return mixed
 */
function getExtensionFile($filename)
{
    $arrName = explode(".", $filename);
    return end($arrName);
}

/**
 * @param $file
 * @param $folder
 * @return mixed
 */
function saveFileToS3($file, $folder)
{
    $baseFilename = dechex(microtime(true) * 10000) . str_random(8);
    $storage = \Storage::disk('s3');

    $ext = getExtensionFile($file->getClientOriginalName());
    $path = $folder . $baseFilename . '.' . $ext;
    $storage->put($path, file_get_contents($file), 'public');
    return $storage->url($path);
}

/**
 * @param $file
 * @param $folder
 * @return mixed
 */
function saveImageBase64ToS3($file, $folder)
{
    $baseFilename = dechex(microtime(true) * 10000) . str_random(8) . '.png';
    $storage = \Storage::disk('s3');

    $path = $folder . $baseFilename;
    $storage->put($path, $file, 'public');
    return $storage->url($path);
}

/**
 * Upload image only
 * @param $file
 * @param $folder
 * @return mixed
 */
function resizeAndSaveImageToS3($file, $folder)
{
    $baseFilename = dechex(microtime(true) * 10000) . str_random(8);
    $ext = getExtensionFile($file->getClientOriginalName());
    $fileNane = $baseFilename . '.' . $ext;
    $temporaryFilePath = storage_path('app/public/' . $fileNane);
    Image::make($file)->widen(400)->save($temporaryFilePath, 60);
    $path = $folder . $fileNane;
    $storageS3 = \Storage::disk('s3');
    $storageS3->put($path, file_get_contents($temporaryFilePath), 'public');

    if(file_exists($temporaryFilePath)){
        unlink($temporaryFilePath);
    }

    return $storageS3->url($path);
}
