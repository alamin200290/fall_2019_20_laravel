<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Requests\StudentRequest;


class StudentController extends Controller
{
    function index(Request $request){

        //$users = User::all();
		$users = DB::table('users')->get(); 
        
        if($request->session()->has('name')){
    		   	return view('student.index')->with('users', $users);
    	}else{
    		return redirect()->route('login.index');
    	}

               
 
    }

    function details($id){

    	//your task finding student from array

    	$std = ['id'=>'12-111-2', 'username'=>'xyz', 'password'=>'test'];
    	return view('student.details')->with('std', $std);
    }


    function studentList(){
    	return [
    			['id'=>'12-222222-1','username'=>'xyz', 'password'=>'123'],
    			['id'=>'13-222222-2','username'=>'asd', 'password'=>'567'],
    			['id'=>'14-222222-3','username'=>'hjk', 'password'=>'345']
    	];
    }

    function edit($id){

    	//find student form array

    	$std = ['id'=>'12-111-2', 'username'=>'xyz', 'password'=>'test'];
    	return view('student.edit')->with('std', $std);
    }
	
	function update(Request $req, $id){

    	$user = User::find($id);
        $user->username = $req->username;
        $user->password = $req->password;
        $user->type = 'user';
        $user->save();

    	return redirect()->route('student.index');
    }
    function delete($id){

    	//find student form array

    	$std = ['id'=>'12-111-2', 'username'=>'xyz', 'password'=>'test'];
    	return view('student.delete')->with('std', $std);
    }

    function destroy($id){

    	//delete student from array and send the updated array in userlist

    	return redirect()->route('student.index');
    }

    function add(){

        return view('student.adduser');
    }

    function insert(StudentRequest $req){

        //file upload
/*        if($req->hasFile('pic')){
            $file = $req->file('pic');
            echo $file->getClientOriginalName()."<br>";
            echo $file->getClientOriginalExtension()."<br>";
            echo $file->getSize()."<br>";
            echo $file->getMimeType();
           if($file->move('upload', $file->getClientOriginalName())) {
            echo "success";
           }
        }else{
            echo "upload fail";
        }*/

        /*$req->validate([
            'username'=>'required',
            'type'=>'required',
            'password'=>'required|max:4'
        ]);*/

/*        $this->validate($req, [
            'username'=>'required',
            'type'=>'required',
            'password'=>'required|max:4'
        ])->validate();*/

        //$validation->validate();

/*        $validation = Validator::make($req->all(), [
            'username'=>'required',
            'type'=>'required',
            'password'=>'required|max:4'
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
        }*/

      /*  $user = new User();
        $user->username = $req->username;
        $user->password = $req->password;
        $user->type = $req->type;
        $user->name = "";
        $user->dept = "";
        $user->cgpa = "";
        if($user->save()){
            return redirect()->route('student.index');
        }else{
            return redirect()->route('student.add');
        }*/
    }
}