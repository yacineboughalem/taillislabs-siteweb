
let dragArea = document.getElementById('drag-area');

let getDataText      = JSON.parse( dragArea.getAttribute('data-text') ?? '{}' );
let selectableConfig = JSON.parse( dragArea.getAttribute('selectable-config') ?? '{}' );
let autouploadConfig = JSON.parse( dragArea.getAttribute('autoupload-config') ?? '{}' );
let previewConfig    = JSON.parse( dragArea.getAttribute('preview-config') ?? '{}' );
let jsonText = {
    unacceptMessage     : getDataText.unacceptMessage ?? 'Items Unaccept' ,
    removeConfermation  : getDataText.removeConfermation ?? 'Are you sure to remove'
};
let selectable_config = {
    name : selectableConfig.name ?? "select" ,
    text : selectableConfig.text ?? "Selectable"
};
let autoupload_config = {
    name : autouploadConfig.name ?? "file" ,
    url  : autouploadConfig.url  ?? "/api/file/"
};
let preview_config = {
    name : previewConfig.name ?? "file" ,
};

// upload file
let sendFile = async function( file , config = autoupload_config  ){
    let prefixImageName  = dragArea.getAttribute('data-prefix-image-name') ?? '';
    return await new Promise( async ( resolve, reject )=>{

        let formData = new FormData();
        formData.append( config.name , file );
        formData.append( 'prefix' , prefixImageName );
        let option = {
            method: 'post',
            headers : {
                "Accept" : "application/json",
                //"Content-Type": "multipart/form-data"
            },
            body: formData
        };

        let request  = await fetch( config.url , option )
        let response = await request.json();
        if(!request.ok){
            return reject( response );
        }

        return resolve( response );

    });
}

// red file
let readFile = function(file){
    return new Promise((resolve, reject) => {
        let reader = new FileReader();
        reader.onload = () => {
            resolve( { source : reader.result } );
        };
        reader.onerror = reject;
        reader.readAsDataURL(file)
    });
};

// filter files by type
let filesAccept = function (dataFiles,acceptroule){
    return new Promise((resolve) => {
        let acceptable   = [];
        let unacceptable = [];
        (async function() {
            for await (let f of dataFiles) {
                let regex = new RegExp(`(${acceptroule})`);
                let test  = await regex.test(f.type);
                if( test ){
                    let file ;
                    await readFile(f)
                        .then(({source})=>{
                            file = { file : f , source}
                        });
                    acceptable.push(file);
                }else{
                    unacceptable.push(f);
                }
            }
            resolve({ acceptable , unacceptable  });
        })();
    });
};


