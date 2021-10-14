document.addEventListener("DOMContentLoaded", () => {
    let x;
    let y;
    let r;
    
    let btns = document.getElementsByName("x")

    btns.forEach(btn => btn.onclick = function() {
        x = this.value
        btns.forEach(btn => btn.style.background = "")
        this.style.background = "#b0b0b0"
    });

    let chbs = document.getElementsByName("r")

    chbs.forEach(chb => chb.onchange = function() {
        chbs.forEach(chb1 => chb1.checked = false)
        chb.checked = true
        r = chb.value
    });

    document.getElementById("submit").onclick = function() {
        y = document.getElementById("y").value.trim().replace(/,/g, '.');

        if (isNaN(x))
            alert("Select the X value")
        else if (y == "")
            alert("Y should not be empty")
        else if (isNaN(y))
            alert("Y should be a number")
        else if (y < -3 || 5 < y)
            alert("Y should be in range [-3; 5]")
        else if (isNaN(r))
            alert("Please, select the R value")
        else {
            let data = new URLSearchParams();
            data.append("x", x)
            data.append("y", y)
            data.append("r", r)

            fetch("handler.php", {
                method: "POST",
                body: data
            }).then(response => response.text()).then((response) => {
                let row = document.querySelector(".result_table").insertRow()
                row.innerHTML = response
            })
        }
    }
});
