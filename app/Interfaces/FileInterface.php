<?php

namespace App\Interfaces;

use GrahamCampbell\Flysystem\FlysystemManager;

interface FileInterface
{
    public function getIconAttribute();
    public function streamFile();
    public function getViewAttribute();
}