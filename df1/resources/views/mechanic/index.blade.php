@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Categories</h2>
                    <form action="{{route('c_index')}}" method="get">
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <select name="sort" class="form-select mt-1">
                                                    <option value="title_asc" @if('name_asc'==$sortSelect) selected @endif>Name AZ</option>
                                                    <option value="title_desc" @if('name_desc'==$sortSelect) selected @endif>Name ZA</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                {{-- <button type="submit" class="btn btn-primary m-1">Sort</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-3">
                                                <select name="per_page" class="form-select mt-1">
                                                    <option value="all" @if('all'==$perPage) selected @endif>All</option>
                                                    <option value="5" @if('5'==$perPage) selected @endif>5</option>
                                                    <option value="10" @if('10'==$perPage) selected @endif>10</option>
                                                    <option value="20" @if('20'==$perPage) selected @endif>20</option>
                                                    <option value="50" @if('50'==$perPage) selected @endif>50</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                {{-- <button type="submit" class="btn btn-primary m-1">results in page</button> --}}
                                                <a href="{{route('c_index')}}" class="btn btn-secondary m-1">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($categories as $category)
                        <li class="list-group-item">
                            <div class="categories-list">
                                <div class="content">
                                    <h2>{{$category->title}}</h2>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('c_show', $categories)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('c_edit', $categories)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('c_delete', $categories)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No categories found</li>
                        @endforelse
                    </ul>
                </div>
                <div class="me-3 mx-3">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection