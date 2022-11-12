<x-inc.layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div id="index_image" style="position: relative;text-align: center;color: white;">
        <h1 class="centered">Everyone has their own story</h1>
        <img src="public/index.jpg" style="width: 100%;height: 100%">

    </div>
    <style>
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: darkred;
            font: 60px Andale Mono, monospace;
        }
    </style>
</x-inc.layout>
