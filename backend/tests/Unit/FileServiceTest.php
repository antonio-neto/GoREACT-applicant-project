<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\File;
use App\Services\FileService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Requests\CreateFileRequest;

class FileServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_without_file_fails()
    {
        $id = -1;
        $file = factory(File::class)->create();
        $result = (new FileService())->delete($id);
        $this->assertTrue($result);
    }

    public function test_add_file_succeeds()
    {
        $file = vfsStream::setup(public_path(FileService::DIRECTORY_TO_SAVE_FILES), null, ['goreact.jpg' => '']);
        $request = new CreateFileRequest;
        $request->title = 'test title';
        $request->description = 'test description';
        $request->tags = 'test tag';
        $request->file = 'test tag';
        $file = factory(File::class)->create();
        $result = (new FileService())->delete($id);
        $this->assertTrue($result);
    }
}
