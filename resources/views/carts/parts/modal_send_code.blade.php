<!-- Modal -->
@guest
<div class="modal fade" id="modal-send-code" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Đăng nhập hoặc Đăng ký</h2>
      </div>
      <div class="modal-body">
            <div class="account-info">
              <p>
                <a href="/login-user" class="tooltip-test" title="" data-original-title="Tooltip">Đăng nhập |</a>
                <a href="/register" class="tooltip-test" title="" data-original-title="Tooltip">Đăng ký</a>
              </p>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
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
        <h2 class="modal-title" id="myModalLabel">Gửi mã xác thực</h2>
      </div>
      <div class="modal-body">
        <div class="form-group p-2 mt-2 mb-2 border">
          <form action="{{ route('send-verify-code') }} " method="POST" id="frm-send-verify-code">
            @csrf
            <p><label for="">Chọn phương thức gửi</label></p>
            <input type="radio" name="code_type" value="1" id="send-code-type-1" checked><label for="send-code-type-1">Gửi mã đến Mail</label>
            <input type="radio" name="code_type" value="2" id="send-code-type-2"><label for="send-code-type-2">Gửi mã đến điện thoại</label>
            <button type="submit" class="btn btn-primary">Gửi mã</button>
          </form>
        </div>
        <hr>
        {{-- confirm send code --}}
        <div class="form-group  p-2 mt-2 mb-2 border">
          <form action="{{ route('confirm-verify-code') }}" method="POST" id="frm-confirm-verify-code">
            @csrf
            <div class="form-group">
               <label for="">Mã xác thực</label>
               <input type="text" name="code" required>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-success">Xác thực</button>
            </div>
         </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>
@endauth