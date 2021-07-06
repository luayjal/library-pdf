<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name'=>'required',
            'description' => 'required|min:20',
            'image'=> 'image',
            'file' =>'file|mimes:pdf'

        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'هذا الحقل إجباري',
            'name.unique' => 'هذا الاسم موجود مسبقاً',
            'description.required' => 'هذا الحقل اجباري',
            'description.min' => 'يجب أن يكون نص الوصف أكبر من 20 حرف',
            'image.image'=> 'الرجاء ارفاق صيغة صحيحة للصورة'
        ];
    }
}
