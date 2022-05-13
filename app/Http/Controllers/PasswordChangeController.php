<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasswordChangeController extends Controller
{
    /**
     * Изменить пароль пользователя
     *
     * @param Request $request
     * @return JsonResponse|RedirectResponse
     * @throws ValidationException
     */
    public function change(Request $request): JsonResponse|RedirectResponse
    {
        $this->validatorChange($request);

        $this->correctOldPassword($request);

        $this->setNewPassword($request);

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('home');
    }

    /**
     * Установить новый пароль пользователю
     *
     * @param Request $request
     */
    protected function setNewPassword(Request $request)
    {
        $user = $request->user();
        $user->password = Hash::make($request->input('new-password'));
        $user->save();
    }

    /**
     * Проверка что, старый пароль верный
     *
     * @param Request $request
     * @throws ValidationException
     */
    protected function correctOldPassword(Request $request){
        if(!password_verify($request->input('old-password'),$request->user()->password)){
            throw ValidationException::withMessages([
                'old-password' => ['Введенный пароль не верный!'],
            ]);
        }
    }

    /**
     * Валидация формы сброса пароля
     *
     * @param Request $request
     * @throws ValidationException
     */
    protected function validatorChange(Request $request){
        $request->validate([
            'old-password' => ['required','string','max:255'],
            'new-password' => ['required', 'string', 'min:6','max:255','confirmed'],
        ]);
    }
}
