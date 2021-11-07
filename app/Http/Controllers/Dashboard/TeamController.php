<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Team::with('team_en')->get();
        return view('dashboard.team.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::with('service_en')->where('parent_service_id', null)->get();
        $ceo = Team::where('is_ceo',1)->first();
        return view('dashboard.team.create', compact('services','ceo'));
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
        $input['created_by'] = Auth::user()->id;
        $request->validate([
            'name_en'           => 'bail|required|max:200',
            'title_en'          => 'bail|required|max:200',
            'description_en'    => 'bail|required',
            'title_ar'          => 'bail|required|max:200',
            'name_ar'           => 'bail|required|max:200',
            'description_ar'    => 'bail|required',
            'image_id'          => 'bail|required|mimes:jpeg,jpg,png,gif',
            //'type'              => 'required|digits_between:1,4',
            'is_ceo'            => 'numeric|in:1'
        ], [], [
            'title_en'          => ' Title in English',
            'description_en'    => ' Description in English',
            'name_en'           => ' Name in English',
            'name_ar'           => ' Name in Arabic',
            'title_ar'          => ' Title in Arabic',
            'description_ar'    => ' Description in Arabic',
            'image_id'          => ' Image',
        ]);


        //Upload Slide Image
        if ($uploadedFile = $request->file('image_id'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move('dashboardImages/team', $fileName);
            $filePath = 'dashboardImages/team/'.$fileName;
            $image = Image::create(['name' => $fileName, 'path' => $filePath]);
            $input['image_id'] = $image->id;
        }

        if(!$request->url)
        {
            $request->url =  Str::slug($request->title_en).'-'.date('his');
        }

        $team = new Team();
        $team->is_ceo     = $request->is_ceo;
        //$team->type     = $request->type;
        $team->image_id   = $input['image_id'];
        $team->service_id = $request->service_id;
        $team->created_by = $input['created_by'];
        $team->url        =  $request->url ;
        $team->save();

        $team->team_ar()->create(['member_id' => $team->id, 'job_title' => $input['title_ar'], 'description' => $input['description_ar'], 'name' => $input['name_ar']]);
        $team->team_en()->create(['member_id' => $team->id, 'job_title' => $input['title_en'], 'description' => $input['description_en'], 'name' => $input['name_en']]);

        Session::flash('create', 'Team Member  Has Been Created Successfully');
        return redirect(adminUrl('team'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::with('service_en')->where('parent_service_id', null)->get();
        $member = Team::with('image', 'team_en', 'team_ar', 'createdBy')->find($id);
        $ceo = Team::where('is_ceo',1)->first();


        return view('dashboard.team.edit', compact('member', 'services','ceo'));
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
        $team = Team::with('image', 'team_en', 'createdBy')->find($id);
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $request->validate([
            'name_en'           => 'bail|required|max:200',
            'title_en'          => 'bail|required|max:200',
            'description_en'    => 'bail|required',
            'title_ar'          => 'bail|required|max:200',
            'name_ar'           => 'bail|required|max:200',
            'description_ar'    => 'bail|required',
            'image_id'          => 'bail|mimes:jpeg,jpg,png,gif',
            //'type'              => 'required|digits_between:1,4',
            'is_ceo'            => 'numeric|in:1'
        ], [], [
            'title_en'          => ' Title in English',
            'description_en'    => ' Description in English',
            'name_en'           => ' Name in English',
            'name_ar'           => ' Name in Arabic',
            'title_ar'          => ' Title in Arabic',
            'description_ar'    => ' Description in Arabic',
            'image_id'          => ' Image',
        ]);


        //Upload Slide Image
        if ($uploadedFile = $request->file('image_id'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move('dashboardImages/team', $fileName);
            $filePath = 'dashboardImages/team/'.$fileName;
            $image = Image::create(['name' => $fileName, 'path' => $filePath]);
            $input['image_id'] = $image->id;
            $team->image_id = $input['image_id'];
        }

        if(!$request->url)
        {
            $request->url =  Str::slug($request->title_en).'-'.date('his');
            $team->url        =  $request->url;
        }

        //$team->type       = $request->type;
        $team->is_ceo     = $request->is_ceo;
        $team->service_id = $request->service_id ? $request->service_id : $team->service_id;
        $team->created_by = $input['created_by'];
        $team->save();

        $team->team_ar()->update(['member_id' => $team->id, 'job_title' => $input['title_ar'], 'description' => $input['description_ar'],'slug' => $request->slug_ar, 'name' => $input['name_ar']]);
        $team->team_en()->update(['member_id' => $team->id, 'job_title' => $input['title_en'], 'description' => $input['description_en'], 'slug' => $request->slug_ar,'name' => $input['name_ar']]);

        Session::flash('create', 'Team Member  Has Been Updated Successfully');
        return redirect(adminUrl('team'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);

        $team->delete();

        try
        {
            if ($team->image_id)
            {
                unlink(public_path() . '/' . $team->image->path);
                DB::table('image')->where('id', $team->image_id)->delete();
            }
        }
        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Delete Slide Because The Slide is related to another table');
            return redirect()->back();
        }

        Session::flash('delete', 'Team ' . $team->id . ' Has Been Deleted Successfully');
        return redirect(adminUrl('team'));
    }


    public function assignManager(Request $request,$id)
    {

        $member = Team::find($id);
        $member->manager_id = $request->manager_id;

        $member->save();
        return redirect(adminUrl('team'));
    }
}
