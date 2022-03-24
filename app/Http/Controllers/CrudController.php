<?php

namespace App\Http\Controllers;

use App\Models\CrudModel;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
 

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
         return   redirect()->route('home');
        }
        else{
            echo "error";
        }
        }
        public function login(){

            echo view('login');
        }
        public function register(){
            echo view('register');
        }
        public function saveregister(Request $request){
            if ($request->isMethod('post')) {
                $request->validate([
                        'name'=>'required|min:6|max:18',
                        'email'=>'required|email',
                        'password'=>'required|confirmed',
                        'gender'=>'required'
                ]);
                $password= md5($request->post('password'));
                $data=['name'=>$request->post('name'),'email'=>$request->post('email'),'password'=>$password,'gender'=>$request->post('gender')];
               $query=$this->obj::create($data);
               if($query){
                  return redirect()->route('login');
               }
               else{
                   echo "error";
               }

            }else{
                echo 'Method must be post';
            }
        }
        public function checklogin(Request $request){
            if ($request->isMethod('post')) {
                $request->validate([
                        'email'=>'required|email',
                        'password'=>'required',  
                ]);

                $email=$request->post('email');
                $password=md5($request->post('password'));
                $check=$this->obj::select('id','name','email','gender')->where('email',$email)->where('password',$password)->first();

                if($check){
                     $request->session()->put('user',$check);
                     return redirect()->route('home');
                }
                else{
                    $request->session()->flash('msg', 'Please registr yourself first');
                     return redirect()->route('login');
                }


            }else{
                echo 'Method must be post';
            }
        }
        public function logout(Request $request){
            $request->session()->flush();
            return redirect()->route('login');

        }
}
