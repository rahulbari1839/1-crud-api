<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <link href='https://fonts.googleapis.com/css?family=Roboto:500,300,700,400italic,400' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Main custom css -->
  <link href="{{ url('css/style.css') }}" media="screen" rel="stylesheet">

</head>

<body class="">
  
  <!-- Wrapper start -->
  <div class="wrapper">
    <!-- VALIDATION ERRORS -->
    @if($errors->any())
     @foreach ($errors->all() as $error)
           <div class="alert alert-danger">
              {{ $error }}
          </div> 
       @endforeach
    @endif
    @if(session()->has('message_success'))
        <div class="alert alert-success">
            {{ session()->get('message_success') }}
        </div>
    
    @endif
    @if(session()->has('message_error'))
     
        <div class="alert alert-danger">
            {{ session()->get('message_error') }}
        </div>
       
    @endif
    
    <div id="content-wrapper">
      @yield('content')
    </div>
    
   
   
   
  </div>
 
  <script src="{{ url('js/custom.js') }}"></script>

  <!-- Page Scripts -->
  @yield('scripts')
</body>

</html>
