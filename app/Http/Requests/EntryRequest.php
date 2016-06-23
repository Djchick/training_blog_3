<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EntryRequest extends Request
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
        $rule = config('common.entry.rule');
        return [
            'title' => "required|max:{$rule['title_max']}|unique:entries,id, {$this->id}",
            'body' => "required|min:{$rule['body_min']}",
        ];
    }
}
