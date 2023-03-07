<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $inputs = $request->only('name', 'email', 'content', 'customer_id', 'tour_id');
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required',
            'customer_id' => 'required',
            'tour_id' => 'required',
        ];
        $request->validate($rules);
        Comment::create($inputs);
        $notification = array(
            'message' => 'Gửi bình luận thành công...!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request->ajax()){
            $editComment = Comment::findOrfail($id);
            return response()->json([
                'success' => true,
                'editComment' => $editComment
            ]);
        }

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
        $inputs = $request->only('name', 'email', 'content', 'customer_id', 'tour_id');
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required',
            'customer_id' => 'required',
            'tour_id' => 'required',
        ];
        $request->validate($rules);
        $comment = Comment::findOrfail($id);
        $comment->fill($inputs);
        $comment->save();
        $notification = array(
            'message' => 'cập nhật bình luận thành công...!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Xóa bình luận thành công...!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
