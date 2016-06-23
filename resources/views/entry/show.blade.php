@extends('layouts.app')
@section('title')
    {{ trans('entry/labels.view_detail') }}
@stop
@section('content')

    <div id="wrapper">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container">
                <div class="row">
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        @include('errors.errors')
                    </div>
                    <div class="col-lg-8">
                        <h1>{{ $entry->title }}</h1>
                        <div>{{ $entry->body }}</div>
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
                                    <a href="{{ route('entry.edit', $entry->id) }}" class="btn btn-primary btn-block"> {{ trans('entry/labels.page_edit_entry') }} </a>
                                </div>
                                {!! Form::open(['route' => ['entry.destroy', $entry['id']], 'method' => 'DELETE']) !!}
                                <div class="col-sm-6">
                                    {{ Form::button("<i class=\"fa fa-trash-o  fa-fw\"></i>", [
                                        'class' => 'btn btn-danger',
                                        'onclick' => "return confirm('" . trans('entry/messages.confirm_delete') . "')",
                                        'type' => 'submit',
                                    ]) }}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection