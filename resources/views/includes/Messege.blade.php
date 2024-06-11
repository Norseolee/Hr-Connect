<style>
    /* Your styles for notifications here */

    .notif {
        /* Common styles for notifications */
        position: fixed;
        top: 20px;
        left: 20px;
        right: 20px;
        padding: 12px;
        display: flex;
        z-index: 9999999;
        flex-direction: row;
        align-items: center;
        justify-content: start;
        border-radius: 8px;
        box-shadow: 0px 0px 5px -3px #111;
    }

    #notif_fail {
        background: rgba(253, 196, 177, 1);
    }

    #notif_success {
        background: rgba(231, 252, 172, 1);
    }

    #notif_info {
        background: rgba(177, 228, 253, 1);
    }

    /* Your styles for the icons here */

    .fail_text {
        /* Styles for fail messages */
        font-weight: 500;
        font-size: 14px;
        color: #700b2e;
    }

    .success_text {
        /* Styles for success messages */
        font-weight: 500;
        font-size: 14px;
        color: #386f09;
    }

    .info_text {
        /* Styles for info messages */
        font-weight: 500;
        font-size: 14px;
        color: #0b2a70;
    }

    .iconsizefail {
        color: #eb3b3b;
        padding-inline: 10px;
        transform: scale(10px);
    }

    .iconsizesuccess {
        color: #a2e831;
        padding-inline: 10px;
        transform: scale(10px);
    }

    .iconsizeinfo {
        color: #3b96eb;
        padding-inline: 10px;
        transform: scale(10px);
    }
</style>

@if (Session::has('fail'))
<div id="notif_fail" class="notif">
    <div>
        <i class="iconsizefail fa-solid fa-circle-exclamation"> </i>
    </div>
    <div class="fail_text"> {{Session::get('fail')}}</div>
</div>
@elseif (Session::has('success'))
<div id="notif_success" class="notif">
    <div>
        <i class="iconsizesuccess fa-solid fa-circle-check"> </i>
    </div>
    <div class="success_text"> {{Session::get('success')}}</div>
</div>
@elseif (Session::has('info'))
<div id="notif_info" class="notif">
    <div>
        <i class="iconsizeinfo fa-solid fa-circle-info"></i>
    </div>
    <div class="info_text">{{Session::get('info')}}</div>
</div>
@endif

@foreach ($errors->all() as $error)
<div id="notif_fail" class="notif">
    <div>
        <i class="iconsizefail fa-solid fa-circle-exclamation"> </i>
    </div>
    <div class="fail_text"> {{$error}}</div>
</div>
@endforeach