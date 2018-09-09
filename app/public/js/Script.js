let mainScript;

function MainScript()
{
    this.constructor = function ()
    {
        let csrfToken = $('meta[name="csrf_token"]')[0].getAttribute('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

    };

    this.swal = {
        error: function (message, errors) {

            let msg = '';
            for(let idx in errors){
                if (errors.hasOwnProperty(idx)){
                    msg += errors[idx] + "<br>";
                }
            }

            swal({
                title: message,
                text: msg,
                icon: "error",
            });
        }
    };

    this.constructor();
}

$(document).ready(function () {
    mainScript = new MainScript();
});