@extends('layouts.master')

@section('title')
Happy P4 √ Ideas Blueprint.
@endsection

@section('description')
Happy P4 √ Ideas Blueprint.
@endsection

@section('content')
<div class="wrapper">
    <section>
        <div class="blueprint_delete_wrapper action_panel_wrapper delete_action">
            <h2>Are you sure you want to delete {{ $feature->title }}?</h2>
            <form action="/feature/{{ $feature->id }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <input type="submit" name="submit" value="Delete">
            </form>
            <p class='cancel'>
                <a href='{{ $previousUrl }}'>No, I changed my mind.</a>
            </p>
        </div>
    </section>
</div>
@endsection
