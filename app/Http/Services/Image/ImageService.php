<?php

namespace App\Http\Services\Image;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RuntimeException;
use Throwable;

class ImageService extends ImageToolsService
{

    /**
     * @param $image
     * @return false|string
     */
    public function save($image): false|string
    {
        // set image
        $this->setImage($image);

        // execute provider
        $this->provider();

        // save image
        /**
         * $image->getRealPath() = $_FILES['image']['tmp_name']
         */
        $result = Image::make($image->getRealPath())
            ->save(public_path($this->getImageAddress()) , null , $this->getImageFormat());
        return $result ?  $this->getImageAddress() : false;
    }

    /**
     * @param $image
     * @param int $width
     * @param int $height
     * @return false|string
     */
    public function fitAndSave($image ,int $width ,int $height): false|string
    {
        // set image
        $this->setImage($image);

        // execute provider
        $this->provider();

        // save image
        $result = Image::make($image->getRealPath())
            ->fit($width, $height)
            ->save(public_path($this->getImageAddress()) , null , $this->getImageFormat());

        return $result ?  $this->getImageAddress() : false;
    }

    /**
     * @param $image
     * @return false|array
     */
    public function createIndexAndSave($image): false|array
    {

        // set image
        $this->setImage($image);

        // set directory
        $imageDirectory = date('Y') . $this->DS . date('m') . $this->DS . date('d') . $this->DS . time();
        $this->getImageDirectory() ?? $this->setImageDirectory($imageDirectory);

        // set image name
        $this->getImageName() ?? $this->setImageName(time());
        $tmpImageName = $this->getImageName();

        $indexArray = [];
        //get data from config
        $imageSizes = config::get('image.index-image-sizes');
//        dd($imageSizes);

        foreach ($imageSizes as $imageSizeName => $imageSizeValue) {

            $currentImageName = $tmpImageName . '_' . $imageSizeName;
            $this->setImageName($currentImageName);

            // execute provider
            $this->provider();

            // save image
            try {
                Image::make($image->getRealPath())
                    ->fit($imageSizeValue['width'], $imageSizeValue['height'])
                    ->save(public_path($this->getImageAddress(), null , $this->getImageFormat()));

                $indexArray[$imageSizeName] = $this->getImageAddress();

            }
            catch (Throwable $e) {
                $tmp['directory'] = public_path($this->getFinalImageDirectory());
                $this->deleteIndex($tmp);
                throw new RuntimeException('موقع آپلود عکس خطایی رخ داده است  این مورد می تواند خطای منطقی برنامه نویس باشدو در رابطه با سطح دسترسی ها نیست');
            }
        }
        $images['indexArray'] = $indexArray;
        $images['directory'] = $this->getFinalImageDirectory();
        $images['currentImage'] = Config::get('image.default-current-index-image');

        return $images;
    }

    /**
     * @param $image
     * @return bool
     */
    public function deleteImage($image): bool
    {
        try {
            $image = public_path($image);
            if(File::exists($image)) {
                if(!File::delete($image)) {
                    throw new RuntimeException('فایل حذف نشد');
                }
                return true;
            }else {
                return false;
            }
        }
        catch (Throwable $e) {
            logger()->error("Error creating directory: " . $e->getMessage());
            throw new RuntimeException('در زمان حذف تصویر خطایی رخ داده است');
        }
    }

    /**
     * @param $image
     * @return bool
     */
    public function deleteIndex($image): bool
    {

        $directory = $image['directory'];

        if(File::exists($directory)) {

            if(!$this->deleteDirectoryAndFiles($directory)) {
                return false;
            }

            if(!$this->deleteParentDirectoriesUntilImages($directory)) {
                return false;
            }
        }
        return true;
    }
//
//    components function deleteDirectoryAndFiles($directory): bool
//    {
//
//        $files = glob($directory . $this->DS . '*', GLOB_MARK);
//        foreach ($files as $file) {
//
//            if(File::isDirectory($file)) {
//                $this->deleteDirectoryAndFiles($file);
//            }
//            else {
//                File::delete($file);
//            }
//        }
//        return rmdir($directory);
//    }

    public function deleteDirectoryAndFiles($directory): bool
    {

        if(!File::isDirectory($directory)) {
            return false;
        }

        $files = glob($directory . $this->DS . '*', GLOB_MARK);


        foreach ($files as $file) {
            if (File::isDirectory($file)) {
                $this->deleteDirectoryAndFiles($file);
            } else {
                unlink($file);
            }
        }

        return rmdir($directory);
    }
    public function deleteParentDirectoriesUntilImages($directory): bool
    {
        $parent = dirname($directory);
        while($parent !== $directory) {
            if(basename($parent) == 'images') {
                break;
            }
            if ($this->isDirectoryEmpty($parent)) {
                rmdir($parent);
                $directory = $parent;
                $parent = dirname($parent);
            } else {
                break;
            }
        }
        return true;

    }
    private function isDirectoryEmpty(string $directory): bool
    {
        return count(scandir($directory)) === 2; // فقط '.' و '..'
    }

}
