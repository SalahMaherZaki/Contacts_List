@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="alert alert-dark">Show specific Phone</h2>
                <div class="card mb-2 bg-secondary text-light">
                    <div class="card-header">
                        <h5 class="card-title">{{$phone->id}}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$phone->phone}}</p>
                    </div>
                    <div class="row card-footer">
                        <a href="{{ route('phones.edit',$phone) }}" class="btn btn-info mr-2">Update</a>
                        {!! Form::open(['route'=>['phones.destroy',$phone->id] , 'method'=>'delete' ]) !!}
                        {!! Form::submit("Delete", ["class"=>"btn btn-danger", "onclick"=>"return confirm('Are you sure you want to delete this phone?')"]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <a href="{{ route('home') }}" class="btn btn-success btn-block ">Back to Home</a>
            {{-- {!! Form::submit("Delete", ["class"=>"btn btn-danger"]) !!}
            {!! Form::close() !!} --}}
        </div>
    </div>
</div>
@endsection
