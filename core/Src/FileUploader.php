<?php

namespace Src;

use Illuminate\Database\Capsule\Manager as DB;

class FileUploader
{
    private $fileName;
    private $fileTempName;

    public function __construct($file)
    {
        $this->fileName = $file['name'];
        $this->fileTempName = $file['tmp_name'];
    }

    public function upload($destination)
    {
        $extension = pathinfo($this->fileName, PATHINFO_EXTENSION);

        $message = array();

        if (!empty($message)) {
            return $message;
        } else {
            $newFileName = uniqid() . '.' . $extension;
            $destination .= '/' . $newFileName;

            //Перемещение файла
            move_uploaded_file($this->fileTempName, $destination);

            if (!empty($message)) {
                return $message;
            } else {
                return $newFileName;
            }
        }
    }
}