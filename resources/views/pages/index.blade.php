@extends('layouts.app')

@section('content')
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    
/* .container {
  position: relative;
  width: 100%;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #030303;
}

.container:hover .overlay {
  opacity: 0.5;
}

.text {
  color: #FF8C00;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
} */

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>
<body> 
    <div class="container">
<img src="/images/logo2.png" alt="logo" class="center" style="width:65%;" >
   {{-- <div class="overlay">
    <div class="text">Welcome to Supervision Tool</div>
  </div> --}}
</div>

</body>
</html>

@endsection
 