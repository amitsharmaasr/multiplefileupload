<div class="container">

    <div class="row">
        <a href="upload">Upload Images</a>
    </div>

    <div class="row">
                @if(count($photo)> 0)
            <table>
                <tr>
                    <th>Images</th>
                    <th>Action</th>
                </tr>

            
            @foreach($photo as $p)
	     <tr>
                <td style="width: 150px; height: 150px;"><img width="100%" src="{{asset("storage/".$p->filename)}}" alt=""></td>
                <td><a href ="deletephoto?id={{$p->id}}">delete</a></td>
            </tr>
            @endforeach
        </table>
            @else
                <p> No Images(s) Found ... </p>
            @endif
    </div>
</div>

