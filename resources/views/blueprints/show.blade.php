@extends('layouts.master')

@section('title')
Happy P4 √ Ideas Blueprint.
@endsection

@section('description')
Happy P4 √ Ideas Blueprint.
@endsection

@push('head')
  <style media="screen">
    @if ($blueprint->map_legend)
      .map { display:block; }
    @endif
  </style>
@endpush

@section('content')
<div class="wrapper">
    <nav class="sub_menu index_menu">
        <h2>{{ $blueprint->title }}</h2>
        <a href="/blueprint/{{ $blueprint->id }}/edit">Edit</a>
        <div class="clear"></div>
    </nav>

    <section class="left_col">
        <h3 class="left">Quadrant Matrix</h3>

        <div class="map_menu right">
            <span>Legend</span>
            <form id="map_form" class="right" action="/blueprint/{{ $blueprint->id }}/legend" method="post">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <input type="checkbox" onclick="document.getElementById('map_form').submit();" name="legend" value="1" @if($blueprint->map_legend) checked @endif>
            </form>
        </div>

        <div id="scatter_graph"></div>

        @if(count($errors) > 0)
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>

    <section class="right_col">
        <form class="ideas_form" action="/blueprint/{{ $blueprint->id }}/feature" method="post">
            {{ csrf_field() }}
            <table>
                <tbody>
                    <tr>
                        <td style="width:80%">
                            <label for="title">Feature</label>
                            <input type="text" id="title" name="title" placeholder="Ex: Feature 1.">
                        </td>
                        <td style="width:10%">
                            <label for="value">Value</label>
                            <select id="value" name="value">
                                @for ($i = 0; $i < 10; $i++)
                                    <option value="{{ $i+1 }}">{{ $i+1 }}</option>
                                @endfor
                            </select>
                        </td>
                        <td style="width:10%">
                            <label for="complexity">Complexity</label>
                            <select id="complexity" name="complexity">
                                @for ($i = 0; $i < 10; $i++)
                                    <option value="{{ $i+1 }}">{{ $i+1 }}</option>
                                @endfor
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" name="submit" value="Add to list">
        </form>

        <div class="list short_list">
            <div class="list_header">
                <h3>Prioritized List</h3>
            </div>

            <div class="list_content">
                <table>
                    <thead>
                        <tr>
                            <th>Feature/Idea</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($features as $feature)
                            <tr>
                                <td id="row-{{ $loop->index }}">
                                    <b>{{ $loop->index+1 }}.</b> {{ $feature->title }}
                                    <div class="features_menu">
                                        <a href="/feature/{{ $feature->id }}/edit">Edit</a> |
                                        <a href="/feature/{{ $feature->id }}/delete">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection



@push('body')
<script type="text/javascript">
var xLabel = "Complexity";
var yLabel = "Value";
var items = @json($features);
</script>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
@endpush
