<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h1>
        Hey {{ $teamData['team_name'] }}, you received new comment on your page.
    </h1>
    <h3>From: {{ $mailData['user_name'] }}</h3>
    <h4>{{ $mailData['content'] }}</h4>
    <a href="http://127.0.0.1:8000/teams/{{ $teamData['team_name'] }}">Check it out!</a>
</body>

</html>
