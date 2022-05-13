@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="mb-4">
                <div class="card border-bottom-0">
                    <div class="card-header">Меню</div>
                </div>
                <div class="list-group">
                    <a href="#questionnaire" data-bs-toggle="pill" data-bs-target="#questionnaire" class="menu-item list-group-item list-group-item-action card border-top-0 active">Анекта</a>
                    <a href="#change-data" data-bs-toggle="pill" data-bs-target="#change-data" class="menu-item list-group-item list-group-item-action">Основные данные</a>
                    <a href="#change-password" data-bs-toggle="pill" data-bs-target="#change-password" class="menu-item list-group-item list-group-item-action">Сменить пароль</a>
                </div>
            </div>
        </div>
        <div class="col-md-9 tab-content">
            <div class="card tab-pane fade show active" id="questionnaire">
                <div class="card-header">Анкета для абитуриентов</div>
                <div class="card-body">
                    <div class="@if(!Auth::user()->questionnaire){{ 'd-none' }}@endif" id="thank-you-questionnaire">
                        <p class="mb-0">Анкета отправлена. Спасибо за прохождение анкеты!</p>
                    </div>

                    @if(!Auth::user()->questionnaire)
                        <form action="{{ route('questionnaire') }}" method="POST" id="questionnaire-form">
                        <div class="row mb-3">
                            <label for="q1Input" class="form-label col-form-label text-md-end col-md-4">Чем ваc привлекает наш университет?</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="q1Input" rows="3" name="q1" required maxlength="3000"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="q2Input" class="form-label col-form-label text-md-end col-md-4">Какими компетенциями вы обладаете?</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="q2Input" rows="3" name="q2" required maxlength="3000"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="q3Input" class="form-label col-form-label text-md-end col-md-4">Ваши достижения</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="q3Input" rows="3" name="q3" required maxlength="3000"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="q4Input" class="form-label col-form-label text-md-end col-md-4">От куда вы о нас узнали?</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="q4Input" rows="3" name="q4" required maxlength="3000"></textarea>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Отправить
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif

                </div>
            </div>

            <div class="card tab-pane fade" id="change-data">
                <div class="card-header">Основные данные</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('change-data-user') }}" id="change-data-form">
                        @csrf
                        <div class="row mb-3">
                            <label for="surnameInput" class="form-label col-form-label text-md-end col-md-4">Фамилия <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="surnameInput" name="surname" value="{{ Auth::user()->surname ?? '' }}" placeholder="Иванов" required maxlength="255">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nameInput" class="form-label col-form-label text-md-end col-md-4">Имя <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="nameInput" name="name" value="{{ Auth::user()->name ?? '' }}" placeholder="Александар" required maxlength="255">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="patronymicInput" class="form-label col-form-label text-md-end col-md-4">Отчество (При наличие)</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="patronymicInput"  value="{{ Auth::user()->patronymic ?? '' }}" name="patronymic" placeholder="Сергеевич" maxlength="255">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birthdayInput" class="col-md-4 col-form-label text-md-end">Дата рождения <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" id="birthdayInput" name="birthday" value="{{ Auth::user()->birthday->format('Y-m-d') ?? '' }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birthdayPlaceInput" class="col-md-4 col-form-label text-md-end">Место рождения<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="birthdayPlaceInput" name="birthday_place" value="{{ Auth::user()->birthday_place ?? '' }}" required maxlength="3000">
                            </div>
                        </div>

                        <div class="row mb-3 mt-1">
                            <p class="col-md-4 col-form-label text-md-end">Паспорт <span class="text-danger">*</span></p>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label for="dateOfIssueInput" class="form-label d-none">Дата выдачи</label>
                                        <input type="date" class="form-control" id="dateOfIssueInput" name="date_of_issue" value="{{ Auth::user()->date_of_issue->format('Y-m-d') ?? '' }}" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="seriesInput" class="form-label d-none">Серия</label>
                                        <input type="text" class="form-control" id="seriesInput" placeholder="Серия" name="series" value="{{ Auth::user()->series ?? '' }}" required maxlength="5">
                                    </div>
                                    <div class="col-4">
                                        <label for="numberInput" class="form-label d-none">Номер</label>
                                        <input type="text" class="form-control" id="numberInput" placeholder="Номер" name="number" value="{{ Auth::user()->number ?? '' }}" required maxlength="6">
                                    </div>
                                    <div class="mt-3">
                                        <label for="IssuedByInput" class="form-label d-none">Кем выдан</label>
                                        <textarea class="form-control" id="IssuedByInput" rows="3" name="issued_by" placeholder="Кем выдан" required maxlength="3000">{{ Auth::user()->issued_by ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="propiskaInput" class="col-md-4 col-form-label text-md-end">Адрес регистрации<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="propiskaInput" rows="3" name="propiska" required maxlength="255">{{ Auth::user()->propiska ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Изменить данные
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <p class="mb-0"><span class="text-danger">*</span> - обязательные поля</p>
                </div>
            </div>
            <div class="card tab-pane fade" id="change-password">
                <div class="card-header">Сменить пароль</div>
                <div class="card-body">
                    <form action="{{ route('change-password') }}" method="POST" id="password-change-form">
                        @csrf

                        <div class="row mb-3">
                            <label for="password-old" class="col-md-4 col-form-label text-md-end">Текущий пароль</label>

                            <div class="col-md-6">
                                <input id="password-old" type="password" class="form-control" name="old-password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-new" class="col-md-4 col-form-label text-md-end">Новый пароль</label>

                            <div class="col-md-6">
                                <input id="password-new" type="password" class="form-control" name="new-password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-new-confirmation" class="col-md-4 col-form-label text-md-end">Повторите новый пароль</label>

                            <div class="col-md-6">
                                <input id="password-new-confirmation" type="password" class="form-control" name="new-password_confirmation" required autocomplete="current-password">
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Изменить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset(mix('js/page/home.js')) }}"></script>
@endsection
