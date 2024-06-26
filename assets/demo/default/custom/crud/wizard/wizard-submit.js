var WizardDemo=function() {
    $("#m_wizard");
    var i,
    e,
    n=$("#m_form");
    return {
        init:function() {
            var r;
            $("#m_wizard"),
            n=$("#m_form"),
            (e=new mWizard("m_wizard", {
                startStep: 1
            }
            )).on("beforeNext", function(e) {
                !0!==i.form()&&e.stop()
            }
            ),
            e.on("change", function(e) {
                mApp.scrollTop()
            }
            ),
            i=n.validate( {
                ignore:":hidden", rules: {
                    name: {
                        required: !0
                    }
                    , email: {
                        required: !0, email: !0
                    }
                    , phone: {
                        required: !0, phoneUS: !0
                    }
                    , address1: {
                        required: !0
                    }
                    , city: {
                        required: !0
                    }
                    , state: {
                        required: !0
                    }
                    , city: {
                        required: !0
                    }
                    , country: {
                        required: !0
                    }
                    , account_url: {
                        required: !0, url: !0
                    }
                    , account_username: {
                        required: !0, minlength: 4
                    }
                    , account_password: {
                        required: !0, minlength: 6
                    }
                    , account_group: {
                        required: !0
                    }
                    , "account_communication[]": {
                        required: !0
                    }
                    , billing_card_name: {
                        required: !0
                    }
                    , billing_card_number: {
                        required: !0, creditcard: !0
                    }
                    , billing_card_exp_month: {
                        required: !0
                    }
                    , billing_card_exp_year: {
                        required: !0
                    }
                    , billing_card_cvv: {
                        required: !0, minlength: 2, maxlength: 3
                    }
                    , billing_address_1: {
                        required: !0
                    }
                    , billing_address_2: {}
                    , billing_city: {
                        required: !0
                    }
                    , billing_state: {
                        required: !0
                    }
                    , billing_zip: {
                        required: !0, number: !0
                    }
                    , billing_delivery: {
                        required: !0
                    }
                    , accept: {
                        required: !0
                    }
                }
                , messages: {
                    "account_communication[]": {
                        required: "You must select at least one communication option"
                    }
                    , accept: {
                        required: "You must accept the Terms and Conditions agreement!"
                    }
                }
                , invalidHandler:function(e, r) {
                    mApp.scrollTop(), swal( {
                        title: "", text: "There are some errors in your submission. Please correct them.", type: "error", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                    }
                    )
                }
                , submitHandler:function(e) {e.submit()}
            }
            ),
            (r=n.find('[data-wizard-action="submit"]')).on("click", function(e) {
                e.submit();
            }
            )
        }
    }
}

();
jQuery(document).ready(function() {
    WizardDemo.init()
}

);