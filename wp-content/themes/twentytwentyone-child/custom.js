jQuery(document).ready(function(){
    
    
    $('#firstForm').submit(function(e) {
        e.preventDefault();
        nextStep(1)
    });
    
    $('#secondForm').submit(function(e) {
        e.preventDefault();
        nextStep(2)
    });
    
    document.querySelectorAll('.nav-link').forEach(function(item) {
        item.addEventListener('click', function() {
          $(".request").remove();
        });
    });
});

function nextStep(num) {
    console.log(num)
    var name = $('#validationName')
    let email = $('#exampleInputEmail1')
    let phone = $('#validationPhone')

    let quantity = $('#validationQuantity').val()

    if(num == 1) {
        $('#quantity-tab').click()
    }
    if(num == 2) {
        switch (true) {
            case quantity < 10:
                quantity = 10;
              break;
            case quantity > 10 && quantity < 100:
                quantity = 100;
              break;
            case quantity > 100:
                quantity = 1000;
          }
          $('#price-tab').click()
          $( "#donePrice" ).last().html( "$" + quantity );
    }
    // console.log(quantity)
    if(num == 3) {
        var data = {
            name: name.val(),
            mail: email.val(),
            phone: phone.val(),
            quantity: quantity
        };
        handleSubmit(data);
    }
    if(num == 4) {
        name.val('')
        email.val('')
        phone.val('')
        $('#validationQuantity').val('')
        $('#info-tab').click()
    }
}

function back(num) {
    
    if(num == 1){
        $('#info-tab').click()
    }
    if(num == 2){
        $('#quantity-tab').click()
    }
}
function handleSubmit(data) {
        data.action = 'frontend_action_without_file'
       console.log(data)
       ajaxurl = '/wp-admin/admin-ajax.php'
       
       jQuery.ajax({
            url: ajaxurl,
            type: 'POST',
            data: data,
            success: function (response) {
                console.log($('#done'))
                
                
                $('#done-tab').click()
                if($('#validationName').val() == '' || $('#validationName').val().lenght == 0) {
                    $('#done h1').after('<p class="request">❎ Error</p>');
                } else {
                    $('#done h1').after('<p class="request">✅ Your email was send successfully</p>');
                }
            }
        });
}
