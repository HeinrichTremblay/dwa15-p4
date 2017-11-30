@extends('layouts.master')

@section('title')
  Happy P3 √ Ideas Blueprint.
@endsection

@section('description')
  Happy P3 √ Ideas Blueprint.
@endsection

@section('content')
<div class="wrapper">
  <nav class="sub_menu index_menu">
    <h2>All Blueprints</h2>
    <form class="blueprint_form" action="/blueprint" method="post">
      {{ csrf_field() }}
      <input type="text" id="title" name="title" placeholder="Blueprint">
      <input type="submit" name="submit" value="Add Blueprint">
    </form>
    <div class="clear"></div>
  </nav><!--sub_menu-->
  <section class="blueprint_wrapper">
      @foreach ($blueprints as $blueprint)
        <a href="/blueprint/{{ $blueprint->id }}">
            <div class="blueprint_panel">
                <b>{{ $blueprint->title }}</b>
            </div>
        </a>
      @endforeach
  </section>
</div><!--wrapper-->
@endsection
