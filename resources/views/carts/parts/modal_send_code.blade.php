<!-- Modal -->
@guest
<div class="modal fade" id="modal-send-code" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Login Or Register</h2>
      </div>
      <div class="modal-body">
            <div class="account-info">
              <p>
                <a href="/login-user" class="tooltip-test" title="" data-original-title="Tooltip">Login</a>
                <a href="/register" class="tooltip-test" title="" data-original-title="Tooltip">Regitser</a>
              </p>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endguest
<!-- Modal -->
@auth
<div class="modal fade" id="modal-send-code" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Send Code</h2>
      </div>
      <div class="modal-body">
        <div class="form-group p-2 mt-2 mb-2 border">
          <form action="{{ route('send-verify-code') }} " method="POST" id="frm-send-verify-code">
            @csrf
            <p><label for="">Choose Method Send Code</label></p>
            <input type="radio" name="code_type" value="1" id="send-code-type-1" checked><label for="send-code-type-1">Send Code to Mail</label>
            <input type="radio" name="code_type" value="2" id="send-code-type-2"><label for="send-code-type-2">Send Code to Phone</label>
            <button type="submit" class="btn btn-primary">Send Code</button>
          </form>
        </div>
        <hr>
        {{-- confirm send code --}}
        <div class="form-group  p-2 mt-2 mb-2 border">
          <form action="{{ route('confirm-verify-code') }}" method="POST" id="frm-confirm-verify-code">
            @csrf
            <div class="form-group">
               <label for="">Code</label>
               <input type="text" name="code" required>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-success">Submit</button>
            </div>
         </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>
@endauth