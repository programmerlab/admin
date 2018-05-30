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
use Modules\Admin\Models\ContactGroup;
use Modules\Admin\Models\TargetMarketType; 
use Response; 
use Modules\Admin\Http\Requests\TargetMarketRequest;
/**
 * Class AdminController
 */
class TargetMarketTypeController extends Controller {
    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct(TargetMarketType $targetMarket) { 
        $this->middleware('admin');
        View::share('viewPage', 'Target Market');
        View::share('sub_page_title', 'Target Market');
        View::share('helper',new Helper);
        View::share('heading','Target Market');
        View::share('route_url',route('targetMarket')); 
        $this->record_per_page = Config::get('app.record_per_page'); 
    }

   
    /*
     * Dashboard
     * */

    public function index(TargetMarketType $targetMarket, Request $request) 
    { 
        $page_title = 'Target Market';
        $sub_page_title = 'Target Market';
        $page_action = 'View Target Market'; 


        if ($request->ajax()) {
            $id = $request->get('id'); 
            $category = TargetMarketType::find($id); 
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
               
            $targetMarket = TargetMarketType::where(function($query) use($search,$status) {
                        if (!empty($search)) {
                            $query->Where('title', 'LIKE', "%$search%");
                        }
                        
                    })->Paginate($this->record_per_page);
        } else {
            $targetMarket = TargetMarketType::Paginate($this->record_per_page);
        }
         
        
        return view('packages::targetMarket.index', compact('result_set','targetMarket','data', 'page_title', 'page_action','sub_page_title'));
    }

    /*
     * create Group method
     * */

    public function create(TargetMarketType $targetMarket) 
    {
        $page_title     = 'Target Market';
        $page_action    = 'Create Target Market';
        $program       = TargetMarketType::all(); 
        $status         = [
                            'last_15_days'=>'inactive from last 15 days',
                            'last_30_days'=>'inactive from last 30 days',
                            'last_45_days'=>'inactive from last 45 days'
                        ];

        return view('packages::targetMarket.create', compact( 'targetMarket','status','page_title', 'page_action'));
    }

    

    /*
     * Save Group method
     * */

    public function store(TargetMarketRequest $request, TargetMarketType $targetMarket) 
    {   
        $targetMarket->fill(Input::all()); 
        $targetMarket->save();   
         
        return Redirect::to(route('targetMarket'))
                            ->with('flash_alert_notice', 'New Target Market  successfully created!');
    }

    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(TargetMarketType $targetMarket) {
        $page_title     = 'Target Market';
        $page_action    = 'Edit Ttarget Market'; 
        $status         = [
                            'last_15_days'=>'inactive from last 15 days',
                            'last_30_days'=>'inactive from last 30 days',
                            'last_45_days'=>'inactive from last 45 days'
                        ];
        return view('packages::targetMarket.edit', compact( 'url','targetMarket','status', 'page_title', 'page_action'));
    }

    public function update(Request $request, TargetMarketType $targetMarket) {
        
        $targetMarket->fill(Input::all()); 
        $targetMarket->save();  
        return Redirect::to(route('targetMarket'))
                        ->with('flash_alert_notice', 'Target Market  successfully updated.');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(TargetMarketType $targetMarket) { 
        
         TargetMarketType::where('id',$targetMarket->id)->delete();
        return Redirect::to(route('targetMarket'))
                        ->with('flash_alert_notice', 'Target Market  successfully deleted.');
    }

    public function show($id) {
        
        return Redirect::to('admin/targetMarket');

    }

}