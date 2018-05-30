<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Models\User; 
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
use Route;
use Crypt; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Dispatcher; 
use App\Helpers\Helper;
use Modules\Admin\Models\Contact; 
use Modules\Admin\Models\Category;
use Modules\Admin\Models\BusinessNatureType;
use Modules\Admin\Models\TargetMarketType; 
use Response; 
use Modules\Admin\Http\Requests\BusinessNatureRequest;
/**
 * Class AdminController
 */
class BusinessNatureTypeController extends Controller {
    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct(BusinessNatureType $businessNature) { 
        $this->middleware('admin');
        View::share('viewPage', 'Business Nature');
        View::share('sub_page_title', 'Business Nature');
        View::share('helper',new Helper);
        View::share('heading','Business Nature');
        View::share('route_url',route('businessNature')); 
        $this->record_per_page = Config::get('app.record_per_page'); 
    }

   
    /*
     * Dashboard
     * */

    public function index(BusinessNatureType $businessNature, Request $request) 
    { 
        $page_title = 'Business Nature';
        $sub_page_title = 'Business Nature';
        $page_action = 'View Business Nature'; 


        if ($request->ajax()) {
            $id = $request->get('id'); 
            $category = BusinessNatureType::find($id); 
            $category->status = $s;
            $category->save();
            echo $s;
            exit();
        }

        // Search by name ,email and group
        $search = Input::get('search');
        $status = Input::get('status');
        if ((isset($search) && !empty($search))) {

            $search = isset($search) ? Input::get('search') : '';
               
            $businessNature = BusinessNatureType::where(function($query) use($search,$status) {
                        if (!empty($search)) {
                            $query->Where('title', 'LIKE', "%$search%");
                        }
                        
                    })->Paginate($this->record_per_page);
        } else {
            $businessNature = BusinessNatureType::Paginate($this->record_per_page);
        }
         
        
        return view('packages::businessNature.index', compact('result_set','businessNature','data', 'page_title', 'page_action','sub_page_title'));
    }

    /*
     * create Group method
     * */

    public function create(BusinessNatureType $businessNature) 
    {
        $page_title     = 'Business Nature';
        $page_action    = 'Create Business Nature';
        $program       = BusinessNatureType::all(); 
        $status         = [
                            'last_15_days'=>'inactive from last 15 days',
                            'last_30_days'=>'inactive from last 30 days',
                            'last_45_days'=>'inactive from last 45 days'
                        ];

        return view('packages::businessNature.create', compact( 'businessNature','status','page_title', 'page_action'));
    }

    

    /*
     * Save Group method
     * */

    public function store(BusinessNatureRequest $request, BusinessNatureType $businessNature) 
    {   
        
        
        $businessNature->fill(Input::all()); 
        $businessNature->save();   
         
        return Redirect::to(route('businessNature'))
                            ->with('flash_alert_notice', 'New Target Market  successfully created!');
    }

    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(BusinessNatureType $businessNature) {
        $page_title     = 'Business Nature';
        $page_action    = 'Edit Business Nature'; 
        $status         = [
                            'last_15_days'=>'inactive from last 15 days',
                            'last_30_days'=>'inactive from last 30 days',
                            'last_45_days'=>'inactive from last 45 days'
                        ];
        return view('packages::businessNature.edit', compact( 'url','businessNature','status', 'page_title', 'page_action'));
    }

    public function update(Request $request, BusinessNatureType $businessNature) {
        
        $businessNature->fill(Input::all()); 
        $businessNature->save();  
        return Redirect::to(route('businessNature'))
                        ->with('flash_alert_notice', 'Target Market  successfully updated.');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(BusinessNatureType $businessNature) { 
        
         TargetMarketType::where('id',$program->id)->delete();
        return Redirect::to(route('businessNature'))
                        ->with('flash_alert_notice', 'Target Market  successfully deleted.');
    }

    public function show($id) {
        
        return Redirect::to('admin/businessNature');

    }

}