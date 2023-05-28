<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Frijole|Josefin+Sans:300,400,400i,600,700|Viga"
    rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <title>Not permission</title>
</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway:700);

    *,
    *:before,
    *:after {
        box-sizing: border-box;
    }

    html {
        height: 100%;
    }

    body {
        font-family: 'Raleway', sans-serif;
        background-color: #342643;
        height: 100%;
        padding: 10px;
    }

    a {
        color: #EE4B5E !important;
        text-decoration: none;
    }

    a:hover {
        color: #FFFFFF !important;
        text-decoration: none;
    }

    .text-wrapper {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .title {
        font-size: 5em;
        font-weight: 700;
        color: #EE4B5E;
    }

    .subtitle {
        font-size: 40px;
        font-weight: 700;
        color: #1FA9D6;
    }

    .isi {
        font-size: 18px;
        text-align: center;
        margin: 30px;
        padding: 20px;
        color: white;
    }

    .buttons {
        margin: 30px;
        font-weight: 700;
        border: 2px solid #EE4B5E;
        text-decoration: none;
        padding: 15px;
        text-transform: uppercase;
        color: #EE4B5E;
        border-radius: 26px;
        transition: all 0.2s ease-in-out;
        display: inline-block;
    }

    .buttons:hover {
        background-color: #EE4B5E;
        color: white;
        transition: all 0.2s ease-in-out;
    }

    /* Add ghost styles */
    .ghost-container {
        position: relative;
        width: 200px;
        height: 200px;
        margin-top: 40px;
    }

    .ghost {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        animation: float 3s infinite ease-in-out;
        transform-origin: bottom;
    }

    .ghost img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }
</style>

<body>
    <div class="text-wrapper">
        <div class="title" data-content="404">
            403 - ACCESS DENIED
        </div>

        <div class="subtitle">
            Oops, You don't have permission to access this page.
        </div>
      

        <div class="buttons">
            <a class="button" href="{{route('home')}}">Go to homepage</a>
        </div>

        <!-- Add ghost container -->
        <div class="ghost-container">
            <div class="ghost">
              <svg style="color: rgb(118, 229, 227);" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. --><path d="M186.1 .1032c-105.1 3.126-186.1 94.75-186.1 199.9v264c0 14.25 17.3 21.38 27.3 11.25l24.95-18.5c6.625-5.001 16-4.001 21.5 2.25l43 48.31c6.25 6.251 16.37 6.251 22.62 0l40.62-45.81c6.375-7.251 17.62-7.251 24 0l40.63 45.81c6.25 6.251 16.38 6.251 22.62 0l43-48.31c5.5-6.251 14.88-7.251 21.5-2.25l24.95 18.5c10 10.13 27.3 3.002 27.3-11.25V192C384 83.98 294.9-3.147 186.1 .1032zM128 224c-17.62 0-31.1-14.38-31.1-32.01s14.38-32.01 31.1-32.01s32 14.38 32 32.01S145.6 224 128 224zM256 224c-17.62 0-32-14.38-32-32.01s14.38-32.01 32-32.01c17.62 0 32 14.38 32 32.01S273.6 224 256 224z" fill="#76e5e3"></path></svg>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
