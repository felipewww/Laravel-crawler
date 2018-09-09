function Screen() {

    this.form = document.forms.login;
    this.formData = {};

    this.constructor = function(self)
    {
        self.setFormSubmit();

        console.log("construct")
        console.log(this.formData);

        return self;
    };

    this.setFormSubmit = function ()
    {
        let self = this;

        this.form.onsubmit = function (e) {
            e.preventDefault();

            let formData = self.getFormData();

            $.ajax({
                url: '/login',
                method: 'post',
                data: formData,
                dataType: 'json',
                success: function (data) {
                    window.location.href = '/admin/catch';
                },
                error: function (error) {
                    error = error.responseJSON;
                    mainScript.swal.error(error.message, error.errors);
                }
            })
        }
    };

    this.getFormData = function ()
    {
        // this.formData._token = this.form[0].value;
        this.formData.username = this.form[0].value;
        this.formData.password = this.form[1].value;

        return this.formData;
    };

    return this.constructor(this);
}

$(document).ready(function () {
    Screen = new Screen();
});