@extends('layouts.master')

@section('title')
Happy P4 √ Ideas Blueprint.
@endsection

@section('description')
Happy P4 √ Ideas Blueprint.
@endsection

@section('content')
<div class="wrapper">
    <nav class="sub_menu index_menu">
        <h2>Edit {{ $blueprint->title }}</h2>
        <div class="clear"></div>
    </nav>
    <div>
        <div class="blueprint_edit_wrapper action_panel_wrapper">
            <form action="/blueprint/{{ $blueprint->id }}" method="post">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <select class="index_select" id="tag" name="tag">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @if($blueprint->tags[0]->name === $tag->name) selected @endif>{{ $tag->name }}</option>
                    @endforeach
                </select>
                <input type="text" value="{{ $blueprint->title }}" id="title" name="title" placeholder="Blueprint">
                <input type="submit" name="submit" value="Edit Blueprint">
            </form>
            <a href="/blueprint/{{ $blueprint->id }}/delete">Delete</a>
        </div>
    </div>
</div>
@endsection
