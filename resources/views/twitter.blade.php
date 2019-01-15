<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <title>BSD Tweetz</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">BSD TWEETZ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/">Home</span></a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-lg-12">
            <form class="card p-3 bg-dark text-light" action="{{route('post.tweet')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tweet Text</label>
                    <input type="text" name="tweet" class="form-control">
                </div>
                <div class="form-group">
                    <label>Upload images</label>
                    <input type="file" name="images[]" multiple class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Create Tweet</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @if(!empty($data))
                @foreach($data as $key => $tweet)
                <div class="col-lg-4">
                    <div class="gw-tweet">
                        <p class="tweet-body">{{$tweet['text']}}</p>
                        <p class="tweet-meta">
                            <i class="fa fa-heart"></i> {{$tweet['favorite_count']}}
                            <i class="fa fa-repeat"></i> {{$tweet['retweet_count']}}
                        </p>
                        @if(!empty($tweet['extended_entities']['media']))
                            @foreach($tweet['extended_entities']['media'] as $i)
                                <img src="{{$i['media_url_https']}}" alt="" style="width: 100px;">
                            @endforeach
                        @endif
                    </div>
                </div>
                @endforeach
            @else
            <p>No Tweets found</p>
            @endif
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>