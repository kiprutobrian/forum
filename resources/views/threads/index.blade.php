@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @forelse ($threads as $thread)
                <div class="card">
                    <div class="card-header">
                        <div class="level">
                        <h4 class="flex">
                            <a href="{{ $thread->path() }} ">
                            {{ $thread->title }}
                            </a>
                        </h4>
                        <a href="{{ $thread->path() }} ">
                        {{ $thread->replies()->count() }} {{ str_plural('reply', $thread->replies()->count()) }}
                        <i class="fa fa-comment"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="body">{{ $thread->body }} </div>
                    </div>
                </div>
            <br>
            @empty
                <p>There are no relevant results at this time</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
