<?php

namespace App\Http\Support\Contracts;

interface StorageInterface
{
    public function get($index);

    public function set($index,$value);

    public function all();

    public function exists($index);

    public function undoset($index);

    public function clear();
}