@extends('layouts.app')


@section('content')
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h2>New Post</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store')}}" method="POST">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Title</span>
                                <input type="text" class="form-control" name="title" >
                              </div>
                              <div class="input-group">
                                <span class="input-group-text">Post</span>
                                <textarea class="form-control" name="post" ></textarea>
                              </div>
                              @csrf
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
