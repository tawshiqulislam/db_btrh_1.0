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

        // $request->validate([
        //     'keyword' => [
        //         Rule::unique('project_documents', 'keyword')->where('project_initiation_id', $id),
        //     ],
        // ], [
        //     'keyword.unique' => "Upload Failed! The keyword is already in use. Please use a unique keyword",
        // ]);

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

    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'keyword' => [
        //         Rule::unique('project_documents')->ignore($id),
        //     ],
        // ], [
        //     'keyword.unique' => "Upload Failed! The keyword is already in use. Please use a unique keyword",
        // ]);

        $project_document = ProjectDocument::find($id);
        $data = $request->except('_token');
        if ($request->hasFile('document')) {
            // Handle profile picture upload and update
            FileDocuments::unlinkDocument($project_document->document);
            $data['document'] = FileDocuments::uploadDocument($request->keyword, $request->document);
        }
        $project_document->update($data);
        toastr()->success('Project documents updated successfully!', 'Congrats');
        return redirect()->back();
    }
}
