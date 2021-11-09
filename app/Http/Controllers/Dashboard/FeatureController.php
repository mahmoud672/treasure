<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Feature;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$type = Input::get('type');
        $type = \request('type');
        if($type == 'why-us')
        {
            $features = Feature::with('feature_en', 'image')->where('status','=',1)->get();
            return view('dashboard.feature.index', compact('features'));
        }elseif($type == 'how-it-works')
        {
            $features = Feature::with('feature_en', 'image')->where('status',2)->get();
            return view('dashboard.feature.index', compact('features'));
        }
        elseif($type == 'services')
        {
            $features = Feature::with('feature_en', 'image')->where('status',3)->get();
            //dd($features);
            return view('dashboard.feature.index', compact('features'));
        }else{

            //$features = Feature::with('feature_en', 'image')->where('status','=',null)->get();
            $features = Feature::with('feature_en', 'image')->where('status',null)->get();

            return view('dashboard.feature.index', compact('features'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        /*$input['created_by'] = Auth::user()->id;*/
        $request->validate([
            'title_en'          => 'bail|required|max:200',
            'title_ar'          => 'bail|required|max:200',
            'description_en'    => 'bail',
            'description_ar'    => 'bail',
            'slug_en'           => 'bail|max:300',
            'slug_ar'           => 'bail|max:300',
            'counter'           => 'bail|nullable|numeric',
            'image_id'          => 'bail|mimes:jpeg,jpg,png,gif',
        ], [], [
            'title_en'          => ' Title in English',
            'description_en'    => ' Description in English',
            'slug_en'           => ' Slug in English',
            'title_ar'          => ' Title in Arabic',
            'description_ar'    => ' Description in Arabic',
            'slug_ar'           => ' Slug in Arabic',
            'image_id'          => ' Image',
        ]);

        $feature = new Feature();

        //Upload Slide Image
        if ($uploadedFile = $request->file('image_id'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move('dashboardImages/feature', $fileName);
            $filePath = 'dashboardImages/feature/'.$fileName;
            $image = Image::create(['name' => $fileName, 'path' => $filePath]);
            $input['image_id'] = $image->id;
            $feature->image_id = $image->id;
        }

        //$feature->created_by = $input['created_by'];
        $feature->status = $request->status ? $request->status : null ;
        $feature->counter = $request->counter;
        $feature->save();

        $feature->feature_ar()->create(['feature_id' => $feature->id, 'title' => $input['title_ar'], 'description' => $input['description_ar'], 'slug' => $input['slug_ar']]);
        $feature->feature_en()->create(['feature_id' => $feature->id, 'title' => $input['title_en'], 'description' => $input['description_en'], 'slug' => $input['slug_en']]);

        Session::flash('create', 'Feature Has Been Created Successfully');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Feature::with('image', 'feature_en')->find($id);
        return view('dashboard.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $feature = Feature::with('feature_en', 'image')->find($id);
        //$input['created_by'] = Auth::user()->id;
        $request->validate([
            'title_en'          => 'bail|required|max:200',
            'title_ar'          => 'bail|required|max:200',
            'description_en'    => 'bail',
            'description_ar'    => 'bail',
            'slug_en'           => 'bail|max:300',
            'slug_ar'           => 'bail|max:300',
            'counter'           => 'bail|nullable|numeric',
            'image_id'          => 'mimes:jpeg,jpg,png,gif',
        ], [], [
            'title_en'          => ' Title in English',
            'description_en'    => ' Description in English',
            'slug_en'           => ' Slug in English',
            'title_ar'          => ' Title in Arabic',
            'description_ar'    => ' Description in Arabic',
            'slug_ar'           => ' Slug in Arabic',
            'image_id'          => ' Image',
        ]);

        //Upload Slide Image
        if ($uploadedFile = $request->file('image_id'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move('dashboardImages/feature', $fileName);
            $filePath = 'dashboardImages/feature/'.$fileName;
            $image = Image::create(['name' => $fileName, 'path' => $filePath]);
            $input['image_id'] = $image->id;
            $feature->image_id = $input['image_id'];
        }

        $feature->counter = $request->counter;
        $feature->save();

        $feature->feature_ar()->update(['feature_id' => $feature->id, 'title' => $input['title_ar'], 'description' => $input['description_ar'], 'slug' => $input['slug_ar']]);
        $feature->feature_en()->update(['feature_id' => $feature->id, 'title' => $input['title_en'], 'description' => $input['description_en'], 'slug' => $input['slug_en']]);

        Session::flash('update', 'Feature Has Been Updated Successfully');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = Feature::find($id);

        $feature->delete();

        try
        {
            if ($feature->image_id)
            {
                unlink(public_path() . '/' . $feature->image->path);
                DB::table('image')->where('id', $feature->image_id)->delete();
            }
        }
        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Delete Slide Because The Slide is related to another table');
            return redirect()->back();
        }

        Session::flash('delete', 'Feature ' . $feature->id . ' Has Been Deleted Successfully');
        return back();
    }
}
