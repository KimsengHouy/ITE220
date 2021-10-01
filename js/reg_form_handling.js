document.getElementById("form_country_select").value = 'thailand'

document.getElementById("form_province_select").value = 'bangkok'

document.getElementById("form_city_select").value = 'bang kapi'

document.getElementById("form_country_select").addEventListener("change", country_changed)

document.getElementById("form_province_select").addEventListener("change", province_changed)






function validate_registration(form) {

    debugger

    let fail = validateUsername(form.username.value)

    fail += validatePassword(form.password.value)

    fail += validateRepeatPassword(form.password2.value)

    fail += validateEmail(form.email.value)

    fail += validateName(form.name.value)

    fail += validateSurname(form.surname.value)

    fail += validatePhone(form.phone.value)



    if (fail === "") return true

    else { alert(fail); return false }

}



function validateUsername(field) {

    if (field === "") return "No Username was entered.\n"

    else if (field.length < 5)

        return "Usernames must be at least 5 characters.\n"

    else if (/[^a-zA-Z0-9_-]/.test(field))

        return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames.\n"

    return ""

}



function validatePassword(field) {

    return (field === "") ? "No password was entered.\n" : ""

}



function validateRepeatPassword(field) {

    //debugger;

    let password = document.getElementById('form_password').value;

    if (field === "")

        return "No password2 was entered.\n";

    else if (field !== password)

        return "passwords do not match\n";

    else

        return "";

}



function validateEmail(field) {

    return (field === "") ? "No email was entered.\n" : ""

}



function validateName(field) {

    return (field === "") ? "No name was entered.\n" : ""

}



function validateSurname(field) {

    return (field === "") ? "No surname was entered.\n" : ""

}



function validatePhone(field) {

    return (field === "") ? "No phone was entered.\n" : ""

}



function country_changed() {

    let country_name = document.getElementById("form_country_select").value

    let options = document.getElementById("form_country_select").options;

    let country_id = options[options.selectedIndex].id;

    let id = country_id.match(/country_(\d+)/);

    console.log("User changed the country to " + country_name + " (id=" + id[1] + ")")



    let params = "country_id=" + id[1]

    let url = "api/get_province_list.php"

    let request = new ajaxRequest()

    request.open("POST", url, true /* async */ )

    request.setRequestHeader("Content-type","application/x-www-form-urlencoded")

    request.responseType = "text/xml";

    request.onreadystatechange = process_XML_response

    request.send(params)

}


function province_changed() {
    let province_name = document.getElementById("form_province_select").value
    let options = document.getElementById("form_province_select").options;
    let province_id = options[options.selectedIndex].id;
    //let id =province_id.match(/^province_(\w+)/ ) ;
    console.log(province_id)
    console.log("User changed the province to " + province_name )
    //+"(id=" + id + " )")

    let params = "province_name="+ province_name
    let url = "api/get_cities_list.php"
    let request = new ajaxRequest()
    request.open("POST", url, true /* async */ )
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
    request.responseType = "text/xml";
    request.onreadystatechange = process_XML_response1
    request.send(params)
}



/**

 * Processes the Ajax response for country list

 */

function process_XML_response() {

    if (this.readyState === 4) {

        if (this.status === 200) {

            console.log("readyState == 4, status == 200  ")

            console.log("response xml=  " + this.responseText)

            if (this.responseText != null) {

                let provinces = this.responseXML.getElementsByTagName('province');
                if (provinces.length !== 0) {
                    let select = document.getElementById("form_province_select");
                    let L = select.options.length - 1;
                    for (let i = L; i >= 0; i--)
                        select.remove(i)

                    for (let i = 0; i < provinces.length; i++) {
                        let $province_name = provinces[i].getAttribute("province_name");
                        let el = document.createElement("option");
                        el.textContent = $province_name
                        el.id = "province_" + $province_name
                        el.value = $province_name
                        select.appendChild(el)
                    }
                }
            }
        else alert("Ajax error: No data received")
            }
        else alert("Ajax error: " + this.statusText)
        }
    }


function process_XML_response1() {

    if (this.readyState === 4) {

        if (this.status === 200) {

            console.log("readyState == 4, status == 200  ")

            console.log("response xml=  " + this.responseText)

            if (this.responseText != null) {

                let cities = this.responseXML.getElementsByTagName('city');
                if (cities.length !== 0) {
                    let select = document.getElementById("form_city_select");
                    let M = select.options.length - 1;
                    for (let i = M; i >= 0; i--)
                        select.remove(i)

                    for (let i = 0; i < cities.length; i++) {
                        let $city_name = cities[i].getAttribute("city_name");
                        let el = document.createElement("option");
                        el.textContent = $city_name
                        el.id = "city_" + $city_name
                        el.value = $city_name
                        select.appendChild(el)
                    }
                }
            }
            else alert("Ajax error: No data received")
        }
        else alert("Ajax error: " + this.statusText)
    }
}


    function ajaxRequest() {

        let request;

        try {

            request = new XMLHttpRequest()

        } catch (e1) {

            try {

                request = new ActiveXObject("Msxml2.XMLHTTP")

            } catch (e2) {

                try {

                    request = new ActiveXObject("Microsoft.XMLHTTP")

                } catch (e3) {

                    request = false

                }

            }

        }

        return request

    }




