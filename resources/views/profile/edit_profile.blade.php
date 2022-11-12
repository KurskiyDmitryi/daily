<x-inc.layout>
    <x-slot:title>
        Edit {{$user->name}}
    </x-slot:title>
    <div id="error_reporting">
    </div>
    <div id>
        <label for="age">
            <h5>Age</h5>
        </label>
        <input name="age" id="age" type="number" placeholder=@if(empty($user->profile->age))"empty"@else
            "{{$user->profile->age}}"
        @endif>
        <br>
        <label for="from">
            <h5>From</h5>
        </label>
        <input name="from" id="from" placeholder=@if(empty($user->profile->from))"empty"@else
            "{{$user->profile->from}}"
        @endif>
        <br>
        <label for="sex">
            <h5>Sex</h5>
        </label>
        <input name="sex" id="sex" placeholder=@if(empty($user->profile->sex))"empty"@else
            "{{$user->profile->from}}">@endif
    </div>
    <br>
    <input type="submit" id="submit" class="btn btn-primary" value="Submit">
    <style>
        input {
            margin: 10px;
        }

        label {
            margin-left: 10px;
        }
        h5{
            color: cornflowerblue;
        }
    </style>
    @push('js')
        <script type="text/javascript">
            $(document).ready(function () {

                $('#submit').on('click', function () {
                    $('#error_reporting').html('');
                    var age = $('input#age').val();
                    var from = $('input#from').val();
                    var sex = $('input#sex').val();
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
