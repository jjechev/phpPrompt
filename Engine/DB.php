<?php

class DB
{

    private $data = array();
    private $file = __DIR__ . "/../Local/db.json";
    private static $instence;

    /**
     * 
     * @return self
     */
    public static function getInstance()
    {
        if (!self::$instence) {
            self::$instence = new self();
        }

        return self::$instence;
    }

    private function __construct()
    {
        $this->loadFile();
    }

    public function __destruct()
    {
        $this->saveFile();
    }

    public function set($name, $data)
    {
        $this->data[$name] = $data;
    }

    public function edit($name, $data)
    {
        $this->data[$name] = $data;
    }

    public function get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
        return '';
    }

    public function getAll()
    {
        return $this->data;
    }

    public function save()
    {
        $this->saveFile();
    }

    public function delete($value)
    {
        if (isset($this->data[$value])) {
            unset($this->data[$value]);
        }
    }

    private function loadFile()
    {
        if (file_exists($this->file)) {
            $this->data = json_decode(file_get_contents($this->file), true);
        }
    }

    private function saveFile()
    {
        file_put_contents($this->file, json_encode($this->data));
    }

}
