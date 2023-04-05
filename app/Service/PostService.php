<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostService 
{
    public function store($data)
    {
        try{
            DB::beginTransaction();
            if (isset($data['tag_ids'])){
                $tagIds=$data['tag_ids'];
                unset($data['tag_ids']);
            }
            $data['preview_image']=Storage::disk('public')->put('/images',$data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
            $post = Post::firstOrCreate($data);
            if (isset($tagIds)){
                $post->tags()->attach($tagIds);
            }
            DB::commit();
        } catch(\Exception $exception){
            DB::rollBack();
            abort(500);
        } 
    }
    
    public function update($data, $post)
    {
        try {          
            DB::beginTransaction();
            if (isset($data['tag_ids'])){
                $tagIds=$data['tag_ids'];
                unset($data['tag_ids']);
            }
            if(array_key_exists('preview_image', $data)){
                $data['preview_image']=Storage::disk('public')->put('/images',$data['preview_image']);
                Storage::disk('public')->delete($post->preview_image);
            }
            if(array_key_exists('main_image', $data)){
                $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
                Storage::disk('public')->delete($post->main_image);
            }
            $post->update($data);
            if (isset($tagIds)){
                $post->tags()->sync($tagIds);
            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }
    
    public function index()
    {
        try {          
            DB::beginTransaction();
            $post =Post::all();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;

    }
    
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return array($categories,$tags);
    }
    
}
