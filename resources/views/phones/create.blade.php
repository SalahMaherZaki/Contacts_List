@extends('layouts.app')

@section('content')
    

    <div class="col-6 offset-3">
        {{-- Validation --}}
        {{-- <div>
            <ul>
                @foreach ($errors->all() as $message)
                    <li class="alert alert-danger" style="list-style: none">{{ $message }}</li>
                @endforeach
            </ul>
        </div> --}}
        {{-- Adding phone to database --}}
    
        <h2 class="alert alert-success">Add new Phone</h2>
        {!! Form::open(['route'=>'phones.store']) !!}
            <div class="form-group">
                {!! Form::text('phone', null, ['class'=>'form-control','placeholder'=>'Enter phone number here...']) !!}
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
                {!! Form::submit('Add', ['class'=>'btn btn-info btn-block']) !!}
                <a href="{{ route('home') }}" class="btn btn-success btn-block ">Back to Home</a>
        {!! Form::close() !!}
    </div>

@endsection