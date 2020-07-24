<?php

namespace App\Services\Contracts;

use App\Requests\CreateFileRequest;

interface iFileService
{
    public function get(string $search = null);
    public function add(CreateFileRequest $request);
    public function delete(int $id);
}