<?php
namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Country extends Model {

   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    
    public function state()
    {
        return $this->hasMany('Modules\Admin\Models\State','country_id')->with('city');
    }

    
  
}
