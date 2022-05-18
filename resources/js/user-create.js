(function($) {
    "use strict";

    var AppUserCreate = function AppUserCreate(element, options, cb) {
        var appUserCreate = this;
        this.element = element;
        this.$element = $(element);
        this.token = _token;
        this.validateUniqueNameURL = _validateUniqueNameURL;
        this.validateUniqueEmailURL = _validateUniqueEmailURL;
        this.validateUniquePhoneNumberURL = _validateUniquePhoneNumberURL;
    };

    AppUserCreate.prototype = {
        _init: function _init() {
            this.ajaxSetup();
            this.initValidateUserGeneral();
        },
        ajaxSetup: function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": _token
                }
            });
        },
        initValidateUserGeneral: function() {
            var el = this;
            jQuery.validator.addMethod("regex", function(value, element, regexp) {
                    var re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                }, "Please check your input."
            );

            jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^\w+$/i.test(value);
            }, "Letters, numbers, and underscores only please");

            jQuery.validator.addMethod("whitespace", function(value, element) {
                return value.indexOf(" ") === -1;
            }, "Must not contain spaces");

            jQuery.validator.addMethod('selectcheck', function (value) {
                return (value != '0');
            }, "year required");

            $.validator.addMethod("format_date", function (value, element) {
                return this.optional(element) || moment(value, "DD/MM/YYYY", true).isValid();
            }, "Ngày sinh không đúng định dạng d/m/Y.");

            $("#form-store-user").validate({
                onfocusout: function (element, event) {
                    var $element = $(element);
                    if ($element.attr("id") == "password" || $element.attr("id") == "username" || $element.attr("id") == "email"
                        || $element.attr('id') == 'name' || $element.attr('id') == 'phone_number' || $element.attr('id') == 'birthday') {
                        $element.val($.trim($element.val()));
                        $element.valid();

                    }
                },
                onkeyup: false,
                onclick: false,
                rules: {
                    name: {
                        required: true,
                        maxlength: 50,
                    },
                    username: {
                        maxlength: 50,
                        remote: {
                            url: el.validateUniqueNameURL,
                            type: 'POST',
                            data: {
                                id: function() {
                                    return null;
                                },
                                username: function() {
                                    return $('#username').val();
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
                    email: {
                        email: true,
                        required: true,
                        maxlength: 255,
                        remote: {
                            url: el.validateUniqueEmailURL,
                            type: 'POST',
                            data: {
                                id: function() {
                                    return null;
                                },
                                email: function() {
                                    return $('#email').val();
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
                    phone_number: {
                        regex: /^(0|[+?]84)(3|5|7|8|9)+[0-9]{8}/,
                        remote: {
                            url: el.validateUniquePhoneNumberURL,
                            type: 'POST',
                            data: {
                                id: function() {
                                    return null;
                                },
                                phone_number: function() {
                                    return $('#phone_number').val();
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
                    birthday: {
                        format_date: true
                    },
                    password : {
                        required: true,
                        minlength: 6,
                        maxlength: 255,
                        whitespace: true
                    },
                },
                messages: {
                    username: {
                        maxlength: "Tên tài khoản chứa tối đa 50 ký tự.",
                        remote: "Tên tài khoản đã tồn tại.",
                    },
                    name: {
                        required: "Họ tên không được để trống.",
                        maxlength: "Họ tên chứa tối đa 50 ký tự.",
                    },
                    email: {
                        required: "Địa chỉ email không được để trống.",
                        email: "Địa chỉ email sai định dạng.",
                        maxlength: "Địa chỉ email chứa tối đa 255 ký tự.",
                        remote: "Địa chỉ email đã tồn tại."
                    },
                    phone_number: {
                        regex: 'SĐT không tồn tại',
                        remote: 'SĐT đã được đăng ký trước đó',
                    },
                    password : {
                        required: "Mật khẩu không được để trống.",
                        minlength: "Mật khẩu không được ít hơn 6 ký tự.",
                        maxlength: "Mật khẩu không được nhiều hơn 255 ký tự.,",
                        whitespace: "Mật khẩu không được chứa dấu cách"
                    }

                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                    element.focus();
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        },
    };
    /* Execute main function */

    $.fn.appUserCreate = function(options, cb) {
        this.each(function() {
            var el = $(this);

            if (!el.data("appUserCreate")) {
                var appUserCreate = new AppUserCreate(el, options, cb);
                el.data("appUserCreate", AppUserCreate);

                appUserCreate._init();
            }
        });
        return this;
    };
})(jQuery);

$(document).ready(function() {
    $("body").appUserCreate();
});
