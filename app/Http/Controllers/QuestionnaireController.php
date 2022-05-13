<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionnaireController extends Controller
{

    public function pass(Request $request): JsonResource|RedirectResponse
    {
        $data = $this->validation($request);

        if(Auth::user()->questionnaire){
            return $request->wantsJson()
                ? new JsonResource([
                    'success' => 'false'
                ],200)
                : redirect()->route('home');
        }

        $questionnaire = new Questionnaire;
        $questionnaire->q1  = $data['q1'];
        $questionnaire->q2  = $data['q2'];
        $questionnaire->q3  = $data['q3'];
        $questionnaire->q4  = $data['q4'];

        Auth::user()->questionnaire()->save($questionnaire);

        return $request->wantsJson()
            ? new JsonResource([
                'success' => 'true'
            ],201)
            : redirect()->route('home');
    }

    protected function validation(Request $request): array
    {
        return $request->validate([
            'q1' => ['required','string','max:3000'],
            'q2' => ['required','string','max:3000'],
            'q3' => ['required','string','max:3000'],
            'q4' => ['required','string','max:3000']
        ]);
    }

}
