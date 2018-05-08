<?php

namespace App\Models;

use App\Interfaces\FileInterface;
use GrahamCampbell\Flysystem\Facades\Flysystem;
use Illuminate\Database\Eloquent\Model;

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
     * @return string
     */
    public function getBasePathAttribute()
    {
        return 'http://s3-' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . '/' . $this->file;
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
        $this->name = $metadata['basename'];
        $this->path = $metadata['path'];
        $this->type = $metadata['mimetype'];

        return $this;
    }
}