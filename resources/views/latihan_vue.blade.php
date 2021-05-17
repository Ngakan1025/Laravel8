<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel VUE</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <style>
    body {
        font-family: sans-serif;
        margin: 15%;
    }
    </style>
</head>

<body>

    <div id="app">
        <h1>Hello Laravel</h1>
        <header-component></header-component>
        <router-view></router-view>
        <footer-component></footer-component>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>