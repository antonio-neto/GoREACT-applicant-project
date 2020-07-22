<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\File;
use App\ViewModels\FileViewModel;

class FileController extends Controller
{
    private $objUsers;
    private $objFiles;

    public function __construct()
    {
        $this->objUser = new User();
        $this->objFile = new File();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($this->objFile->all());
        // dd($this->objUser->all());

        $file = $this->objFile->all()->sortBy('file_name');
        return view('index', compact('file'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFiles()
    {
        $files = $this->objFile->all()->sortBy('file_name');
        $filesCount = $files->count();
        $filesResult = array($filesCount);
        for($auxFile = 0; $auxFile < $filesCount; $auxFile++){
          $filesResult[$auxFile] = new FileViewModel($files[$auxFile]);
        }

        return $filesResult;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
