<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request;
use Input;

class TagRequest  extends Request {

    /**
     * The metric validation rules.
     *
     * Added by Ocean
     * @return array    
     */
    public function rules() { 
            switch ( $this->method() ) {
                case 'GET':
                case 'DELETE': {
                        return [ ];
                    }
                case 'POST': {
                        return [
                            'name' => 'required', 
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                   
                        return [
                            'name' => 'required',
                        ];
                  
                }
                default:break;
            }
        //}
    }

    /**
     * The
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

}
