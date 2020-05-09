@extends('layouts.app')

@section('content')



<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            <h2 class="alert alert-dark">Listing all Phone Numbers</h2>
            @forelse ($phones as $phone)
                <div class="card mb-2 bg-secondary text-light">
                    <div class="card-header">
                        <h5 class="card-title">{{$phone->id}}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$phone->phone}}</p>
                    </div>
                    <div class="row card-footer">
                        <a href="{{ route('phones.show',$phone->id) }}" class="btn btn-success mr-2">Show</a>
                        <a href="{{ route('phones.edit',$phone->id) }}" class="btn btn-info mr-2">Update</a>
                        {!! Form::open(['route'=>['phones.destroy',$phone->id] , 'method'=>'delete' ]) !!}
                        {!! Form::submit("Delete", ["class"=>"btn btn-danger" , "onclick"=>"return confirm('Are you sure you want to delete this phone?')"]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">No Phones Yet... !! Click
                    <a href="{{ route('phones.create') }}" class="text-primary text-bold">
                        HERE
                    </a>to add new phone .
                </div>
            @endforelse
            {{-- {!! Form::open(['route'=>['phones.destroyAll'] , 'method'=>'delete' ]) !!}
            {!! Form::submit("Delete All", ["class"=>"delete btn btn-danger" , "onclick"=>"return confirm('Are you sure you want to delete all phones?')"]) !!}
            {!! Form::close() !!} --}}
        </div>
    </div>
</div>

@endsection
