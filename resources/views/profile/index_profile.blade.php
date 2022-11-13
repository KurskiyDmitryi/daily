<x-inc.layout>
    <x-slot:title>
        Profile {{$user->name}}
    </x-slot:title>
    <h1 style="text-align: center ; color: cornflowerblue">NickName : {{$user->name}}</h1>
    <div id="menu" style="margin-left: 50px">
    <h2>Age : @if(empty($user->profile->age))
            empty
        @else
            {{$user->profile->age}}
        @endif</h2>
    <h2>From :@if(empty($user->profile->from))
            empty
        @else
            {{$user->profile->from}}
        @endif</h2>
    <h2>Sex :@if(empty($user->profile->sex))
            empty
        @else
            {{$user->profile->sex}}
        @endif</h2>
    </div>
    <button class="btn info" style="margin-left: 50px; margin-top: 30px"><a href="{{route('edit_profile',Auth::id())}}"/>Edit</button>
<style>
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
</x-inc.layout>

