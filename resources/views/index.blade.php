<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>ShoutBox</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <header class="topspace text-center">
                <h1>Shoutbox</h1>
                <h3>Lets bring in our ideas together.</h3>
            </header>
        </div>

        @if(count($errors) > 0 )
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(Session('success'))
        <div class="alert alert-success">
            <p>{{ Session('success') }}</p>
        </div>
        @endif
        <div class="container">
            <div class="content">
                <div class="">
                    <form action="/shoutidea" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="username">User ID</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <label for="idea">Your Idea</label>
                            <textarea class="form-control" name="shoutidea" id="" cols="" rows="5" placeholder="your idea" value="" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">shout</button>
                    </form>
                </div>           
            </div>
        </div>

        <div class="container topspace">
            <h3 class="text-center">shoutbox ideas</h3>

            <ul class="shoutbox-idea">
                @if( !empty( $manyideas ) )
                @foreach ($manyideas as $idea)
                <li>
                    <span class="shoutbox-username">{{ $idea->user_name }}</span>
                    <span class="shoutbox-time">{{ $idea->created_at }}</span>
                    <p class="shoutbox-comment">{{ $idea->shout_idea }}</p>                    
                </li>
                @endforeach
                @endif
            </ul>
        </div>
    </body>
</html>
