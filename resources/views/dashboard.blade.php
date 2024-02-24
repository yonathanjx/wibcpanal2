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


{{-- Fri 23 Feb 1:30 AM  Example 4-10. Including view partials with @include --}}
{{-- Had to add the below variable as the variable in the included file was not working
    as in the book --}}

{{$pageName = "thenameofthepage";}}

@section('home')
    <div class="content" data-page-name="{{ $pageName }}">
    <p>Here's why you should sign up for our app: <strong>It's Great.</strong></p>
        @include('sign-up-button', ['text' => 'See just how great it is'])
    </div>
    
@endsection

@section('footerScripts')
    @parent
    <script src="dashboard.js"> </script>
@endsection