['dragenter', 'dragover'].forEach(eventName => {
    dragArea.addEventListener(eventName, ()=>{
        dragArea.classList.add('border-primary');
        //dragArea.classList.remove('border-white');
    }, false)
});
['dragleave', 'drop'].forEach(eventName => {
    dragArea.addEventListener(eventName, ()=>{
        dragArea.classList.remove('border-primary');
        //dragArea.classList.add('border-white');
    }, false)
});
async function loadingImages (event) {

    let dragAreaLoading = !!document.getElementById('drag-area-loading');
    let dragAreaPreview = document.getElementById('drag-area-preview');
    let dragAreaError   = document.getElementById('drag-area-error');

    //return false;
    // check the autoupload to database
    if( dragArea.hasAttribute('autoupload-config') ){
        // if autoupload send it to the server and get the response
        (async function() {
            for await (let file of event.files) {
                dragAreaLoading.innerHTML = `
                <div class="text-center my-3">
                    <div class="spinner-border" role="status"></div>
                </div>
                `;
                sendFile( file )
                    .then( res =>{
                        let htmlImage = '';
                        if( dragArea.hasAttribute('selectable-config') ){
                            htmlImage =`
                            <div class="card" >
                                <img src="${res.pathThumbnail}" class="card-img" alt="..." >
                                <div class="card-body py-1">
                                    <div class="form-check w-100">
                                        <input type="radio" class="form-check-input" id="radio_resource_${res.id}" value="${res.id}" name="${selectable_config.name}"  >
                                        <label class="form-check-label" for="radio_resource_${res.id}" > ${selectable_config.text} </label>
                                    </div>
                                </div>
                            </div>
                            `;
                        }else{
                            htmlImage =`
                            <div class="card" >
                                <img src="${source}" class="card-img" alt="..." >
                            </div>
                            `;
                        }
                        htmlImage+=`<input type="hidden" name="${preview_config.name}[]" value="${res.id}" />`;
                        let divPreview = document.createElement('div');

                        divPreview.className = 'col-6 col-md-3 mb-2';
                        divPreview.setAttribute("id", `source_${res.id}`);
                        divPreview.innerHTML = htmlImage;
                        dragAreaPreview.appendChild(divPreview);
                    })
                    .catch( (err) => {
                        let elError = document.createElement('span');
                            elError.className = 'badge rounded-pill bg-danger mx-2';
                            elError.innerHTML = file.name;
                            dragAreaError.appendChild(elError);
                    })
                    .then(()=>{
                        let radios = document.getElementsByName( selectable_config.name );
                        let countInputChecked = 0 ;
                        if (typeof(radios) != 'undefined' && radios != null){
                            for (let radio of radios) {
                                if( radio.checked ){ countInputChecked++; }
                            }
                        }
                        if( !countInputChecked ){
                            radios[0].checked = true;
                        }

                        // clear loading
                        dragAreaLoading.innerHTML = '';

                    });
            }
        })();

    }else{
        // show images without uploading

        let accept = event.getAttribute('accept');
        dragAreaLoading.innerHTML = `
        <div class="text-center my-3">
            <div class="spinner-border" role="status"></div>
        </div>
        `;
        filesAccept( event.files , accept )
            .then( ({ acceptable , unacceptable }) => {
                // empty list preview,errors
                dragAreaPreview.innerHTML = '';
                dragAreaError.innerHTML = '';

                // check the radios if ther is a default checked
                let radios = document.getElementsByName(selectable_config.name);
                let countInputChecked = 0 ;
                if (typeof(radios) != 'undefined' && radios != null){
                    for (let radio of radios) {
                        if( radio.checked ){ countInputChecked++; }
                    }
                }
                // loop files
                    // accepted files
                    acceptable.forEach(( {file,source} ,key)=>{
                        let htmlImage = '';
                        if( dragArea.hasAttribute('selectable-config') ){
                            htmlImage =`
                            <div class="card" >
                                <img src="${source}" class="card-img" alt="..." >
                                <div class="card-body py-1">
                                    <div class="form-check w-100">
                                        <input type="radio" class="form-check-input" id="radio_resource_${key}" value="${file.name}" name="${selectable_config.name}" ${ !countInputChecked ? ( key == 0 ? 'checked' : null ) : null } >
                                        <label class="form-check-label" for="radio_resource_${key}" > ${selectable_config.text} </label>
                                    </div>
                                </div>
                            </div>
                            `;
                        }else{
                            htmlImage =`
                            <div class="card" >
                                <img src="${source}" class="card-img" alt="..." >
                            </div>
                            `;
                        }
                        let divPreview = document.createElement('div');

                        divPreview.className = ( acceptable.length < 2 ? 'col-12 mb-2' : 'col-6 col-md-3 mb-2' );
                        divPreview.setAttribute("id", `source_${key}`);
                        divPreview.innerHTML = htmlImage;
                        dragAreaPreview.appendChild(divPreview);
                    });
                    // unaccepted files
                    if( unacceptable.length ){
                        dragAreaError.innerHTML = `
                            <hr/>
                            <div class="alert alert-danger text-light"> ${unacceptable.length} ${jsonText.unacceptMessage} </div>
                        `;
                        unacceptable.forEach((file,key)=>{

                            let elError = document.createElement('span');
                            elError.className = 'badge rounded-pill bg-danger mx-2';
                            elError.innerHTML = file.name;
                            dragAreaError.appendChild(elError);
                        });
                    }

            })
            .then(()=>{
                dragAreaLoading.innerHTML = '';
            });
    }
}
function removeImage(id){

    let thisRadio = document.getElementById(`radio_resource_${id}`);

    let imageElement = document.getElementById(`source_${id}`);

    let conferm = confirm( jsonText.removeConfermation );

    if( conferm ){
        // show spiner
        document.getElementById(`loading_source_${id}`).classList.remove('opacity-0');
        //disable thie button
        document.getElementById(`button_remove_source_${id}`).disabled = true;

        // call request to remove image
        fetch(`/api/images/${id}`,{method: 'DELETE'})
            //.then(response => response.json())
            .then((res)=>{
                console.log( res );
                if( res.ok ){
                    imageElement.remove();
                    // after remove set image default
                    if( thisRadio.checked ){
                        let radios = document.getElementsByName( selectable_config.name );
                        radios[0].checked = true;
                    }
                }
            })
            .catch((err)=>{
                console.log(err);
            });

    }
}

function setImagePrefix (e){
    let inputImage = document.getElementById('drag-area');
    inputImage.setAttribute( 'data-prefix-image-name' , e.value );
}