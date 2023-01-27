<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsRegion;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class NewsController extends Controller
{
    //INDEX PAGE
    public function index(){
        $importantNews = News::with('regions')->where('category','important')->get();
        $normalNews = News::where('category','normal')->get();
        return view('news.index')->with(['important' => $importantNews, 'normal' => $normalNews]);
    }

    //CREATE PAGE
    public function createNews(){
        return view('news.addNews');
    }

    //ADD NEWS
    public function addNews(Request $request){
        $request->validate([
            'title' => 'required',
            'photo' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $publicId = $this->uploadPhoto($request);

        $newsData = [
            'title' => $request->title,
            'photo' => $publicId,
            'category' => $request->category,
            'description' => $request->description,
        ];

        if($request->category == 'important'){
            $request->validate([
                'regions' => 'required'
            ]);
            $regions = $request->regions;

            $news = News::create($newsData);
            $lastNewsId = $news->id;

            foreach($regions as $region){
                NewsRegion::create([
                    'news_id' => $lastNewsId,
                    'region_id' => $region
                ]);
            }
        }

        $news = News::create($newsData);
        $lastNewsId = $news->id;
        return redirect('/');
    }

    //DELETE NEWS
    public function deleteNews($id){
        $this->deleteCloudinaryPhoto($id);

        News::where('id', $id)->delete();
        NewsRegion::where('news_id', $id)->delete();
        return back();
    }

    //EDIT PAGE
    public function editNews($id){
        $news = News::find($id);
        return view('news.editNews')->with(['news' => $news]);
    }

    //UPDATE NEWS
    public function updateNews(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        if($request->file('photo')){
            $this->deleteCloudinaryPhoto($id);
            $publicId = $this->uploadPhoto($request);
            $newsData = [
                'title' => $request->title,
                'photo' => $publicId,
                'description' => $request->description,
            ];
            News::where('id',$id)->update($newsData);
        }

        $newsData = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        News::where('id',$id)->update($newsData);

        return back();
    }

    //UPLOAD PHOTO TO CLOUDINARY
    protected function uploadPhoto($request){
        $photo = rand(0, 1000)."_".$request->file('photo')->getClientOriginalName();
        $ext = $request->file('photo')->getClientOriginalExtension();
        $photo = rtrim($photo, ".".$ext);

        $result = $request->file('photo')->storeOnCloudinaryAs('News', $photo);
        $publicId = $result->getPublicId();

        return $publicId;
    }

    //DELETE PHOTO FROM CLOUDINARY
    protected function deleteCloudinaryPhoto($id){
        $publicId = News::find($id)->photo;
        Cloudinary::destroy($publicId);
    }
}
