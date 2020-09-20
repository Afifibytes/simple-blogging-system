<!DOCTYPE html>
<html lang="en">
<head>
    <title>Afifibytes Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1500px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
            text-align: center;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height: auto;}
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4>Afifibytes Blog</h4>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#section1">Home</a></li>
                <li><a href="#section2">Friends</a></li>
                <li><a href="#section3">Family</a></li>
                <li><a href="#section3">Photos</a></li>
            </ul><br>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Blog..">
                <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
            </div>
        </div>

        <div class="col-sm-9">
            <h4><small>RECENT POSTS</small></h4>
            @foreach($articles as $article)
                <hr>
                <h2>{{ $article->title }}</h2>
                <h5><span class="glyphicon glyphicon-time"></span> Published on {{ $article->published_at }}</h5>
                <h5>
                    @foreach($article->categories as $category)
                        <span class="label label-primary">{{ $category->label }}</span>
                    @endforeach
                </h5><br>
                <p> {{ $article->body }}</p>
                <br><br>

                <p><span class="badge">{{ count($article->comments) }}</span> Comments:</p><br>

                <div class="row">
                    @foreach($article->comments as $comment)
                        <div class="col-sm-10">
                            <h4>{{ $comment->user->username }}<br><small>{{ $comment->published_at }}</small></h4>
                            <p>{{ $comment->content }}</p>
                            <br>
                        </div>
                    @endforeach
                </div>

                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                <br><br>
            @endforeach
        </div>
    </div>
</div>

<footer class="container-fluid">
    <p>Made with ❤ using Laravel!️</p>
</footer>

</body>
</html>
