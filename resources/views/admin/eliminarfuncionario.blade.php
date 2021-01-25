@extends('admin/layout')
{{-- //Author: Fabian Nunes--}}
@section('content')
    <div class="section-registo" >
        <div class="container" style="height: 100vh;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card card-registo middle">
                        <div class="card-header mx-auto" style="padding-top: 5rem">{{ __('Eliminar Funcionarios') }}</div>

                        <div class="card-body" style="padding-top: 2rem">
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row justify-content-center">
                                    <br>
                                    <div class="col-md-6">
                                        {{-- Nome--}}
                                        <label for="nome" class="col-form-label text-md-right">{{ __('Nome Completo') }}</label>
                                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                                        @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror

                                        {{-- Email--}}
                                        <label for="email" class=" col-form-label text-md-right">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror

                                    </div>


                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-12 mx-auto text-center" >
                                        <button type="submit" class="btn btn-primary btn-registo eliminateBtn">
                                            {{ __('Eliminar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
