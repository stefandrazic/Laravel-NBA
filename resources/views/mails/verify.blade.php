<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>



<body class="bg-light">
    <div class="container">
        <img class="ax-center my-10 w-24" src="https://assets.bootstrapemail.com/logos/light/square.png" />
        <div class="card p-6 p-lg-10 space-y-4">
            <h1 class="h3 fw-700">
                Verify
            </h1>
            <p>
                Here is a very simple card. It has responsive padding so it gets less padding on mobile to fill the
                screen more.
                Hopefully it can be useful to you. It is very simple and basic but can be used for a lot of simple
                emails.
            </p>
            <a class="btn btn-primary p-3 fw-700"
                href="http://127.0.0.1:8000/verify/{{ $mailData['verify_string'] }}">Verify account</a>
        </div>
        <img class="ax-center mt-10 w-40" src="https://assets.bootstrapemail.com/logos/light/text.png" />
        <div class="text-muted text-center my-6">
            Sent with <3 from Hip Corp. <br>
                Hip Corp. 1 Hip Street<br>
                Gnarly State, 01234 USA <br>
        </div>
    </div>
</body>

</html>
