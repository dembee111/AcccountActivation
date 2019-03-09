@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Имэйл хаяг баталгаажуулах') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Баталгаажуулах зурвасыг таны бүртгүүлэсэн хаяг руу дахин илгээсэн имэйл хаягаа шалгана уу!') }}
                        </div>
                    @endif

                    {{ __('Бүртгүүлэсэн имэйл хаягаа баталгаажуулж нэвтэрч орно уу!') }}
                    {{ __('Хэрвээ имэйл хүлээн аваагүй бол энд дарна уу') }}, <a href="{{ route('verification.resend') }}">{{ __('Дахин илгээх') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
