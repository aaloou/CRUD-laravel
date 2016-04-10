@extends('template')

@section('css')
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h4 class="panel-title"><strong>Client</strong> List</h4>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered table-hover table-full-width">
						<thead>
							<tr role="row">
								@foreach(array_slice($keys,0,4) as $k)
								<th rowspan="1" colspan="1" style="width: 195px;">
									{{$k}}
								</th>
								@endforeach
								<th>
									Action
								</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($data->all() as $key=>$dt)
							<tr>
								@foreach(array_slice($dt,0,4) as $d)
								<td>{{$d}}</td>
								@endforeach
								<td class="hidden-xs "><a class="btn btn-primary" onclick="toggleDetails('data_{{$key}}',this)">Show details</a></td>
							</tr>
							<tr style="display:none" id="data_{{$key}}">
								<td colspan="5">
								@foreach($keys as $index=>$k)
									{{ucwords(str_replace("_", " ", $k)).':'.$dt[$index]}}<br/>
								@endforeach
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
					<div class="pull-right">{!! $data->render(); !!}</div>
				</div>
			</div>
			
		</div>
	</div>
@endsection

@section('javascript')
<script type="text/javascript">
	function toggleDetails(detailRow,button)
	{
		if($('#'+detailRow).is(':visible'))
		{
			$('#'+detailRow).hide();
			$(button).html('Show details');	
		}
		else
		{
			$('#'+detailRow).show();
			$(button).html('Hide details');	
		}
	}
</script>
@endsection