<?php

namespace App\Http\Controllers;

use App\Helper\RazkyFeb;
use App\Models\Blog;
use App\Models\Creator;
use App\Models\News;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PodcastController extends Controller
{
    public function viewManage()
    {
        $datas  = Podcast::all();
        return view('podcast.manage')->with(compact("datas"));
    }
    public function viewCreate()
    {
        return view('podcast.create');
    }

    public function store(Request $request)
    {
        $data = new Podcast();
        $data->title = $request->name;
        $data->artist = $request->artist;
        $data->desc = $request->desc;
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;

            $savePath = "/web_files/podcast_photo/";
            $savePathDB = "$savePath$fileName";
            $path = public_path() . "$savePath";
            $file->move($path, $fileName);

            $photoPath = $savePathDB;
            $data->photo = $photoPath;
        }

        if ($request->hasFile('music')) {

            $file = $request->file('music');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;

            $savePath = "/web_files/podcast_music/";
            $savePathDB = "$savePath$fileName";
            $path = public_path() . "$savePath";
            $file->move($path, $fileName);

            $photoPath = $savePathDB;
            $data->music = $photoPath;
        }


        if ($data->save()) {
            //redirect dengan pesan sukses
            return redirect('podcast/create')->with(['success' => 'Podcast Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect('podcast/create')->with(['error' => 'Podcast Gagal Disimpan!']);
        }
    }

    public function destroy($id)
    {
        $blog = Podcast::findOrFail($id);


        $path = public_path() . $blog->photo;
        $path2 = public_path() . $blog->music;

        RazkyFeb::removeFile($path);
        RazkyFeb::removeFile($path);


        if ($blog->delete()) {
            //redirect dengan pesan sukses
            return redirect('creator/manage')->with(['success' => 'Anggota Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect('creator/manage')->with(['error' => 'Anggota Gagal Dihapus!']);
        }
    }


}
