<button type="button" class="btn btn-primary d-none" id='publish-modal-button' data-toggle="modal" data-target="#publish-modal">
    Open modal
  </button>

 


  

  <div class="modal fade" id="publish-modal">
    <div class="modal-dialog">
      <div class="modal-content border-0" 
           style='border:none; border-radius: 0 !important'>
      
        <div class="modal-header is-loading">
            <p class='font-weight-bolder' style='color:rgba(28, 95, 95, 0.815);font-size:1.2rem;'> Use the link </p>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-center">
             <div id='link-copy-div'>
                <a 
              href='' 
              target='_blank'
              class='text-primary font-weight-bolder is-loading text-left' 
              id='link'>
              </a>
             <button class='btn btn-sm btn-outline-secondary d-none' id='link-copy-button' 
                     onclick='navigator.clipboard.writeText($1("link").href)'> 
              <i class='fa fa-copy' title='copy'></i>
             </button> 
             </div>
              <div class='spinner spinner-border position-absolute d-none before-loading' 
                   style='bottom:calc(50% - 30px);
                          left:calc(50% - 30px);width:60px;height:60px;
                          font-size:2.5rem;color:purple'></div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer is-loading">
          <button  onclick='disableForm(this)'
                   class='btn btn-danger border-0 text-capitalize radius-0 px-3 py-1'>Disable</button>
          <button type="button" class="btn btn-primary publish-cancel-btn radius-0 border-0 text-capitalize px-4 py-1" 
                  data-dismiss="modal">Close</button>
        </div>
        
      </div>

    </div>
  </div>