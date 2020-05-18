<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest{

    public function authorize(){
        return $this->user()->id == $this->post->user_id;
    }

    public function rules(){
        return [
            'title' => 'required',
            'url' => 'required|url'
        ];
    }
}
