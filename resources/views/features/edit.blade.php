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
    <h2>Edit - {{ $feature->title }}</h2>
    <div class="clear"></div>
  </nav>
  <section>
    <div class="blueprint_edit_wrapper feature_edit action_panel_wrapper">
      <form action="/feature/{{ $feature->id }}" method="post">
        {{ method_field('put') }}
        {{ csrf_field() }}
        <table>
            <tbody>
                <tr>
                    <td style="width:80%">
                        <label for="title">Feature</label>
                        <input type="text" id="title" name="title" placeholder="Ex: Feature 1." value="{{ $feature->title }}">
                    </td>
                    <td style="width:10%">
                        <label for="value">Value</label>
                        <select id="value" name="value" value="{{ $feature->value }}">
                            @for ($i = 0; $i < 10; $i++)
                                <option value="{{ $i+1 }}" @if($feature->value === $i) selected @endif>{{ $i+1 }}</option>
                            @endfor
                        </select>
                    </td>
                    <td style="width:10%">
                        <label for="complexity">Complexity</label>
                        <select id="complexity" name="complexity">
                            @for ($i = 0; $i < 10; $i++)
                                <option value="{{ $i+1 }}"  @if($feature->complexity === $i) selected @endif>{{ $i+1 }}</option>
                            @endfor
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="submit" name="submit" value="Edit">
      </form>
      <a href="/feature/{{ $feature->id }}/delete">Delete</a>
    </div>
  </section>
</div>
@endsection
