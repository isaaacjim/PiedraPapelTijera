@extends('layouts.app')

@section('content')
   
<form action="'game'" method="'post'">
    @csrf
    <select>
        <option value="Rock">Rock</option>
        <option value="Scissors">Scissors</option>
        <option value="Paper">Paper</option>
    </select>
    <br>
    <br>
    <button type="submit">Send</button>
</form>

@endsection    