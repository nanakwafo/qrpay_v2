$(document).ready(function () {
    var payvendor = {

        init: function () {
            this.cacheDom();
            this.bindEvents();
        },
        cacheDom: function () {
            this.$amountBtn = $('#amountBtn');


        },
        bindEvents: function () {

            this.$amountBtn.on('click', this.addActiveClass.bind(this));
        },
        addActiveClass: function () {
            this.$amountBtn.addClass('btn-progress');
        }

    }
    payvendor.init();

});

