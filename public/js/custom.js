
$('#discount_percentage').hide();
$(".discount_percentage").prop('required',false);

if($('#is_sale').is(':checked'))
    {
        // console.log('hjgbh');
      $('#discount_percentage').show();
      $(".discount_percentage").prop('required',true);
      $( '#discount_percentage' ).addClass( "required" );

    }

$('#is_sale').click(function(){
    if($('#is_sale').is(':checked'))
    {
      $('#discount_percentage').show();
      $(".discount_percentage").prop('required',true);
      $( '#discount_percentage' ).addClass( "required" );

    }else
    {
        $('#discount_percentage').hide();
        $(".discount_percentage").prop('required',false);
        $( '#discount_percentage').addClass( "required" );

    }
});


  $(document).ready(function(){
    setTimeout(function(){
      $("#flashMessage").slideUp(1000);
    },3000);
  });

$(document).ready(function(){
    $("#oldremove").click(function(){
        $(this).hide();
        $("#imgthumb").hide();
        $("#imginput").show();
        $("#sizemsg").show();
        

    }); 
});

$(document).ready(function(){
  $("#oldremove2").click(function(){
      $(this).hide();
      $("#imgthumb2").hide();
      $("#imginput2").show();
      $("#sizemsg2").show();
      

  }); 
});

$(document).ready(function(){
  $("#oldremove3").click(function(){
      $(this).hide();
      $("#imgthumb3").hide();
      $("#imginput3").show();
      $("#sizemsg3").show();
      

  }); 
});

  $(document).ready(function(){
    $("#remove-btn").click(function(){
      $(this).hide();
      $('.remove-img').hide();
      $('#inputimg').show();
      $(".bannimg").show();
    });
  });

  $(function () {
  
    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })


  })


