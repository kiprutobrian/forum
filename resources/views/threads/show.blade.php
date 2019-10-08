@extends('layouts.app')

@section('content')
<div class="container">
    {{-- THREAD --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="level">
                        <span class="flex">
                            <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted: {{ $thread->title }}
                        </span>
                        @can('update', $thread)
                            <form action="{{ $thread->path() }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-link">Delete Thread</button>
                            </form>
                        @endcan
                    </div>
                 </div>
                <div class="card-body">{{ $thread->body }}</div>
            </div>
            <br>
            @foreach ( $thread->replies as $reply )
               @include('threads.reply')
               <br>
            @endforeach
            {{ $replies->links() }}
                 {{-- FORM --}}
            @if ( auth()->check() )
                <form action="{{ $thread->path() . '/replies'}} " method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea name="body" id="body" class="form-control" placeholder="Have something to say"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            @else
                <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in the discusion.</p>
            @endif
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="ml-0">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Avatar" class="avatar" style="height: 154px;">
                    </div>
                    This thread was published {{ $thread->created_at->diffForHumans() }}
                    <br>
                    By: <a href="#">{{ $thread->creator->name }} </a>
                    <br>
                    {{ str_plural('reply', $thread->replies_count) }}
                    <i class="fa fa-comment"></i> : {{ $thread->replies_count }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
