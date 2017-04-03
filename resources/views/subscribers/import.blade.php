@extends('app')

@section('content')
    <form method="POST" action="{{url('subscribers')}}">
        {{csrf_field()}}

        <label>File Name:</label>
        <input type="text" name="file_name"/>

        <label>File Type:</label>
        <select name="file_type">
            <option value="csv" selected>CSV</option>
            <option value="text">Text</option>
        </select>

        <input type="submit" value="Import"/>
    </form>
@endsection