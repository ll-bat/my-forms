



<?php

?>






<p class="badge badge-pill badge-{{$badges[$index%count($badges)]}} text-wrap pb-2 activeCategory"
   style="font-size:1em;min-width:200px;max-width:250px; font-family: 'Comic Sans MS'"
>{{$category->name}}</p>

<div class="hidden" id="categoryEdit{{$index}}" style="margin-top:-10px;text-align: center">
    <button class="btn btn-sm btn-default rounded-pill text-muted"
            style="font-family: 'Comic Sans MS'; font-size:.8em;"
            onclick="toggleRename({{$index}})"
    >rename</button>
    <a class="btn btn-sm btn-default rounded-pill text-muted"
            style="font-family: 'Comic Sans MS'; font-size:.8em;"
            onclick="deleteCategory({{$index}})"
            data-toggle="tooltip" title="If you delete this category, all blogs in this category will be moved to category - general"
    >delete</a>
    <form method="post" action="category/{{$category->id}}/delete" class="category-delete">
        @method('delete')
        @csrf
    </form>
</div>
