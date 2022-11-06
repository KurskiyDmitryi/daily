<x-inc.layout>
    <x-slot:title>
        Login
    </x-slot:title>
    <h2>Login</h2>
    <div id="error_reporting">
    </div>
    <div class="row" style="margin: 100px;" id="form">
        <div class="form">
            <input type="email" id="email" class="form-control" placeholder="email" name="email"
                   style="width: 200px">
        </div>
        <div class="form">
            <input type="password" id="password" class="form-control" placeholder="password" name="password"
                   style="width: 200px">
        </div>
        <div class="form">
            <button id="submit" class="btn btn-outline-primary">Login</button>
        </div>
    </div>
    <style>
        .form {
            margin: 15px;
        }
        h2{
            color: cornflowerblue;
            text-align: center;
            text-decoration: underline;
        }
    </style>
    @push('js')
        <script type="text/javascript">
            $(document).ready(function () {

                $('#submit').on('click', function () {
                    $('#error_reporting').html('');
                    var email = $('input#email').val();
                    var password = $('input#password').val();

                    $.ajax({
                        method: "POST",
                        url: "{{route('auth')}}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            email: email, password: password
                        },
                        success: function (data) {
                            if (data) {
                                // $('#form').html('');
                                // $('#form').append(data);
                                location.href = data;
                            }
                        },
                        error: function (xhr) {
                            if (xhr) {
                                var errors = (JSON.parse(xhr.responseText))
                                errors = errors['errors'];
                                $.each(errors, function (index, value) {
                                    var err = "<li style='color: red'>" + value + "</li>"
                                    $('#' + 'error_reporting').append(err);
                                });
                            }
                        }
                    })

                })
            })
        </script>
    @endpush
</x-inc.layout>


