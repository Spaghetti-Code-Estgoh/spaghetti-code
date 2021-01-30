{{ Session::flush() }}
{{ Cookie::queue(Cookie::forget('rememberMe')) }}
<script> setTimeout(function(){window.location='/home'}); </script>