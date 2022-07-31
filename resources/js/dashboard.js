$(document).ready(function () {
    var dashboard = {
        date_start: null,
        date_end: null,
        platformId: $('#platformId').val(),
        init: function () {

            this.setStartDate();
            this.setEndDate();
            this.cacheDom();
            this.bindEvents();
            this.getdata(this.initstartDate(), this.initendDate(), 'day',this.platformId).then((data) => {
                console.log(data)
                // show loader
            }).catch((error) => {
                // console.log(error)
                //show error message
            });


        },
        cacheDom: function () {
            this.$chartDateStart = $('#chartDateStart');
            this.$chartDateEnd = $('#chartDateEnd');
            this.$chartDateBy = $('.chartDateBy');
            this.$chartDateByDay = $('.chartDateByDay');
            this.$chartDateByWeek = $('.chartDateByWeek');
            this.$chartDateByMonth = $('.chartDateByMonth');
            this.$chartDateByActive = $('.chartDateBy.active');

        },
        bindEvents: function () {
            this.$chartDateByDay.on('click', this.chartDateByDayActive.bind(this));
            this.$chartDateByWeek.on('click', this.chartDateByWeekActive.bind(this));
            this.$chartDateByMonth.on('click', this.chartDateByMonthActive.bind(this));


        },
        chartDateByDayActive: function () {
            this.$chartDateBy.removeClass('active');
            this.$chartDateByDay.addClass('active');
            /*************************************************************/
            /**************get date values and query data*****************/
            /*************************************************************/
            this.date_start = this.$chartDateStart.val();
            this.date_end = this.$chartDateEnd.val();
            this.getdata(this.date_start, this.date_end, 'day',this.platformId).then((data) => {

                console.log(data)
                // show loader
            }).catch((error) => {
                // console.log(error)
                //show error message
            })
        },
        chartDateByWeekActive: function () {
            this.$chartDateBy.removeClass('active');
            this.$chartDateByWeek.addClass('active');
            /*************************************************************/
            /**************get date values and query data*****************/
            /*************************************************************/
            this.date_start = this.$chartDateStart.val();
            this.date_end = this.$chartDateEnd.val();
            this.getdata(this.date_start, this.date_end, 'week',this.platformId).then((data) => {
                console.log(data)
                // show loader
            }).catch((error) => {
                // console.log(error)
                //show error message
            })
        },
        chartDateByMonthActive: function () {
            this.$chartDateBy.removeClass('active');
            this.$chartDateByMonth.addClass('active');
            /*************************************************************/
            /**************get date values and query data*****************/
            /*************************************************************/
            this.date_start = this.$chartDateStart.val();
            this.date_end = this.$chartDateEnd.val();
            this.getdata(this.date_start, this.date_end, 'month',this.platformId).then((data) => {
                console.log(data)
                // show loader
            }).catch((error) => {
                // console.log(error)
                //show error message
            })
        },
        getdata: function (date_start, date_end, type,platformId) {
            return new Promise((resolve, reject) => {
                if( $('#chartContainer').length ) {
                    $.ajax({
                        url: '/getstatistics',
                        type: 'POST',
                        data: {
                            "_token": $('meta[name="csrf-token"]').attr('content'),
                            "date_start": date_start,
                            "date_end": date_end,
                            "type": type,
                            "platformId": platformId,
                        },
                        success: function (data) {

                            var chart = new CanvasJS.Chart("chartContainer", {
                                animationEnabled: true,
                                title: {
                                    // text: "Donations Record"
                                },
                                exportEnabled: true,
                                axisY: {
                                    // title: "Donation in NZD",
                                    prefix: "$"
                                },
                                data: [{
                                    type: "splineArea",
                                    color: "#6783b8",
                                    dataPoints: data
                                }]
                            });
                            chart.render();


                        },
                        error: function (error) {
                            console.log(error)
                        },
                    })
                }
            });

        },
        setStartDate: function () {
            var field =  $('#chartDateStart') ;
            var date = new Date();
            field.val = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + '-' + date.getDate().toString().padStart(2, 0);
        },
        setEndDate: function () {
            var field = $('#chartDateEnd');
            var date = new Date();
            field.val = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + '-' + date.getDate().toString().padStart(2, 0);
        },
        initendDate: function () {
            return new Date().toISOString().slice(0, 10);
        },
        initstartDate:function () {
            var date = new Date(new Date().toISOString().slice(0, 10));
            date.setDate(date.getDate() - 7);
            return date.getFullYear() + "-" + date.getMonth()+ "-"  + date.getDate();
        },

    }
    dashboard.init();

});

