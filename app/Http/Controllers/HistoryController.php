<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;
use Bulkly\SocialAccounts;
use Bulkly\SocialPostGroups;
use Bulkly\SocialPosts;
use Bulkly\BufferPosting;
use DB;


class HistoryController extends Controller
{
    public function index(){
        $groups = SocialPostGroups::all();
        $buffer_posting = BufferPosting::with('groupInfo')->with('accountInfo')->with('post')->paginate(15);
        return view('admin.history',['buffer_posting'=>$buffer_posting,'groups'=>$groups]);
    }

    public function filter(Request $request){
        $groups = SocialPostGroups::all();
        $search = $request->search;
        $group = $request->group;
        $date_time = $request->date_time;
        $date='';
        if($date_time!=null){
            $d = explode('/',$date_time);
            $date = $d[2].'-'.$d[1].'-'.$d[0];
        }
        
        $buffer_posting = BufferPosting::with('groupInfo')->with('accountInfo')->with('post')
        ->whereHas('groupInfo', function($query) use ($search) {
            $query->where('name', $search);
        })
        ->orwhereHas('groupInfo', function($query) use ($group) {
            $query->where('id', $group);
        })
        ->orWhere(DB::raw('CAST(sent_at as date)'), '=', $date)
        ->paginate(15);

        return view('admin.history',['buffer_posting'=>$buffer_posting,'groups'=>$groups]);


        
        
    }
}
