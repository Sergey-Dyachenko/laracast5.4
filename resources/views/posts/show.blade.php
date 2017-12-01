@extends ('layouts.master')

@section('content')
    <div class="col-sm-9 ml-sm-auto">
        <h1>{{$post->title}}</h1>
            {{$post->body}}
        <hr>
        <div class="comments">
           <h2>Coomments to this post:</h2>
            <ul class="list-group">
                @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{$comment->created_at->diffForHumans()}}: &nbsp;
                        </strong>
                        {{$comment->body}}
                    </li>
                @endforeach
           </ul>
        </div>
        <hr>
        <div class="card">
            <div class="card-block">
                <form method="POST" action ="/posts/{{$post->id}}/comments">
                    {{csrf_field()}}
                  <div class="form-group">
                    <h3>Add you comment:</h3>
                    <textarea name="body" class="form-control" placeholder="Your comment here" required ></textarea>
                  </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
                </form>
                @include('layouts.errors')
            </div>
        </div>
    </div>

@endsection

