@extends('layouts.app')

@section('content')
    

    <div class="col-6 offset-3">

        <h2 class="alert alert-success">Add new Contact</h2>
        {!! Form::open(['route'=>'contacts.store']) !!}
            <div class="form-group">
                {!! Form::text('phone', null, ['class'=>'form-control','placeholder'=>'Enter contact name...']) !!}
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
                {!! Form::submit('Add', ['class'=>'btn btn-info btn-block']) !!}
                <a href="{{ route('home') }}" class="btn btn-success btn-block ">Back to Home</a>
        {!! Form::close() !!}
    </div>

@endsection