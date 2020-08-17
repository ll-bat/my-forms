





<?php
    $color = $bcolor[$index%count($bcolor)];
?>

<form method="POST" action="category/{{$category->id}}/edit"
    style="margin-top:-5px;">
    @csrf
    <input type="text"
           class="form-control mb-3 bg-transparent rounded-0 form-rename font-weight-bolder"
           style='border:none;border-bottom: 2px solid {{$color}};color:{{$color}}; font-family: "Comic Sans MS"'
           name="name"
           value="{{$category->name}}" />
    <div class="text-center" style="margin-top:-10px;">
        <input type="submit" class="btn btn-sm rounded-pill"
               value="Save" />
        <a class="btn btn-sm rounded-pill"
           onclick = 'toggleRename({{$index}})'
        >Cancel</a>
    </div>
</form>
