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
        <h2>All Blueprints</h2>
        <form class="blueprint_form" action="/blueprint" method="post">
            {{ csrf_field() }}
            <select class="index_select" id="tag" name="tag">
                <option value="" disabled selected>Category</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <input type="text" id="title" name="title" placeholder="Blueprint">
            <input type="submit" name="submit" value="Add Blueprint">
        </form>
        <div class="clear"></div>
    </nav>
    @if(count($errors) > 0)
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="blueprint_wrapper">
        @foreach ($blueprints as $blueprint)
            <div class="blueprint_panel">
                <h3><a href="/blueprint/{{ $blueprint->id }}">{{ $blueprint->title }}</a></h3>
                <p><a href="/blueprint/{{ $blueprint->id }}">{{ $blueprint->tags[0]->name }}</a></p>
                <div class="blueprint_panel_menu">
                    <a class="left" href="/blueprint/{{ $blueprint->id }}/edit">Edit</a>
                    <a class="right" href="/blueprint/{{ $blueprint->id }}/delete">Delete</a>
                </div>
            </div>
        @endforeach
    </section>
</div>
@endsection
