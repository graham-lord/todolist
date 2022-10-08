<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>To-do List</title>
        <link rel="stylesheet" href="/css/main.css">

       
    </head>
    <body class="antialiased">
        <div class="header">
            Activity 4 - Basic Laravel-based project
        </div>
        <div class="card">
            <div class="upper">
                <h1>To-do List</h1>
                <form action="{{ route('store') }}" method="POST" autocomplete="off" class="input">
                    @csrf
                    <input type="text" name='content' placeholder="Add your new todo" class="text-input">
                    <input type="submit" value="ADD" class="add-btn">
                </form>
            </div> 
            <!-- <hr> -->
            <div class="middle">
                @if(count($todolists))
                    <ul>
                    @foreach($todolists as $todolist)
                        <li>
                            <div class="content"> {{ $todolist->content }}</div>
                            <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Remove" class="remove-btn">
                            </form>
                        </li>    
                    @endforeach
                    </ul>
                @else
                    <p>You have no task(s).</p>
                @endif
            </div>
            <div class="lower">
                @if(count($todolists))
                    <div class="pending">You have {{ count($todolists) }} pending task(s).</div>
                @endif
            </div>
        </div>
        <div class="footer">
            Team Kanto
        </div>
    
    </body>
</html>
