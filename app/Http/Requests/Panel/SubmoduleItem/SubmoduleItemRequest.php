<?php

namespace App\Http\Requests\Panel\SubmoduleItem;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class SubmoduleItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $name_en = ['nullable', 'regex:/^[a-zA-Z\-_\.\s\(\)]+$/u'];
        $name_en[] = $this->method() == 'POST'
            ? Rule::unique('submodules', 'name_en')
            : Rule::unique('submodules', 'name_en')
                ->ignore($this->route('submodule'));
        $name_fa = ['required', 'regex:/^[آ-یءي\-_\.\s\(\)]+$/u'];
        $name_fa[] = $this->method() == 'POST'
            ? Rule::unique('submodules', 'name_fa')
            : Rule::unique('submodules', 'name_fa')
                ->ignore($this->route('submodule'));

        $icon = [];
        $icon[] = $this->method() == 'POST' ? 'required' : 'nullable';
        return [
            'submodule_id' => 'nullable|integer|exists:submodules,id',
            'name_en' => $name_en,
            'name_fa' => $name_fa,
            'icon' => $icon,
            'route' => 'nullable',
            'order' => 'nullable',
            'status' => ['required' , new Enum(Status::class)],
            'description' => ['nullable', 'regex:/^[a-zA-Z0-9آ-یءئ۰-۹\s\.,!?\(\)\/_\-]+$/u'],
        ];
    }
    public function messages(): array
    {
        return [
            'icon' => 'نوع فایل مورد نیاز در این بخش svg می باشد'
        ];
    }
    public function prepareForValidation()
    {
        $data = $this->all();

        foreach ( $data as $item) {
            if($data['order'] === null) {
                $data['order'] = '0';
            }else {
                $data['order'] = toEnglishNumber($data['order']);
            }
        }

        $this->replace($data);

    }
}
