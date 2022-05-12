@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Регистрация в личном кабинете абитуриента</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="register-form">
                        @csrf
                        <div class="row mb-3">
                            <label for="surnameInput" class="form-label col-form-label text-md-end col-md-4">Фамилия <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="surnameInput" name="surname" placeholder="Иванов" required maxlength="255">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nameInput" class="form-label col-form-label text-md-end col-md-4">Имя <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="nameInput" name="name" placeholder="Петров" required maxlength="255">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="patronymicInput" class="form-label col-form-label text-md-end col-md-4">Отчество (При наличие)</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="patronymicInput" name="patronymic" placeholder="Сергеевич" maxlength="255">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birthdayInput" class="col-md-4 col-form-label text-md-end">Дата рождения <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" id="birthdayInput" name="birthday" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birthdayPlaceInput" class="col-md-4 col-form-label text-md-end">Место рождения<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="birthdayPlaceInput" name="birthday_place" required maxlength="3000">
                            </div>
                        </div>

                        <div class="row mb-3 mt-1">
                            <p class="col-md-4 col-form-label text-md-end">Паспорт <span class="text-danger">*</span></p>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label for="dateOfIssueInput" class="form-label d-none">Дата выдачи</label>
                                        <input type="date" class="form-control" id="dateOfIssueInput" name="date_of_issue" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="seriesInput" class="form-label d-none">Серия</label>
                                        <input type="text" class="form-control" id="seriesInput" placeholder="Серия" name="series" required maxlength="5">
                                    </div>
                                    <div class="col-4">
                                        <label for="numberInput" class="form-label d-none">Номер</label>
                                        <input type="text" class="form-control" id="numberInput" placeholder="Номер" name="number" required maxlength="6">
                                    </div>
                                    <div class="mt-3">
                                        <label for="IssuedByInput" class="form-label d-none">Кем выдан</label>
                                        <textarea class="form-control" id="IssuedByInput" rows="3" name="issued_by" placeholder="Кем выдан" required maxlength="3000"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="propiskaInput" class="col-md-4 col-form-label text-md-end">Адрес регистрации<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="propiskaInput" rows="3" name="propiska" required maxlength="255"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="emailInput" class="col-md-4 col-form-label text-md-end">Email <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="emailInput" name="email" placeholder="mail@exaple.com" required>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Создать аккаунт
                                </button>
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    Уже есть аккаунт?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <p class="mb-0">Пароль генерируется автоматически и высылается на указанный email адрес.</p>
                    <p class="mb-0"><span class="text-danger">*</span> - обязательные поля</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset(mix('js/page/auth/register.js')) }}"></script>
@endsection
