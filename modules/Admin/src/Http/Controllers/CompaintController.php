<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Http\Request;
use Input;
use App\Models\Complains;
use View;
use URL;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Config;


class CompaintController extends Controller
{
    
    public function __construct(Complains $complains) { 
        $this->middleware('admin');
        View::share('viewPage', 'Post Task');
        View::share('sub_page_title', 'Compaint Managment');
        View::share('helper',new Helper);
        View::share('heading','Compaint Managment');
        View::share('route_url',route('compaint')); 
        $this->record_per_page = Config::get('app.record_per_page'); 
    }
    
    public function index(Complains $complains, Request $request) 
    { 
        $page_title = 'Compaint Managment';
        $sub_page_title = 'View Compaint';
        $page_action = 'View Compaint'; 
        
        $search = $request->get('search');
        $taskdate = $request->get('taskdate');  
        if ((isset($search) && !empty($search)) || (isset($taskdate) && !empty($taskdate)) ) { 
            $search = isset($search) ? Input::get('search') : null; 
            $comments = Complains::where(function($query) use($search,$taskdate) {
                if (!empty($search)) {
                    $query->whereHas('taskDetail', function($query) use($search) {
                            $query->where('title', $search);
                        }); 
                } 
                if (!empty($taskdate)) {
                     $query->where('created_at', 'LIKE', "%".$taskdate."%"); 
                } 
            })->with('userDetail','taskDetail','reportedUserDetail','reason')->whereNotNull('postedUserId')->Paginate($this->record_per_page);
            
        } else {
            $comments = Complains::with('userDetail','taskDetail','reportedUserDetail','reason')->orderBy('id','desc')->whereNotNull('postedUserId')->Paginate($this->record_per_page);
        } 
      
        return view('packages::complains.index', compact('comments', 'page_title', 'page_action','sub_page_title')); 
    }
}
