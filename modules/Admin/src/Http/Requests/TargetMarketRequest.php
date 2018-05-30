<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request;
use Input;

use Illuminate\Foundation\Http\FormRequest;

class TargetMarketRequest  extends FormRequest {

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
                    if ( $targetMarket = $this->targetMarket) {

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
