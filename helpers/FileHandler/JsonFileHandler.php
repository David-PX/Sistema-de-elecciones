<?php

class JsonFileHandler implements IFileHandler
{

    public $directory;
    public $fileName;

    public function __construct($fileName, $directory)
    {
        $this->directory = $directory;
        $this->fileName = $fileName;
    }

    public function CreateDirectory()
    {
        if (!file_exists($this->directory)) {
            mkdir($this->directory, 0777, true);
        }
    }

    public function SaveFile($value)
    {

        $this->CreateDirectory();

        $path = $this->directory . '/' . $this->fileName . '.json';

        $serializeData = json_encode($value);

        file_put_contents($path, $serializeData);

    }

    public function ReadFile()
    {

        $this->CreateDirectory();

        $path = $this->directory . '/' . $this->fileName . '.json';

        if (file_exists($path)) {
            $contents = file_get_contents($path);
            return json_decode($contents);
        } else {
            return false;
        }

    }

    public function ReadConfiguration()
    {

        $path = $this->directory . '/' . $this->fileName . '.json';

        if (file_exists($path)) {
            $contents = file_get_contents($path);
            return json_decode($contents);
        } else {
            return false;
        }

    }

}
