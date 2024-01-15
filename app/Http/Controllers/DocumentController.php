<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
class DocumentController extends Controller
{
    public function index()
    {
        $document_lists = Document::orderBy('id','DESC')->get();
        return view('documents.index',['documents' => $document_lists]);
    }

    public function store(Request $request)
    {
        $createdAt = date('Y-m-d H:i:s');
		$this->validate($request, [
			'doc_file' => 'required|file|mimes:pdf'
		]);
		

		if ($request->hasFile('doc_file')) {

			$icon = $request->file('doc_file');
			$iconName = time() . '.' . $request->doc_file->extension();
			$request->doc_file->move(('pdf'), $iconName);
		} 
        $data = [
            'file' => $iconName
        ];
        Document::create($data);

        return \Redirect::route('documents.index')->with('success','Document Upload Successfully');
    }
}
