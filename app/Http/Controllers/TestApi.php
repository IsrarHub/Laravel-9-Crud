<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponser;

class TestApi extends Controller
{
  use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $query= User::all();
        if($query){
            return response()->json(['data'=>$query,'status'=>Response::HTTP_CREATED],Response::HTTP_CREATED);
            return $this->sucess('',Response::HTTP_CREATED,$query);
          }
          else{      
            // return response()->json(['msg'=>'NO data Found','status'=>Response::HTTP_BAD_REQUEST]);
        return $this->error('No Data Found',Response::HTTP_BAD_REQUEST);
          }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:32',
            'email' => 'required|email',
            'password'=>'required'
        ]);
 
        if ($validator->fails()) {
           
        return $this->error($validator->errors(),Response::HTTP_BAD_REQUEST);

        }
        $validated= $validator->validated();
      $validated =  $validator->safe()->only(['name', 'email','password']);
$password= bcrypt($validated['password']);
      $data=['name'=>$validated['name'],'email'=>$validated['email'],'password'=>$password];
      $query=User::create($data);

      if($query){
       
        return $this->success('User has been saved',Response::HTTP_CREATED,$query->createToken('tokens')->plainTextToken);
      }
      else{
        // return response()->json(['msg'=>'Failed to save','status'=>Response::HTTP_BAD_REQUEST]);
        return $this->error('Failed to Save',Response::HTTP_BAD_REQUEST);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query= User::select('name','email')->find($id);
        if($query){
            // return response()->json(['data'=>$query,'status'=>Response::HTTP_CREATED],Response::HTTP_CREATED);
            return $this->success('',Response::HTTP_CREATED,$query);
          }
          else{
            // return response()->json(['msg'=>'NO data Found','status'=>Response::HTTP_BAD_REQUEST]);
            return $this->error('No data found',Response::HTTP_BAD_REQUEST);

          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
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
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:32',
            'email' => 'required|email'   
             ]);
 
        if ($validator->fails()) {
            return response()->json([
              'errors' => $validator->errors(),
              'status' => Response::HTTP_BAD_REQUEST,
            ], Response::HTTP_BAD_REQUEST);
        }
        
        $validated= $validator->validated();
      $validated =  $validator->safe()->only(['name', 'email']);
      $data=['name'=>$validated['name'],'email'=>$validated['email']];
      $query=User::where('id',$id)->update($data);

      if($query){
        return response()->json(['msg'=>'User has been update','status'=>Response::HTTP_CREATED]);
      }
      else{
          
        return response()->json(['msg'=>'Failed to save','status'=>Response::HTTP_BAD_REQUEST]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $query=User::destroy($id);
        
      if($query){
        return response()->json(['msg'=>'User has been deleted','status'=>Response::HTTP_CREATED]);
      }
      else{
          
        return response()->json(['msg'=>'Failed to Delete','status'=>Response::HTTP_BAD_REQUEST]);
      }
    }

    public function signin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'required|email'   
             ]);
 
        if ($validator->fails()) {
            return response()->json([
              'errors' => $validator->errors(),
              'status' => Response::HTTP_BAD_REQUEST,
            ], Response::HTTP_BAD_REQUEST);
        }
        
        $validated= $validator->validated();
      $validated =  $validator->safe()->only(['email', 'password']);
      $data=['email'=>$validated['email'],'password'=>$validated['password']];
  
        if (!Auth::attempt($data)) {
            return $this->error('', 401,$data);
        }

        return $this->success(
             ''
        ,Response::HTTP_ACCEPTED,auth()->user()->createToken('API Token')->plainTextToken);
    }
    public function signout(){
      auth()->user()->tokens()->delete();
      return $this->success("Tokens Revoked",Response::HTTP_ACCEPTED,'');

    }
}
