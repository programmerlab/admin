<?php
namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TargetLocation extends Model {

   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'target_locations';
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
    protected $fillable = ['regionName','regionId','userId'];  // All field of user table here    

    
    
  
}
