@extends('backend.layouts.app')
@section('content')
<div class="px-4 mt-auto relative py-5 h-full 2xl:h-[calc(100vh-150px)] flex items-center">
    <img class="absolute left-0 top-10 block w-full h-[300px] md:h-[480px] xl:h-[605px] object-cover" src="{{ asset('images/web/wave.svg') }}" alt="Wave">
    <div class="container mx-auto relative">
        <div class="flex items-center justify-around">
            <div class="lg:pl-10 pr-10 hidden md:block">
                <!-- <img src="{{ asset('images/web/person.png') }}" alt=""> -->
                <div id="person"></div>
            </div>
            <div class="backdrop-blur border-2 sm:border-4 border-cyan p-4 sm:p-6 md:p-8 lg:p-10 xl:p-12 rounded-[10px] w-[400px] md:w-[500px]">
                <h3 class="text-[24px] lg:text-[28px] font-semibold mb-1">{{ __('register.heading') }}</h3>
                <p class="text-sm text-gray-custom font-medium mb-5">{{ __('register.sub_text') }}</p>

                <form method="POST" id="register" action="{{ route('register') }}">
                    @csrf
                    {{-- @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror --}}
                    <div class="mt-5">
                        <label>{{ __('register.form.name') }}</label>
                        <div class="mt-1.5">
                            <input class="text-sm border border-zinc-700 px-5 w-full rounded-[30px] bg-transparent outline-0 h-[46px] @error('name') is-invalid @enderror" name="name" type="text" value="{{ old('name') }}" placeholder="Enter name" autofocus>
                        </div>
                    </div>
                    <div class="mt-5">
                        <label>{{ __('register.form.email') }}</label>
                        <div class="mt-1.5">
                            <input class="text-sm border border-zinc-700 px-5 w-full rounded-[30px] bg-transparent outline-0 h-[46px] @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email address">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label>{{ __('register.form.password') }}</label>
                        <div class="mt-1.5 relative">
                            <input id="passField" class="text-sm border border-zinc-700 px-5 w-full rounded-[30px] bg-transparent outline-0 h-[46px] @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter password">
                            <button onclick="showPassword()" class="absolute right-5 top-4" type="button">
                                <img id="imgToggle" src="{{ asset('images/web/eye.svg') }}" alt="Eye" width="18" height="15">
                            </button>
                        </div>
                    </div>
                    <div class="mt-5">
                        <label>{{ __('register.form.confirm_password') }}</label>
                        <div class="mt-1.5 relative">
                            <input id="passConField" class="text-sm border border-zinc-700 px-5 w-full rounded-[30px] bg-transparent outline-0 h-[46px]" type="password" name="password_confirmation" placeholder="Confirm the password">
                            <button onclick="showConPassword()" class="absolute right-5 top-4" type="button">
                                <img id="imgConToggle" src="{{ asset('images/web/eye.svg') }}" alt="Eye" width="18" height="15">
                            </button>
                        </div>
                    </div>
                    <div class="mt-5 flex justify-between">
                        <label class="flex">
                            <input type="checkbox" class="accent-cyan h-5 w-5 mr-3" name="terms">
                            <span class="text-sm text-gray-light">{{ __('register.terms_1') }} <a href=""><u>{{ __('register.terms_2') }}</u></a>.</span>
                        </label>
                    </div>
                    <label class="errorTxt" id="err_terms"></label>
                    <div class="mt-6 md:mt-8 lg:mt-10">
                        <button class="text-base md:text-lg font-semibold flex items-center justify-center bg-cyan rounded-full h-11 md:h-12 xl:h-14 w-full" type="submit">{{ __('register.buttons.register') }}</button>
                    </div>
                </form>
                <p class="text-sm font-medium text-center mt-2">{{ __('register.already_have_an_account') }}&nbsp;
                    <a class="text-base font-semibold text-cyan" href="{{ route('login') }}">{{ __('register.log_in') }}</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('after-scripts')
<script src="{{asset('js/person.json')}}"></script> 
<script src="{{ asset('js/register.js') }}"></script>
@endsection