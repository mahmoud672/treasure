<?php



namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Image;
use App\Models\Open_graph;
use App\Models\Page;
use App\Models\Project;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProjectController extends Controller
{

    public function index()
    {
       $projects = Project::with('project_ar','project_en')->get();
        return view('dashboard.project.index',compact('projects'));
    }

    public function create()
    {
        $branches = Branch::with('branch_ar')->get();
        return view('dashboard.project.create',compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_ar'          => 'bail|required|max:200',
            'title_en'          => 'bail|required|max:200',
            'description_en'    => 'bail|required',
            'description_ar'    => 'bail|required',
            'slug_en'           => 'bail|required|max:1000',
            'slug_ar'           => 'bail|required|max:1000',
            'url'               => 'bail|unique:service|max:190',
            'image_id'          => 'bail|required|mimes:jpeg,jpg,png,gif',
            'icon'              => 'bail|mimes:jpeg,jpg,png,gif',
            'img_alt'           => '',
            'icon_alt'          => '',
        ], [], [
            'title_en'          => ' Title in English',
            'title_ar'          => ' Title in Arabic',
            'slug_en'           => ' Slug in English',
            'slug_ar'           => ' Slug in Arabic',
            'description_en'    => ' Description in English',
            'description_ar'    => ' Description in Arabic',
            'image_id'          => ' Image',
            'img_alt'           => ' Image Alt Text',
            'icon_alt'          => ' Icon Alt Text',
        ]);


        //Upload Slide Image
        if ($uploadedFile = $request->file('image_id'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move('dashboardImages/project', $fileName);
            $filePath = 'dashboardImages/project/'.$fileName;
            $image = Image::create(['name' => $fileName, 'path' => $filePath, 'alt' => $request->img_alt]);
            $request->image_id = $image->id;
        }

        //Upload Slide Image
        if ($uploadedFile = $request->file('icon'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move('dashboardImages/project', $fileName);
            $filePath = 'dashboardImages/project/'.$fileName;
            $icon = Image::create(['name' => $fileName, 'path' => $filePath, 'alt' => $request->icon_alt]);
            $request->icon = $icon->id;
        }

        if (empty($request->url))
        {
            //$input['url'] = Str::slug($request->title_en).sha1(date("s"));
            //$input['url'] = Str::slug($request->title_en,'-');
            $request->url = Str::slug($request->title_en).'-'.date('his');
        }

        if ($request->video_id)
        {
            $video = new Video();
            $video->url = $request->video_id;
            $video->created_by=auth()->user()->id;
            $video->save();
            $request->video_id = $video->id;
        }

        $open_graph = new Open_graph();
        $open_graph->og_title = $request->title_en;
        $open_graph->og_image = $request->image_id;
        $open_graph->og_description = $request->escription_en;
        $open_graph->og_url =  $request->url;
        $open_graph->save();

        $page = new Page();
        $page->url = $request->url;
        $page->name = $request->title_en;
        $page->open_graph_id = $open_graph->id;
        $page->save();

        $project = new Project();
        $project->branch_id = $request->branch_id;
        $project->url =  $request->url;
        $project->from_date = $request->from_date;
        $project->to_date   = $request->to_date;
        $project->image_id  = $request->image_id;
        $project->icon_id  = $request->icon;
        $project->open_graph_id = $open_graph->id;
        $project->page_id = $page->id;
        $project->save();

        $project->project_ar()->create([
            //'project_id'        => $project->id,
            'title'             => $request->title_ar,
            'slug'              => $request->slug_ar,
            'description'       => $request->description_ar,
            'client_name'       => $request->client_name_ar,
            'contract_subject'  => $request->contract_subject_ar,
            'capacity'          => $request->capacity_ar
        ]);

        $project->project_en()->create([
            //'project_id'        => $project->id,
            'title'             => $request->title_en,
            'slug'              => $request->slug_en,
            'description'       => $request->description_en,
            'client_name'       => $request->client_name_en,
            'contract_subject'  => $request->contract_subject_en,
            'capacity'          => $request->capacity_en
        ]);

        return redirect(adminUrl("project"))->with('create',"Project Created Successfully");

    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('dashboard.project.edit',compact('project'));
    }

    public function update(Request  $request, $id)
    {
        $project = Project::find($id);

        //dd($request->file("image_id"));
        $request->validate([
            'title_ar'          => 'bail|required|max:200',
            'title_en'          => 'bail|required|max:200',
            'description_en'    => 'bail|required',
            'description_ar'    => 'bail|required',
            'slug_en'           => 'bail|required|max:1000',
            'slug_ar'           => 'bail|required|max:1000',
            'url'               => 'bail|unique:service|max:190',
            'image_id'          => 'bail|mimes:jpeg,jpg,png,gif',
            'icon'              => 'bail|mimes:jpeg,jpg,png,gif',
            'img_alt'           => '',
            'icon_alt'          => '',
        ], [], [
            'title_en'          => ' Title in English',
            'title_ar'          => ' Title in Arabic',
            'slug_en'           => ' Slug in English',
            'slug_ar'           => ' Slug in Arabic',
            'description_en'    => ' Description in English',
            'description_ar'    => ' Description in Arabic',
            'image_id'          => ' Image',
            'img_alt'           => ' Image Alt Text',
            'icon_alt'          => ' Icon Alt Text',
        ]);

        //Upload Slide Image
        if ($uploadedFile = $request->file('image_id'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move('dashboardImages/project', $fileName);
            $filePath = 'dashboardImages/project/'.$fileName;
            $image = Image::create(['name' => $fileName, 'path' => $filePath, 'alt' => $request->img_alt]);
            $project->image_id = $image->id;
        }

        //Upload Slide Image
        if ($uploadedFile = $request->file('icon'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move('dashboardImages/project', $fileName);
            $filePath = 'dashboardImages/project/'.$fileName;
            $icon = Image::create(['name' => $fileName, 'path' => $filePath, 'alt' => $request->icon_alt]);
            $project->icon_id = $icon->id;
        }

        if (empty($request->url))
        {
            //$input['url'] = Str::slug($request->title_en).sha1(date("s"));
            //$input['url'] = Str::slug($request->title_en,'-');
            $request->url = Str::slug($request->title_en).'-'.date('his');
        }

        if ($request->video_id)
        {
            $video = new Video();
            $video->url = $request->video_id;
            $video->created_by=auth()->user()->id;
            $video->save();
            $request->video_id = $video->id;
        }
        $project->url = $request->url;
        $project->created_by = $request->created_by;
        $project->save();

        $project->project_ar()->update([
            //'project_id'        => $project->id,
            'title'             => $request->title_ar,
            'slug'              => $request->slug_ar,
            'description'       => $request->description_ar,
            'client_name'       => $request->client_name_ar,
            'contract_subject'  => $request->contract_subject_ar,
            'capacity'          => $request->capacity_ar
        ]);

        $project->project_en()->update([
            //'project_id'        => $project->id,
            'title'             => $request->title_en,
            'slug'              => $request->slug_en,
            'description'       => $request->description_en,
            'client_name'       => $request->client_name_en,
            'contract_subject'  => $request->contract_subject_en,
            'capacity'          => $request->capacity_en
        ]);

        $project->page()->update(['url' => $request->url, 'name' => $request->title_en]);
        $project->open_graph()->update(['og_title' => $request->title_en, 'og_image' =>  $project->image_id, 'og_description' => $request->description_en, 'og_url' => $request->url]);
        $project->image()->update(['alt' => $request->img_alt]);
        $project->iconImg()->update(['alt' => $request->icon_alt]);

        return redirect(adminUrl("project"))->with('create',"Project Updated Successfully");
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $project->project_ar()->delete();
        $project->project_en()->delete();
        $project->delete();

        return redirect(adminUrl("project"))->with('delete',"Project Deleted Successfully");

    }

    public function showImages($id){
        $project=Project::find($id);
        return view("dashboard.project.show",compact('project'));
    }

    public function storeImages(Request $request, $id)
    {
        $project=Project::find($id);
        $request->validate([
            'image.*' => 'bail:required|image|mimes:jpeg,png'
        ]);
        if ($uploadFiles=$request->image) {
            $images_ids=array();
            foreach ($uploadFiles as $uploadFile){
                $image_name = time() . "_" .$uploadFile->getClientOriginalName();
                $filePath = 'dashboardImages/project/'.$image_name;
                $uploadFile->move("dashboardImages/project", $image_name);
                $image=Image::create(['name' => $image_name,'path'=>$filePath,'alt'=>$project->project_en->title]);
                array_push($images_ids,$image->id);
            }
            $project->images()->attach($images_ids);

            return back();
        }
        //dd($request->file('product_im'));

    }

    public function destroyImage(Request $request, $id)
    {
        $project=Project::find($id);
        $image = $request->image;
        $image_id = $request->image_id;
        $image_path = public_path("/storage/uploads/project/" . $image);
        if (\File::exists($image_path))
        {
            unlink($image_path);
        }
        else
        {

        }

        $imageData=Image::where("id",$image_id)->where("name", $image)->delete();
        return back();
    }


}
