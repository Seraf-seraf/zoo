<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class Animal extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'animal';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'view',
        'age',
        'description'
    ];

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:64',
                Rule::unique('animal')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
            'view' => 'required|string|min:2|max:128',
            'age' => 'required|integer|min:0|max:128',
            'description' => 'min:0|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле обязяательно для заполнения!',
            'min' => 'Минимальная длина значения :min символа!',
            'max' => 'Минимальная длина значения :max символов!',
            'age.min' => 'Минимальный возраст животного :min лет!',
            'age.max' => 'Максимальный возраст животного может быть :max лет!',
            'name.unique' => 'Вы уже добавили это животное!'
        ];
    }
}
