<?php

namespace App\Http\Controllers;
use App\User;
use App\Address;
use App\Project;
use App\Task;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function one_to_one()
    {
    	$users = User::all();
    	$addresses = Address::with('user')->get();
        return view('one-to-one', compact('users', 'addresses'));
    }
    public function one_to_many()
    {

    	$users = User::all();
       
        return view('one-to-many', compact('users'));
    	
    }
    public function many_to_many()
    {
        return view('many-to-many');
    }
    public function has_one_through()
    {
     $project = Project::find(2);
     return $project->task;
     //   return view('has-one-through');
    }
    public function has_many_through()
    {
        $project = Project::find(2);
     return $project->tasks;
        //return view('has-many-through');
    }

}
