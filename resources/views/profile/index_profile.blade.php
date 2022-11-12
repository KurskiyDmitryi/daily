<x-inc.layout>
    <x-slot:title>
        Profile {{$user->name}}
    </x-slot:title>
    <h1 style="text-align: center ; color: cornflowerblue">NickName : {{$user->name}}</h1>
    <h2>Age  : @if(empty($user->profile->age))empty now @else  {{$user->profile->age}}@endif</h2>
    <h2>From  :@if(empty($user->profile->from))empty now @else  {{$user->profile->from}}@endif</h2>
    <h2>Sex  :@if(empty($user->profile->sex))empty now @else  {{$user->profile->sex}}@endif</h2>

    <a href="{{route('edit_profile',Auth::id())}}" class="btn btn-primary" style="margin-top: 100px">Edit Profile</a>
</x-inc.layout>
