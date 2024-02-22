{{-- Example 4-9 Extending a Blade layout --}}
{{-- Each file should only extend one other file,
     and the @extends call should be the first 
     line of the file. --}}
@extends('layouts.master')

{{-- child layout yields title or if not specified
     what ever default is put there--}}
@section('title', 'Dashboard')
    
@section('content')
    Welcome to your application Dashboard!
@endsection

@section('home')
    <div class="content" data-page-name="pagename">
    <p>Here's why you should sign up for our app: <strong>It's Great.</strong></p>
        @include('sign-up-button', ['text' => 'See just how great it is'])
    </div>
    
@endsection

@section('footerScripts')
    @parent
    <script src="dashboard.js"> </script>
@endsection

