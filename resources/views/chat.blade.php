@extends('layouts.app')

@section('content')
<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">Chat</div>

                        <div class="card-body" id="app">
                            <chat-app :user="{{ auth()->user() }}"></chat-app>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
@endsection
