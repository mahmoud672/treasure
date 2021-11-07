<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    public function index()
    {
        $type = \request('type');

        if($type == 'previous-works')
        {
            $images = Gallery::with('image')->where('status','previous-works')->get();
            return view('dashboard.gallery.index', compact('images'));

        }
        elseif ($type == 'certificates')
        {
            $images = Gallery::with('image')->where('status','certificates')->get();
            return view('dashboard.gallery.index', compact('images'));
        }
        elseif ($type == 'partners')
        {
            $images = Gallery::with('image')->where('status','partners')->get();
            return view('dashboard.gallery.index', compact('images'));
        }

        elseif ($type == 'clients')
        {
            $images = Gallery::with('image')->where('status','clients')->get();
            return view('dashboard.gallery.index', compact('images'));
        }
        elseif ($type == 'projects')
        {
            $images = Gallery::with('image')->where('status','projects')->get();
            return view('dashboard.gallery.index', compact('images'));
        }
        elseif ($type == 'offers')
        {
            $images = Gallery::with('image')->where('status','offers')->get();
            return view('dashboard.gallery.index', compact('images'));
        }
        elseif ($type == 'portfolio')
        {
            $images = Gallery::with('image')->where('status','portfolio')->get();
            return view('dashboard.gallery.index', compact('images'));
        }
        $images = Gallery::with('image')->where('status',null)->get();
        return view('dashboard.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('dashboard.gallery.create');
    }

    public function store(Request $request){

            $input = $request->all();
            $this->validate($request,[
                'image_id.*'       => 'mimes:jpeg,jpg,png,gif',
                'image_id'         => 'required',
            ], [], [
                'image_id.*'         => 'Images',
            ]);

            try
            {
                if ($request->hasFile('image_id'))
                {
                    foreach ($request->image_id as $image) {

                        $name =  time() . $image->getClientOriginalName();

                        $image->move('dashboardImages/gallery', $name);

                        $path = 'dashboardImages/gallery/' .$name;

                        $image = Image::create(['name' => $name, 'path' => $path]);

                        $input['image_id'] = $image->id;

                        Gallery::create($input);
                        Session::flash('create', 'Images Has Been Uploaded Successfully');

                    }
                }
            }
            catch (\Exception $e)
            {
                Session::flash('exception', 'Can\'t Add Images To Album');
                return redirect(adminUrl('gallery'));
            }

            return back()->with("create",'Images Uploaded Successfully.');
    }

    public function uploadImagesToGallery(Request $request)
    {
        $type = \request('type');
        dd($type);
        $input = $request->all();
        $this->validate($request,[
            'image_id.*'       => 'mimes:jpeg,jpg,png,gif',
            'image_id'         => 'required',
        ], [], [
            'image_id.*'         => 'Images',
        ]);

        try
        {
            if ($request->hasFile('image_id'))
            {
                foreach ($request->image_id as $image) {

                    $name =  time() . $image->getClientOriginalName();

                    $image->move('dashboardImages/gallery', $name);

                    $path = 'dashboardImages/gallery/' .$name;

                    $image = Image::create(['name' => $name, 'path' => $path]);

                    $input['image_id'] = $image->id;

                    Gallery::create($input);
                    Session::flash('create', 'Images Has Been Uploaded Successfully');

                }
            }
        }
        catch (\Exception $e)
        {
            Session::flash('exception', 'Can\'t Add Images To Album');
            return redirect(adminUrl('gallery'));
        }

        return redirect(adminUrl('gallery'));
    }

    public function destroy($id)
    {
        $galleryImage = Gallery::find($id);

        $galleryImage->delete();

        try
        {
            if ($galleryImage->image_id)
            {
                unlink(public_path() . '/' . $galleryImage->image->path);
                DB::table('image')->where('id', $galleryImage->image_id)->delete();
            }
        }
        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Delete Image Because The Slide is related to another table');
            return redirect()->back();
        }

        Session::flash('delete', 'Image ' . $galleryImage->id . ' Has Been Deleted Successfully');
        return back();
    }

}
