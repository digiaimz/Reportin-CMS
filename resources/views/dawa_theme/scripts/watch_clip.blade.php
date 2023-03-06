<script>

    function add_view_clip(clip_id , home)
    {

    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var data_var = {  clip_id: clip_id     };
    $.ajax({
    type:'POST',
    url: "{{ route('add.to.watch.clip') }}" ,
    data: data_var ,
    success:function(data){

        if(home == true && data.status =="add")
        {
            var total =  Number($('#once_clip_total_views').html());
            total = total+1;
            $('#once_clip_total_views').html(total);

        }

        if(home == false && data.status =="add")
        {
            if(data.total == 1)
            {
            current_clip_element.find('.clip_views').html(data.total + " View");
            }
            else{
                current_clip_element.find('.clip_views').html(data.total + " Views");
                current_clip_element.find('.img_blur').html(data.total + " Views");
            }
            current_clip_element.find('.img_blur').addClass('blur_css');
            current_clip_element.append(' <div class="bg-text">  <span>Watched</span>  </div>');
            current_clip_element.find('.bg-text-quiz').show();

        }


    console.log(data);

    },
                   error: function (jqXHR, exception) {
            // var msg = AjaxError(jqXHR, exception);
            //     if(msg!= true)
            //     {
            //             alert(msg);
            //     }

        },


    });

    }



    function add_to_downlaod_clip(element , deep_level , clip_id , home , action)
    {


        current_clip_element = $('.video-row-disabled[data-id="'+clip_id+'"]');



    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var data_var = {  clip_id: clip_id  , action:action   };
    $.ajax({
    type:'POST',
    url: "{{ route('add.to.download.clip') }}" ,
    data: data_var ,
    success:function(data){

        if(home == true && data.status =="add")
        {
            var total =  Number($('#once_clip_total_views').html());
            total = total+1;
            $('#once_clip_total_views').html(total);
        }

        if(home == false && data.status =="add")
        {
            if(data.total == 1)
            {
                current_clip_element.find('.clip_views').html(data.total + " View");
            }
            else{
                current_clip_element.find('.clip_views').html(data.total + " Views");
                current_clip_element.find('.img_blur').html(data.total + " Views");
            }
            // current_clip_element.find('.img_blur').addClass('blur_css');
            // current_clip_element.append(' <div class="bg-text">  <span>Watched</span>  </div>');

        }


    console.log(data);

    },
                   error: function (jqXHR, exception) {
            // var msg = AjaxError(jqXHR, exception);
            //     if(msg!= true)
            //     {
            //             alert(msg);
            //     }

        },


    });

    }




    </script>
