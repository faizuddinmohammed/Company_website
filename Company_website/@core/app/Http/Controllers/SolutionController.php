<?php

namespace App\Http\Controllers;

use App\PricePlan;
use App\WorksCategory;
use App\Works;
use App\SolutionDetail;
use Facade\IgnitionContracts\Solution;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SolutionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        
       
        $all_services = Works::all()->groupBy('lang');
        $service_category = WorksCategory::where(['status' => 'publish', 'lang' => get_default_language()])->get();
        
        return view('backend.pages.solution.index')->with(['all_services' => $all_services, 'service_category' => $service_category]);
    }

    public function new_solution()
    {
        $service_category = WorksCategory::where(['status' => 'publish', 'lang' => get_default_language()])->get();
        $price_plans = PricePlan::where(['status' => 'publish', 'lang' => get_default_language()])->get();
        return view('backend.pages.solution.new-service')->with(['service_category' => $service_category,'price_plans' => $price_plans]);
    }

    public function edit_solution($id)
    {
        $service = Works::find($id);
        $service_details = SolutionDetail::where('service_id',$id)->get();
        $service_category = WorksCategory::where(['status' => 'publish', 'lang' => $service->lang])->get();
        $price_plans = PricePlan::where(['status' => 'publish', 'lang' =>  $service->lang])->get();
// dd($service_details);
        return view('backend.pages.solution.edit-service')->with(['service_category' => $service_category,'service' => $service,'price_plans' => $price_plans,'service_details'=>$service_details]);
    }

    public function store(Request $request)
    {
        // echo "<pre>";
        // dd($request);
        // die();
        $this->validate($request, [
            'title' => 'required|string|max:191',
            'icon' => 'required|string|max:191',
            'lang' => 'required|string|max:191',
            'slug' => 'nullable|string',
            'description' => 'required|string',
            'excerpt' => 'required|string',
            'description2' => 'required|string',
            'excerpt2' => 'required|string',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'categories_id' => 'required|string',
            'icon_type' => 'required|string',
            'img_icon' => 'nullable|string|max:191',
            'sr_order' => 'nullable|string|max:191',
            'image' => 'nullable|string|max:191',
            'banner' => 'nullable|string|max:191',
            'status' => 'nullable|string|max:191',
            'price_plan' => 'nullable',
            'text1' => 'required|string',
                        'text2' => 'required|string',

        ]);
        //dd(json_encode($request->more_service_title));
        $price_plan = !empty($request->price_plan) ? $request->price_plan : [];
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title,$request->lang);
        $slug_check = Works::where(['slug' => $slug,'lang' => $request->lang])->count();
        $slug = $slug_check > 0 ? $slug.'2' : $slug;
        $service = Works::create([
            'title' => $request->title,
            'lang' => $request->lang,
            'icon' => $request->icon,
            'description' => $request->description,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'description2' => $request->description2,
            'excerpt2' => $request->excerpt2,
            'meta_tag' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'categories_id' => $request->categories_id,
            'image' => $request->image,
            'banner' => $request->banner,
            'status' => $request->status,
            'sr_order' => $request->sr_order,
            'img_icon' => $request->img_icon,
            'icon_type' => $request->icon_type,
            'price_plan' =>  serialize($price_plan),
            'more_service_title' => json_encode($request->more_service_title),
            'more_service_img' => json_encode($request->more_service_img),
            'text1' => $request->text1,
            'text2' => $request->text2,
        ]);
        
        $detail_title = $request->detail_title;
        $detail_description = $request->detail_description;
        $detail_points = $request->detail_points;
        $detail_img = $request->detail_img;
       
        foreach ($detail_title as $key => $title) {
            if($title!=''){
                SolutionDetail::create([
                    'service_id' => $service->id,
                    'title' => $title??'',
                    'img' => $detail_img[$key]??'',
                    'description' => $detail_description[$key] ?? '',
                    'content' => json_encode($detail_points[$key])??'',
                ]);
            }
        }
        //dd($service->id);
        

        return redirect()->back()->with(['msg' => __('New solution Added...'), 'type' => 'success']);
    }

    public function update(Request $request)
    {

        
        $this->validate($request, [
            'title' => 'required|string|max:191',
            'lang' => 'required|string|max:191',
            'icon' => 'required|string|max:191',
            'description' => 'required|string',
            'slug' => 'nullable|string',
            'excerpt' => 'required|string',
            'description2' => 'required|string',
            'excerpt2' => 'required|string',
            
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'categories_id' => 'required|string',
            'image' => 'nullable|string|max:191',
            'banner' => 'nullable|string|max:191',
            'sr_order' => 'nullable|string|max:191',
            'status' => 'nullable|string|max:191',
            'price_plan' => 'nullable',
            'text1' => 'required|string',
                        'text2' => 'required|string',

        ]);
        $price_plan = !empty($request->price_plan) ? $request->price_plan : [];
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title,$request->lang);
        $slug_check = Works::where(['slug' => $slug,'lang' => $request->lang])->count();
        $slug = $slug_check > 1 ? $slug.'2' : $slug;
        Works::find($request->id)->update([
            'title' => $request->title,
            'lang' => $request->lang,
            'icon' => $request->icon,
            'description' => $request->description,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'description2' => $request->description2,
            'excerpt2' => $request->excerpt2,
            'meta_tag' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'categories_id' => $request->categories_id,
            'image' => $request->image,
            'banner' => $request->banner,
            'status' => $request->status,
            'sr_order' => $request->sr_order,
            'img_icon' => $request->img_icon,
            'icon_type' => $request->icon_type,
            'price_plan' => serialize($price_plan),
            'more_service_title' => json_encode($request->more_service_title),
            'more_service_img' => json_encode($request->more_service_img),
            'text1' => $request->text1,
            'text2' => $request->text2,
            
        ]);

        $detail_title = $request->detail_title;
        $detail_description = $request->detail_description;
        $detail_points = $request->detail_points;
        $service_detail_id = $request->service_detail_id;
        $detail_img = $request->detail_img;
        
        $sd_id =[];
        // dd($detail_points);
       
        foreach ($detail_title as $key => $title) {
            if($title!=''){
                SolutionDetail::updateOrCreate(
                    ['id' =>  $service_detail_id[$key]??0, 'service_id' => $request->id],[
                    'service_id' => $request->id,
                    'title' => $title??'',
                    'description' => $detail_description[$key] ?? '',
                    'img' => $detail_img[$key] ?? '',
                    'content' => json_encode($detail_points[$key])??'',
                ]);
                array_push($sd_id,$service_detail_id[$key]??0);
            }
        }
        
        $delete=array_diff($service_detail_id??[],$sd_id);
        foreach($delete as $dl){
            SolutionDetail::find($dl)->delete();
        }

        return redirect()->back()->with(['msg' => __('Solution Item Updated...'), 'type' => 'success']);
    }

    public function clone_solution_as_draft(Request $request)
    {

        $service = Works::find($request->item_id);
        Works::create([
            'title' => $service->title,
            'lang' => $service->lang,
            'icon' => $service->icon,
            'description' => $service->description,
            'slug' => $service->slug,
            'excerpt' => $service->excerpt,
            'description2' => $request->description2,
            'excerpt2' => $request->excerpt2,
            'meta_tag' => $service->meta_tag,
            'meta_description' => $service->meta_description,
            'categories_id' => $service->categories_id,
            'image' => $service->image,
            'banner' => $service->banner,
            'img_icon' => $service->img_icon,
            'icon_type' => $service->icon_type,
            'sr_order' => $service->sr_order,
            'price_plan' => $service->price_plan,
            'status' => 'draft',
            'more_service_title' => json_encode($request->more_service_title),
            'more_service_img' => json_encode($request->more_service_img),
            'text1' => $request->text1,
            'text2' => $request->text2,
            
        ]);

        return redirect()->back()->with(['msg' => __('Solution Item Cloned Success...'), 'type' => 'success']);
    }

    public function delete($id)
    {
        Works::find($id)->delete();
        SolutionDetail::where('service_id',$id)->delete();

        return redirect()->back()->with(['msg' => __('Delete Success...'), 'type' => 'danger']);
    }

    public function category_index()
    {
        $all_category = WorksCategory::all()->groupBy('lang');
        return view('backend.pages.solution.category')->with(['all_category' => $all_category]);
    }

    public function category_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'lang' => 'required|string|max:191',
            'icon_type' => 'required|string|max:191',
            'icon' => 'nullable|string|max:191',
            'img_icon' => 'nullable|string|max:191',
            'status' => 'required|string|max:191'
        ]);

        WorksCategory::create($request->all());

        return redirect()->back()->with([
            'msg' => __('New Category Added...'),
            'type' => 'success'
        ]);
    }

    public function category_update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'lang' => 'required|string|max:191',
            'status' => 'required|string|max:191',
            'icon_type' => 'required|string|max:191',
            'icon' => 'nullable|string|max:191',
            'img_icon' => 'nullable|string|max:191'
        ]);

        WorksCategory::find($request->id)->update([
            'name' => $request->name,
            'lang' => $request->lang,
            'status' => $request->status,
            'img_icon' => $request->img_icon,
            'icon' => $request->icon,
            'icon_type' => $request->icon_type,
        ]);

        return redirect()->back()->with([
            'msg' => __('Category Update Success...'),
            'type' => 'success'
        ]);
    }

    public function category_delete(Request $request, $id)
    {
        if (Works::where('categories_id', $id)->first()) {
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Already Associated With A Service...'),
                'type' => 'danger'
            ]);
        }
        WorksCategory::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Category Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function category_by_slug(Request $request)
    {
        $service_category = WorksCategory::where(['status' => 'publish', 'lang' => $request->lang])->get();
        return response()->json($service_category);
    }
    public function price_plan_by_slug(Request $request)
    {
        $service_category = PricePlan::where(['status' => 'publish', 'lang' => $request->lang])->get();
        return response()->json($service_category);
    }

    public function bulk_action(Request $request)
    {
        Works::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function category_bulk_action(Request $request)
    {
        WorksCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
