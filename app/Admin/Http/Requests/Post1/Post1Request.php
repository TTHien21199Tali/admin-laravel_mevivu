<?php

namespace App\Admin\Http\Requests\Post1;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\DefaultStatus;
use App\Enums\Is_featured;
use Illuminate\Validation\Rules\Enum;

class Post1Request extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'title' => ['required', 'string'],
            'image' => ['required'],
            'status' => ['required', new Enum(DefaultStatus::class)],
            'is_featured' => ['required', new Enum(Is_featured::class)],
            'excerpt' => ['nullable'],
            'content' => ['nullable']
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Post1,id'],
            
            'title' => ['required', 'string'],
            'slug' => ['required', 'string', 'unique:App\Models\Post1,slug,' . $this->id],
            'image' => ['required'],
            'status' => ['required', new Enum(DefaultStatus::class)],
            'is_featured' => ['required', new Enum(Is_featured::class)],
            'excerpt' => ['nullable'],
            'content' => ['nullable']
        ];
    }
}
