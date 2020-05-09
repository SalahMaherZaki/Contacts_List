@extends('layouts.app')

@section('content')

    <div class="col-6 offset-3">
        <h2 class="alert alert-success">Update Phone</h2>
        {!! Form::model($phone , ['route'=>['phones.update',$phone->id] , 'method'=>'put' ]) !!}
            <div class="form-group">
                {!! Form::text('phone', null, ['class'=>'form-control']) !!}
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
                {!! Form::submit('Update', ['class'=>'btn btn-info btn-block']) !!}
                <a href="{{ route('home') }}" class="btn btn-success btn-block ">Back to Home</a>
        {!! Form::close() !!}
    </div>
    
@endsection