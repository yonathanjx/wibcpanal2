<!-- Fri 23 Feb 1:50 AM Example 4-13. Using Blade stacks-->
<!-- resources/views/layouts/app.blade.php -->
<html>
<head><!-- the head --></head> <body>
    <!-- the rest of the page -->
<script src="/css/global.css"></script>
<!-- the placeholder where stack content will be placed --> @stack('scripts')
</body>
</html>
