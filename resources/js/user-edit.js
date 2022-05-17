(function($) {
    "use strict";

    var AppUserEdit = function AppUserEdit(element, options, cb) {
        var appUserEdit = this;
        this.element = element;
        this.$element = $(element);
        this.token = _token;
        this.validateUniqueNameURL = _validateUniqueNameURL;
        this.updateUser = _updateUser;
        this.updateUserProfile = _updateUserProfile;
        this.userId = _userId;
        this.element.on("change", "#active", function() {
            appUserEdit.handleChecked();
        });
    };

    AppUserEdit.prototype = {
        _init: function _init() {
            this.ajaxSetup();
            this.initValidateUserGeneral();
            this.initValidateUserProfile();

        },
        ajaxSetup: function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": _token
                }
            });
        },
        handleChecked: function () {
            if ($("#active").is(":checked")) {
                $("#active").val(1);
            } else {
                $("#active").val(0);
            }
        },
        initValidateUserGeneral: function() {
            var el = this;
            jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^\w+$/i.test(value);
            }, "Letters, numbers, and underscores only please");

            jQuery.validator.addMethod("whitespace", function(value, element) {
                return value.indexOf(" ") === -1;
            }, "Must not contain spaces");

            jQuery.validator.addMethod('selectcheck', function (value) {
                return (value != '0');
            }, "year required");

            $("#form-update-user").validate({
                onfocusout: function (element, event) {
                    var $element = $(element);
                    if ($element.attr("id") == "password" || $element.attr("id") == "username" || $element.attr("id") == "fullname" ) {
                        $element.val($.trim($element.val()));
                        $element.valid();

                    }
                },
                onkeyup: false,
                onclick: false,
                rules: {
                    username: {
                        required: true,
                        maxlength: 255,
                        minlength: 3,
                        alphanumeric: true,
                        remote: {
                            url: el.validateUniqueNameURL,
                            type: 'POST',
                            data: {
                                id: function() {
                                    return el.userId;
                                },
                                info: function() {
                                    return $('#info').val();
                                }
                            },
                            dataType: 'json',
                            dataFilter: function(res) {
                                let result = JSON.parse(res);
                                let jsonStr = JSON.stringify(result.data);
                                return jsonStr;
                            }
                        }
                    },
                    fullname: {
                        required: true,
                        maxlength: 255,
                    },
                    sex: {
                        required: true,
                    },
                    password : {
                        minlength: 6,
                        maxlength: 255,
                        whitespace: true
                    },
                    role : {
                        required: true
                    }
                },
                messages: {
                    username: {
                        required: "Tên đăng nhập không được để trống.",
                        maxlength: "Tên đăng nhập không được nhiều hơn 255 ký tự.",
                        minlength: 'Tên đăng nhập không được ít hơn 3 ký tự.',
                        remote: "Tên đăng nhập không được trùng nhau.",
                        alphanumeric: "Tên đăng nhập chỉ chứa các ký tự a-z, A->Z, 0->9, không chứa các ký tự đặc biệt.",
                    },
                    fullname: {
                        required: "Họ tên không được để trống.",
                        maxlength: "Họ tên không được nhiều hơn 255 ký tự.",
                    },
                    sex: {
                        required: "Giới tính không được để trống.",
                    },
                    role: {
                        required: "Vai trò không được để trống.",

                    },
                    password : {
                        minlength: "Mật khẩu không được ít hơn 6 ký tự.",
                        maxlength: "Mật khẩu không được nhiều hơn 255 ký tự.,",
                        whitespace: "Mật khẩu không được chứa dấu cách"
                    }

                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                    // element.focus();
                },
                submitHandler: function() {
                    var dataRes = new FormData();
                    dataRes.append('id', el.userId);
                    dataRes.append('username', $('#username').val());
                    dataRes.append('fullname', $('#fullname').val());
                    dataRes.append('sex', $('#sex').val());
                    dataRes.append('role', $('#role').val());
                    dataRes.append('active', typeof $('#active').val() != "undefined" || $('#active').val() === null ? $('#active').val() : 1);
                    dataRes.append('password', $('#password').val());

                    $.ajax({
                        url: el.updateUser,
                        type: "POST",
                        data: dataRes,
                        processData: false,
                        contentType: false,
                        success: function (res) {
                            if (res.status == 200) {
                                toastr.success('Cập nhật thông tin người dùng thành công.');
                            }
                        },
                        error: function (error) {
                            if (error.responseJSON.error.message) {
                                toastr.error(error.responseJSON.error.message);
                            } else {
                                toastr.error(error.responseJSON.error);
                            }
                        }
                    });
                }
            });
        },
        initValidateUserProfile: function() {
            var el = this;

            $("#form-edit-user-profile").validate({
                onfocusout: function (element, event) {
                    var $element = $(element);
                    if ($element.attr("id") == "fullname") {
                        $element.val($.trim($element.val()));
                        $element.valid();
                    }
                },
                onkeyup: false,
                onclick: false,
                rules: {
                    fullname: {
                        required: true,
                        maxlength: 255,
                    }
                },
                messages: {
                    fullname: {
                        required: "Họ tên không được để trống.",
                        maxlength: "Họ tên không được nhiều hơn 255 ký tự.",
                    }
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                    element.focus();
                },
                submitHandler: function() {
                    var dataRes = new FormData();
                    dataRes.append('fullname', $('#fullname').val());
                    $.ajax({
                        url: el.updateUserProfile,
                        type: "POST",
                        data: dataRes,
                        processData: false,
                        contentType: false,
                        success: function (res) {
                            toastr.success('Cập nhật thông tin cá nhân thành công.');
                        },
                        error: function (_error10) {
                            if (_error10.responseJSON.error.message) {
                                toastr.error(_error10.responseJSON.error.message);
                            } else {
                                toastr.error(_error10.responseJSON.error);
                            }
                        }
                    });
                }
            });
        },
    };
    /* Execute main function */

    $.fn.appUserEdit = function(options, cb) {
        this.each(function() {
            var el = $(this);

            if (!el.data("appUserEdit")) {
                var appUserEdit = new AppUserEdit(el, options, cb);
                el.data("appUserEdit", appUserEdit);

                appUserEdit._init();
            }
        });
        return this;
    };
})(jQuery);

$(document).ready(function() {
    $("body").appUserEdit();
});
