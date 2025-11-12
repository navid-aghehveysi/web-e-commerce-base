<?php

namespace App\Http\Services\Image;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;


class ImageToolsService
{
    protected $DS = DIRECTORY_SEPARATOR;
    protected $image;
    protected $exclusiveDirectory;
    protected $imageDirectory;
    protected $imageName;
    protected $imageFormat;
    protected $finalImageName;
    protected $finalImageDirectory;

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getExclusiveDirectory()
    {
        return $this->exclusiveDirectory;
    }
    public function setExclusiveDirectory($exclusiveDirectory): void
    {
        $this->exclusiveDirectory = trim($exclusiveDirectory, '/\\');
    }

    public function getImageDirectory()
    {
        return $this->imageDirectory;
    }
    public function setImageDirectory($imageDirectory): void
    {
        $this->imageDirectory = trim($imageDirectory, '/\\');
    }

    public function getImageName()
    {
        return $this->imageName;
    }
    public function setImageName($imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageFormat()
    {
        return $this->imageFormat;
    }
    public function setImageFormat($imageFormat): void
    {
        $this->imageFormat = $imageFormat;
    }

    public function getFinalImageDirectory()
    {
        return $this->finalImageDirectory;
    }
    public function setFinalImageDirectory($finalImageDirectory): void
    {
        $this->finalImageDirectory = trim($finalImageDirectory, '/\\');
    }

    public function getFinalImageName()
    {
        return $this->finalImageName;
    }

    /**
     * @param $finalImageName
     * @return void
     */
    public function setFinalImageName($finalImageName): void
    {
        $this->finalImageName = $finalImageName;
    }


    /**
     * @return bool
     */
    public function setCurrentImageName(): bool
    {

        // getClientOriginalName() == in php_pure => $_FILES['image']['name']
        $originalImageName = pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME);
        if (!($this->image instanceof UploadedFile)) {
            return false;
        }

        $this->setImageName($originalImageName);
        return true;
    }


    /**
     * @param $imageDirectory
     * @return void
     */
    protected function checkDirectory($imageDirectory): void
    {
        try {
            if (!File::exists($imageDirectory)) {
                mkdir($imageDirectory, 0777, true);
            }
        } catch (\Throwable $e) {
            logger()->error("Error creating directory: " . $e->getMessage());
            throw new \RuntimeException("سطح دسترسی برای ایجاد مسیر در دارکتوری components وجود ندارد");
        }
    }

    public function getImageAddress(): string
    {
        return $this->getFinalImageDirectory() . $this->DS . $this->getFinalImageName();
    }

    public function provider(): bool
    {
        // set properties
        $imageName = time();
            $this->getImageName() ?? $this->setImageName($imageName);

        $imageFormat = $this->image->getClientOriginalExtension();
            $this->getImageFormat() ?? $this->setImageFormat($imageFormat);

        $imageDirectory = date('Y') . $this->DS . date('m') . $this->DS . date('d');
            $this->getImageDirectory() ?? $this->setImageDirectory($imageDirectory);

        // set final image name
        $finalImageName = $this->getImageName() . '.' . $this->getImageFormat();
        $this->setFinalImageName($finalImageName);

        // set final image directory
        $finalImageDirectory = empty($this->getExclusiveDirectory())
            ? $this->getImageDirectory()
            : $this->getExclusiveDirectory() . $this->DS . $this->getImageDirectory();
        $this->setFinalImageDirectory($finalImageDirectory);

        // check and create final image directory
        $this->checkDirectory($this->getFinalImageDirectory());

        return true;
    }


}
