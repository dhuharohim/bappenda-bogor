<?php

namespace App\Http\Controllers;

use App\Models\DocumentAct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentActController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $file = $request->file("document");

   // get username for file path (if user directory doesn't exist, Storage gonna create it)
   $username = $request->user()->fullname;

   // make file name unique
   $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
   $realName = Str::slug($file_name); // it makes seo frendly
   $extension = $file->getClientOriginalExtension();
   $newFileName = $username."/".$realName . "-" . time() . "." . $extension;

   // store document on db (make sure these columns fillable on model or it throws error)
   $request->user()->documents()->create([
        "name"=>$file_name,
        "path"=>$newFileName, 
        "type"=>"document"
      ]); 
   // move uploaded file
   Storage::disk("locale")->put($newFileName,file_get_contents($file));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentAct  $documentAct
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentAct $documentAct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentAct  $documentAct
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentAct $documentAct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentAct  $documentAct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentAct $documentAct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentAct  $documentAct
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentAct $documentAct)
    {
        //
    }
}
