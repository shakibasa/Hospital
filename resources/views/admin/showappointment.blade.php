
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

            <table style="background:#5C7457;">

                <tr style="background:#BEAEE2;" align="center">
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Name</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Email</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Date</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Number</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Doctor_Name</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Message</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Status</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Approved</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Cancel</td>
                    <td height="50px" width="200px" style="font-size:20px; color:#4F0E0E;">Send Mail</td>
                </tr>

                @foreach($data as $appoint)
                <tr align="center">
                    <td  height="30px" width="100px">{{$appoint->Name}}</td>
                    <td  height="30px" width="100px">{{$appoint->Email}}</td>
                    <td  height="30px" width="100px">{{$appoint->DoB}}</td>
                    <td  height="30px" width="100px">{{$appoint->Number}}</td>
                    <td  height="30px" width="100px">{{$appoint->Doctor_Name}}</td>
                    <td  height="30px" width="100px">{{$appoint->Message}}</td>
                    <td  height="30px" width="100px">{{$appoint->Status}}</td>
                    <td><a class="btn btn-success" href="{{url('approved_appoint', $appoint->id)}}" height="30px" width="100px">Approved</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are you sure delete this?')" href="{{url('cancel_appoint', $appoint->id)}}" height="30px" width="100px">Cancel</a></td>
                    <td><a class="btn btn-primary" href="{{url('emailview', $appoint->id)}}" height="30px" width="100px">Send Mail</a></td>
                </tr>
                @endforeach
            </table>
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