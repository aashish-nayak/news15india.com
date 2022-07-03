<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            *{
                margin: 0%;
                padding: 0%;
                box-sizing: border-box;
            }
            body {
                font-family: 'Nunito', sans-serif;
            }
            .main{
                width: 75%;
                max-height: auto;
            }
            @media only screen and (max-width: 600px){
                .main{
                    width: 100%;
                    max-height: auto;
                }
            }
        </style>
    </head>
    <body style="display: flex;justify-content: center;align-items: center;height: 100vh;">
        <img src="{{asset('front-assets/maintenance.jpg')}}" class="main"    alt="">
    </body>
</html>
