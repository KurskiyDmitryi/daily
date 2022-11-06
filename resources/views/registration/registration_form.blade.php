<div id="register_page">
    <x-inc.layout>
        <x-slot:title>
            Registration
        </x-slot:title>
        <div>
            <h2>Registration</h2>
        </div>
        <div id="error_reporting">
        </div>
        <div class="row" style="margin: 100px;" id="form">
            <div class="form">
                <input type="text" id="name" class="form-control" placeholder="name" name="name" aria-label="First name"
                       style="width: 200px">
            </div>
            <div class="form">
                <input type="email" id="email" class="form-control" placeholder="email" name="email" aria-label="Last name"
                       style="width: 200px">
            </div>
            <div class="form">
                <input type="password" id="password" class="form-control" placeholder="password"  name="password" aria-label="Last name"
                       style="width: 200px">
            </div>
            <div class="form">
                <input type="password" id="confirm" class="form-control" placeholder="confirm password" name="password_confirmation" aria-label="Last name"
                       style="width: 200px">
            </div>
            <div class="form">
                <button id="submit" class="btn btn-outline-primary">Register</button>
            </div>
        </div>
        @push('js')
            <script type="text/javascript">
                $(document).ready(function () {

                    $('#submit').on('click', function () {
                        $('#error_reporting').html('');
                        var name = $('input#name').val();
                        var email = $('input#email').val();
                        var password = $('input#password').val();
                        var confirm_password = $('input#confirm').val();

                        $.ajax({
                            method: "POST",
                            url: "{{route('register_user')}}",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                name: name, email: email, password: password,password_confirmation:confirm_password
                            },
                            success: function (data) {
                                if (data) {
                                    $('#form').html('');
                                    $('#form').append(data);
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
        <style>
            .form {
                padding: 12px;
            }

            h2,h3{
                text-align: center;
                text-decoration: underline;
                color: cornflowerblue;
            }


        </style>
    </x-inc.layout>
</div>
