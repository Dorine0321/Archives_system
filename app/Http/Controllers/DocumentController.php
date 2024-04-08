<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();

        return view('admin.layouts.pages.files', compact('documents'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $departments = Department::all();

        return view('admin.layouts.pages.upload-file', compact('categories', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|file|mimes:pdf,docx,xls,ppt,txt|max:8192',
        ]);
        
        //dd($request);
        $validatedData = $request->except('file', '_token');
        $validatedData['user_id'] = 1;

        $document = Document::create($validatedData);
        
        $file = $request->file('file');
        $fileType = $file->getClientMimeType();
        $fileSize = $file->getSize() / 1024;
        
        $filename = 'file_' . date('Ymd_His') . '.' . $file->getClientOriginalExtension();
        
        $path = $file->storeAs('public', $filename);
        
        $savedFilePath = Storage::url($path);
        
        $document->type = $fileType;
        $document->size = $fileSize;
        $document->file_path = $savedFilePath;

        if ($fileType == 'application/docx'){
            $document->image_path = asset('img/docx.png');
        }
        if ($fileType == 'application/xls'){
            $document->image_path = asset('img/xls.png');
        }
        /*if ($fileType == 'application/pdf'){
            $document->image_path = asset('img/pdf.png');
        }*/
        if ($fileType == 'application/ppt'){
            $document->image_path = asset('img/ppt.png');
        }
        
        $document->save();

        return redirect()->route('admin.files')->with('success', 'Data has been stored successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
