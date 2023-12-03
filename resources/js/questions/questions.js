$(function () {
    var $sections = $('.form-section');

    function navigateTo(index) {
        $sections.removeClass('current').eq(index).addClass('current');

        $('.form-navigation .previous').toggle(index>0);

        var atTheEnd = index >= $sections.length -1;

        $('.form-navigation .next').toggle(!atTheEnd);
        $('.form-navigation [Type=submit]').toggle(atTheEnd);
    }

    function curIndex() {
        return $sections.index($sections.filter('.current'));
    }

    $('.form-navigation .previous').click(function(){
        navigateTo(curIndex() - 1);
    });

    $('.form-navigation .next').click(function(){
        navigateTo(curIndex()+1);

    });

    $('.form-navigation .end').click(function(){
        $.ajax({
            type: "get",
            url: "/questions/finishQuestions",
            success: function (response) {
                Swal.fire(
                    'Gracias por Participar',
                    'Te invitamos a seguir usando nuestra app',
                    'success'
                    ).then((result) => {
                        window.location.href = '/questions/index';
                      });
            }
        });
    })

    $('.reto').click(function(){
        $.ajax({
            type: "GET",
            url: "/questions/getChallenge",
            dataType: "json",
            success: function (response) {
                response.forEach(element => {
                    Swal.fire(
                        element.challenge,
                        '',
                        'info'
                        ).then((result) => {
                            navigateTo(curIndex()+1);
                          });
                });
            }
        });

    });


    navigateTo(0);


});
