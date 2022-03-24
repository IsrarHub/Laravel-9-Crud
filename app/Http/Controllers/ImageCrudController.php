<?php

namespace App\Http\Controllers;

use App\Models\ImageCrudModel;
use Illuminate\Http\Request;

class ImageCrudController extends Controller
{
    //
    public function index(){
        $data=ImageCrudModel::all();
        echo view('imagesHome',['crud'=>$data]);
    }
    public function addImage(){
        echo view('registerImage');
    }
    public function saveImage(Request $request){

         $request->validate([
         'name'=>'required|min:6|max:18',
         'img'=>'required|image',
         ]);
         //$path = Storage::putFile('public/images', $request->file('img'));
           $file=$request->file('img');
         $imageName = $file->getClientOriginalName();  
         $request->img->move(public_path('images'), $imageName);

                $data=['name'=>$request->post('name'),'img_path'=>$imageName];
         $query=ImageCrudModel::create($data);
        if($query){
            return redirect()->route('images');
        }
        else{
            $request->session()->flash('msg','Failed to save');
            return redirect()->route('addImage');
        }
    }
    public function getImage($id){
            $data=ImageCrudModel::find($id);
            echo view('imgSingle',['data'=>$data]);
    }
    public function updateImage(Request $request){
        $request->validate([
            'name'=>'required|min:6|max:18',
            'img'=>'required|image',
            ]);

        $id=$request->post('id');
        if ($request->file('img')!="") {
            $getImage=ImageCrudModel::select('img_path')->where('id', $id)->first();
        
            if (file_exists('images/'.$getImage->img_path)) {
                unlink('images/'.$getImage->img_path);
            }
        }
            $file=$request->file('img');
            $imageName = $file->getClientOriginalName();  
            $request->img->move(public_path('images'), $imageName);

                   $data=['name'=>$request->post('name'),'img_path'=>$imageName];
                   $query=ImageCrudModel::where('id',$id)->update($data);
                   if($query){
                       return redirect()->route('images');
                   }
                   else{
                       echo 'error';
                   }  
    }

    public function deleteImage($id){
        $getImage=ImageCrudModel::select('img_path')->where('id',$id)->first();
        
        if(file_exists('images/'.$getImage->img_path)){
         unlink('images/'.$getImage->img_path);
         
        }

        $query=ImageCrudModel::find($id)->delete();
         if($query){
         return redirect()->route('images');
         }
         else{
         echo "error";
         }
 }
}
