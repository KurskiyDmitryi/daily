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
            $(document).ready(function () {
                $('#submit').on('click', function () {
                    $('#error_reporting').html('');
                    var age = $('input#age').val();
                    var from = $('input#from').val();
                    var sex = $('#select').val();
                    $.ajax({
                        method: "POST",
                        url: "{{route('store_profile',$user->id)}}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            age: age, from: from, sex: sex
                        },
                        success: function (data) {
                            if (data) {
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
