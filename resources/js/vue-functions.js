new Vue({
    el: '#application',

    data : {
        register : { username : '', email : '', name: '', password : '', password_confirm : '', disclaimer : '' },

        submitted : false
    },


    computed : {
        errorsRegister: function () {
            for (var key in this.register) {
                if (! this.register[key]) return true;
            }

            return false;
        }
    }

});
