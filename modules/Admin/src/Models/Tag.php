<?php
// Added by Ocean
namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model as Eloquent; 

use Nestable\NestableTrait; 

class Tag extends Eloquent {

     use NestableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';
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
     */
   protected $fillable = ['user_id', 'name', 'slug'];  // All field of user table here    

    
  
}
