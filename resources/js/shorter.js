

window.shorter = {
    short_url: () => {
        let long_url = document.getElementById('long_url').value;
        if(shorter.validate_url(long_url)){
                axios.post('/url', {
                    long_url: long_url
                }).then(function(response){
                    console.log(response.data);
                    document.getElementById('long_url').value = '';
                    document.getElementById('short_url_container').style.display = "block";
                    document.getElementById('short_url').value = response.data.short_url;
                }).then(function(err){

                });

        }
    },
    copy_url: () => {

        let short_url = document.getElementById('short_url');
        short_url.select();
        short_url.setSelectionRange(0,99999);
        document.execCommand("copy");
    },
    fill_edit_url: (e) => {
        document.getElementById('long_url_container').style.display = "flex";
        document.getElementById('inputcode').value = e;
        let date = (document.getElementById(e).parentElement.parentElement.parentElement.children[3].innerText).split('-');
        document.getElementById('datepicker').value = date[1]+'-'+date[2]+'-'+date[0];
        if(document.getElementById(e).parentElement.parentElement.parentElement.children[4].innerText === "Active"){
            document.getElementById('active').checked = true;
        }else {
            document.getElementById('inactive').checked = true;
        }
    },
    update_url: () => {
        let code = document.getElementById('inputcode').value;
        let date = (document.getElementById('datepicker').value).split('-');
        let expiration = date[2]+'-'+date[0]+'-'+date[1];
        let active = document.querySelector('input[name="accountType"]:checked').value;
        // let status =
        axios.put('/updateurl', {
            code: code,
            expiration: expiration,
            active: active
        }).then(function(response){
            location.reload();
        }).then(function(error){
            // console.log(error.data)
        });
    },
    delete_url: (code) => {
        console.log(code);
        axios.delete(`/deleteurl/${code}`, {
            code: code,
        }).then(function(response){
            // console.log(response);
            location.reload();
        }).then(function(error){
            // console.log(error.data)
        });
    },
    validate_url: (url) => {

        let status = true;

        if(url.trim() === ""){
            status = false;
            alert('Please, put an URL');
        }
        if(!validUrl.isWebUri(url)){
            status = false;
            alert("Invalid URL");
        }

        return status;
    },
}
