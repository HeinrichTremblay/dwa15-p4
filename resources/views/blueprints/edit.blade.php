@extends('layouts.master')

@section('title')
Happy P4 √ Ideas Blueprint.
@endsection

@section('description')
Happy P3 √ Ideas Blueprint.
@endsection

@section('content')
<div class="wrapper">
    <nav class="sub_menu index_menu">
        <h2>Edit {{ $blueprint->title }}</h2>
        <div class="clear"></div>
    </nav>
    <section>
        <div class="blueprint_edit_wrapper">
            <form action="/blueprint/{{ $blueprint->id }}" method="post">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <input type="text" value="{{ $blueprint->title }}" id="title" name="title" placeholder="Blueprint">
                <input type="submit" name="submit" value="Edit Blueprint">
            </form>
            <a href="/blueprint/{{ $blueprint->id }}/delete">Delete - {{ $blueprint->title }}</a>
        </div>
    </section>
</div>
@endsection
