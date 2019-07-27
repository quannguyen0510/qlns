<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNews extends FormRequest
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
            'title' => 'required|min:'.config('custom.min').'|max:'.config('custom.max'),
            'content' => 'required|min:'.config('custom.min'),
            'posted_by' => 'required',
            'created_at' => 'required'
        ];
    }
}

?>
