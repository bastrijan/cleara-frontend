<html>
    <body>
        <h1>Forum: {{$forum[0]['name']}}</h1>

        @foreach($posts as $post)
        
            {{ $post['message'] }} <br/><br/>
            user: {{ $users[$post['user_id']] }} <br/>
            created: {{ \Carbon\Carbon::parse($post['created'])->format('d m Y H:i') }} <br/>
            @if (null !== $post['updated'])
            updated: {{ \Carbon\Carbon::parse($post['updated'])->format('d m Y H:i') }} 
            @endif

        <hr>
        @endforeach
    </body>
</html>