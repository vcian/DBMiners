@extends('layouts.app')

@push('after-styles')
    <style>
        label.error {
            color: #dc3545;
            font-size: 14px;
        }
    </style>
@endpush

@section('content')
    <div class="query-optimization">
        <div class="tabs flex items-center">
            <button data-tab-value="#tab_connect"
                class="active uppercase d-flex items-center me-3 text-[13px] pb-2 relative custom-action">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" class="me-2">
                    <g id="noun-chain-1655550" transform="translate(-70.937 -14.141)">
                        <path id="Path_94447" data-name="Path 94447"
                            d="M96.886,211.746a4.451,4.451,0,0,0,.358-1.727,4.373,4.373,0,0,0-.147-1.159,5.475,5.475,0,0,0-.274-.758,4.179,4.179,0,0,0-.842-1.18,5.037,5.037,0,0,0-1.179-.842l-.632.632a1.467,1.467,0,0,0-.379,1.348,2.219,2.219,0,0,1,1.074,1.074,2.484,2.484,0,0,1,.189.779,2.155,2.155,0,0,1-.632,1.685l-4.505,4.423a2.174,2.174,0,0,1-3.074-3.075l3.474-3.475a5.065,5.065,0,0,1-.168-2.907c-.147.105-.274.232-.421.358l-4.442,4.444A4.367,4.367,0,0,0,84,214.484a4.319,4.319,0,0,0,1.284,3.1,4.408,4.408,0,0,0,6.211,0l4.463-4.465a3.447,3.447,0,0,0,.358-.421,4.349,4.349,0,0,0,.568-.948Z"
                            transform="translate(-13.065 -184.72)" />
                        <path id="Path_94448" data-name="Path 94448"
                            d="M277,18.517a4.319,4.319,0,0,0-1.284-3.1,4.408,4.408,0,0,0-6.211,0l-4.463,4.466a3.446,3.446,0,0,0-.358.421,4.359,4.359,0,0,0-.568.948,4.451,4.451,0,0,0-.358,1.727,4.373,4.373,0,0,0,.147,1.159,5.468,5.468,0,0,0,.274.758,4.179,4.179,0,0,0,.842,1.18,4.493,4.493,0,0,0,1.179.842l.632-.632a1.467,1.467,0,0,0,.379-1.348,2.219,2.219,0,0,1-1.074-1.074,2.484,2.484,0,0,1-.189-.779,2.154,2.154,0,0,1,.632-1.685l4.505-4.423a2.174,2.174,0,0,1,3.074,3.075l-3.495,3.5a5.065,5.065,0,0,1,.168,2.907c.147-.105.274-.232.421-.358l4.463-4.466A4.367,4.367,0,0,0,277,18.517Z"
                            transform="translate(-186.065 0)" />
                    </g>
                </svg>
                Connect
            </button>
            <button data-tab-value="#tab_upload"
                class="uppercase d-flex items-center me-3 text-[13px] pb-2 relative custom-action">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" stroke-width="1.5"
                    stroke="currentColor" class="me-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                </svg>
                Upload
            </button>
        </div>

        <div class="tab-content bg-no-repeat bg-cover mt-3 p-3 bg-gray-bg">
            <div class="tabs__tab active" id="tab_connect" data-tab-info>
                <form method="POST" id="connect_db" action="{{ route('backend.db_connect.connect-db') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="connection" class="col-md-4 col-form-label text-md-end">{{ __('Connection') }}</label>

                        <div class="col-md-6">
                            <input id="connection" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="connection" value="{{ old('connection') }}" required autocomplete="connection"
                                autofocus>
                            @error('connection')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="host" class="col-md-4 col-form-label text-md-end">{{ __('Host') }}</label>

                        <div class="col-md-6">
                            <input id="host" type="text" class="form-control @error('host') is-invalid @enderror"
                                name="host" value="{{ old('host') }}" required autocomplete="host">
                            @error('host')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="port" class="col-md-4 col-form-label text-md-end">{{ __('Port') }}</label>

                        <div class="col-md-6">
                            <input id="port" type="text" class="form-control @error('port') is-invalid @enderror"
                                name="port" value="{{ old('port') }}" required>
                            @error('port')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="db-name" class="col-md-4 col-form-label text-md-end">{{ __('DB Name') }}</label>

                        <div class="col-md-6">
                            <input id="db-name" type="text" class="form-control" name="db_name"
                                value="{{ old('db_name') }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="db-username"
                            class="col-md-4 col-form-label text-md-end">{{ __('DB Username') }}</label>

                        <div class="col-md-6">
                            <input id="db-username" type="text" class="form-control" name="db_username"
                                value="{{ old('db_username') }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="db-password"
                            class="col-md-4 col-form-label text-md-end">{{ __('DB Password') }}</label>

                        <div class="col-md-6">
                            <input id="db-password" type="password" class="form-control" name="db_password" value="">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Connect') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tabs__tab" id="tab_upload" data-tab-info>
                {{-- <form action="{{ route('backend.query_logs.chat') }}" method="get" id="add_schema"> --}}
                    {{-- @csrf --}}
                    <label for="db-username" class="col-md-4 col-form-label">{{ __('Upload SQL Schema') }}</label>
                    <div class="flex items-center justify-center w-full relative">
                        <div class="w-100">
                            <textarea placeholder="Entry MySql Schema"
                                class="w-100 h-100 rounded-2xl bg-dark-black border-0 p-3 resize-none focus:shadow-none" id="schema" name="schema" rows="15"></textarea>
                        </div>
                        <div class="buttons flex absolute right-7 bottom-5">
                            <button
                                class="bg-light-black border-[1px] border-border-light w-12 h-12 rounded-3xl flex items-center justify-center mr-3">
                                <img src="{{ asset('images/web/refresh.svg') }}" alt="refresh" />
                            </button>
                            <button
                                class="bg-cyan border-[1px] border-cyan w-12 h-12 rounded-3xl flex items-center justify-center create-schema">
                                <img src="{{ asset('images/web/send.svg') }}" alt="send" />
                            </button>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
@endsection
@section('after-scripts')
    <script src="{{ asset('js/home.js') }}"></script>
    <script>
        $("#connect_db").validate({
            rules: {
                connection: {
                    required: true
                },
                host: {
                    required: true
                },
                port: {
                    required: true,
                    number: true
                },
                db_name: {
                    required: true
                },
                db_username: {
                    required: true
                }
            },
            messages: {
                connection: {
                    required: "Please enter a database connection (Eg: mysql, pgsql)"
                },
                host: {
                    required: "Please enter a host name"
                },
                port: {
                    required: "Please enter a port number"
                },
                db_name: {
                    required: "Please enter a database name"
                },
                db_username: {
                    required: "Please enter a database username"
                },
            }
        });

        $("#upload_db").validate({
            rules: {
                file: {
                    required: true
                }
            },
            messages: {
                file: {
                    required: "Please select a file"
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "file") {
                    $("#err_file").text($(error).text());
                }
            },
        })

        $(document).on('click', '.create-schema', function() {
            let schema = $('#schema').val();
            let url = "{{ route('backend.query_logs.chat') }}";

            localStorage.setItem("schema", schema);
            window.location.href = url;
        }); 
    </script>
@endsection
