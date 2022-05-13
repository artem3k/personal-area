<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChangeUserData extends Controller
{
    /**
     * Изменить данные пользователя
     *
     * @param Request $request
     * @return JsonResource|RedirectResponse
     */
    public function change(Request $request): JsonResource|RedirectResponse
    {

        $this->validation($request);

        $this->save($request->toArray());

        return $request->wantsJson()
            ? new JsonResource([],204)
            : redirect()->route('/home');
    }

    /**
     * Проверка формы
     *
     * @param Request $request
     */
    protected function validation(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'patronymic' => ['nullable','string', 'max:255'],
            'birthday' => ['required','date'],
            'birthday_place' => ['required','string', 'max:3000'],
            'series' => ['required','string', 'max:5','regex:/^[0-9][0-9] [0-9][0-9]$/'],
            'number' => ['required','string', 'max:6','min:6','regex:/^[0-9][0-9][0-9][0-9][0-9][0-9]$/'],
            'issued_by' => ['required','string', 'max:3000'],
            'propiska' => ['required','string', 'max:3000'],
        ]);
    }

    /**
     * Сохранить новые данные
     *
     * @param array $data
     */
    protected function save(array $data){
        Auth::user()->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'birthday' =>  $data['birthday'],
            'birthday_place' =>  $data['birthday_place'],
            'date_of_issue' => $data['date_of_issue'],
            'series' =>  str_replace(' ','',$data['series']),
            'number' =>  $data['number'],
            'issued_by' =>  $data['issued_by'],
            'propiska' =>  $data['propiska']
        ]);
    }
}
