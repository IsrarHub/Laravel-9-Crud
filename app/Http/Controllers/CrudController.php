<?php

namespace App\Http\Controllers;

use App\Models\CrudModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrudController extends Controller
{
    //
    private $obj;
    public function __construct(){
      $this->obj=new CrudModel();
    }
    public function index(){
        $data=$this->obj::all();
        echo view('home',['crud'=>$data]);
    }
    public function adduser(){
        echo view('addUser');
    }
    public function saveUser(Request $request){
        if ($request->isMethod('post')) {
            $request->validate([
                    'name'=>'required|min:6|max:18',
                    'email'=>'required|email',
                    'password'=>'required',
                    'gender'=>'required'
            ]);
           $password= Hash::make($request->post('password'));
            $data=['name'=>$request->post('name'),'email'=>$request->post('email'),'password'=>$password,'gender'=>$request->post('gender')];
           $crud=$this->obj::create($data);
           if($crud){
            return redirect()->route('home');
           }
           else{
               echo "error";
           }
        }   
    }
    public function getUser($id){

        $data=$this->obj::find($id);
        
         echo view('user',['user'=>$data]);

    }
    public function editUser(Request $request){
      if($request->isMethod('PUT')){
      
        $request->validate([
                    'name'=>'required|min:6|max:18',
                    'email'=>'required|email',
                    'gender'=>'required'
            ]);

            $id=$request->post('id');
            $data=['name'=>$request->post('name'),'email'=>$request->post('email'),'gender'=>$request->post('gender')];
            $query=$this->obj::where('id',$id)
                ->update($data);
                if($query){
                    return redirect()->route('home');   
                }
                else{
                    echo 'error';
                }
      }
      else{
          echo "invalid method";
      }
    }
    public function deleteUser($id){

        $query=$this->obj::find($id)->delete();
        if($query){
            redirect()->route('home');
        }
        else{
            echo "error";
        }
        }
}
