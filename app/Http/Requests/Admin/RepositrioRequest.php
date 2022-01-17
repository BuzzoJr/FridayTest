<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class RepositrioRequest extends FormRequest
{
    public function rules()
    {
        return [
            "nome"=>[
				"string",
				"nullable"
			],
			"descrio"=>[
				"string",
				"nullable"
			],
			"arquivo"=>[
				"file",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "nome"=>"Nome",
			"descrio"=>"Descrição",
			"arquivo"=>"Arquivo"
        ];
    }
    public function messages()
    {
        return [
            "arquivo.required_without"=>trans("validation.required")
        ];
    }


    public function authorize()
    {
        if (!auth("admin")->check()) {
            return false;
        }
        return true;
    }
}