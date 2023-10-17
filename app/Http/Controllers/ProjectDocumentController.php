<?php

namespace App\Http\Controllers;

use App\Helpers\FileDocuments;
use App\Models\ProjectDocument;
use App\Models\ProjectInitiation;
use Illuminate\Http\Request;

class ProjectDocumentController extends Controller
{
    public function store(Request $request, $id)
    {

        $request->validate([
            'keyword' => 'unique:project_documents,keyword',

        ], [
            'keyword.unique' => "Upload Failed! The keyword is already in use. Please use unique keyword",

        ]);

        $project_initiation = ProjectInitiation::where('id', $id)->first();
        $uploadedDocument = FileDocuments::uploadDocument($request->keyword, $request->document);
        ProjectDocument::create([
            'project_category_id' => $project_initiation->project_category->id,
            'project_initiation_id' => $project_initiation->id,
            'keyword' => $request->keyword,
            'document' => $uploadedDocument,
        ]);
        toastr()->success('Project document uploaded successfully!', 'Congrats');
        return redirect()->back();
    }

    public function delete($id)
    {

        $document = ProjectDocument::find($id);
        $document->delete();
        toastr()->success('Documents deleted successfully!', 'Congrats');
        return redirect()->back();
    }
}
