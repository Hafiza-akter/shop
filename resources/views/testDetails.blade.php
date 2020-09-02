<!DOCTYPE html>
<html>
<body>

<h2>Image list</h2>

<ul>
@foreach($imgList as $img)
<?php $imgp = 'https://kakashi.cyberblaze.tech/'.$img->img_path ?>
        <li><img src="{{$imgp}}" style="width:100px" /></li>
    @endforeach
</ul>  

</body>
</html>
