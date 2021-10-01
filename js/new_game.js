// $( function() {
//
//     $('#rock').css({top: 0, left: 0});
//
//     $('#paper').css({top: 250, left: -110});
//
//     $('#scissors').css({top: 490, left: -220});
//
//     $('#player_selection').css({top: 170, left: 380});
//
//     $('#play_btn').css({top: 130, left: 580});
//
//
//
//     $('#rock').click(
//
//         function () {
//
//             $(this).addClass('rotate360')
//
//             $('#paper').removeClass('rotate360')
//
//             $('#scissors').removeClass('rotate360')
//
//             $('#player_selection').html("ROCK")
//
//         });
//
//
//
//     $('#paper').click(function () {
//
//         $('#rock').removeClass('rotate360')
//
//         $(this).addClass('rotate360')
//
//         $('#scissors').removeClass('rotate360')
//
//         $('#player_selection').html("PAPER")
//
//     });
//
//
//
//     $('#scissors').click(function () {
//
//         $('#rock').removeClass('rotate360')
//
//         $('#paper').removeClass('rotate360')
//
//         $(this).addClass('rotate360')
//
//         $('#player_selection').html("SCISSOR")
//
//     });
//
//
//
//     $('#play_btn').click(function () {
//
//         let player_selection = $('#player_selection').html()
//
//         if (player_selection === "NO SELECTION")
//
//             alert("Pick a hand! Mr. Forgetful!!")
//
//         else {
//
//             // return a number between 1=rock, 2=paper to 3=scissor
//
//             let rand = Math.floor((Math.random() * 3) + 1);
//
//             console.log("Computer random hand = " + rand)
//
//             let player_won = false;
//
//             switch (player_selection) {
//
//                 case "ROCK": if (rand === 3) player_won = true; break;
//
//                 case "PAPER": if (rand === 1) player_won = true; break;
//
//                 case "SCISSOR": if (rand === 2) player_won = true; break;
//
//                 default: player_won = false;  break;
//
//             }
//
//             if (player_won)
//
//                 alert("Congrats ! You won ! Lucky Mucky !!")
//
//             else
//
//                 alert("You lost ! Loser life as usual :-)")
//
//         }
//
//     });
//
//
//
//     bounce()
//
//     function bounce() {
//
//         $('#rock')
//
//             .animate( {top :'100px', left:'100px'}, 'slow', 'linear')
//
//
//
//         $('#paper')
//
//             .animate( {top :'250px', left:'0px'}, 'slow', 'linear')
//
//
//
//         $('#scissors')
//
//             .animate( {top :'400px', left:'-110px'}, 'slow', 'linear')
//
//
//
//
//
//     }
//
// });