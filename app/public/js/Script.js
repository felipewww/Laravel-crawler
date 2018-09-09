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

    this.loadingModal = {
        modal: null,

        show: function ()
        {
            parent.loadingModal.modal = $('body').loadingModal({
                position: 'auto',
                text: '',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(0,0,0)',
                animation: 'doubleBounce'
            })
        },

        hide: function ()
        {
            $('body').loadingModal('hide');
        }
    };

    this.constructor();
}

$(document).ready(function () {
    mainScript = new MainScript();
});