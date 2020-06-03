











<div class="media">
    <img src="{{auth()->user()->pathAvatar()}}"  class="mr-3 mt-3 rounded-circle shadow" style="width:40px;height:40px" />
    <div class="media-body">
        <h6>@ <span class="text-info">Author ..</span></h6>

        <textarea class="form-control mb-3 focus-bottom postComment"
                  placeholder="Leave your comment here .."
                  style="font-size: .9em; font-family: 'Segoe UI';box-shadow:none;"
                  rows="2"
        ></textarea>
        <button class="btn rounded ml-4 my-0 mr-3 pl-3 pr-3 py-1 grey grey-h float-right"
           onclick = "postComment({{$index}}, {{$blog->id}})"
        >Post</button>
        <div class="message">
            <p class="error-message red"></p>
        </div>
    </div>
</div>
