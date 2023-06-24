@extends('layouts.app')

@push('after-styles')
    <style>
        .typing-content .form-group {
            padding: 0 10px;
            margin: 0;
            flex: 1 1 0;
            width: auto;
        }
        .typing-textarea  {
            max-width: 90%;
        }
        .typing-controls {
            max-width: 10%;
        }
    </style>
@endpush

@section('content')
    <div class="mx-auto h-100">
        <div class="chat-container overflow-y-scroll" style="max-height: 32rem;">
            <div class="chat outgoing">
                <div class="chat-content">
                    <div class="chat-details">
                        <img src="{{ asset('images/web/user.svg') }}" alt="user-img">
                        <p>asd</p>
                    </div>
                </div>
            </div>
            <div class="chat incoming">
                <div class="chat-content">
                    <div class="chat-details">
                        <img src="{{ asset('images/web/boat.svg') }}" alt="chatbot-img">

                        <p>Sorry, I'm not sure what you are asking. Could you please clarify your question?</p>
                    </div>
                    <button class="flex ml-auto gap-2"><svg stroke="currentColor" fill="none" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"
                            height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1">
                            </rect>
                        </svg>Copy code</button>
                </div>
            </div>
            <div class="chat outgoing">
                <div class="chat-content">
                    <div class="chat-details">
                        <img src="{{ asset('images/web/user.svg') }}" alt="user-img">
                        <p>asd</p>
                    </div>
                </div>
            </div>
            <div class="chat incoming">
                <div class="chat-content">
                    <div class="chat-details">
                        <img src="{{ asset('images/web/boat.svg') }}" alt="chatbot-img">

                        <p>Sorry, I'm not sure what you are asking. Could you please clarify your question?</p>
                    </div>
                    <button class="flex ml-auto gap-2"><svg stroke="currentColor" fill="none" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"
                            height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1">
                            </rect>
                        </svg>Copy code</button>
                </div>
            </div>
            <div class="chat outgoing">
                <div class="chat-content">
                    <div class="chat-details">
                        <img src="{{ asset('images/web/user.svg') }}" alt="user-img">
                        <p>asd</p>
                    </div>
                </div>
            </div>
            <div class="chat incoming">
                <div class="chat-content">
                    <div class="chat-details">
                        <img src="{{ asset('images/web/boat.svg') }}" alt="chatbot-img">

                        <p>Sorry, I'm not sure what you are asking. Could you please clarify your question?</p>
                    </div>
                    <button class="flex ml-auto gap-2"><svg stroke="currentColor" fill="none" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"
                            height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1">
                            </rect>
                        </svg>Copy code</button>
                </div>
            </div>
        </div>
        <!-- Typing container -->

        <div class="typing-container relative d-flex">
            <div class="typing-content">
                <div class="typing-textarea form-group">
                    <textarea id="chat-input" spellcheck="false" placeholder="Enter a prompt here" required></textarea>
                    <span id="send-btn" class="material-symbols-rounded">send</span>
                </div>
                <div class="typing-controls form-group d-flex flex-column ">
                    {{-- <span id="theme-btn" class="material-symbols-rounded">light_mode</span> --}}
                    {{-- <span id="delete-btn" class="material-symbols-rounded">delete</span> --}}
                    <button
                        class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded p-1 hover:text-white"><svg
                            stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                            stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em"
                            width="1em" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                            </path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg></button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after-scripts')
@endsection
