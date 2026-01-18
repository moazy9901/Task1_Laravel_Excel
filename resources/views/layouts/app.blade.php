<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @vite('resources/css/app.css')
</head>

<body>
  @if(session('success'))
    <script>
      Toastify({
        text: "{{ session('success') }}",
        duration: 4000,
        close: true,
        gravity: "top", // top or bottom
        position: "right", // left, center, right
        stopOnFocus: true,
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
          borderRadius: "8px",
          fontSize: "15px",
        },
        offset: {
          x: 20,
          y: 20
        },
      }).showToast();
    </script>
  @endif

  @yield("content")
</body>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</html>