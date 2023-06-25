@extends('layouts.app')

@section('content')
<div class="profile">
    <p class="text-[16px] mb-3">General Setting</p>
    <div class="tabs flex items-center">
        <button data-tab-value="#tab_account"
            class="active uppercase d-flex items-center me-3 text-[13px] pb-2 relative custom-action">
            <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="18" height="18"
                class="me-2">
                <style>
                </style>
                <g id="Layer">
                    <path id="Layer" class="s0"
                        d="m9.8 1q-1.8 0.2-3 1.5c-0.7 0.7-1.2 1.5-1.4 2.6-0.1 0.4-0.1 1.4 0 1.8 0.2 1.1 0.7 1.9 1.4 2.6 0.8 0.8 1.6 1.2 2.6 1.4 0.5 0.1 1.4 0.1 1.9 0 1-0.2 1.8-0.6 2.6-1.4 0.7-0.7 1.2-1.5 1.4-2.6 0.1-0.4 0.1-1.4 0-1.8q-0.2-1.1-0.8-1.9c-0.2-0.4-1-1.1-1.3-1.3-0.6-0.4-1.3-0.7-1.9-0.8-0.3-0.1-1.2-0.1-1.5-0.1z" />
                    <path id="Layer" class="s0"
                        d="m8.4 12.2c-2.1 0.2-4 1.4-5.2 3.2-0.7 1.1-1.1 2.3-1.2 3.7 0 0.4 0 0.5 0.1 0.6q0 0.1 0.2 0.2c0.1 0.1 0.2 0.1 8.1 0.1 7.8 0 7.9 0 8-0.1q0.2-0.1 0.2-0.2c0.1-0.1 0.1-0.2 0.1-0.6-0.1-1.8-0.8-3.4-2.1-4.8-1.2-1.2-2.7-2-4.4-2.1-0.6-0.1-3.3-0.1-3.8 0z" />
                </g>
            </svg>

            Account
        </button>
        {{-- <button data-tab-value="#tab_billing"
            class="uppercase d-flex items-center me-3 text-[13px] pb-2 relative custom-action">
            <svg id="vuesax_bold_card" data-name="vuesax/bold/card" xmlns="http://www.w3.org/2000/svg" width="20"
                height="20" viewBox="0 0 20 20" class="me-2">
                <g id="card">
                    <path id="Vector"
                        d="M16.667,3.458a1,1,0,0,1-1,1H1a1,1,0,0,1-1-1V3.45A3.446,3.446,0,0,1,3.45,0h9.758a3.46,3.46,0,0,1,3.458,3.458Z"
                        transform="translate(1.667 2.833)" />
                    <path id="Vector-2" data-name="Vector"
                        d="M1,0H15.667a1,1,0,0,1,1,1V5.167a3.46,3.46,0,0,1-3.458,3.458H3.45A3.446,3.446,0,0,1,0,5.175V1A1,1,0,0,1,1,0ZM5.625,5.208A.63.63,0,0,0,5,4.583H3.333a.625.625,0,1,0,0,1.25H5A.63.63,0,0,0,5.625,5.208Zm5.417,0a.63.63,0,0,0-.625-.625H7.083a.625.625,0,0,0,0,1.25h3.333A.63.63,0,0,0,11.042,5.208Z"
                        transform="translate(1.667 8.542)" />
                    <path id="Vector-3" data-name="Vector" d="M0,0H20V20H0Z" fill="none" opacity="0" />
                </g>
            </svg>
            Billing
        </button> --}}
    </div>

    <div class="tab-content bg-no-repeat bg-cover mt-3 p-3 bg-gray-bg">
        <div class="tabs__tab active" id="tab_account" data-tab-info>
            <div class="p-4">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="flex w-100">
                            <div class="text-center">
                                <div
                                    class="profile-image relative rounded-full overflow-hidden border-[1px] border-cyan w-[145px] h-[145px]">
                                    <img src="{{asset('images/web/user.png')}}" alt="user" width="100%" height="100%" />
                                </div>
                                <p class="text-white text-sm mt-3">{{ $user->name ?? '' }}</p>
                            </div>
                            <div class="ms-3 w-100">
                                <div class="mb-3">
                                    <label for="name" class="block mb-2 text-sm text-white">Name</label>
                                    <input type="text" id="name"
                                        class="bg-gray-50 border border-dark bg-dark text-white text-opacity-[.5px] text-sm rounded-3xl w-100"
                                        value="{{ $user->name ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="block mb-2 text-sm text-white">Email Address</label>
                                    <input type="email" id="email"
                                        class="bg-gray-50 border border-dark bg-dark text-white text-opacity-[.5px] text-sm rounded-3xl w-100"
                                        value="{{ $user->email ?? '' }}">
                                </div>
                                <div class="mb-2 relative">
                                    <label for="pwd" class="block mb-2 text-sm text-white">Password</label>
                                    <input type="password" id="pwd"
                                        class="bg-gray-50 border border-dark bg-dark text-white text-opacity-[.5px] text-sm rounded-3xl w-100"
                                        value="{{ $user->password ?? '' }}">
                                    <button class="absolute right-3 bottom-3">
                                        <img src="{{asset('images/web/eye-gray.svg')}}" alt="eye" />
                                    </button>
                                </div>
                                <a href="#" class="text-sm text-cyan hover:text-cyan">Change Password</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div>
                            <label for="token" class="block mb-2 text-sm text-white">Token ID</label>
                            <textarea type="text" id="token" rows="9" class="bg-gray-50 border border-dark bg-dark text-white text-opacity-[.5px] text-sm rounded-3xl w-100"
                                value="" disabled>{{ $token ?? '' }}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabs__tab" id="tab_billing" data-tab-info>
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-4">
                    <div
                        class="bg-light-black border-[1px] border-cyan p-3 flex items-center rounded-[4px] justify-between mb-3 mb-xl-0">
                        <div>
                            <p class="text-[23px] text-white uppercase font-semibold">Free plan
                                <span class="text-sm text-color-green">(Active)</span>
                            </p>
                            <p class="text-[12px] text-color-gray text-[10px]">Individual and quick project plan</p>
                        </div>
                        <div class="text-white flex">
                            <sup class="text-[12px] mt-3">$</sup>
                            <p class="text-[54px] leading-none">0</p>
                            <p class="text-[9px] text-white flex justify-between mt-3 mb-2 flex-column">
                                <sup class="text-[12px]">.00</sup>
                                <span>/year</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-4">
                    <div
                        class="bg-light-black border-[1px] border-border-light p-3 flex items-center rounded-[4px] justify-between mb-3 mb-xl-0">
                        <div>
                            <p class="text-[23px] text-white uppercase font-semibold">Basic plan
                            </p>
                            <p class="text-[12px] text-color-gray text-[10px]">Individual and quick project plan</p>
                        </div>
                        <div class="text-white flex">
                            <sup class="text-[12px] mt-3">$</sup>
                            <p class="text-[54px] leading-none">99</p>
                            <p class="text-[9px] text-white flex justify-between mt-3 mb-2 flex-column">
                                <sup class="text-[12px]">.00</sup>
                                <span>/year</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-4">
                    <div
                        class="bg-light-black border-[1px] border-border-light p-3 flex items-center rounded-[4px] justify-between mb-3 mb-xl-0">
                        <div>
                            <p class="text-[23px] text-white uppercase font-semibold">Pro plan
                            </p>
                            <p class="text-[12px] text-color-gray text-[10px]">Individual and quick project plan</p>
                        </div>
                        <div class="text-white flex">
                            <sup class="text-[12px] mt-3">$</sup>
                            <p class="text-[54px] leading-none">999</p>
                            <p class="text-[9px] text-white flex justify-between mt-3 mb-2 flex-column">
                                <sup class="text-[12px]">.00</sup>
                                <span>/year</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after-scripts')
<script src="{{ asset('js/home.js') }}"></script>
@endsection