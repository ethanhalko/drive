<?php

namespace App\Models;

use App\Interfaces\FileInterface;
use GrahamCampbell\Flysystem\Facades\Flysystem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model implements FileInterface
{
    /**
     * @var string $abstractFile
     */
    protected $abstractFile;
    /**
     * @var string $name
     */
    protected $name;
    /**
     * @var string $path
     */
    protected $path;
    /**
     * @var string $type
     */
    protected $type;

    /**
     * @param $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->abstractFile = $file;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileAttribute()
    {
        return $this->abstractFile;
    }

    /**
     * @return string
     */
    public function getIconAttribute()
    {
        return 'far fa-file';
    }

    /**
     * @return string
     */
    public function streamFile()
    {
        return 'foo';
    }

    /**
     * Create temporary URL using s3 credentials
     * @return mixed
     */
    public function getUrlAttribute()
    {
        return Storage::temporaryUrl(
            $this->path, now()->addMinutes(5)
        );
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getViewAttribute()
    {
        $metaData = Flysystem::getMetaData($this->abstractFile);
        unset($metaData['metadata']);

        $data = "";

        foreach ($metaData as $key => $info) {
            $data .= $key . ': ' .  $info . PHP_EOL;
        }

        return view('partials.file', ['data' => $data]);
    }

    /**
     * @return mixed
     */
    public function getNameAttribute()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPathAttribute()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getTypeAttribute()
    {
        return $this->type;
    }

    /**
     * @param $metadata
     * @return $this
     */
    public function setMetadata($metadata)
    {
        $this->name = $metadata['basename']  ?? 'folder';
        $this->path = $metadata['path'] ?? 'path';
        $this->type = $metadata['mimetype'] ?? 'type';

        return $this;
    }
}