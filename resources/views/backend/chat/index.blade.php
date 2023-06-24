@extends('layouts.app')

@push('after-styles')
    <style>
        .typing-content .form-group {
            padding: 0 10px;
            margin: 0;
            flex: 1 1 0;
            width: auto;
        }

        .typing-textarea {
            max-width: 90%;
        }

        .typing-controls {
            max-width: 10%;
        }
    </style>
@endpush

@section('content')
    <div class="mx-auto h-100 rounded">
        
        {{-- <div class="chat-container overflow-y-scroll" style="height: 32rem"></div> --}}
        <div class="chat-container overflow-y-scroll w-100 h-[calc(100vh-235px)]"></div>
        <div class="typing-container relative d-flex">
            <div class="typing-content">
                <div class="typing-textarea form-group">
                    {{-- <textarea id="schema-input" spellcheck="false" placeholder="Enter a Schema here" required></textarea> --}}
                    <textarea id="chat-input" spellcheck="false" placeholder="Enter a prompt here" required></textarea>
                    <span id="send-btn" class=" bg-gray-500 text-white hover:text-white material-symbols-rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                            <path
                                d="M16.1 260.2c-22.6 12.9-20.5 47.3 3.6 57.3L160 376V479.3c0 18.1 14.6 32.7 32.7 32.7c9.7 0 18.9-4.3 25.1-11.8l62-74.3 123.9 51.6c18.9 7.9 40.8-4.5 43.9-24.7l64-416c1.9-12.1-3.4-24.3-13.5-31.2s-23.3-7.5-34-1.4l-448 256zm52.1 25.5L409.7 90.6 190.1 336l1.2 1L68.2 285.7zM403.3 425.4L236.7 355.9 450.8 116.6 403.3 425.4z" />
                        </svg></span>
                </div>
                @php($disabled = Session::has('dbSchema') ? 'disabled' : '')
                <div>
                    <select name="language" {{ $disabled }} id="language">
                        <option selected value="Mysql">MySql</option>
                        <option value="Laravel&nbsp;Eloquent&nbsp;ORM">Laravel Eloquent</option>
                        <option value="Laravel&nbsp;Raw&nbsp;Query">Laravel DB Query</option>
                        <option value="Python">Python</option>
                    </select>
                </div>

                <div class="typing-controls form-group d-flex flex-column ">
                    {{-- <span id="theme-btn" class="material-symbols-rounded">light_mode</span> --}}
                    {{-- <span id="delete-btn" class="material-symbols-rounded">delete</span> --}}

                    <span id="delete-btn" class="material-symbols-rounded"><svg stroke="currentColor" fill="none"
                            stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                            class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                            </path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg></span>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after-scripts')
    <script>
        let userImage = '<img src="{{ asset('images/web/user.svg') }}" alt="user-img">';
        let botImage = '<img src="{{ asset('images/web/boat.svg') }}" alt="chatbot-img">';
    </script>
    <script src="{{ asset('backend/js/query-chat.js') }}"></script>
@endsection
