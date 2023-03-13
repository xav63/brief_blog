<h1>{{$title}}</h1>
<hr>

    <ul>
        @foreach ($authors as $authors)
            <li>{{$authors->name}}</li>
        @endforeach
    </ul>