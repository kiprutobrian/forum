@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="page-header mb-4">
                <h1>
                    {{ $profileUser->name }}
                </h1>
            </div>
            @foreach ($activities as $date => $activity)
                @foreach ($activity as $record)
                    <h3 class="page-header mb-4">
                        {{ $date }}
                        <hr>
                    </h3>
                    @if (view()->exists("profiles.activities.{$record->type}"))
                        @include("profiles.activities.{$record->type}", ['activity' => $record])
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection
