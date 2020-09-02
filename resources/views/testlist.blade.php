<!DOCTYPE html>
<html>
<body>

<h2>Cat list</h2>

<ul>
    @foreach($catlist as $cat)
        <li><a href="{{route('imagesbycat',$cat->id)}}">{{$cat->title}}</a></li>
    @endforeach
</ul>  

</body>
</html>
