$(document).ready(function () {

    var getReport = function (paramPlatformId, paramQrcodeId) {
        var platformId = paramPlatformId;// get this id on click
        var qrcodeId = paramQrcodeId;// get this id on click


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#qrtransactions-table').DataTable({
            responsive: true,
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: '/qrcodesreports',
                method: 'POST',
                data: function (d) {
                    d.platformId = platformId;
                    d.qrcodeId = qrcodeId;


                }
            },
            columns: [
                {data: 'rownum', name: 'rownum'},
                // {data: 'id', name: 'id'},
                {data: 'accountId', name: 'accountId'},
                {data: 'payer_name', name: 'payer_name'},
                {data: 'payer_email', name: 'payer_email'},
                {data: 'amount', name: 'amount'},
                {data: 'created_at', name: 'created_at'},
            ]

        });
        $.ajax({
            url: '/transactiontotalqrcode',
            type: 'POST',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                'qrcodeId' : qrcodeId,
                'platformId' : platformId
            },
            success: function (data) {
                $('#report-qrcode-total').html('<strong>Total: '+data +'</strong>');
            },
            error: function (error) {
                console.log(error)
            },
        });

    }

    var qrreports = {
        platformId: $('#platformId').val(),
        init: function () {
            $('.qrcode_type_all').addClass('chip--selected');
            $('#downloadQrcodeTransactionPdf').attr("href", '/transactions/pdf/'+ this.platformId);
            $('#downloadQrcodeTransactionCsv').attr("href", '/transactions/csv/'+ this.platformId);
            this.cacheDom();
            this.bindEvents();
            getReport(this.platformId,'');
            // this.getPieChart(this.platformId).then((data) => {
            //     console.log(data)
            //     // show loader
            // }).catch((error) => {
            //     // console.log(error)
            //     //show error message
            // });
        },
        cacheDom: function () {
            this.$qrcode_type = $('.qrcode_type');
            // this.$chartPie = $('#chartPie');
        },
        bindEvents: function () {
            this.$qrcode_type.on('click', function () {
                $('.qrcode_type_all').removeClass('chip--selected');
                $(this).siblings().removeClass('chip--selected');
                $(this).addClass('chip--selected');
                $('#downloadQrcodeTransactionPdf').attr("href", '/transactions/pdf/'+ $(this).attr('data-platformId') +'/'+ $(this).attr('data-qrcodeId'));
                $('#downloadQrcodeTransactionCsv').attr("href", '/transactions/csv/'+ $(this).attr('data-platformId') +'/'+ $(this).attr('data-qrcodeId'));
                getReport($(this).attr('data-platformId'), $(this).attr('data-qrcodeId'));

                $.ajax({
                    url: '/transactiontotalqrcode',
                    type: 'POST',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        'qrcodeId' : $(this).attr('data-qrcodeId'),
                        'platformId' : $(this).attr('data-platformId')
                    },
                    success: function (data) {
                       $('#report-qrcode-total').html('<strong>Total: '+data +'</strong>');
                    },
                    error: function (error) {
                        console.log(error)
                    },
                });


            });

        },
        // getPieChart: function (platformId) {
        //
        //     return new Promise((resolve, reject) => {
        //         $.ajax({
        //             url: '/getpiechartdata',
        //             type: 'POST',
        //             data: {
        //                 "_token": $('meta[name="csrf-token"]').attr('content'),
        //                 "platformId": platformId,
        //             },
        //             success: function (data) {
        //                 if(!data) {
        //                     this.$chartPie.innerHTML('<h4>No transactions yet for Pie Chart to Display</h4>')
        //                     return;
        //                 }
        //                 if (this.$chartPie.length) {
        //                     var chart = new CanvasJS.Chart("chartPie", {
        //                         theme: "light1", // "light1", "light2", "dark1", "dark2"
        //                         exportEnabled: true,
        //                         animationEnabled: true,
        //                         title: {
        //                             text: "Overview of Qrcode Transaction"
        //                         },
        //                         data: [{
        //                             type: "pie",
        //                             startAngle: 25,
        //                             toolTipContent: "<b>{label}</b>: {y}%",
        //                             showInLegend: "true",
        //                             legendText: "{label}",
        //                             indexLabelFontSize: 16,
        //                             indexLabel: "{label} - {y}%",
        //                             dataPoints: data
        //                         }]
        //                     });
        //                     chart.render();
        //                 }
        //
        //             },
        //             error: function (error) {
        //                 console.log(error)
        //             },
        //         })
        //     });
        //
        //
        //
        // },


    }
    qrreports.init();
});
