'use strict';

const url = "api/remarks/";

let app = new Vue({
    el: "#template-vue-comentarios",
    data: {
        subtitle: "Comentarios usando Vue.js",
        comts: [],
        filtro: '',
        token: '',
        mess_err: '',
        auth: true
    },
    methods: {
        handlerButton: function (e) {
            if (!app.mess_err == '') 
                app.mess_err = '';
            let button = e.target;
            remove(url, button.value, this.token); 
        },
        handlerFilter: function (e) {
            e.preventDefault();
            if (!app.mess_err == '') 
                app.mess_err = '';
            let button = e.target;
            // fetch de filtro
            filterAll('api/filter/' + id_auto, {
                "filtro" : button.value}
                );
        }
    }
});

let url_auto = "api/auto/" + id_auto;
fetchAll(url_auto);
