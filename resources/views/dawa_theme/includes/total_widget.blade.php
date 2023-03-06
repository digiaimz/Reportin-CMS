
<a href="{{ $link }}">
<div class="widget widget-five" style="height: auto;">
    <div class="widget-content">

        <div class="header" style="display: block;">
            <div class="header-body">
                <h6 style="font-size:14px;">

                    {!! $svg !!}
                    {!!$en_title!!} </h6>

                <p class="meta-date" style="color: black; text-align: right;
                font-weight: 500;">{!!$ur_title!!}</p>
            </div>

        </div>

        <div class="w-content">
            <div class="">
                <p class="task-left">{{ $total  }}</p>

            </div>
        </div>
    </div>
</div>
</a>
<style>

.widget-five .w-content div .task-left {
    margin-bottom: 0;
    font-size: 30px;
    color: #1b55e2;
    background: #c2d5ff;
    font-weight: 600;
    border-radius: 50%;
    display: inline-flex;
    height: 76px;
    min-width: 130px;
}
</style>

