<div id="toastAlert">
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" style="padding-top:0;position: absolute; top: 61px; right: 0; z-index:1000; ">
    <div class="toast-header" style="background-color:#d92550;border:0">
        <strong class="mr-auto" style="background-color:#d92550;color:white;font-weight: bold">Erro</strong>
        <small></small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="cursor:pointer;background-color: #d92550;border: 0;color: white;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body" style="background-color:#d92550;color:white;">
        <?= $message ?>
    </div>
</div>


<script>
    $('.toast').toast('show');
</script>
</div>