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

@section('footerScripts')
    @parent
    <script src="dashboard.js"> </script>
@endsection

