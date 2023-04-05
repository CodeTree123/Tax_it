@if(session()->has('success'))
<div class="cus_toast">
    <div class="cus_toast-content">
        <i class="fas fa-solid fa-check check"></i>

        <div class="message">
            <span class="cus_success">Success</span>
            <span class="text text-2">{{session()->get('success')}}</span>
        </div>
    </div>
    <i class="fa-solid fa-xmark close"></i>

    <div class="progress"></div>
</div>
@endif

@if(session()->has('error'))
<!-- Custom Toast For Error Start-->
<div class="cus_toast">
    <div class="cus_toast-content">
        <i class="fa-solid fa-xmark error"></i>

        <div class="message">
            <span class="cus_error">Error</span>
            <span class="text">{{session()->get('error')}}</span>
        </div>
    </div>
    <i class="fa-solid fa-xmark close"></i>

    <div class="progress"></div>
</div>
<!-- Custom Toast For Error End -->
@endif