<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request;
use Input;

class BusinessNatureRequest  extends Request {

    /**
     * The metric validation rules.
     *
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
                            'title' => 'required'
                            
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                    if ( $businessNature = $this->businessNature) {

                        return [
                            'title'  => 'required'
                        ];
                    }
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
