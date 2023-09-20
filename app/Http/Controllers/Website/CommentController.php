<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CommentController extends Controller
{
    public $postedData = ['name','email','message','post_id'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(\request()->ajax())
        {
            $comments = Comment::all();
            return DataTables::of($comments)
                ->addIndexColumn()
                ->editColumn('postTitle',function (Comment $comment)
                {
                    return $comment->posts->title;
                })
                ->editColumn('name',function (Comment $comment)
                {
                    return $comment->name;
                })
                ->editColumn('email',function (Comment $comment)
                {
                    return $comment->email;
                })
                ->editColumn('message',function (Comment $comment)
                {
                    return $comment->message;
                }) ->editColumn('created_at',function (Comment $comment)
                {
                    return $comment->created_at->format('Y-m-d') . ','.Carbon::parse($comment->created_at)->format('H:i');
                })
                ->addColumn('action','Admin.Comments.Datatable.buttons')
                ->rawColumns(['postTitle','action','name','email','message','created_at'])
                ->toJson();
        }
        return view('Admin.Comments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $commentData = $request->only($this->postedData);
        Comment::create($commentData);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return response()->json();
    }
}
