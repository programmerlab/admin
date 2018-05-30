<?php
namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TargetMrket extends Model {

   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'target_markets';
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
    protected $fillable = ['title','targetMarketId','userId'];  // All field of user table here    

    
    
  
}
