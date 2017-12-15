@extends ('layouts.master')

@section ('content')
    <div class="col-sm-9">
        <h1>Create a Post</h1>
        <hr>
        <form method="POST" action ="/posts">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea id="body" name="body" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
       @include('layouts.errors');
    </div>
@endsection