new Vue({
    el: '#application',

    data : {
        register         : { username : '', email : '', name : '', password : '', password_confirm : '', disclaimer : '' },
        accountSettings  : { username : '', email : '', name : ''},
        categoryInsert   : { category : '', description : ''},
        login            : { email : '', password: ''},
        search           : { term : ''},
        submitted        : false
    },


    computed : {
        errorsRegister: function () {
            for (var key in this.register) {
                if (! this.register[key]) return true;
            }

            return false;
        },

        errorsLogin: function () {
            for (var key in this.login) {
                if (! this.login[key]) return true;
            }
        },

        errorsSettings: function () {
            for (var key in this.accountSettings) {
                if (! this.accountSettings[key]) return true;
            }
        },

        // FIXME: missing if
        errorsCategory: function () {
            for (var key in this.categoryInsert[key]) {
                return true;
            }
        },

        errorsSearch: function () {
            for (var key in this.search) {
                if (! this.search[key]) return true;  
            }
        }
    }

});
