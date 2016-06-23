@extends('layouts.app')
@section('title')
    {{ trans('entry/labels.list_entry') }}
@stop
@section('content')

    <div id="wrapper">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>{{ trans('entry/labels.list_entry') }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        @include('errors.errors')
                    </div>
                    <div class="col-lg-12">
                        @if(!$entries->isEmpty())
                        <section id="one" class="style1">
                            @foreach ($entries as $entry)
                            <div class="inner">
                                <article class="feature left">
                                    <div class="content">
                                        <h2><a href="{{ route('entry.show', $entry->id) }}">{{ $entry->title }}</a></h2>
                                        <ul>
                                            <li>
                                                <a href="{{ route('user.show', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
                                            </li>
                                            <li>
                                                <p>{{ $entry->created_at }}</p>
                                            </li>
                                        </ul>
                                        <div>{{ substr($entry->body, 0, 250) }}{{ strlen($entry->body) > 250 ? "..." : "" }}</div>
                                        <a href="{{ route('entry.show', $entry->id) }}" class="btn btn-primary right">{{ trans('entry/labels.view_detail') }}</a>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </section>
                        @else
                            <div class="alert alert-info">
                                {{ trans('entry/messages.empty_entry') }}
                            </div>
                        @endif
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