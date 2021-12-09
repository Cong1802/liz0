<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vanthao03596\HCVN\Models\District;
use Vanthao03596\HCVN\Models\Province;
use Vanthao03596\HCVN\Models\Ward;
use App\Domain\Package\Models\Package;
use App\Domain\News\Models\PackageNew;
use App\Domain\News\Models\News;
use Str;
use Carbon\Carbon;
use App\Http\Requests\User\NewsRequest;
class NewsController extends Controller 
{
    public function __construct(){
        $this->middleware('auth:web');
    }
    public function index()
    {
        $news = News::where('user_id',currentUser()->id)->paginate(5);
        return view('user.news.index',compact('news'));
    }

    public function create()
    {
        $provices = getAllCities();
        $district = District::all();
        $ward = Ward::all();
        $package  = Package::all();
        return view('user.news.create',compact('package','provices','ward','district'));
    }

    public function store(NewsRequest $request) {

        $news = News::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'type_user' => $request->type_user,
            'type_service' => $request->type_service,
            'type_house' => $request->type_house,
            'total_area' => $request->total_area,
            'used_area' => $request->used_area,
            'price' => $request->price,
            'price_can_edit' => $request->negotiate,
            'status_price' => $request->showPrice,
            'price_house' => $request->price_house,
            'currency' => $request->currency,
            'tag' => $request->tag,
            'image' => 'chua co',
            'video' => 'chua co',
            'user_id' => currentUser()->id,
            'name_user' => $request->name_user,
            'email_user' => $request->email_user,
            'phone_user' => $request->phone_user,
            'note_user' => $request->note_user,
            'title' => $request->title,
            'content' => $request->content,
            'can_meet' => $request->seeHouseDirectly ? 1 : 0,
            'can_see_video' => $request->seeHouseByVideo ? 1 : 0,
            'day_meet' => 'chua co',
            'time_meet' => 'chua co',
            'day' => $request->day_post,
            'city' => $request->province,
            'district' => $request->district,
            'wards' => $request->ward,
            'address' => $request->address
        ]);
        if ($request->hasFile('image')) {
            $news->addMedia($request->image)->toMediaCollection('image');
        }


        $packageNews = PackageNew::create([
            'news_id' => $news->id,
            'package_id' => $request->package,
            'package_id_later' => $request->package_id_later,
            'time_post_news' => $request->day_post,
            'post_news_start' => $request->start_post,
            'post_news_end' => $request->end_post,
            'auto_post' => $request->auto_post,
        ]);
        if($news)
        return redirect()->route('news.index');
    }
    public function update($id)
    {
        $provices = Province::all();
        $district = District::all();
        $ward = Ward::all();
        $package  = Package::all();
        $news  = News::find($id);
        $packageNews = PackageNew::where('news_id',$news->id)->with('package')->first();
        return view('user.news.update',compact('package','news','packageNews','provices','ward','district'));
    }
     
    public function edit($id,NewsRequest $request)
    {
        $news  = News::find($id);
        $packageNews = PackageNew::where('news_id',$news->id)->first();
            $news->name = $request->name;
            $news->slug = Str::slug($request->name);
            $news->type_user = $request->type_user;
            $news->type_service = $request->type_service;
            $news->type_house = $request->type_house;
            $news->total_area = $request->total_area;
            $news->used_area = $request->used_area;
            $news->price = $request->price;
            $news->price_can_edit = $request->negotiate;
            $news->status_price = $request->showPrice;
            $news->price_house = $request->price_house;
            $news->currency = $request->currency;
            $news->tag = $request->tag;
            $news->image = 'chua co';
            $news->video = 'chua co';
            $news->user_id = currentUser()->id;
            $news->name_user = $request->name_user;
            $news->email_user = $request->email_user;
            $news->phone_user = $request->phone_user;
            $news->note_user = $request->note_user;
            $news->title = $request->title;
            $news->content = $request->content;
            $news->can_meet = $request->seeHouseDirectly ? 1 : 0;
            $news->can_see_video = $request->seeHouseByVideo ? 1 : 0;
            $news->day_meet = 'chua co';
            $news->time_meet = 'chua co';
            $news->day = $request->start_post;
            $news->city = $request->province;
            $news->district = $request->district;
            $news->wards = $request->ward;
            $news->address = $request->addres;
        $news->update();
            $packageNews->news_id =  $news->id;
            $packageNews->package_id =  $request->package;
            $packageNews->package_id_later =  $request->package_id_later;
            $packageNews->time_post_news =  $request->day_post;
            $packageNews->post_news_start =  $request->start_post;
            $packageNews->post_news_end =  $request->end_post;
            $packageNews->auto_post =  $request->auto_post;
        $packageNews->update();
        return redirect()->route('news.index');
    }   

    public function delete(Request $request){
        $news = News::find($request->id);
        if($news){
            $packageNews = PackageNew::where('news_id',$news->id)->delete();
            $news->delete();
        }
    }
}
