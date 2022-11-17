<x-inc.layout>
    <div id="main">
        <x-slot:title>
            Edit {{$user->name}}
        </x-slot:title>
        <div id="error_reporting">
        </div>
        <div id="edit_form" class="container">
            <label for="age">
                <h5>Age</h5>
            </label>
            <input name="age" id="age" type="number"
                   value="@if(!empty($user->profile->age)){{$user->profile->age}}@endif"
                   placeholder=@if(empty($user->profile->age))"empty"
                @endif >

            <br>
            <label for="from">
                <h5>From</h5>
            </label>
            <input name="from" id="from" value="@if(!empty($user->profile->from)){{$user->profile->from}}@endif"
                   placeholder=@if(empty($user->profile->from))"empty"
                @endif>

            <br>
            <label for="from">
                <h5>Sex</h5>
            </label>

            <select id="select" style="margin-left: 20px">
                <option @if(!isset($user->profile->sex)) selected @endif>empty</option>
                <option @if(isset($user->profile->sex) && $user->profile->sex == 'male') selected @else  @endif >male
                </option>
                <option @if(isset($user->profile->sex) && $user->profile->sex == 'female') selected @else @endif>female
                </option>
                <option @if(isset($user->profile->sex) && $user->profile->sex == 'not decided') selected @endif>not
                    decided
                </option>
            </select>
        </div>
        <br>

    </div>
    <input type="submit" id="submit" class="btn info" style="margin-left: 280px; margin-top: 30px" value="Save">
    <style>
        input {
            margin: 10px;
        }

        label {
            margin-left: 10px;
        }

        h5 {
            color: cornflowerblue;
        }

        .btn {
            border: 2px solid black;
            background-color: white;
            color: black;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
        }

        .info {
            border-color: #2196F3;
            color: dodgerblue
        }

        .info:hover {
            background: #2196F3;
            color: white;
        }
    </style>
    @push('js')
        <script type="text/javascript">
            $('#error_reporting').html('');

            document.querySelector('#submit').addEventListener('click', async function () {
                    var age = $('input#age').val();
                    var from = $('input#from').val();
                    var sex = $('#select').val();
                    try {
                        const {data: {route}} = await axios.post('{{route('store_profile',$user->id)}}', {
                            age,
                            from,
                            sex
                        })
                        location.href = route;
                    } catch (e) {

                        if (e) {
                            document.querySelector('#error_reporting').removeChild(document.querySelector('#error_reporting').firstChild);
                            document.querySelector('#error_reporting').appendChild(document.createElement('ul'))
                            var errors = e.response.data.errors;
                            console.log(e.response.data)
                            for (let error  in errors) {
                                var err = "<li style='color: red'>" + errors[error] + "</li>";
                                document.querySelector('#' + 'error_reporting' + ' ' + 'ul').innerHTML += err;
                            }
                        }
                    }
                }
            )
        </script>
    @endpush
</x-inc.layout>
