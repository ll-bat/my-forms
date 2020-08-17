







<div class='card-body ns-input-container'>
  <textarea type="text"
            rows='1'
            class="form-control docs-input border-0 ns-textarea ns-font-family ns-thin-weight bg-white autoresize"
            name ="{{$q->name}}"
            placeholder='Your answer here'
            oninput="$(window).trigger('autoresize');"
            >{{old($q->name)}}</textarea>
  <div class="ns-underline"></div>
</div>
