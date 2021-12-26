<?php

namespace App\Http\Controllers;

use App\Helper\RazkyFeb;
use App\Models\Blog;
use App\Models\Creator;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreatorController extends Controller
{
    public function viewManage()
    {
        $datas = Creator::all();
        return view('creator.manage')->with(compact("datas"));
    }

    public function viewCreate()
    {
        return view('creator.create');
    }
    public function edit($id)
    {
        $data = Creator::find($id);
        return view('creator.edit')->with(compact('data'));
    }

    public function update(Request $request,$id)
    {
        $data =Creator::findOrFail($id);
        $data->name = $request->name;
        $data->role = $request->role;
        $data->desc = $request->desc;
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;

            $savePath = "/web_files/cretor/";
            $savePathDB = "$savePath$fileName";
            $path = public_path() . "$savePath";
            $file->move($path, $fileName);

            $photoPath = $savePathDB;
            $data->photo = $photoPath;
        }

        if ($data->save()) {
            //redirect dengan pesan sukses
            return redirect('creator/manage')->with(['success' => 'Anggota Tim Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect('creator/manage')->with(['error' => 'Anggota Tim Gagal Diupdate!']);
        }
    }


    public function store(Request $request)
    {
        $data = new Creator();
        $data->name = $request->name;
        $data->role = $request->role;
        $data->desc = $request->desc;
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;

            $savePath = "/web_files/cretor/";
            $savePathDB = "$savePath$fileName";
            $path = public_path() . "$savePath";
            $file->move($path, $fileName);

            $photoPath = $savePathDB;
            $data->photo = $photoPath;
        }

        if ($data->save()) {
            //redirect dengan pesan sukses
            return redirect('creator/create')->with(['success' => 'Anggota Tim Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect('creator/create')->with(['error' => 'Anggota Tim Gagal Disimpan!']);
        }
    }

    public function destroy($id)
    {
        $blog = Creator::findOrFail($id);

        $path = public_path() . $blog->photo;
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
