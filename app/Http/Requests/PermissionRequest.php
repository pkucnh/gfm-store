<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'permission' => 'required|unique:permissions,name'
        ];
    }

    public function messages(){
        return [
            'permission.required' => 'Tên quyền không được bỏ trống',
            'permission.unique' => 'Tên quyền đã tồn tại'
        ];
    }
}
