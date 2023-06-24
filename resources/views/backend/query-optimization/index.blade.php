@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 col-md-6 relative">
        <p class="mb-3">Input Query</p>
        <div class="w-100 h-[calc(100vh-180px)]">
            <textarea placeholder="Entry Query" class="w-100 h-100 rounded-2xl bg-dark-black border-0 p-3 resize-none focus:shadow-none"></textarea>
        </div>
        <div class="buttons flex absolute right-7 bottom-5">
            <button class="bg-light-black border-[1px] border-border-light w-12 h-12 rounded-3xl flex items-center justify-center mr-3">
                <img src="{{asset('images/web/refresh.svg')}}" alt="refresh" />
            </button>
            <button class="bg-cyan border-[1px] border-cyan w-12 h-12 rounded-3xl flex items-center justify-center">
                <img src="{{asset('images/web/send.svg')}}" alt="send" />
            </button>
        </div>
    </div>
    <div class="col-12 col-md-6 relative">
        <p class="mb-3">Optimized Query</p>
        <div class="w-100 h-[calc(100vh-180px)]">
            <textarea placeholder="Output" class="w-100 h-100 rounded-2xl bg-dark-black border-0 p-3 resize-none focus:shadow-none focus:offset-none"></textarea>
        </div>
        <div class="buttons flex absolute right-5 bottom-5">
            <button class="bg-light-black border-[1px] border-border-light w-12 h-12 rounded-3xl flex items-center justify-center mr-3">
                <img src="{{asset('images/web/swap.svg')}}" alt="swap" />
            </button>
            <button class="bg-light-black border-[1px] border-border-light w-12 h-12 rounded-3xl flex items-center justify-center mr-3">
                <img src="{{asset('images/web/share.svg')}}" alt="share" />
            </button>
            <button class="bg-light-black border-[1px] border-border-light w-12 h-12 rounded-3xl flex items-center justify-center mr-3">
                <img src="{{asset('images/web/copy.svg')}}" alt="copy" />
            </button>
        </div>
    </div>
</div>
@endsection

@section('after-scripts')
<script src="{{ asset('js/home.js') }}"></script>

@endsection