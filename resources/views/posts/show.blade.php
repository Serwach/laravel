@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img class="rounded-circle w-100"
                             src="/storage/{{ $post->user->profile->image }}">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                {{ $post->user->username }}
                            </a>
                            <a href="#" class="pl-3">Follow</a>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <p>
                <span class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id }}">
                        {{ $post->user->username }}
                    </a>
                </span>
                {{ $post->caption }}
            </p>
        </div>
    </div>
</div>
@endsection
