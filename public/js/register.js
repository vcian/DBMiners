function showPassword() {
    var passInput = document.getElementById("passField");
    var img = document.getElementById("imgToggle");

    if (passInput.type === "password") {
        passInput.type = "text";
        img.src = "./images/web/eye-slash.svg"
    } else {
        passInput.type = "password";
        img.src = "./images/web/eye.svg"
    }
}
function showConPassword() {
    var passConInput = document.getElementById("passConField");
    var img = document.getElementById("imgConToggle");

    if (passConInput.type === "password") {
        passConInput.type = "text";
        img.src = "./images/web/eye-slash.svg"
    } else {
        passConInput.type = "password";
        img.src = "./images/web/eye.svg"
    }
}

const animationRemote = bodymovin.loadAnimation({
    container: document.getElementById('test'),
    path: 'https://assets9.lottiefiles.com/packages/lf20_hKebN8.json',
    autoplay: true,
    renderer: 'svg',
    loop: true
})

$("#register").validate({
    rules: {
        name: {
            required: true,
            maxlength: 50
        },
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
        },
        password_confirmation: {
            required: true,
            equalTo: "#passField"
        },
        terms: {
            required: true
        }
    },
    messages: {
        terms: {
            required: "Please accept the terms & conditions before proceding."
        }
    },
    errorPlacement: function(error, element) {
        if (element.attr("name") == "terms" ) {
            $("#err_terms").text($(error).text());
        } else {
            error.insertAfter(element);
        }
    },
})
var params = {
    container: document.getElementById("person"),
    renderer: "svg",
    loop: true,
    autoplay: true,
    animationData: test,
};
var anim;
anim = lottie.loadAnimation(params);