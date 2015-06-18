@extends('layouts.default')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

                    @include('errors.list')

                    {!! Form::open(['route' => 'password_reset', 'role' => 'form', 'class' => 'form-horizontal']) !!}

                        <div class="form-group">
                            {!! Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Send Password Reset Link', ['class' => 'btn btn-primary']) !!}
							</div>
						</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
