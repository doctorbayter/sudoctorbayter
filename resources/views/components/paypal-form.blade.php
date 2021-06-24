<div class=" max-w-lg h-0">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="{{config('services.paypal.business')}}">
    <input type="hidden" name="lc" value="AL">
    <input type="hidden" name="item_name" value="{{$plan->name}}">
    <input type="hidden" name="item_number" value="{{$plan->id}}">
    <input type="hidden" name="custom" value="{{auth()->user()->id}}">
    <input type="hidden" name="amount" value="{{$plan->finalPrice}}">
    <input type="hidden" name="currency_code" value="{{config('services.paypal.currency_code')}}">
    <input type="hidden" name="button_subtype" value="services">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="rm" value="0">
    <input type="hidden" name="return" value="{{route('payment.paypal.response', $plan)}}">
    <input type="hidden" name="cancel_return" value="{{env('APP_URL')}}">
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
    <input type="hidden" name="notify_url" value="{{route('payment.paypal.approved', $plan)}}">
    <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1" class="hidden">
</div>