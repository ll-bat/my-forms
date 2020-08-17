








<div class='card-body ml-2 pl-1 pb-3' required>
    @foreach($q->rels as $ind => $rel)
    <label class="ns-container mt-3" style='font-size:.95em; color:rgba(0,0,0,.8);'>{{$rel->value}}
        <input type="radio"
               name="{{$q->name}}"
               value="{{$rel->id}}"
               @if ($ind == 0 && $q->required) required @endif
               @if (old($q->name) == $rel->id) checked @endif
        >
        <span class="checkmark" style='border-radius:50%'></span>
   </label>
    @endforeach
</div>
