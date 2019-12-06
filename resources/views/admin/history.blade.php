@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body">
    <div class="row">
    <form action="{{route('history.filter',['keyword','date','group'])}}">
      <div class="col-md-4">
        <input type="text" placeholder="Search" name="search" class="form-control">
      </div>
      <div class="col-md-4">
        <input type="text"  id="datetimepicker1" placeholder="Date" name="date_time" class="form-control">
      </div>
      <div class="col-md-4">
        <select class="form-control" name="group">
          <option value="" selected>All Groups</option>
          @foreach($groups as $g)
            <option value="{{$g->id}}">{{$g->name}}</option>
          @endforeach
        </select>
        <br>
        <input type="submit" class="btn btn-primary" value="Filter">
      </div>
      </form>
    </div>
        <div class="row">
        <table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Group Name</th>
      <th>Group Type</th>
      <th>Account Name</th>
      <th>Post Text</th>
      <th>Time</th>

    </tr>
  </thead>
  <tbody>

  @foreach($buffer_posting as $buffer)
  <tr>

      <td>{{$buffer->groupInfo->name}}</td>
      <td>{{$buffer->groupInfo->type}}</td>
      <td><img src="{{$buffer->accountInfo->avatar}}" class="img img-circle" style="width:50px;height:50px;"/></td>
      <td>{{$buffer->post->text}}</td>
      <td>{{$buffer->sent_at}}</td>
      </tr>

    @endforeach

  </tbody>
</table>
{{ $buffer_posting->links() }}

        </div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script type="text/javascript">
                $(function () {
		$('#datetimepicker1').datepicker({
			format: 'DD-MM-YYYY LT'
		});
	});
        </script>
@endsection
