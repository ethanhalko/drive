<?php

namespace App\Factories;

use App\Models\Audio;
use App\Models\File;
use App\Models\Image;
use App\Models\Text;
use App\Models\Video;
use GrahamCampbell\Flysystem\FlysystemManager;

class FileFactory
{

    const supportedTypes = [
        'image' => Image::class,
        'text'  => Text::class,
        'audio' => Audio::class,
        'video' => Video::class,
    ];

    /**
     * @var FlysystemManager $flysystem
     */
    protected $flysystem;

    /**
     * FileFactory constructor.
     * @param FlysystemManager $flysystem
     */
    public function __construct(FlysystemManager $flysystem)
    {
        $this->flysystem = $flysystem;
    }

    /**
     * Generate new class based on MIME type
     *
     * @param $filePath
     * @return File
     */
    public function create($filePath)
    {
        $file                 = $this->flysystem->get($filePath);
        $metadata             = $file->getMetadata();
        $metadata['mimetype'] = static::getType($file);

        $type = self::supportedTypes[$metadata['mimetype']] ?? File::class;

        /**
         * @var File $fileObject
         */
        $fileObject = new $type;
        $fileObject->setFile($filePath);
        $fileObject->setMetadata($metadata);


        return $fileObject;
    }

    /**
     * Take the "main" MIME type from combined type/subtype
     *
     * @param $file
     * @return mixed
     */
    private function getType($file)
    {
        $type = $file->getMimeType();

        return explode('/', $type, 2)[0];
    }
}