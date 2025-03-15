<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class fileHandler extends Controller
{
    /**
     * Handle file upload and save to database.
     */
    public function files(Request $request)
    {
        if (session()->has('adminmail')) {

            $request->validate([
                'topic' => 'required|string|max:255',
                'formFile' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048'
            ]);

            $topic = $request->input('topic');
            $file = $request->file('formFile');

            // Check if the topic already exists
            $num = Files::where('topic', 'like', '%' . $topic . '%')->count();

            if ($num > 0) {
                return view('exists');
            } else {
                // Store file
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/files', $filename);

                // Save file info in database
                Files::create([
                    'topic' => $topic,
                    'filename' => $filename,
                    'date' => now()->format('Y-m-d'),
                    'time' => now()->format('H:i:s')
                ]);

                return redirect('/admin_dashboard')->with('success', 'File uploaded successfully!');
            }
        } else {
            return redirect('/admin/login');
        }
    }

    /**
     * Delete a file from storage and database.
     */
    public function deleteFiles(Request $request)
    {
        if (session()->has('adminmail')) {
            $request->validate([
                'topicid' => 'required|integer',
                'filelink' => 'required|string'
            ]);

            $id = $request->input('topicid');
            $file = $request->input('filelink');

            // Delete from public directory
            $filePath = public_path('storage/files/' . $file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            // Delete from database
            Files::where('id', $id)->delete();

            return redirect('/admin_links')->with('success', 'File deleted successfully!');
        } else {
            return redirect('/admin/login');
        }
    }

    /**
     * Modify file information.
     */
    public function fileModify(Request $request)
    {
        if (session()->has('adminmail')) {
            $request->validate([
                'topicid' => 'required|integer',
                'topicname' => 'required|string',
                'filelink' => 'required|string'
            ]);

            $id = $request->input('topicid');
            $topic = $request->input('topicname');
            $fileName = $request->input('filelink');

            return view('admin.modify', ['id' => $id, 'name' => $topic, 'filename' => $fileName]);
        } else {
            return redirect('/admin/login');
        }
    }

    /**
     * Search file by topic name and return modification view.
     */
    public function fileModifyByTopicName(Request $request)
    {
        if (session()->has('adminmail')) {
            $request->validate([
                'topicName' => 'required|string'
            ]);

            $topic = $request->input('topicName');

            $file = Files::where('topic', 'like', '%' . $topic . '%')->first();

            if ($file) {
                return view('admin.modify', [
                    'id' => $file->id,
                    'name' => $file->topic,
                    'filename' => $file->filename
                ]);
            } else {
                return response()->json(['message' => 'No records found'], 404);
            }
        } else {
            return redirect('/admin/login');
        }
    }

    /**
     * Process file modification request.
     */
    public function fileModifyRequest(Request $request)
    {
        if (session()->has('adminmail')) {
            $request->validate([
                'topicid' => 'required|integer',
                'topic' => 'required|string',
                'formFile' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
                'filename' => 'required|string'
            ]);

            $id = $request->input('topicid');
            $topic = $request->input('topic');
            $newFile = $request->file('formFile');
            $oldFile = $request->input('filename');

            // Delete old file
            $oldFilePath = public_path('storage/files/' . $oldFile);
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }

            // Store new file
            $filename = time() . '_' . $newFile->getClientOriginalName();
            $newFile->storeAs('public/files', $filename);

            // Update record in database
            Files::where('id', $id)->update([
                'topic' => $topic,
                'filename' => $filename
            ]);

            return redirect('/admin_links')->with('success', 'File updated successfully!');
        } else {
            return redirect('/admin/login');
        }
    }
}
