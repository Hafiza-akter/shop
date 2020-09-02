<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>
@if(Session::has('message'))
    <p id="flashMessage" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
<form action="{{route('storeprofile')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
  <label for="fname">First name:</label><br>
  <input type="text"  name="fname"><br>
  <label for="lname">Last name:</label><br>
  <input type="text"  name="lname" ><br><br>
  <label for="lname">Email:</label><br>
  <input type="text"  name="email" ><br><br>
  <label for="lname">Phone:</label><br>
  <input type="number"  name="phone" ><br><br>
  <label for="lname">Address</label><br>
  <textarea  name="address" ></textarea><br><br>
  <label for="lname">Image</label><br>
  <input type="file" name="image">

  <input type="submit" value="Submit">
</form> 
</body>
</html>