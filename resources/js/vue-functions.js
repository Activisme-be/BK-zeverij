new Vue({
    el: '#application',

    data : {
        register        : { username : '', email : '', name : '', password : '', password_confirm : '', disclaimer : '' },
        accountSettings : { username : '', email : '', name : ''},
        submitted       : false
    },


    computed : {
        errorsRegister: function () {
            for (var key in this.register) {
                if (! this.register[key]) return true;
            }

            return false;
        },

        errorsSettings: function() {
            for(var key in this.accountSettings) {
                if (! this.accountSettings[key]) return true;
            }
        }
    }

});
