<?php

namespace App\Http\Controllers;

use App\Models\GoalOneMeta;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class GoalOneController extends Controller
{
    public function index()
    {
        //select * from posts;
        $RowsFromDB = Post::all(); //collection object
        $RowsFromMetaDB = GoalOneMeta::all();

        //id, title (Var char), description(TEXT), created_at, updated_at

        return view('goal1.index', ['posts' => $RowsFromDB]
        ,['posts_meta'=> $RowsFromMetaDB]);
    }

    //convention over configuration
    public function show($postId) //type hinting
    {
        //select * from posts where id = $postId limit 1;
//        $singlePostFromDB = Post::find($postId); //model object
        $SingleRowFromDB = Post::findOrFail($postId); //model object

//        if(is_null($singlePostFromDB)) {
//            return to_route('posts.index');
//        }

//        $singlePostFromDB = Post::where('id', $postId)->first(); //model object

//        $singlePostFromDB = Post::where('id', $postId)->get(); //collection object


//        Post::where('title', 'php')->first() //select * from posts where title = 'php' limit 1;
//        Post::where('title', 'php')->get() //select * from posts where title = 'php';


        return view('goal1.show', ['post' => $SingleRowFromDB]);
    }

    public function create()
    {
        

        return view('goal1.create');
    }

    public function store()
    {
        //code to validate the data

        request()->validate([
            'year' => ['required', 'min:4'],
            'group' => ['required'],
        ]);

//        $request = request();
//
//        dd($request->title, $request->all());

        //1- get the user data
        $data = request()->all();

        $year = request()->year;
        $group = request()->group;

//        dd($data, $title, $description, $postCreator);

        //2- store the submitted data in database
//        $post = new Post;
//
//        $post->title = $title;
//        $post->description = $description;
//
//        $post->save();// insert into posts ('t','d')

        Post::create([
            'year' => $year,
            'group' => $group,
        ]);

        //3- redirection to goal1.index
        return to_route('goal1.index');
    }

    public function edit($postId)
    {
        //select * from users;
        // $users = User::all();

        //select * from posts where id = $postId limit 1;
        $SingleRowFromDB = Post::findOrFail($postId);

        return view('goal1.edit', ['post' => $SingleRowFromDB]);
    }

    public function update($postId)
    {
        
        request()->validate([
            'year' => ['required', 'min:4'],
            'group' => ['required'],
        ]);
        
        //1- get the user data

        $year = request()->year;
        $group = request()->group;

//        dd($title, $description, $postCreator);

        //2- update the submitted data in database
            //select or find the post
            //update the post data
        $singlePostFromDB = Post::find($postId);
        $singlePostFromDB->update([
            'year' => $year,
            'group' => $group,
        ]);

//        dd($singlePostFromDB);

        //3- redirection to posts.show

        return to_route('goal1.show', $postId);
    }

    public function destroy($postId)
    {
        //1- delete the post from database
            //select or find the post
            //delete the post from database
        $post = Post::find($postId);
        $post->delete();

        Post::where('id', $postId)->delete();

        //2- redirect to posts.index
        return to_route('goal1.index');
    }



//  functions for Goal 1 Meta data routes

    //convention over configuration
    public function show_meta($postId_meta) //type hinting
    {
        //select * from goal_one_metas where id = $postId limit 1;
        $SingleRowFromMetaDB = GoalOneMeta::findOrFail($postId_meta); //model object


        return view('goal1.show_meta', ['post_meta' => $SingleRowFromMetaDB]);
    }

/*
    public function store_meta()
    {

        //1- get the user data

        // 'indicator','target','gaol','contact_persons'
        $data = request()->all();

        $indicator = request()->indicator;
        $target = request()->target;
        $goal = request()->goal;
        $contact_person = request()->contact_person;



        //2- store the submitted data in database

        GoalOneMeta::create([
            'indicator' => $indicator,
            'target'  => $target,
            'goal' => $goal,
            'contact_person' => $contact_person
        ]);

        //3- redirection to goal1.index
        return to_route('goal1.index');
    }
*/
    public function edit_meta($postId_meta)
    {
        //select * from users;
        // $users = User::all();

        //select * from posts where id = $postId limit 1;
        $SingleRowFromMetaDB = GoalOneMeta::findOrFail($postId_meta);

        return view('goal1.edit_meta', ['post_meta' => $SingleRowFromMetaDB]);
    }

    public function update_meta($postId_meta)
    {
        // validate data
        request()->validate([
            'indicator' => ['required', 'min:4'],
            'target' => ['required', 'min:4'],
            'goal' => ['required', 'min:4'],
            'contact_persons' => ['required', 'min:4']
        ]);
        
        
        //1- get the user data

        $indicator = request()->indicator;
        $target = request()->target;
        $goal = request()->goal;
        $contact_persons = request()->contact_persons;

//       dd($target, $goal, $contact_persons);

        //2- update the submitted data in database
            //select or find the post
            //update the post data
        $singlePostFromMetaDB = GoalOneMeta::find($postId_meta);
        $singlePostFromMetaDB->update([
            'indicator' => $indicator,
            'target'  => $target,
            'goal' => $goal,
            'contact_persons' => $contact_persons
        ]);

//        dd($singlePostFromDB);

        //3- redirection to posts.show

        return to_route('goal1.show_meta', $postId_meta);
    }


}
