
<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public">
   @include('admin.css')

  <style type="text/css">
    label{
      display:inline-block;
      width: 200px;
    }
  </style>

  </head>
  <body>
    <div class="container-scroller" align="center" style="padding-top:50px;">
    @include('admin.sidebar')
      <!-- partial -->
      
   @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper"> 

           
            <div align="center" style="padding:25px; background:#CEE5D0; width:800px;">
                <form action="{{url('update', $data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
	


            <div style="padding:10px;">
                <label>Doctor Name</label>
                <input type="text" style="color:black;" name="doctor_name" value=" {{$data->doctor_name}}">
            </div>

            <div style="padding:10px;">
                <label>Phone Number</label>
                <input type="text" style="color:black;" name="number" value=" {{$data->number}}">
            </div>

            <div style="padding:10px;">
                <label>Speciality</label>
                <input type="text" style="color:black;" name="speciality" value=" {{$data->speciality}}">
            </div>

            <div style="padding:10px;">
                <label>Room Number</label>
                <input type="text" style="color:black;" name="room" value="{{$data->room}}">
            </div>

            

            <div style="padding:10px;">
                <label>Old Image</label>
                <img height="150px" width="150px" src="/doctorimage/{{$data->image}}">
            </div>

            <div style="padding:10px; ">
                <label>Change Image</label>
                <input type="file" name="file">
            </div>

            <div style="padding:10px;">
                <input type="Submit" value="Update">
            </div>

           
        </form>
    </div>
       
      <!-- page-body-wrapper ends -->
    </div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>




