// $( function() {
//     $( "#main_nav" ).selectable();
// } );

$(function () {
    let title = $(document).attr('title')
    switch (title) {
        case "MutexXO":
            // Set Home menu as selected
            $('#main_nav>li').eq(0).css("background-color", "#191970")
            $('#main_nav>li').eq(0).addClass("nav_selected")
            break;
        case "MutexXO Sign-up":
// Set Sign-up menu as selected
            $('#main_nav>li').eq(1).css("background-color", "#191970")
            $('#main_nav>li').eq(1).addClass("nav_selected")
            break;
        case "MutexXO - Contact Us":

            // Set Contact Us menu as selected
            $('#main_nav>li').eq(3).css("background-color", "#191970")
            $('#main_nav>li').eq(3).addClass("nav_selected")
            break;
        default:
// Set Home menu as selected
            $('#main_nav>li').eq(0).css("background-color", "#191970")
            $('#main_nav>li').eq(0).addClass("nav_selected")
    }
    $('#main_nav li:nth-child(1)').on('click', function () {
// Keeps the browser history
        window.location.href = "http://localhost/MutexXO/index.php";
        console.log("Home is clicked")
    });
    $('#main_nav li:nth-child(2)').on('click', function () {
// Keeps the browser history
        window.location.href = "http://localhost/MutexXO/sign_up.php";
        console.log("Sign Up is clicked")
    });
    $('#main_nav li:nth-child(3)').on('click', function () {
// Keeps the browser history
        window.location.href = "http://localhost/MutexXO/login.php";
        console.log("Login is clicked")
    });
    $('#main_nav li:nth-child(4)').on('click', function () {
// Keeps the browser history
        window.location.href = "http://localhost/MutexXO/contact_us.php";
        console.log("Contact Us is clicked")
    });
    $('#main_nav li').hover(function () {
            $(this).css("background", "#00FFFF");
        },
        function () {
            if ($(this).hasClass("nav_selected"))
                $(this).css("background", "#7B68EE"); // body background color
            else
                $(this).css("background", "#00CED1"); // page header background color
        }
    );

    $('#side_menu li:nth-child(1)').on('click', function () {
// Keeps the browser history
        window.location.href = "http://localhost/MutexXO/new_game.php";
        console.log("New game is clicked")
    });

    $('#side_menu li:nth-child(2)').on('click', function () {
// Keeps the browser history
        window.location.href = "http://localhost/MutexXO/tutorial.php";
        console.log("Tutorial is clicked")
    });

    $('#side_menu li:nth-child(3)').on('click', function () {
// Keeps the browser history
        window.location.href = "http://localhost/MutexXO/instruction.php";
        console.log("Instruction is clicked")
    });


    $("#side_menu").menu({
            select: function (event, ui) {
                // window.alert(JSON.stringify(ui))
                console.log(ui)
                // window.location.href = "http://localhost/MutexXO/new_game.php";
                $('.selected', this).removeClass('selected');
                ui.item.addClass('selected');
                menuarray = ui.item.text().split(" ");
                console.log("You selected: " + menuarray[0] + " | Full = " + ui.item.text())
            }
        }
    );

    // $("#side_menu1").menu({
    //         select: function (event, ui) {
    //             window.location.href = "http://localhost/MutexXO/contact_us.php";
    //             $('.selected', this).removeClass('selected');
    //             ui.item.addClass('selected');
    //             menuarray = ui.item.text().split(" ");
    //             console.log("You selected: " + menuarray[0] + " | Full = " + ui.item.text())
    //         }
    //     }
    // );

});










