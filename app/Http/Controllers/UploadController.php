<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $file_path = public_path('../uploads/source/'.$request->path);
        return response()->file($file_path);
    }

    public function product($file)
    {
        //
        $file_path = public_path('../uploads/product/'.$file);
        return response()->file($file_path);
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
        $extheader = $request->file('file')->getClientOriginalExtension();
        $filename = time().'.'.$extheader;
        $request->file('file')->move('../uploads/source/'.$request->path, $filename);
        return response()->json(['success' => $filename]);
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
        $file = File::find($id);
        try {
            $file_path = public_path('../uploads/source/'.$file->file_location);
            return response()->file($file_path);
        } catch (\Exception $e) {
            return null;
        }
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

    public function find(Request $request)
    {
        $main_path = public_path('../uploads/source/');
        $file_path = public_path('../uploads/source/'.$request->path);

        try {
            $files = FacadesFile::files($file_path);
            $dirs = FacadesFile::directories($file_path);
            return view('file.find', [
                'main_path' => $main_path, 'file_path' => $file_path, 'files' => $files, 'dirs' => $dirs
            ]);
            return [$files, $dirs];
        } catch (\Throwable $th) {
            return 0;
        }
    }
}
