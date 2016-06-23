@extends('layouts.app')
@section('title')
    {{ trans('entry/labels.edit_entry') }}
@stop
@section('content')

    <div id="wrapper">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container">
                <div class="row">
                    {!! Form::open(['route' => ['entry.update', $entry->id], 'method' => 'PUT']) !!}
                    <div class="col-lg-8">
                        @include('errors.errors')
	                    <div class="form-group">
	                        {!! Form::label('title', trans('entry/labels.title_blog'), ['class' => 'required']) !!}
	                        {!! Form::text('title', old('title', isset($entry) ? $entry['title'] : null), ['class' => 'form-control', 'placeholder' => trans('entry/placeholders.input_title_blog')]) !!}
	                    </div>
	                    <div class="form-group">
	                        {!! Form::label('body', trans('entry/labels.content_blog'), ['class' => 'required']) !!}
	                        {!! Form::textarea('body', old('body', isset($entry) ? $entry['body'] : null), ['class' => 'form-control', 'placeholder' => trans('entry/placeholders.input_content_blog')]) !!}
	                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="well">
                            <dl class="dl-horizontal">
                                <dt>{{ trans('entry/labels.created_at') }}</dt>
                                <dd>{{ $entry->created_at }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>{{ trans('entry/labels.updated_at') }}</dt>
                                <dd>{{ $entry->updated_at }}</dd>
                            </dl>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{ route('entry.show', $entry->id) }}" class="btn btn-primary btn-block"> {{ trans('entry/labels.cance_entry') }} </a>
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::submit(trans('entry/labels.update_entry'), ['class' => 'btn btn-default btn-block btn-success']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection