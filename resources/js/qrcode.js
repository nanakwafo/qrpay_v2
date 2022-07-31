$(document).ready(function () {
    var account = {
        userAmountData: [],
        init: function () {
            this.cacheDom();
            this.bindEvents();
            $('.qrcodesContainer').show();
            $('.qrcodesNewformContainer').hide();
        },
        cacheDom: function () {
            this.$qrcodgenerateBtnupload_form = $('#qrcodgenerateBtnupload_form');
            this.$qrcodupdateBtnupload_form = $('#qrcodupdateBtnupload_form');
            this.$qrcoddeleteBtnupload_form = $('#qrcoddeleteBtnupload_form');
            this.$qrcodeactivateBtnupload_form = $('#qrcodeactivateBtnupload_form');
            this.$linktoshare = $('#link-to-share');

            this.$amount = $('#collection_amount');
            this.$addrow = $(".add-row");
            this.$deleterow = $(".delete-row");

        },
        bindEvents: function () {
            var amounts = this.userAmountData;
            this.$qrcodgenerateBtnupload_form.on('submit', function (event) {
                event.preventDefault();
                if(amounts.length=== 0){
                    toastr.error('Please set your collection amount');
                    return false;
                }
                var redirect =$('#qrcodePlatformId').val();
                var formData = new FormData(this);
                formData.append('amount', amounts);
                $.ajax({
                    url: '/generateQrcode',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if(data == 1){
                            toastr.success('Qrcode was successfully generated');
                            location.href = redirect;
                        }else if(data == 2){
                            toastr.warning('Qrcode cant be generated without an image upload');
                        }else{
                            toastr.error('Sorry an error Occurred');
                        }
                    },
                    error: function (error) {
                        if(error.responseJSON.errors.collectionFile[0] !== "undefined" && error.responseJSON.errors.collectionFile[0])
                           toastr.error(error.responseJSON.errors.collectionFile[0],error.responseJSON.message);
                    },
                })
            });
            this.$qrcodupdateBtnupload_form.on('submit', function (event) {
                event.preventDefault();
                 var formData = new FormData(this);
                 formData.append('amount', amounts);

                $.ajax({
                    url: '/updateQrcode',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if(data == 1){
                            toastr.info('Qrcode updated Successfully');
                        }else{
                            toastr.error('Sorry an error Occurred');
                        }
                    },
                    error: function (error) {
                        //error for uploading jpg image
                        console.log(error);
                    },
                })
            });
            this.$qrcoddeleteBtnupload_form.on('click', function (event) {
                event.preventDefault();
                if (confirm("Are you sure you want to make inactive?")) {
                    $.ajax({
                        url: '/deleteQrcode',
                        type: 'POST',
                        data: {
                            "_token": $('meta[name="csrf-token"]').attr('content'),
                            'qrcodeId' : $('#qrCodegeneratorForm_qrcodeId').val(),
                            'platformId' : $('#qrCodegeneratorForm_platformId').val(),
                        },
                        success: function (data) {
                            if(data == 1){
                                toastr.success('Qrcode has been made inactive');
                            }else{
                                toastr.error('Sorry an error Occurred');
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    })
                }
                return false;
            });
            this.$qrcodeactivateBtnupload_form.on('click', function (event) {
                event.preventDefault();
                if (confirm("Are you sure you want to make active?")) {
                    $.ajax({
                        url: '/activateQrcode',
                        type: 'POST',
                        data: {
                            "_token": $('meta[name="csrf-token"]').attr('content'),
                            'qrcodeId' : $('#qrCodegeneratorForm_qrcodeId').val(),
                            'platformId' : $('#qrCodegeneratorForm_platformId').val()
                        },
                        success: function (data) {
                            if(data == 1){
                                toastr.success('Qrcode has been made active');
                            }else{
                                toastr.error('Sorry an error Occurred');
                            }
                        },
                        error: function (error) {
                            console.log(error)
                        },
                    })
                }
                return false;
            });

            this.$addrow.on('click', this.addAmountAction.bind(this));
            this.$deleterow.on('click', this.removeAmountAction.bind(this));
            this.$linktoshare.on('click', function (event) {

                  if($('#isProfilefilled').val() === 'yes') {
                      toastr.warning('Please update your profile details');
                      return false;
                  }
                  return true;

            });
            },

        addAmountAction: function () {
            var amount = this.$amount.val();
            var markup = "<tr><td><input type='checkbox' name='record' data-value='" + amount + "'></td><td>" + amount + "</td></tr>";
            $("#amount_table tbody").append(markup);
            this.userAmountData.push(amount);
        },
        removeAmountAction: function () {
            $("#amount_table tbody").find('input[name="record"]').each(function () {
                if ($(this).is(":checked")) {
                    $(this).parents("tr").remove();
                    var amount = $(this).data('value');
                    this.userAmountData.remove(amount);
                }
            });
        },

    }
    account.init();
});
