<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\MediaFolder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MediaAdminController extends Controller
{
    public function index(): View
    {
        $folders = MediaFolder::all();
        $mediaItems = Media::latest()->paginate(24);
        return view('admin.media.index', compact('folders', 'mediaItems'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:jpeg,jpg,png,webp,svg,pdf', 'max:10240'],
            'alt_text' => ['nullable', 'string', 'max:255'],
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/media', $filename, 'public');

        Media::create([
            'filename' => $filename,
            'file_path' => 'storage/' . $path,
            'disk' => 'public',
            'mime_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
            'alt_text' => $request->input('alt_text', $file->getClientOriginalName()),
            'title' => $file->getClientOriginalName(),
        ]);

        return redirect()->back()->with('success', 'Media asset uploaded successfully.');
    }

    public function destroy(Media $media): RedirectResponse
    {
        $media->delete();
        return redirect()->back()->with('success', 'Media asset deleted.');
    }
}
