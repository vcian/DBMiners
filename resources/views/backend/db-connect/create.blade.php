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
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="15" height="15" class="me-2">
                    <path
                        d="M96 0C78.3 0 64 14.3 64 32v96h64V32c0-17.7-14.3-32-32-32zM288 0c-17.7 0-32 14.3-32 32v96h64V32c0-17.7-14.3-32-32-32zM32 160c-17.7 0-32 14.3-32 32s14.3 32 32 32v32c0 77.4 55 142 128 156.8V480c0 17.7 14.3 32 32 32s32-14.3 32-32V412.8c12.3-2.5 24.1-6.4 35.1-11.5c-2.1-10.8-3.1-21.9-3.1-33.3c0-80.3 53.8-148 127.3-169.2c.5-2.2 .7-4.5 .7-6.8c0-17.7-14.3-32-32-32H32zM432 512a144 144 0 1 0 0-288 144 144 0 1 0 0 288zm47.9-225c4.3 3.7 5.4 9.9 2.6 14.9L452.4 356H488c5.2 0 9.8 3.3 11.4 8.2s-.1 10.3-4.2 13.4l-96 72c-4.5 3.4-10.8 3.2-15.1-.6s-5.4-9.9-2.6-14.9L411.6 380H376c-5.2 0-9.8-3.3-11.4-8.2s.1-10.3 4.2-13.4l96-72c4.5-3.4 10.8-3.2 15.1 .6z" />
                </svg>
                Connect
            </button>
            <button data-tab-value="#tab_upload"
                class="uppercase d-flex items-center me-3 text-[13px] pb-2 relative custom-action">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" class="me-2">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg>
                Add Schema
            </button>
        </div>

        <div class="tab-content bg-no-repeat bg-cover mt-3 p-3 bg-gray-bg">
            <div class="tabs__tab active" id="tab_connect" data-tab-info>
                <form method="POST" id="connect_db" action="{{ route('backend.db_connect.connect-db') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="connection" class="col-md-4 col-form-label text-md-end">{{ __('Connection') }}</label>

                        <div class="col-md-6">
                            <select name="connection" id="connection" class="form-control @error('name') is-invalid @enderror">
                                <option selected value="mysql">MySql</option>
                                <option disabled value="pgsql">PostgreSQL</option>
                                <option disabled value="sqlite">SQLite</option>
                            </select>
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
                <label for="db-username" class="col-md-4 col-form-label">{{ __('Add MySql Schema') }}</label>
                <div class="flex items-center justify-center w-full relative">
                    <div class="w-100">
                        <textarea placeholder="Enter MySql Schema"
                            class="w-100 h-100 rounded-2xl bg-dark-black border-0 p-3 resize-none focus:shadow-none" id="schema"
                            name="schema" rows="15"></textarea>
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
            let redirectUrl = "{{ route('backend.query_logs.chat') }}";
            localStorage.setItem("schema", schema);

            window.location.href = redirectUrl;
            
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            // var data = {
            //     'schema': schema,
            // };
            // $.ajax({
            //     method: 'POST',
            //     url: "{{ route('backend.query_logs.validate.schema') }}",
            //     data: data,
            //     success: function(response) {
            //         console.log(response);
            //         localStorage.setItem("schema", schema);

            //         window.location.href = redirectUrl;
            //     },
            //     error: function(response) {
            //         console.log(response);
            //     }
            // });
        });
    </script>
@endsection
