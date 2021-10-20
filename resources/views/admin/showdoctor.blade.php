
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
    @include('admin.sidebar')
      <!-- partial -->
    
   @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper"> 

        <div border="1px"  align="center" style="padding:50px;">

        <form action="{{url('search')}}" method="get" align="center">
          <input style="color:black;" type="search" name="search" placeholder="Search for something">
          <input style="background-color:#4F0E0E; height:42px; width:60px;" type="submit" value="Search">
        </form>
        <br><br>


            <table style="background:#5C7457;">

                <tr style="background:#BEAEE2;" align="center">

                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Doctor_Name</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Number</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Speciality</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Room</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Image</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Delete</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Update</td>
                    
                </tr>

                @foreach($data as $show)
                <tr align="center">
                    <td  height="30px" width="100px">{{$show->doctor_name}}</td>
                    <td  height="30px" width="100px">{{$show->number}}</td>
                    <td  height="30px" width="100px">{{$show->speciality}}</td>
                    <td  height="30px" width="100px">{{$show->room}}</td>
                   
                    <td>
                        <img height="150px" width="150px" src="doctorimage/{{$show->image}}">
                    </td>
                    <td> <a  onclick="return confirm('Are you sure delete this?')" href="{{url('delete',$show->id)}}">Delete</a></td>
                    <td> <a  href="{{url('update_view',$show->id)}}">update</a></td>
            
                </tr>
                @endforeach

            </table>
        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>