<!DOCTYPE html>
<html lang="en-US">

@include('ReportMaker.layout.header')
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
  body{
  background-color: white;
}
.col-2{
  width: 300px;
  height: 300px;
  margin-top: 100px;
}
.col-1{
  width: 300px;
  height: 300px;
  margin-top: 100px;
}
.bi{
  /* width: 200px; */
  color: rgb(133, 133, 237);
  font-size: 150px;
  padding: 120px;
}
</style>
<style>
     .image-container {
        width: 300px; /* Adjust the width of the container as needed */
        height: 300px; /* Adjust the height of the container as needed */
        background-size: contain;
        background-position: center center;
        background-repeat: no-repeat;
        overflow: hidden;
        display: inline-block;
        border: 1px solid #ccc; 
    /* Optional: Add a border for better visibility */
    }
</style>


<body id="palleon" class="backend">
    <!-- Page Loader START -->
   
    <!-- Page Loader END -->
    <!-- Top Bar START -->

    <!-- Top Bar END -->
    <!-- Icon Menu START -->
    <div id="palleon-icon-menu">
   
    </div>
   
    <div id="palleon-icon-panel">
        <div id="palleon-icon-panel-inner">
        <div class="palleon-tabs">
                   
               
        <a type="button" href="{{route($folder->url,[$folder->id])}}" class="palleon-btn primary palleon-lg-btn btn-full"><span class="material-icons">add_circle</span>Make Template</a>        
                  
                       
                   
           
          
        </div>
    </div>
</div>
    <!-- Body START -->
    <div id="palleon-body">
        <div class="palleon-wrap">
        <div class="container text-center">
        @if (\Session::has('error'))
     <div class="alert alert-danger alert-dismissible">
        <h5><i class="icon fas fa-wrong"></i> ¡Attention!</h5>
        {!! \Session::get('error') !!}
    </div>
    @endif
    @if (\Session::has('success'))
     <div class="alert alert-success alert-dismissible">
        {!! \Session::get('success') !!}
    </div>
    @endif
    <div class="row align-items-center">
        @php $folderCount = 0; @endphp

        @foreach($templates as $temp)
       
        <div class="col col-3 d-flex flex-column align-items-center"> <!-- Added d-flex and flex-column classes -->
        <a href="#">
    <i class="bi bi-file-earmark-pdf-fill"></i>
</a>
            <h3>{{$temp->name}}</h3>
            @if($temp->IsActive=="Active") <a class="palleon-btn primary" style="background-color:green;">Deployed </a>@endif
            <div class="d-inline">
    <p><b>StartDate</b>:{{$temp->StartDate}}
    @if($temp->EndDate!=null)
             
             <b>EndDate</b>:{{$temp->EndDate}}
                      
                       @endif
                       </p>
              </div>
             

<div class="d-inline">
<a href="{{route('TemplateDelete',$temp->id)}}">  <i class="fa fa-trash" aria-hidden="true" style="color:#FF5733;"></i></a>
   <a href="{{route('IDCard',[$folder->id,$temp->id])}}"> <i class="fas fa-edit" style="color:blue;"></i></a>
</div>
        </div>

        @php
            $folderCount++;
            if ($folderCount % 4 === 0) {
                echo '</div><div class="row align-items-center">';
            }
        @endphp
      
        @endforeach
    </div>
</div>


           
        </div>
    </div>
    <!-- Body END -->
    <!-- Toggle Right Button -->

   
    <!-- Right Column END -->
    <!-- Modal History START -->
   
    <!-- Modal History END -->
    <!-- Scripts -->
    <!-- <script src="{{asset('ReportMaker/js/jquery.min.js')}}"></script> -->
    <script src="{{asset('ReportMaker/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('ReportMaker/js/fabric.min.js')}}"></script>
    <script src="{{asset('ReportMaker/js/plugins.min.js')}}"></script>
    <script src="{{asset('ReportMaker/js/palleon.min.js')}}"></script>
     <!-- Canvas Ruler -->
    <script type="text/javascript">
        if (document.body.clientWidth >= 1200) {
            var evt = new Event('palleon-ruler'),
            dragdrop = new Dragdrop(evt),
            rg  = new RulersGuides(evt, dragdrop, document.getElementById("palleon-ruler"));
        }
    </script>
 
    <script src="{{asset('ReportMaker/js/custom.js')}}"></script>



    
   </html>