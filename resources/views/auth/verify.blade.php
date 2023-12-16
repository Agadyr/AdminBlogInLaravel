@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Потвердите ваш Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Код верифиакции был отправлен в ваш Email.') }}
                        </div>
                    @endif

                    {{ __('Пожалуйста посмотрите сперва ваш Email') }}
                    {{ __('Если код верификации не пришел запросите код обратно') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Нажмите сюда чтобы запросить новый') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
