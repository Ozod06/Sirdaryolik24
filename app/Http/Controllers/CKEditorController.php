<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $orginName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($orginName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $url = asset('images/' . $fileName);

            return response()->json([
                'uploaded' => true,
                'url' => $url,
                ]);
        }
        return response()->json([
            'uploaded' => false,
            'error' => ['message' => 'Upload error'],
        ]);

    }
}
