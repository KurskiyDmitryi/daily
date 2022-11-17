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
                <input type="text" id="name" class="form-control" placeholder="nickname" name="name"
                       style="width: 200px">
            </div>
            <div class="form">
                <input type="email" id="email" class="form-control" placeholder="email" name="email"
                       style="width: 200px">
            </div>
            <div class="form">
                <input type="password" id="password" class="form-control" placeholder="password" name="password"
                       style="width: 200px">
            </div>
            <div class="form">
                <input type="password" id="confirm" class="form-control" placeholder="confirm password"
                       name="password_confirmation"
                       style="width: 200px">
            </div>
            <div class="form">
                <button id="submit" class="btn btn-outline-primary">Register</button>
            </div>
        </div>
        @push('js')
            <script type="text/javascript">

                document.querySelector('#submit').addEventListener('click', async function () {

                    let nickname = document.querySelector('#name').value;
                    let email = document.querySelector('#email').value;
                    let password = document.querySelector('#password').value;
                    let password_confirmation = document.querySelector('#confirm').value;
                    try {
                        const {data: {route}} = await axios.post('{{route('store_user')}}', {
                            nickname,
                            email,
                            password,
                            password_confirmation
                        })
                        location.href = route;
                    } catch (e) {
                        document.querySelector('#error_reporting').removeChild(document.querySelector('#error_reporting').firstChild);
                        document.querySelector('#error_reporting').appendChild(document.createElement('ul'))
                        var errors = e.response.data.errors;
                        for (let error  in errors) {
                            var err = "<li style='color: red'>" + errors[error] + "</li>";
                            document.querySelector('#' + 'error_reporting' + ' ' + 'ul').innerHTML += err;
                        }
                    }
                });
            </script>
        @endpush
        <style>
            .form {
                padding: 12px;
            }

            h2, h3 {
                text-align: center;
                text-decoration: underline;
                color: cornflowerblue;
            }


        </style>
    </x-inc.layout>
</div>
