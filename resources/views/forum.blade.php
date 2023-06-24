<html>
    <body>
        <h1>Forums</h1>

        @foreach($forums as $forum)
        <a href="{{ url('/forum/'.$forum['id']) }}">{{ $forum['name'] }}</a>
        <hr>
        @endforeach
    </body>
</html>