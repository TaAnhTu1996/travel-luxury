<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Tour;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::orderBy('created_at', 'DESC')->get();
        return view('backend.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tours = Tour::all();
        return view('backend.schedule.add', compact('tours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only('title', 'content', 'tour_id');

        $rules = [
            'title' => 'required|min:10|max:300',
            'content' => 'required',
            'tour_id' => 'required'
        ];
        $request->validate($rules);

        Schedule::create($inputs);

        $notification = array(
            'message' => 'Thêm lịch trình thành công...!',
            'alert-type' => 'success'
        );
        return redirect('admin/schedule')->with($notification);
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
    public function edit($id)
    {
        $tours = Tour::all();
        $editSchedule = Schedule::findOrFail($id);
        return view('backend.schedule.edit', compact('tours', 'editSchedule'));
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
        $inputs = $request->only('title', 'content', 'tour_id');

        $rules = [
            'title' => 'required|min:10|max:300',
            'content' => 'required',
            'tour_id' => 'required'
        ];
        $request->validate($rules);

        $schedule = Schedule::findOrFail($id);
        $schedule->fill($inputs);
        $schedule->save();

        $notification = array(
            'message' => 'Cập nhật lịch trình thành công...!',
            'alert-type' => 'success'
        );
        return redirect('admin/schedule')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Schedule::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Xóa lịch trình thành công...!',
            'alert-type' => 'success'
        );
        return redirect('admin/schedule')->with($notification);
    }
}
