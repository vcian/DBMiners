@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 relative">
            <div class="d-flex">
                <p class="mb-3 d-flex ">Input Query</p>
                <select id="converTO"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500">
                    <option value="0">Optimized</option>
                    <option value="1">Laravel ORM (PHP)</option>
                    <option value="2">Hibernate ORM(Java)</option>
                    <option value="3">SQLAlchemy ORM(Python)</option>
                    <option value="4">Entity Framework ORM(.Net)</option>
                    <option value="5">Django ORM ORM(Python)</option>
                    <option value="6">Sequelize ORM(Node)</option>
                    <option value="7">ActiveRecord ORM(Ruby on Rails)</option>
                </select>
            </div>
            <form method="POST" id="optimizeQueryForm" action="#">
                <div class="w-100 h-[calc(100vh-180px)]">
                    <textarea id="prompt" name="prompt" placeholder="Entry Query"
                        class="w-100 h-100 rounded-2xl bg-dark-black border-0 p-3 resize-none focus:shadow-none"></textarea>
                </div>
                <div class="buttons flex absolute right-7 bottom-5">
                    <button id="resetBtn"
                        class="bg-light-black border-[1px] border-border-light w-12 h-12 rounded-3xl flex items-center justify-center mr-3">
                        <img src="{{ asset('images/web/refresh.svg') }}" alt="refresh" />
                    </button>
                    <button id="optimizeQuery"
                        class="bg-cyan border-[1px] border-cyan w-12 h-12 rounded-3xl flex items-center justify-center">
                        <img src="{{ asset('images/web/send.svg') }}" alt="send" />
                    </button>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-6 relative">
            <p class="mb-3">Optimized Query</p>
            <div class="w-100 h-[calc(100vh-180px)]">
                <textarea id="optimizedQuery" placeholder="Output"
                    class="w-100 h-100 rounded-2xl bg-dark-black border-0 p-3 resize-none focus:shadow-none focus:offset-none"></textarea>
            </div>
            <div class="buttons flex absolute right-5 bottom-5">
                <button onclick="copyToClipboard()"
                    class="bg-light-black border-[1px] border-border-light w-12 h-12 rounded-3xl flex items-center justify-center mr-3">
                    <img src="{{ asset('images/web/copy.svg') }}" alt="copy" />
                </button>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script src="{{ asset('js/home.js') }}"></script>
    <script>
        function copyToClipboard() {
            /* Get the text from the input field */
            var text = document.getElementById("optimizedQuery").value;

            /* Create a temporary input element */
            var tempInput = document.createElement("input");
            tempInput.setAttribute("value", text);

            /* Append the input element to the HTML body */
            document.body.appendChild(tempInput);

            /* Select the text inside the input element */
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the selected text to the clipboard */
            document.execCommand("copy");

            /* Remove the temporary input element from the HTML body */
            document.body.removeChild(tempInput);

            /* Optionally, provide feedback to the user */
            toastr.success("Text copied to clipboard!");
        }
        $("#optimizeQueryForm").validate({
            rules: {
                prompt: {
                    required: true
                }
            },
            messages: {
                prompt: {
                    required: "Please enter a prompt"
                }
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        $(document).ready(function() {
            $(document).on('click', '#optimizeQuery', function(e) {
                e.preventDefault();
                if ($('#optimizeQueryForm').valid()) {
                    getOptimizeQuery();
                }
            });
            $(document).on('click', '#resetBtn', function(e) {
                $('#prompt').val('');
            });
        });

        function getOptimizeQuery() {
            var prompt = $('#prompt').val();
            var converTO = $('#converTO').val();
            $.ajax({
                url: "{{ route('api.query-optimisation.query-optimise') }}",
                type: "POST",
                data: {
                    'prompt': prompt,
                    'conver_to': converTO
                },
                success: function(data, xhr) {
                    $('#optimizedQuery').html(data.data.choices[0].text);
                },
                error: function(data) {
                    if (data.responseJSON.message == 'Please write proper mysql query') {
                        toastr.error(data.responseJSON.message);
                    }
                }
            })
        }
    </script>
@endsection
