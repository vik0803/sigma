@extends('project.sidebar')
@section('subject')
	<div class="row">
		<div class="col-md-12">
			@if(Session::has('message'))
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ Session::get('message') }}
				</div>
			@endif
			<div class="row">
				@foreach($projects as $project)
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								{{ $project->name }}
								<span class="pull-right"><em>{{ $project->projectGroup->label }}</em></span>
							</div>

							<div class="panel-body">
								{{ $project->description }}
							</div>

							<div class="panel-footer">
								Since : {{ date('d/m/Y', strtotime($project->created_at)) }}
								<span class="pull-right">
									<a href="/project/edit/{{ $project->id }}"><span class="glyphicon glyphicon-pencil"></span></a>
									<a href="/project/destroy/{{ $project->id }}"><span class="glyphicon glyphicon-remove"></span></a>
								</span>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection