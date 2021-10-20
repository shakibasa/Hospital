
<!DOCTYPE html>
<html lang="en">
  <head>
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

            <div class="container">
              
          @if(session()->has('message'))

            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">
                 X
              </button>
             {{session()->get("message")}}
            </div>

          @endif

                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div style="padding:10px;">
                        <label>Doctor Name </label>
                        <input type="text" style="color:black;" name="doctor_name" placeholder="Enter the Name" required="">
                    </div>
                    <div style="padding:10px;">
                        <label>Phone Number</label>
                        <input type="number" style="color:black;" name="number" placeholder="Enter the Number" required="">
                    </div>
                    <div style="padding:10px; ">
                        <label>Speciality</label>
                        <select name="speciality" style=color:black; required="">
                          <option value="--Select--">--Select--</option>
                          <option value="Anesthesiology">Anesthesiology</option>
                          <option value="Diagnostic Radiology">Diagnostic Radiology</option>
                          <option value="Emergency Medicine">Emergency Medicine</option>
                          <option value="Medical Genetics">Medical Genetics</option>
                          <option value="Neurology">Neurology</option>
                          <option value="Ophthalmology">Ophthalmology</option>
                          <option value="Pathology">Pathology</option>
                          <option value="Pediatrics">Pediatrics</option>
                          <option value="Psychiatry">Psychiatry</option>
                          <option value="Surgery">Surgery</option>
                          <option value="UROLOGY">Urology</option>
                        </select>
                    </div>
                    <div style="padding:10px;">
                        <label>Room Number</label>
                        <input type="text" style="color:black;" name="room" placeholder="Enter the Room Number" required="">
                    </div>
                    <div style="padding:10px;">
                        <label>Doctor Image </label>
                        <input type="file" name="file" required="">
                    </div>
                    <div style="padding:10px;">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>

        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>