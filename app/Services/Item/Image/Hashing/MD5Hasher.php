<?php
declare(strict_typesr = 1);

namespace App\Services\Item\Image\Hashing;

class MD5Hasher implements Hasher
{
    public function make(string $pathToFile)
    {
        return md5_file($pathToFile);
    }
}
