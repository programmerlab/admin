<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\TagRequest;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Tag;
//use App\Category;
use Input;
use Validator;
use Auth;
use Paginate;
use Grids;
use HTML;
use Form;
use Hash;
use View;
use URL;
use Lang;
use Session;
use DB;
use Route;
use Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Dispatcher; 
use App\Helpers\Helper;

/**
 * Class TagController
 * Added by Ocean
 */
class TagController extends Controller { 

    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct() {
        $this->middleware('admin');View::share('viewPage', 'tag');
        View::share('helper',new Helper);
        View::share('heading','Tag');
        $this->record_per_page = Config::get('app.record_per_page');
        View::share('route_url',route('tags'));

    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Request $request) 
    { 
        $page_title = 'Tags';
        $page_action = 'Tags';

        // Search by tag name
        $search = Input::get('search');
        /*$status = Input::get('status');*/
        if ((isset($search) && !empty($search))) {

            $search = isset($search) ? Input::get('search') : '';
               
            $tags = Tag::where(function($query) use($search) {
                        if (!empty($search)) {
                            $query->Where('name', 'LIKE', "%$search%");
                        }
                        
                    })->Paginate($this->record_per_page);
        } else {
            $tags = Tag::Paginate($this->record_per_page);
        }
        
        return view('packages::tag.index', compact('tags','page_title', 'page_action'));
    }

    /*
     * create Group method
     * */

    public function create(Tag $tag) 
    {
          
        $page_title = 'Tag';
        $page_action = 'Create Tag';
        $tag =  Tag::all();
        $html = '';
        return view('packages::tag.create', compact('page_title', 'page_action', 'tag'))->withInput(Input::all());
    }

    /*
     * Save Group method
     * */

    public function store(TagRequest $request) 
    {  
        /*var_dump("Hello");
        exit;*/
        $validate = Tag::where('name',$request->get('name'))->first();
       
        if($validate){
              return  Redirect::back()->withInput()->with(
                'field_errors','The tag name already been taken!'
            );
        }
          
        $tag = new Tag;

        $tag->slug                  =  strtolower(str_slug($request->get('name')));
        $tag->user_id               =  0;
        $tag->name                  =  $request->get('name'); 
        
        $tag->save();   
         
        return Redirect::to(route('tags'))->with('flash_alert_notice', 'New tag successfully created.');
    }

  

    public function edit($id) {
//var_dump($id);
        $page_title = 'Tag';
        $sub_page_title = 'Edit Tag';
        $tag = Tag::where('id',$id)->first();

        //var_dump($tag);

        echo $tag->id;

        $page_action = 'Edit Tag';  

        return view('packages::tag.edit', compact('sub_page_title','tag', 'page_title', 'page_action' ,'id'));
    }

    public function update($id, Request $request) {
       
        $name = $request->get('name');
        $id = $request->get('id');
        $slug = str_slug($request->get('name'));

        $validate = Tag::where('name',$request->get('name'))
                            ->where('id','!=',$id)
                            ->first();
         
        if($validate){
              return  Redirect::back()->withInput()->with(
                'field_errors','The Tag name already been taken!'
            );
        } 
        
        $tag                        = Tag::find($id);
       
        $tag->slug                  =  strtolower(str_slug($request->get('name')));
        $tag->user_id             =  0;
        $tag->name         =  $request->get('name'); 
                
        $tag->save();    
        return Redirect::to(route('tags'))
                        ->with('flash_alert_notice', 'Tag successfully updated.');
    }
    
    public function destroy($id) {
        
        $d = Tag::where('id',$id)->delete(); 
        return Redirect::to(route('tags'))
                        ->with('flash_alert_notice', 'Tag successfully deleted.');
    }

    public function show($id) {
        
        $result = Tag::find($id);
        $page_title  = 'Tag';
        $page_action  = 'Show Tag';
        return view('packages::tag.show', compact('result','page_title', 'page_action'));

    }

}
