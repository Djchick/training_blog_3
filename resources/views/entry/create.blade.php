@extends('layouts.app')
@section('title')
    {{ trans('entry/labels.add_entry') }}
@stop
@section('content')
    <div id="wrapper">
        <div class="container">
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                <small>{{ trans('entry/titles.add_entry') }}</small>
                            </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="col-lg-12">
                            {!! Form::open(['route' => 'entry.store', 'method' => 'POST']) !!}
                                @include('errors.errors')
                                <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                <div class="form-group">
                                    {!! Form::label('title', trans('entry/labels.title_blog'), ['class' => 'required']) !!}
                                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => trans('entry/placeholders.input_title_blog')]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('body', trans('entry/labels.content_blog'), ['class' => 'required']) !!}
                                    {!! Form::textarea('body', old('body'), ['class' => 'form-control', 'placeholder' => trans('entry/placeholders.input_content_blog')]) !!}
                                </div>
                                {!! Form::submit(trans('entry/titles.add_entry'), ['class' => 'btn btn-default btn-block btn-success']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
    <!-- /#wrapper -->
@endsection
