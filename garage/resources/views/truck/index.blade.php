@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h2>Trucks</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse ($trucks as $truck)
                                <li class="list-group-item">
                                    <div class="trucks-list">
                                        <div class="content">
                                             <h2> Plate: {{ $truck->plate }}</h2>
                                             <h4> Maker: {{ $truck->maker }}</h4>
                                             <h4> MY: {{ $truck->make_year }}</h4>
                                            <h4> Mechanic: <a href="{{ route('m_show', $truck->getMechanic->id) }}"> {{ $truck->getMechanic->name }} {{ $truck->getMechanic->surname }} </a></h4>

                                        </div>
                                        <div class="buttons">
                                            <a href="{{ route('t_show', $truck) }}" class="btn btn-info">Show</a>
                                            <a href="{{ route('t_edit', $truck) }}" class="btn btn-secondary">Edit</a>
                                            <form action="{{route('t_delete',$truck)}}" method="POST">
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">No trucks found</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection