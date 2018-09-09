let mainScript;

function MainScript()
{
    let parent = this;
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
                    msg += errors[idx];
                }
            }

            if (message === '') {
                message = 'Something went wrong.'
            }

            swal({
                title: message,
                text: msg,
                type: "error",
            });
        },

        success: function (title, msg)
        {
            swal({
                title: title,
                text: msg,
                icon: "success",
                type: "success",
            });
        }
    };

    this.loadingModal = {
        modal: null,

        show: function ()
        {
            parent.loadingModal.modal = $('body').loadingModal({
                position: 'auto',
                text: '',
                color: '#fff',
                opacity: '0.4',
                backgroundColor: 'rgb(0,0,0)',
                animation: 'doubleBounce'
            })
        },

        hide: function ()
        {
            let $body = $('body');
            $body.loadingModal('hide');
            $body.loadingModal('destroy');
        }
    };

    this.constructor();
}

$(document).ready(function () {
    mainScript = new MainScript();
});