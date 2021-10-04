function O(i) {
    return typeof i == 'object' ? i : document.getElementById(i)
}

function S(i) {
    return O(i).style
}

$(function () {
        canvas = O('mycanvas')
        context = canvas.getContext('2d')

        S(canvas).background = 'black'
        context.strokeStyle = 'orange'
        context.fillStyle = 'yellow'
        context.beginPath()
        context.fillStyle = 'blue'
        context.rect(150, 100, 500, 350) // White background
        context.closePath()
        // context.stroke()
        context.clip()

        context.beginPath()
        context.moveTo(400, 50)
        context.lineTo(700, 400)
        context.lineTo(100, 400)
        context.closePath()
        context.fill()
    }
)
