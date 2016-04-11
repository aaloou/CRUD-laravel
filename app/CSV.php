<?php

namespace App;

class CSV
{
    protected $filename;
    protected $path;
    protected $file;
    private $mode = 'a+';
    private $error;
    private $content;

    public function __construct($fn, $path = '')
    {
        $this->path = $path;
        $this->filename = $fn;
        $this->openFile();
        if ($this->isOK()) {
            $this->loadFresh();
        }
    }

    protected function completePath()
    {
        return $this->path.'/'.$this->filename;
    }

    protected function openFile()
    {
        try {
            $fp = fopen($this->completePath(), $this->mode);
            if (!$fp) {
                throw new Exception('File open failed.');
            }
            $this->file = $fp;
            $this->error = null;

          // send success JSON
        } catch (Exception $e) {
            $this->error = $e;
        }
    }

    public function isOK()
    {
        return $this->error == null;
    }

    protected function loadFresh()
    {
        if (!$this->isOK()) {
            return;
        }
        fseek($this->file, 0);
        $this->content = [];
        while (!feof($this->file)) {
            $record = fgetcsv($this->file);
            if (!$record) {
                continue;
            }
            $this->content[] = $record;
        }
        $this->content = array_reverse($this->content);

        return $this->content;
    }

    public function delete($row)
    {
        if (isset($this->content)) {
            if (isset($this->content[$row])) {
                unset($this->content[$row]);

                return true;
            }

            return false;
        }

        return false;
    }

    public function all()
    {
        if (isset($this->content)) {
            return $this->content;
        } else {
            return $this->loadFresh();
        }
    }

    public function commit()
    {
        if (!$this->isOK() || !isset($this->content)) {
            return false;
        }
        fclose($this->file);
        unlink($this->completePath());
        $this->openFile();
        if (!$this->isOK()) {
            return false;
        }
        foreach ($this->content as $value) {
            fputcsv($this->file, $value);
        }
        $this->loadFresh();

        return true;
    }

    public function update($key, $value)
    {
        if (isset($this->content[$key])) {
            unset($this->content[$key]);
            $this->content[$key] = $value;

            return true;
        } else {
            return false;
        }
    }

    public function add($value)
    {
        $this->content[] = $value;
    }
}
