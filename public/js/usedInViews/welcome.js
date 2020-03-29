$(document).ready(function() {
    (function () {
        var session_key = window.localStorage.getItem('session_key')
        if (!session_key) {
          session_key = Math.floor(Date.now() / 1000)
          window.localStorage.setItem('session_key', session_key)
        }
      
        var payload = {
          email: LoggedUser ? LoggedUser.email : null,
          session_key: session_key
        }

        $( '#newestOffers' ).hide();
      
        $.post(window.location.protocol + '//' + window.location.host + "/api/get-tracked-offers", payload)
        .done(function(data) {
            if(data.length > 0) {
                $( '#newestOffers' ).show();
                var $ul = $( '#newestList' );

                var i = 0;
                let input = data;

                for(i=0; i< data.length; i++)
                {
                    $ul.append( 
                        '<a href="'+ window.location.href + 'offer/show/' + input[i].id + '/' + input[i].slug + '" class="no-decoration"' + ' title="'+ input[i].title +'"' + '>' +
                            '<li class="list-group-item">'+
                                '<div class="media align-items-lg-center flex-column flex-lg-row p-3">'+
                                    '<div class="media-body order-2 order-lg-1">'+
                                        '<h5 class="mt-0 font-weight-bold my-2">' + input[i].title + '</h5>'+
                                        '<h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i>'+ input[i].location.city +'</h6>'+
                                        '<h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i>'+ input[i].user.profile.company_name +'</h6>'+
                                        '<div class="d-flex align-items-center justify-content-between mt-1">'+
                                            '<h6 class="font-weight-bold"><i class="fas fa-coins"></i>'+ input[i].settlement.name + ':' + input[i].min_salary + '-' + input[i].max_salary + ' ' + input[i].currency.symbol +'</h6>' +
                                        '</div>'+
                                        '<div class="badge badge-secondary">'+ input[i].specialization.name +'</div>'+
                                        '<div>'+
                                            // '<i class="fas fa-calendar-day"></i>' + {{ trans('offer.expired_at') }} + ' <div class="badge badge-primary">' + input[i].expired_at +'</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<img src="'+ input[i].user.avatar + '" class="ml-lg-5 order-1 order-lg-2" width="200" alt="EmployMed">'+
                                '</div>'+
                            '</li>'+
                        '</a>'
                    )
                }
            }
        });
    })()
});